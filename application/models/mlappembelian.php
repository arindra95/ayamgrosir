<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class mlappembelian extends CI_Model
	{
		
		function __construct()	
		{
			# code...
			 parent::__construct();
        	$this->load->database();
		}

		function lapertanggal($tanggal1,$tanggal2){

          	$this->db->where('tanggal >=', $tanggal1);
			$this->db->where('tanggal <=', $tanggal2);
			$query = $this->db->get('pembelian');
			return $query->result();
		}

		function lapsemua(){
			$this->db->select('penjualan.*,  SUM(invoice.totalharga) as totalpenj, invoice.totalharga, invoice.totalekor, invoice.totalberat, data_ayam.jenis ');
          	$this->db->from('penjualan');
          	$this->db->join('invoice', 'invoice.noinvoice = penjualan.noinvoice', 'right');
          	$this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
			$this->db->group_by('penjualan.tanggal');
			$this->db->group_by('penjualan.noinvoice');
			$query= $this->db->get();
			return $query->result();

		}

		function lapmingguan(){
			$this->db->select('penjualan.*, YEARWEEK(penjualan.tanggal) as tanggal, SUM(invoice.totalharga) as totalpenj, invoice.totalharga, invoice.totalekor, invoice.totalberat, data_ayam.jenis ');
          	$this->db->from('penjualan');
          	$this->db->join('invoice', 'invoice.noinvoice = penjualan.noinvoice', 'right');
          	$this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
			$this->db->group_by('YEARWEEK(penjualan.tanggal)');
			$this->db->group_by('penjualan.noinvoice');
			$query= $this->db->get();
			return $query->result();
		}

		function lapbulanan(){
			$this->db->select(' CONCAT(YEAR(penjualan.tanggal),"/",MONTH(penjualan.tanggal)) as tglbln, penjualan.*, SUM(invoice.totalharga) as totalpenj, invoice.totalharga, invoice.totalekor, invoice.totalberat, data_ayam.jenis ');
          	$this->db->from('penjualan');
          	$this->db->join('invoice', 'invoice.noinvoice = penjualan.noinvoice', 'right');
          	$this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
			$this->db->group_by('YEAR(penjualan.tanggal)');
			$this->db->group_by('MONTH(penjualan.tanggal)');
			$this->db->group_by('penjualan.noinvoice');
			$query= $this->db->get();
			return $query->result();
		}	

		function laptahunan(){
			$this->db->select(' YEAR(penjualan.tanggal) as tglthn, penjualan.*, SUM(invoice.totalharga) as totalpenj, invoice.totalharga, invoice.totalekor, invoice.totalberat, data_ayam.jenis ');
          	$this->db->from('penjualan');
          	$this->db->join('invoice', 'invoice.noinvoice = penjualan.noinvoice', 'right');
          	$this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
			$this->db->group_by('YEAR(penjualan.tanggal)');
			$this->db->group_by('MONTH(penjualan.tanggal)');
			$this->db->group_by('penjualan.noinvoice');
			$query= $this->db->get();
			return $query->result();
		}	


		function totpenjualan(){
			$this->db->select('tanggal, SUM(totalharga)	as total');
			$this->db->from('invoice');
			$query= $this->db->get();
			return $query->result();
		}

		function totpembelian(){
			$this->db->select('tanggal, SUM(harga)	as total');
			$this->db->from('pembelian');
			$query= $this->db->get();
			return $query->result();
		}

		function totpenjmingguan(){
			$this->db->select('YEARWEEK(tanggal) as tanggal, SUM(totalharga)	as total');
			$this->db->from('invoice');
			$this->db->group_by('YEARWEEK(tanggal)');
			$query= $this->db->get();
			return $query->result();
		}

		function totpenjbulanan(){
			$this->db->select('CONCAT(MONTH(tanggal),"/",YEAR(tanggal)) as tanggal, SUM(totalharga)	as total');
			$this->db->from('invoice');
			$this->db->group_by('YEAR(tanggal)');
			$this->db->group_by('MONTH(tanggal)');
			$query= $this->db->get();
			return $query->result();
		}

		function totpenjtahunan(){
			$this->db->select('YEAR(tanggal) as tanggal, SUM(totalharga)	as total');
			$this->db->from('invoice');
			$this->db->group_by('YEARWEEK(tanggal)');
			$query= $this->db->get();
			return $query->result();
		}

		public function view_by_date($date){
			$this->db->select('nopembelian,DATE(tanggal) as tanggal, SUM(IF(DATE(tanggal),totalekor,0)) as totalekor,  SUM(IF(DATE(tanggal),totalberat,0)) as totalberat, SUM(IF(DATE(tanggal),harga,0)) as harga');
			$this->db->from('pembelian');
        	$this->db->where('DATE(tanggal)', $date); // Tambahkan where tanggal nya
        	$query=$this->db->get();
    		return $query->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  		}
    
  		public function view_by_month($month, $year){
  			$this->db->select('nopembelian, CONCAT(YEAR(tanggal),"-",MONTH(tanggal)) as tanggal, SUM(IF(MONTH(tanggal),totalekor,0)) as totalekor, SUM(IF(MONTH(tanggal),totalberat,0)) as totalberat, SUM(IF(MONTH(tanggal),harga,0)) as harga');
  			$this->db->from('pembelian');
       		$this->db->where('MONTH(tanggal)', $month); // Tambahkan where bulan
        	$this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun
        	$this->db->group_by('YEAR(tanggal)');
        	$this->db->group_by('MONTH(tanggal)');
        	$query=$this->db->get();
    		return $query->result();  // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
  		}
    
  		public function view_by_year($year){
  			$this->db->select('nopembelian, YEAR(tanggal) as tanggal, SUM(IF(YEAR(tanggal),totalekor,0)) as totalekor, SUM(IF(YEAR(tanggal),totalberat,0)) as totalberat, SUM(IF(YEAR(tanggal),harga,0)) as harga');
        	$this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun
        	$this->db->from('pembelian');
        	$this->db->group_by('YEAR(tanggal)');
        	$query=$this->db->get();
    		return $query->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
  		}
    
  		public function view_all(){
  			$this->db->select('nopembelian,tanggal, totalekor,  totalberat, harga');
			$this->db->from('pembelian');
			$this->db->group_by('nopembelian');
  			$query=$this->db->get();
    		return $query->result(); // Tampilkan semua data transaksi
  		}
    
    public function option_tahun(){
        $this->db->select('YEAR(tanggal) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('pembelian'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tanggal)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tanggal)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }


	}





?>