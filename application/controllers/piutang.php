<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class piutang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('mpiutang');
		
		
	}

	function index(){
    $tanggal['tgl']=date("Y-m-d");


    $get['get'] = $this->mpiutang->get_ayam();

    $nip['no'] = $this->mpiutang->get_no_invoice();

    $enum['enum']=  $this->db->jenistransaksi_enum('pembelian','jenistransaksi');

    $sup['sup'] = $this->mpiutang->get_supplier();

    $kar['kar'] = $this->mpiutang->get_karyawan();


    $data = array(
            'get' => $get['get'],
            'supplier' => $sup['sup'],
            'no' => $nip['no'],
            'enum' =>  $enum['enum'],
            'tgl' => $tanggal['tgl'],
            'kar' =>  $kar['kar'],

            
     );

		$this->load->view('vpiutang', $data);
		
	}

  function load_piutang(){
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $total= $this->mpiutang->get_total_piutang();
      $stat = 'belum lunas';
      $output = array(

        "draw" => $draw,
        "recordsTotal" => $total,
        "recordsFiltered" =>$total,

        'data' => $this->mpiutang->get_data($stat,$start,$length),

      );
      echo json_encode($output);
      exit();
  }
	 	#$get = $this->model->getsupp->result_array();
	 		#foreach ($get as $row ) {
	 			#$result['id_supplier'] = $row['id_supplier'];
	 			#$result['nama_supp'] = $row['nama_supp'];
	 			#$result['alamat'] = $row['alamat'];
	 			#$result['notel'] = $row['notel'];
	 			#$result['email'] = $row['email'];
	 		#}
	 	#echo json_encode($result);
  	
	#function json() { //data data produk by JSON object

 		#$search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
    	#$limit = $_POST['length']; // Ambil data limit per page
    	#$start = $_POST['start']; // Ambil data start
    	#$order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
    	#$order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
   		#$order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
    	#$total = $this->msup->count_all(); // Panggil fungsi count_all pada msup
    	#$data = $this->msup->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada SiswaModel

    	#$filter = $this->msup->count_filter($search); // Panggil fungsi count_filter pada SiswaModel
    	#$callback = array(
        #'draw'=>$_POST['draw'], // Ini dari datatablenya
        #'recordsTotal'=>$total,
        #'recordsFiltered'=>$filter,
        #'data'=> $data
    	#);


    	#header('Content-Type: application/json');
    	#echo json_encode($callback);
  	#}


  	function ubah(){
  		$data = $this->supplier->get_id($id);
  		echo json_encode($data);
  	}


  		function simpan(){
    
  		$data = array(
            'noinvoice' => $this->input->post('nopembelian'),
        		'tanggal' => $this->input->post('tanggal'),
        		'totalekor' => $this->input->post('totalekor'),
            'totalberat' => $this->input->post('totalberat'),
            'tgl_pembayaran' => $this->input->post('tgl_pembayaran'),
        		'bayar' => $this->input->post('bayar'),
            'harga' => $this->input->post('harga'),
            'sisa' => $this->input->post('sisa'),
            'status' => $this->input->post('status'),
			);

  		 $this->mpiutang->save($data);
	     

       header('Content-Type: application/json');
    	 echo json_encode(
        
         array(
            //'res'=> $res
            'status'=> true,
            'messages'=> "data supplier berhasil ditambah"
            
           )
      );

  
  	}

    function get_id($id){
        $where = array('id' => $id);
        $this->mpiutang->get_by_id($where,'data_ayam')->results();
        
    }



    function perbarui(){
      $id=$this->input->post('noinvoice');
      $where= array(
           'noinvoice' => $this->input->post('noinvoice'),

      );
  		$data= array(
  			
            'tanggal' => $this->input->post('tanggal'),
            'bayar' => $this->input->post('bayar'),
            'tgl_pembayaran' => $this->input->post('tgl_pembayaran'),
            'sisa' => $this->input->post('sisa'),
            'status' => $this->input->post('status'),
  		);
		$this->mpiutang->update($where,$data);

    header('Content-Type: application/json');
		echo json_encode(array("status"=>TRUE, "messages"=>"data supplier berhasil diubah"));
  	}

 	function hapus(){
  		$id=$this->input->post('noinvoice');
  		$this->mpiutang->delete($id);
    	echo json_encode(array("status" => TRUE, "messages"=>"data supplier berhasil dihapus"));
  	}


  	
}
?>