<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	class msup extends CI_Model{

      var $table = 'supplier';
      var $column_order = array('idsupplier','nama_supp','alamat','notel','email');
      var $column_search = array('nama_supp','alamat','notel');
      var $order = array('nama_supp' => 'desc');

      function __construct(){
        parent::__construct();
        $this->load->database();
        
      }

      function _get_datatables_query(){

        $this->db->from($this->table);
        
        $i = 0;

        foreach ($this->column_search as $item) 
        {
          if($_POST['search']['value'])
          {

            if ($i===0) 
            {
            
                $this->db->group_start();
                $this->db->like($item, $_POST['search']['value']);

            }else{
                $this->db->or_like($item, $_POST['search']['value']);
            }

            if(count($this->column_search) - 1 === $i)
                $this->db->group_end();
          }
          $i++;
        }

        if (isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }
        elseif (isset($this->order)) 
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);

        }

      }

      function get_datatables(){
          $this->_get_datatables_query();
          if($_POST['length'] != -1)
          $this->db->limit($_POST['length'],$_POST['start']);
          $query = $this->db->get();
          return $query->result();
      
      }

      function count_filtered()
      {
          $this->_get_datatables_query();
          $query = $this->db->get();
          return $query->num_rows();
      }

      function count_all(){
          $this->db->from($this->table);      
          return $this->db->count_all_results();
      }

      function get($idsupplier){
          $query=$this->db->query("SELECT * FROM supplier WHERE idsupplier='$idsupplier'");
          if ($data->num_rows()>0) {
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

  		function save($idsupplier,$nama_supp,$alamat,$notel,$email){
          $query=$this->db->query("INSERT INTO supplier(idsupplier,nama_supp,alamat,notel,email)VALUES('$idsupplier','$nama_supp','$alamat','$notel','$email')");
          return $query;
  		}

  		function update($idsupplier,$nama_supp,$alamat,$notel,$email){
  		    $query=$this->db->query("UPDATE supplier SET idsupplier='$idsupplier', nama_supp='$nama_supp',alamat='$alamat', notel='$notel',email='$email' WHERE id=$id ");
          return $query;
  		}

  		function delete(){
          $query=$this->db->query("DELETE FROM supplier WHERE idsupplier='$idsupplier'");
          return $query;
  		}

  		
	}
?>