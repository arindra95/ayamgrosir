<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class msup extends CI_Model{

      function __construct(){
          parent::__construct();
          $this->load->database();
        
      }




      function list(){
          $query=$this->db->query("SELECT * FROM supplier");
          return $query->result();
      }

      function save($idsupplier,$nama_supp,$alamat,$notel,$email){
          $query=$this->db->query("INSERT INTO supplier(idsupplier,nama_supp,alamat,notel,email)VALUES('$idsupplier','$nama_supp','$alamat','$notel','$email')");
          return $query;
      }


      function get($id){
          $query=$this->db->query("SELECT * FROM supplier WHERE id='$id'");
          if ($query->num_rows()>0) {
              foreach ($query->result() as $data) {
                $hasil=array(                  
                  'idsupplier' => $data->idsupplier,
                  'nama_supp' => $data->nama_supp,
                  'alamat' => $data->alamat,
                  'notel' => $data->notel,
                  'email' => $data->email,
                );
              }
          }
          return $hasil;
      }


  		function update($idsupplier,$nama_supp,$alamat,$notel,$email){
  		    $query=$this->db->query("UPDATE supplier SET nama_supp='$nama_supp',alamat='$alamat', notel='$notel',email='$email' WHERE idsupplier='$idsupplier'");
          return $query;
  		}

  		function delete(){
          $query=$this->db->query("DELETE FROM supplier WHERE idsupplier='$idsupplier'");
          return $query;
  		}

  		
	}
?>