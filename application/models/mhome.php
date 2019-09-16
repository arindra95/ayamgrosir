<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class mhome extends CI_Model
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
                ->select('data_ayam.id, data_ayam.jenis, IFNULL((SUM(pembelian.totalekor)- IFNULL(stokterjual,0)),0) as  stokakhir, IFNULL(stokterjual,0) as stokterjual')
                ->from('data_ayam')
                ->join('pembelian', 'data_ayam.id = pembelian.kodeayam ', 'left')
                ->join('('.$subquery.') as penjualan', 'penjualan.kodeayam = data_ayam.id   ', 'left')
          ->group_by('data_ayam.id')
          ->get();
      
 			    return $query;
    }

    public function penjualan(){
        $this->db->select(' invoice.noinvoice,SUM(IF(MONTH(invoice.tanggal),invoice.totalekor,0)) as totalekor,SUM(IF(MONTH(invoice.tanggal),invoice.totalberat,0)) as totalberat,MONTH(invoice.tanggal) as tanggal, SUM(IF(MONTH(invoice.tanggal),invoice.totalharga,0)) as totalharga,invoice.status');
          $this->db->from('penjualan');
          $this->db->join('invoice', 'invoice.noinvoice = penjualan.noinvoice', 'left');
          $this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
            $this->db->join('pelanggan', 'penjualan.idpelanggan = pelanggan.idpelanggan', 'left');
          $this->db->group_by('YEAR(invoice.tanggal)');
          $this->db->group_by('MONTH(invoice.tanggal)');
          $query = $this->db->get();
        return $query; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
      }

      public function pembelian(){
          $this->db->select('nopembelian, MONTH(tanggal) as tanggal, SUM(IF(MONTH(tanggal),totalekor,0)) as totalekor, SUM(IF(MONTH(tanggal),totalberat,0)) as totalberat, SUM(IF(MONTH(tanggal),harga,0)) as harga');
          $this->db->from('pembelian'); // Tambahkan where tahun
          $this->db->group_by('YEAR(tanggal)');
          $this->db->group_by('MONTH(tanggal)');
          $query=$this->db->get();
        return $query;  // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
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