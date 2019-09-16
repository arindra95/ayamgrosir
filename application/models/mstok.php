<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class mstok extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
       		$this->load->database();
		}

		 public function get_data()
		{ 
        $subquery = $this->db
        ->select('data_ayam.id, SUM(IFNULL(penjualan.ekor,0)) as stokterjual, penjualan.*')
        ->from('data_ayam, penjualan')
        ->where('data_ayam.id = penjualan.kodeayam')
        ->group_by('data_ayam.id')
        ->get_compiled_select();
      

      $query = $this->db
          ->select_sum('pembelian.totalekor', 'stokmasuk')
                ->select('data_ayam.id, data_ayam.jenis, IFNULL((SUM(pembelian.totalekor)- IFNULL(stokterjual,0)),0) as  stokakhir, IFNULL(stokterjual,0) as stokterjual, pembelian.hargajual,pembelian.hargaperkilo')
                ->from('data_ayam')
                ->join('pembelian', 'data_ayam.id = pembelian.kodeayam ', 'left')
                ->join('('.$subquery.') as penjualan', 'penjualan.kodeayam = data_ayam.id   ', 'left')
          ->group_by('data_ayam.id')
          ->get();
      
 			    return $query->result();
    }

        public function get_karyawan(){
        	$this->db->select('user.username, user.role, pegawai.idu AS id, pegawai.id');
          	$this->db->from('user');
          	$this->db->join('pegawai', 'user.id = pegawai.idu');
 			
			$query = $this->db->get();
 			return $query->result();
        }

      public function get_total_stok()
      {
          $query = $this->db->select("COUNT(*) as num")->get("data_ayam");
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