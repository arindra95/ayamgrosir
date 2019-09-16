<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class pengguna extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('mpengguna');
		
		
	}

	function index(){

		$this->load->view('vpengguna');
		
	}

  function load_user(){
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $total= $this->mpengguna->get_total_user();

      $output = array(

        "draw" => $draw,
        "recordsTotal" => $total,
        "recordsFiltered" =>$total,
        'data' => $this->mpengguna->get_data($start,$length)->result(),

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
            'id' => $this->input->post('id'),
        		'username' => $this->input->post('username'),
        		'password' => $this->input->post('password'),
        		'role' => $this->input->post('role'),
        		'nama' => $this->input->post('nama'),
        		'jk' => $this->input->post('jk'),
        		'alamat' => $this->input->post('alamat'),
        		'notel' => $this->input->post('notel'),
        		'email' => $this->input->post('email'),
			);
  		 $this->mpengguna->save($data);

	   header('Content-Type: application/json');
    	echo json_encode(array("status" => TRUE, "messages"=>"data pengguna berhasil ditambah"));

  
  	}

    function perbarui(){
      $id=$this->input->post('id');
      $where= array(
          'id'=>$this->input->post('id'),

      );
  		$data= array(
  				'username' => $this->input->post('username'),
        		'password' => $this->input->post('password'),
        		'role' => $this->input->post('role'),
        		'nama' => $this->input->post('nama'),
        		'jk' => $this->input->post('jk'),
        		'alamat' => $this->input->post('alamat'),
        		'notel' => $this->input->post('notel'),
        		'email' => $this->input->post('email'),
  		);
		$this->mpengguna->update($where,$data);
    header('Content-Type: application/json');
		echo json_encode(array("status"=>TRUE, "messages"=>"data pengguna berhasil diubah"));
  	}

 	function hapus(){
  		$id=$this->input->post('id');
  		$this->mpengguna->delete($id);
      
      header('Content-Type: application/json');
    	echo json_encode(array("status" => TRUE, "messages"=>"data pengguna berhasil dihapus"));
  	}


  	
}
?>