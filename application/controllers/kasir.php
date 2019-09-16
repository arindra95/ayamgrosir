<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kasir extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mpenjualan');
		$this->load->model('mpengeluaran');
		$this->load->model('mhutang');
		$this->load->model('mpiutang');
		$this->load->model('mlaporan');
		$this->load->model('mstok');
		$this->load->model('mlappembelian');
		$this->load->model('mlapkasharian');
		$this->load->model('mlogin');
		$this->load->model('msup');
		$this->load->model('mpelanggan');
		if($this->session->userdata('username'=="")){
			redirect('auth');
		}
		$this->load->helper('text');
	}



	function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('auth');
	}

	function penjualan(){
		 $tanggal['tgl']= date("Y-m-d");

			 $aym['ayam']= $this->mpenjualan->get_ayam();
			 
			 $inv['invoice'] = $this->mpenjualan->get_no_invoice();
			 $plg['pelanggan'] = $this->mpenjualan->get_pelanggan();


			 $data = array(
			 	'tgl' => $tanggal['tgl'],
			 	'ayam' => $aym['ayam'],
			 	'inv' =>	$inv['invoice'],
			 	'plgn' => $plg['pelanggan'],

			 );
			
			$data['id']=$this->session->userdata('id');
			$data['role']=$this->session->userdata('role');
			$this->load->view('vkasir', $data);
	}

	function pembelian(){
		
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
            'kar' =>  $kar['kar'],
             'iduser' =>  $id['iduser'],

            
     );

		$this->load->view('vkstok', $data);
	}


	function pengeluaran(){
		$this->load->view('vkpengeluaran');
	}

	function piutang(){


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
		$this->load->view('vkpiutang', $data);
	}

	function hutang(){
		 
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
		$this->load->view('vkhutang', $data);
	}

	function supplier(){
		$this->load->view('vksup');
	}

	function pelanggan(){
		$this->load->view('vkpelanggan');
	}

	function laporan_penjualan(){
		$this->load->view('vklaporan');
	}

	function laporan_pemebelian(){
		$this->load->view('vklaporan');
	}

	function laporan_kas(){
		$this->load->view('vklaporan');
	}
  	 
}
?>