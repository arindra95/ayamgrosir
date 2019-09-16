<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mlogin extends CI_Model {

	function dahlogin(){
		return $this->session->userdata('id');
	}

	function cek(){
		return $this->session->userdata('role');
	}

	function ceklogin($table,$field1,$field2){
		 $this->db->select('*');
		 $this->db->from($table);
		 $this->db->where($field1);
		 $this->db->where($field2);
		 $this->db->limit(1);
		 $query = $this->db->get(); 
		 if ($query->num_rows() == 0){
		 	return FALSE;
		 } else{
		 	return $query->result();
		 }
	}
}
?>