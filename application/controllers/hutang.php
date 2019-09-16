<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class hutang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('mhutang');
    	$this->load->database();
		
		
	}

	function index(){
    $tanggal['tgl']=date("Y-m-d");


    $get['get'] = $this->mhutang->get_ayam();

    $nip['no'] = $this->mhutang->get_no_invoice();

    $enum['enum']=  $this->db->jenistransaksi_enum('pembelian','jenistransaksi');

    $sup['sup'] = $this->mhutang->get_supplier();

    $kar['kar'] = $this->mhutang->get_karyawan();


    $data = array(
            'get' => $get['get'],
            'supplier' => $sup['sup'],
            'no' => $nip['no'],
            'enum' =>  $enum['enum'],
            'tgl' => $tanggal['tgl'],
            'kar' =>  $kar['kar'],

            
     );

		$this->load->view('vhutang', $data);
		
	}

  function load_hutang(){
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $total= $this->mhutang->get_total_hutang();
      $stat = 'belum lunas';
      $output = array(

        "draw" => $draw,
        "recordsTotal" => $total,
        "recordsFiltered" =>$total,
        'data' => $this->mhutang->get_data($stat,$start,$length),

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
            'nopembelian' => $this->input->post('nopembelian'),
            'kodeayam' => $this->input->post('kodeayam'),
            'iduser' => $this->input->post('iduser'),
            'idsupplier'=> $this->input->post('idsupplier'),
        		'tanggal' => $this->input->post('tanggal'),
        		'jenistransaksi' => $this->input->post('jenistransaksi'),
        		'totalekor' => $this->input->post('totalekor'),
            'totalberat' => $this->input->post('totalberat'),
        		'bayar' => $this->input->post('bayar'),
            'harga' => $this->input->post('harga'),
            'sisa' => $this->input->post('sisa'),
            'status' => $this->input->post('status'),
			);

  		 $this->mhutang->save($data);
	     

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
        $this->mhutang->get_by_id($where,'data_ayam')->results();
        
    }



    function perbarui(){
      $id=$this->input->post('nopembelian');
      $where= array(
           'nopembelian' => $this->input->post('nopembelian'),

      );
  		$data= array(
  				
            'kodeayam' => $this->input->post('kodeayam'),
            'idsupplier'=> $this->input->post('idsupplier'),
            'iduser' => $this->input->post('iduser'),
            'tanggal' => $this->input->post('tanggal'),
            'jenistransaksi' => $this->input->post('jenistransaksi'),
            'totalekor' => $this->input->post('totalekor'),
            'totalberat' => $this->input->post('totalberat'),
            'bayar' => $this->input->post('bayar'),
            'harga' => $this->input->post('harga'),
            'sisa' => $this->input->post('sisa'),
            'status' => $this->input->post('status'),
  		);
		$this->mhutang->update($where,$data);
     header('Content-Type: application/json');
		echo json_encode(array("status"=>TRUE, "messages"=>"data supplier berhasil diubah"));
  	}

 	function hapus(){
  		$id=$this->input->post('nopembelian');
  		$this->mhutang->delete($id);
    	echo json_encode(array("status" => TRUE, "messages"=>"data supplier berhasil dihapus"));
  	}


  	
}
?>