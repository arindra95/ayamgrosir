<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class mhutang extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
       		$this->load->database();
		}

		 public function get_data($stat)
		{ 

   			$this->db->select('pembelian.*, supplier.nama_supp, data_ayam.jenis');
      		$this->db->from('pembelian');
          $this->db->where('pembelian.status', $stat);
      		$this->db->join('data_ayam', 'pembelian.kodeayam = data_ayam.id', 'left');
			$this->db->join('supplier', 'pembelian.idsupplier = supplier.idsupplier', 'left');
      		$query= $this->db->get();
      
 			return $query->result();
        }

        public function get_karyawan(){
        	$this->db->select('user.username, user.role, pegawai.idu AS id, pegawai.id');
          	$this->db->from('user');
          	$this->db->join('pegawai', 'user.id = pegawai.idu');
 			
			$query = $this->db->get();
 			return $query->result();
        }

      public function get_total_hutang()
      {
          $query = $this->db->select("COUNT(*) as num")->get("pembelian");
          $result = $query->row();
          if(isset($result)) return $result->num;
          return 0;
      }

      public function get_ayam()
      {
      		$query= $this->db->query("SELECT * FROM data_ayam");
      		return $query->result();

      }

      public function get_supplier()
      {
      		$query= $this->db->query("SELECT * FROM supplier");
      		return $query->result();

      }

      public function get_no_invoice(){
        $q = $this->db->query("SELECT MAX(RIGHT(nopembelian,4)) AS kd_max FROM pembelian WHERE DATE(update_at)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return "NIP".date('dmy').$kd;
    }

       public function get_by_id($table,$where)
    {	
    	
    	return $this->db->get($table,$where);	

    }

      function save($data){
          $this->db->set($data);
          $this->db->insert('pembelian');
          return $this->db->insert_id();
      }

      function update($where,$data){
          $this->db->where($where);
          $this->db->update('pembelian', $data);
        
      }

      function delete($id){
          $this->db->where('nopembelian', $id);
          $this->db->delete('pembelian');
      }

      
	}
?>