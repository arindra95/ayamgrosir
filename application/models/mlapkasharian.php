<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class mlapkasharian extends CI_Model
	{
		
		function __construct()	
		{
			# code...
			 parent::__construct();
        	$this->load->database();
		}

		public function totkasharian(){
			$this->db->select('tgl_pembayaran, SUM(IF(DATE(tgl_pembayaran),bayar,0)) as total');
			$this->db->from('invoice');
			//$this->db->group_by('tgl_pembayaran');
			$query= $this->db->get();
			return $query->result();
		}

		public function view_by_date($date){
			 $this->db->select('pelanggan.nama, invoice.noinvoice, invoice.tanggal,invoice.totalekor, invoice.totalberat, DATE(invoice.tgl_pembayaran) as tgl_pembayaran,SUM(IF(DATE(invoice.tgl_pembayaran),invoice.bayar,0)) as bayar,invoice.status,invoice.metode');
      $this->db->from('penjualan');
          $this->db->where('DATE(invoice.tgl_pembayaran)', $date);// Tambahkan where tanggal nya
          $this->db->join('invoice', 'invoice.noinvoice = penjualan.noinvoice', 'left');
          $this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
            $this->db->join('pelanggan', 'penjualan.idpelanggan = pelanggan.idpelanggan', 'left');
            $this->db->group_by('DATE(invoice.tgl_pembayaran)');
        	$query= $this->db->get();
   			return $query->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  		}
    
  		public function view_by_month($month, $year){
  			$this->db->select('pelanggan.nama, invoice.noinvoice,invoice.tanggal,SUM(IF(MONTH(invoice.tgl_pembayaran),invoice.totalekor,0)) as totalekor,SUM(IF(MONTH(invoice.tgl_pembayaran),invoice.totalberat,0)) as totalberat,CONCAT(YEAR(invoice.tgl_pembayaran),"/",MONTH(invoice.tgl_pembayaran)) as tgl_pembayaran, SUM(IF(MONTH(invoice.tgl_pembayaran),invoice.bayar,0)) as bayar,invoice.status,invoice.metode');
      $this->db->from('penjualan');
          $this->db->where('MONTH(invoice.tgl_pembayaran)', $month); // Tambahkan where bulan
          $this->db->where('YEAR(invoice.tgl_pembayaran)', $year);
          $this->db->join('invoice', 'invoice.noinvoice = penjualan.noinvoice', 'left');
          $this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
            $this->db->join('pelanggan', 'penjualan.idpelanggan = pelanggan.idpelanggan', 'left');
          $this->db->group_by('YEAR(invoice.tgl_pembayaran)');
          $this->db->group_by('MONTH(invoice.tgl_pembayaran)');
        	$query = $this->db->get();
    		return $query->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
  		}
    
  		public function view_by_year($year){
        	$this->db->select('pelanggan.nama,invoice.noinvoice,invoice.tanggal,SUM(IF(YEAR(invoice.tgl_pembayaran),invoice.totalekor,0)) as totalekor,SUM(IF(YEAR(invoice.tgl_pembayaran),invoice.totalberat,0)) as totalberat ,YEAR(invoice.tgl_pembayaran) as tgl_pembayaran, SUM(IF(YEAR(invoice.tgl_pembayaran), invoice.bayar,0)) as bayar,invoice.status,invoice.metode');
          $this->db->where('YEAR(invoice.tgl_pembayaran)', $year);
    $this->db->from('penjualan');
          $this->db->join('invoice', 'invoice.noinvoice = penjualan.noinvoice', 'left');
          $this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
          $this->db->join('pelanggan', 'penjualan.idpelanggan = pelanggan.idpelanggan', 'left');
       // Tambahkan where tahun
          $this->db->group_by('YEAR(invoice.tgl_pembayaran)');

  			$query = $this->db->get();
    		return $query->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
  		}
    
  		public function view_all(){
  		 $this->db->select('pelanggan.nama,invoice.tanggal,invoice.tgl_pembayaran,invoice.noinvoice,invoice.metode, invoice.sisa, invoice.totalharga, invoice.totalekor, invoice.totalberat, invoice.bayar, invoice.status, data_ayam.jenis ');
          $this->db->from('penjualan');
          $this->db->join('invoice', 'invoice.noinvoice = penjualan.noinvoice', 'left');
          $this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
          $this->db->join('pelanggan', 'penjualan.idpelanggan = pelanggan.idpelanggan', 'left');
          $this->db->group_by('invoice.noinvoice');
  			$query = $this->db->get();
    		return $query->result(); // Tampilkan semua data transaksi
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