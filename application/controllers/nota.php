<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class nota extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('mnota');
		}


		function index()
		{	
			
			
			
		}

		function penjualan($id)
		{	
			$data['tgl']= date("Y-d-m");
			$data['nomer']= 0;
			$data['nota']= $this->mnota->getnota($id)->result();
			$data['not']= $this->mnota->getnota($id)->row();

			$this->load->view('vnota', $data);

		}

		function pembelian($id)
		{
			$data['tgl']= date("Y-d-m");
			$data['nomer']= 0;
			$data['np']= $this->mnota->getnp($id)->result();
			$data['n'] = $this->mnota->getnp($id)->row();

			$this->load->view('vnp', $data);
		}

	}




 ?>