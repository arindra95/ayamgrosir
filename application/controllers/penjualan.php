<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penjualan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mpenjualan');
		
	}

	function index(){
			$uname['username'] = $this->session->userdata('username');
			$rl['role'] = $this->session->userdata('role');
			$id['id'] = $this->session->userdata('id');
			 $tanggal['tgl']= date("Y-m-d");

			 $aym['ayam']= $this->mpenjualan->get_ayam();
			 
			 $inv['invoice'] = $this->mpenjualan->get_no_invoice();
			 $plg['pelanggan'] = $this->mpenjualan->get_pelanggan();
			 $id['iduser'] = $this->session->userdata('id');

			 $data = array(
			 	'tgl' => $tanggal['tgl'],
			 	'ayam' => $aym['ayam'],
			 	'inv' =>	$inv['invoice'],
			 	'plgn' => $plg['pelanggan'],
			 	'role' => $rl['role'],
			 	'id'=>	$id['id'],
			 	'uname'=> $uname['username'] 

			 );
			$this->load->view('vpenjualan', $data);
		
	}

	public function loads_ayam(){

		$id = $this->input->post('id');
		$data = $this->mpenjualan->ayam($id);
		//$this->mpenjualan->get_ayam()
		header('Content-Type: application/json');
		echo json_encode(array('data'=>$data, 'kode'=>$id, 'status'=>true ));
	
		
	}

	public function loads_list(){
		$id = $this->input->post('noinvoice');
		$data = $this->mpenjualan->list($id);

		header('Content-Type: application/json');
		echo json_encode(array('data'=>$data, 'status'=>true ));

	}

	function simpan_data(){

		$noinv =  $this->input->post('noinvoice');
		$notransaksi = $this->input->post('notransaksi');
		$iduser =  $this->input->post('iduser');
		$idpelanggan =  $this->input->post('idpelanggan');
		$kodeayam =  $this->input->post('kodeayam');
		//$nm_pelanggan =   $this->input->post('nm_pelanggan');
		$tanggal=  $this->input->post('tanggal');
		$ekor=  $this->input->post('ekor');
		$berat=  $this->input->post('berat');
		$hargakiloan=  $this->input->post('hargakiloan');
		$potongan= $this->input->post('potongan');
		$total =  $this->input->post('total');
		$metodetransaksi= $this->input->post('metodetransaksi');		
		$data = array (
				'notransaksi' =>  	$notransaksi,
				'iduser' => 	$iduser ,
				'idpelanggan' => 	$idpelanggan ,
				'kodeayam' => 	$kodeayam ,
				'noinvoice' => 	$noinv,
				//'nm_pelanggan' => 	$nm_pelanggan ,
				'tanggal' => 	$tanggal ,
				'ekor' => 	$ekor ,
				'berat' => 	$berat,
				'hargakiloan' => 	$hargakiloan,
				'potongan' => 	$potongan,
				'total' => 	$total,

		);
		 
		 $this->mpenjualan->save('penjualan', $data);

		header('Content-Type: application/json');
		echo json_encode(array("status" => TRUE, "messages"=>"data supplier berhasil ditambah"));


	}

	function simpan_transaksi(){
		$noinv = $this->input->post('noinvoice');
		$tgl = $this->input->post('tanggal');
		$totekor = $this->input->post('totalekor');
		$totberat = $this->input->post('totalberat');
		$tgl_pembayaran = $this->input->post('tgl_pembayaran');
		$totharga = $this->input->post('totalharga');
		$metode = $this->input->post('metode');
		$byr = $this->input->post('bayar');
		$sisa = $this->input->post('sisa');
		$status = $this->input->post('status');

		$data= array(
			'noinvoice' => $noinv,
			'tanggal' => $tgl,
			'totalekor' => $totekor,
			'tgl_pembayaran' => $tgl_pembayaran,
			'totalberat' => $totberat,
			'totalharga' =>  $totharga,
			'metode' => $metode,
			'bayar' => $byr,
			'sisa' => $sisa,
			'status' => $status,
		);

		$this->mpenjualan->save('invoice', $data);

		header('Content-Type: application/json');
		echo json_encode(array("status" => TRUE, "messages"=>"data supplier berhasil ditambah"));

	}

	function nota(){

	}

	function hapus($id){
  		
  		$this->mpenjualan->delete($id);
    	echo json_encode(array("status" => TRUE, "messages"=>"data supplier berhasil dihapus"));
  	}


}
?>