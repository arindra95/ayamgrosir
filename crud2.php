<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class supp extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('msup','supplier');
		
		
	}

	function index(){

		$this->load->helper('url');
		$this->load->view('vsup');
		
	}

	function load_supp(){
	 	$list = $this->supplier->get_datatables();
	 	$data = array();
	 	$no = $_POST['start'];
	 	foreach ($list as $field) {
	 		$row = array();
	 		$row[] = $field->idsupplier;
	 		$row[] = $field->nama_supp;
	 		$row[] = $field->alamat;
	 		$row[] = $field->notel;
	 		$row[] = $field->email;

	 		$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$field->idsupplier."'".')"><i class="fa fa-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delet('."'".$field->idsupplier."'".')"><i class="fa fa-trash"></i> Delete</a>';

	 		$data[] = $row;
	 	}

	 	$output = array(
	 		"draw" => $_POST['draw'],
	 		"recordsTotal" => $this->supplier->count_all(),
	 		"recordsFiltered" => $this->supplier->count_filtered(),
	 		"data" => $data,
	 	);

	 	echo json_encode($output);
	 	
	 	#$get = $this->model->getsupp->result_array();
	 		#foreach ($get as $row ) {
	 			#$result['id_supplier'] = $row['id_supplier'];
	 			#$result['nama_supp'] = $row['nama_supp'];
	 			#$result['alamat'] = $row['alamat'];
	 			#$result['notel'] = $row['notel'];
	 			#$result['email'] = $row['email'];
	 		#}
	 	#echo json_encode($result);
  	}
  	
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

  	function dapat(){
  		$idsupplier=$this->input->get('idsupplier');
  		$data=$this->msup->get($idsupplier);
  		echo json_encode($data);
  	}


  	function ubah($id){
  		$data = $this->msup->edit($id);

  		echo json_encode($data);
  	}


  	function simpan(){
  		$idsupplier=$this->input->post('idsupplier');
  		$nama_supp=$this->input->post('nama_supp');
  		$alamat=$this->input->post('alamat');
  		$notel=$this->input->post('notel');
  		$email=$this->input->post('email');
  		$data=$this->supplier->save($idsupplier,$nama_supp,$alamat,$notel,$email);
		echo json_encode($data);
  	}

  	function perbarui(){
  		$data=$this->supplier->update();
		echo json_encode($data);
  	}

  	function hapus(){
  		$data=$this->msup->delete();
		echo json_encode($data);
  	}

  	
}
?>