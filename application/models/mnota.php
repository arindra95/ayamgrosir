<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class mnota extends CI_Model
	{
		
		function __construct()
		{
			
		}

		function index()
		{

		}

		public function getnota($id){

      		
      		$this->db->select('penjualan.*, pelanggan.nama,invoice.totalharga, invoice.totalekor, invoice.totalberat, invoice.bayar, invoice.sisa, data_ayam.jenis');
      		$this->db->from('penjualan');
      		$this->db->where('penjualan.noinvoice', $id);
      		$this->db->join('invoice', 'penjualan.noinvoice = invoice.noinvoice', 'left');
      		$this->db->join('data_ayam', 'penjualan.kodeayam = data_ayam.id', 'left');
      		$this->db->join('pelanggan', 'penjualan.idpelanggan = pelanggan.idpelanggan', 'RIGHT');
      		$query = $this->db->get();
			return $query;

      	}


      	public function getnp($id){
      		$this->db->select('data_ayam.id, data_ayam.jenis, data_ayam.id, SUM(IFNULL(pembelian.totalekor,0)) as stok, IFNULL(pembelian.harga,0) as modal, pembelian.*, supplier.nama_supp');
          	$this->db->from('data_ayam');
          	$this->db->where('pembelian.nopembelian', $id);
          	$this->db->join('pembelian', 'data_ayam.id = pembelian.kodeayam ', 'left');
          	$this->db->join('supplier', 'pembelian.idsupplier = supplier.idsupplier ', 'right');
 			$this->db->group_by('pembelian.kodeayam');
			$query = $this->db->get();
 			return $query;
      	}


	}


 ?>