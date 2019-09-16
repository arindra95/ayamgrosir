<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class mhitung extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
        	$this->load->database();
		}

		function save($data)
		{
          	$this->db->set($data);
          	$this->db->insert('hitungberat');
          	return $this->db->insert_id();
      	}
	}
?>