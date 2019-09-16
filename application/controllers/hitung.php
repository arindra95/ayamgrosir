<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class hitung extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('datatables');
			$this->load->model('msup');
		}

		function index()
		{

		$this->load->view('vhitung');
		
		}
	}

?>