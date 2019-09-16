<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class mpenjualan extends CI_Model
	{
		
		function __construct()
		{
			 parent::__construct();
        	$this->load->database();
		}


		 public function ayam($id)
		{
			
			//$this->db->where('data_ayam.id', $id);
			//$this->db->select_sum('pembelian.totalekor', 'stokmasuk');
          	//$this->db->select('data_ayam.id, data_ayam.jenis, (SUM(pembelian.totalekor)-IFNULL(penjualan.ekor,0)) as stokakhir,SUM(IFNULL(penjualan.ekor,0)) stokterjual, penjualan.*');
          	//$this->db->from('data_ayam');
          	//$this->db->join('pembelian', 'data_ayam.id = pembelian.kodeayam ', 'left');
          	//$this->db->join('penjualan', 'penjualan.kodeayam = data_ayam.id   ', 'left');
 			//$this->db->group_by('data_ayam.id');
			
			//$query = $this->db->query("SELECT data_ayam.id , data_ayam.jenis, SUM(pembelian.totalekor) AS stokmasuk, IFNULL(stokterjual,0) as stokterjual, (SUM(pembelian.totalekor) - (IFNULL(stokterjual,0))) AS stokakhir FROM data_ayam LEFT JOIN pembelian ON data_ayam.id = pembelian.kodeayam LEFT JOIN (SELECT data_ayam.id, SUM(IFNULL(penjualan.ekor,0)) AS stokterjual, penjualan.* FROM data_ayam, penjualan WHERE data_ayam.id = penjualan.kodeayam = '$id' GROUP BY data_ayam.id) AS penjualan ON penjualan.kodeayam=data_ayam.id GROUP BY data_ayam.id");

			$subquery = $this->db
				->select('data_ayam.id, SUM(IFNULL(penjualan.ekor,0)) as stokterjual, penjualan.*')
				->from('data_ayam, penjualan')
				->where('data_ayam.id = penjualan.kodeayam')
				->group_by('data_ayam.id')
				->get_compiled_select();
			

			$query = $this->db
					->select_sum('pembelian.totalekor', 'stokmasuk')
          			->select('data_ayam.id, data_ayam.jenis, (SUM(pembelian.totalekor)- IFNULL(stokterjual,0)) as stokakhir, IFNULL(stokterjual,0) as stokterjual')
          			->where('data_ayam.id', $id)
          			->from('data_ayam')
          			->join('pembelian', 'data_ayam.id = pembelian.kodeayam ', 'left')
          			->join('('.$subquery.') as penjualan', 'penjualan.kodeayam = data_ayam.id   ', 'left')
 					->group_by('data_ayam.id')
 					->get();

    		return $query->result();
			
 				
        }

         public function list($id)
		{	

          	$this->db->select('penjualan.notransaksi, penjualan.kodeayam, penjualan.noinvoice, SUM(penjualan.ekor) as ekor, SUM(penjualan.hargakiloan) as hargakiloan, SUM(penjualan.potongan) as potongan, SUM(penjualan.berat) as berat, SUM(penjualan.total) as total, data_ayam.jenis');
          	$this->db->from('penjualan');
          	$this->db->where('invoice.noinvoice', $id);
          	$this->db->join('invoice', 'penjualan.noinvoice = invoice.noinvoice', 'left');
          	$this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
 			$this->db->group_by('invoice.noinvoice', $id);
      $this->db->group_by('penjualan.kodeayam');
      //$this->db->group_by('penjualan.notransaksi');
			$query = $this->db->get();
 			return $query->result();
        }

         public function get_pelanggan()
      {
      		$query= $this->db->query("SELECT * FROM pelanggan");
      		return $query->result();

      }

     

       public function get_no_invoice(){
        $q = $this->db->query("SELECT MAX(RIGHT(noinvoice,4)) AS kd_max FROM penjualan WHERE DATE(update_at)=CURDATE()");
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
        return "INV".date('dmy').$kd;
    }
	
    	 public function get_ayam()
      {
      		$query= $this->db->query("SELECT * FROM data_ayam");
      		return $query->result();

      }

        function save($table,$data){
          $this->db->set($data);
          $this->db->insert($table);
          return $this->db->insert_id();
      }

      

       function delete($id){
          $this->db->where('noinvoice', $id);
          $this->db->delete('penjualan');
      }

	}





?>