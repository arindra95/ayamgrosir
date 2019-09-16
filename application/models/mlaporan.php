<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class mlaporan extends CI_Model
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
			$query = $this->db->get('invoice');
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
			$this->db->select('tanggal, SUM(total)	as total');
			$this->db->from('penjualan');
			$query= $this->db->get();
			return $query->row();
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
			$this->db->select('*, SUM(totalharga) as total');
			$this->db->from('invoice');

			$this->db->group_by('YEARWEEK(tanggal)');
			$query= $this->db->get();
			return $query->result();
		}

		public function view_by_date($date){
			$this->db->select('pelanggan.nama, invoice.noinvoice,data_ayam.jenis, SUM(IF(DATE(penjualan.tanggal),penjualan.ekor,0)) as totalekor, SUM(IF(DATE(invoice.tanggal),penjualan.berat,0)) as totalberat, DATE(penjualan.tanggal) as tanggal,SUM(IF(DATE(penjualan.tanggal),penjualan.total,0)) as totalharga,SUM(IF(DATE(penjualan.tanggal),penjualan.total,0)) as harga,invoice.status');
			$this->db->from('penjualan');
        	$this->db->where('DATE(penjualan.tanggal)', $date);// Tambahkan where tanggal nya
        	$this->db->join('invoice', 'invoice.noinvoice = penjualan.noinvoice', 'left');
         	$this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
          	$this->db->join('pelanggan', 'penjualan.idpelanggan = pelanggan.idpelanggan', 'left');
          	$this->db->group_by('DATE(penjualan.tanggal) WITH ROLLUP');
          	$this->db->group_by('penjualan.kodeayam');
        	$query= $this->db->get();
   		return $query;// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  		}
    
  		public function view_by_month($month, $year){
  			$this->db->select('pelanggan.nama, invoice.noinvoice,data_ayam.jenis, SUM(IF(MONTH(penjualan.tanggal),penjualan.ekor,0)) as totalekor,SUM(IF(MONTH(penjualan.tanggal),penjualan.berat,0)) as totalberat,CONCAT(YEAR(penjualan.tanggal),"-",MONTH(penjualan.tanggal)) as tanggal, SUM(IF(MONTH(penjualan.tanggal),penjualan.total,0)) as totalharga, SUM(penjualan.total) as harga, invoice.status');
			$this->db->from('penjualan');
       		$this->db->where('MONTH(penjualan.tanggal)', $month); // Tambahkan where bulan
        	$this->db->where('YEAR(penjualan.tanggal)', $year);

        	$this->db->join('invoice', 'invoice.noinvoice = penjualan.noinvoice', 'left');
         	$this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
          	$this->db->join('pelanggan', 'penjualan.idpelanggan = pelanggan.idpelanggan', 'left');
        	$this->db->group_by('YEAR(penjualan.tanggal )');
        	$this->db->group_by('MONTH(penjualan.tanggal)');
        	$this->db->group_by('penjualan.kodeayam');
        	//$this->db->group_by('WITH ROLLUP');
        	$query = $this->db->get();
    		return $query; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
  		}


    
  		public function view_by_year($year){
        	$this->db->select('pelanggan.nama,invoice.noinvoice,SUM(IF(YEAR(penjualan.tanggal),penjualan.ekor,0)) as totalekor,SUM(IF(YEAR(penjualan.tanggal),penjualan.berat,0)) as totalberat ,YEAR(penjualan.tanggal) as tanggal, SUM(IF(YEAR(invoice.tanggal), invoice.total,0)) as totalharga,invoice.status');
        	$this->db->where('YEAR(penjualan.tanggal)', $year);
		$this->db->from('penjualan');
          $this->db->join('invoice', 'invoice.noinvoice = penjualan.noinvoice', 'left');
          $this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
          $this->db->join('pelanggan', 'penjualan.idpelanggan = pelanggan.idpelanggan', 'left');
			 // Tambahkan where tahun
        	$this->db->group_by('YEAR(penjualan.tanggal)');

  			$query = $this->db->get();
    		return $query; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
  		}
    
  		public function view_all(){
  			$this->db->select('pelanggan.nama,invoice.tanggal,invoice.noinvoice, invoice.sisa, invoice.totalharga, SUM(invoice.totalharga) as harga, invoice.totalekor, invoice.totalberat, invoice.bayar, invoice.status, data_ayam.jenis ');
          	$this->db->from('penjualan');
          	$this->db->join('invoice', 'invoice.noinvoice = penjualan.noinvoice', 'left');
          	$this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
          	$this->db->join('pelanggan', 'penjualan.idpelanggan = pelanggan.idpelanggan', 'left');
          	$this->db->group_by('invoice.noinvoice');
  			$query = $this->db->get();
    		return $query; // Tampilkan semua data transaksi
  		}
    
    public function option_tahun(){
        $this->db->select('YEAR(tanggal) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('invoice'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tanggal)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tanggal)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }


	}





?>