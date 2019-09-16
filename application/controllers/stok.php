<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class stok extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('mstok');
    $this->load->database();
		
		
	}

	function index(){
    $tanggal['tgl']=date("Y-m-d");


    $get['get'] = $this->mstok->get_ayam();

    $nip['no'] = $this->mstok->get_no_invoice();

    $enum['enum']=  $this->db->jenistransaksi_enum('pembelian','jenistransaksi');

    $sup['sup'] = $this->mstok->get_supplier();

    $kar['kar'] = $this->mstok->get_karyawan();
    
    $id['iduser'] = $this->session->userdata('id');


    $data = array(
            'get' => $get['get'],
            'supplier' => $sup['sup'],
            'no' => $nip['no'],
            'enum' =>  $enum['enum'],
            'tgl' => $tanggal['tgl'],
            'iduser' =>  $id['iduser'],
            'kar' =>  $kar['kar'],

            
     );

		$this->load->view('vstok', $data);
		
	}

  function load_stok(){
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $total= $this->mstok->get_total_stok();

      $output = array(

        "draw" => $draw,
        "recordsTotal" => $total,
        "recordsFiltered" =>$total,
        'data' => $this->mstok->get_data($start,$length),

      );
      echo json_encode($output);
      exit();
  }
	 

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
            'hargaperkilo' => $this->input->post('hargaperkilo'),
        		'jenistransaksi' => $this->input->post('jenistransaksi'),
        		'totalekor' => $this->input->post('totalekor'),
            'totalberat' => $this->input->post('totalberat'),
        		'bayar' => $this->input->post('bayar'),
            'harga' => $this->input->post('harga'),
            'sisa' => $this->input->post('sisa'),
            'status' => $this->input->post('status'),
			);

  		 $this->mstok->save($data);
	     

      header('Content-Type: application/json');
    	 echo json_encode(
        
         array(
            //'res'=> $res
            "status"=> true,
            "messages"=> "data supplier berhasil ditambah"
            
           )
      );

  
  	}

    function get_id($id){
        $where = array('id' => $id);
        $this->mstok->get_by_id($where,'data_ayam')->results();
        
    }



    function perbarui(){
      $id=$this->input->post('nopembelian');
      $where= array(
           'nopembelian' => $this->input->post('nopembelian'),

      );
  		$data= array(
  				
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
		$this->mstok->update($where,$data);

    header('Content-Type: application/json');
		echo json_encode(array("status"=>TRUE, "messages"=>"data supplier berhasil diubah"));
  	}

 	function hapus(){
  		$id=$this->input->post('nopembelian');
  		$this->mstok->delete($id);
    	echo json_encode(array("status" => TRUE, "messages"=>"data supplier berhasil dihapus"));
  	}


  	
}
?>