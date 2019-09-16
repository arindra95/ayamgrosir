<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helpers('tgl_indo');
		$this->load->model('mlogin');
		$this->load->model('mhome');

		if($this->session->userdata('username'=="")){
			redirect('auth');
		}
		$this->load->helper('text');

	}

	function index(){
		$username = $this->session->userdata('username');
		$s = 0;
		$stok = $this->mhome->get_data()->result();
		$penjualan = $this->mhome->penjualan()->result();
		$pembelian = $this->mhome->pembelian()->result();

	 	$data = array(
	 		'username' => $username,
	 		'stok'=> $stok,
	 		'penjualan' => $penjualan,
	 		'pembelian' => $pembelian


	 	);
		
		$this->load->view('vhome', $data);

		
	}

	

	function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}


	 
}
?>