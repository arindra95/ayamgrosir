<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class lappembelian extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model('mlappembelian');
		}

		public function index(){
			//$data['semua'] = $this->mlaporan->lapsemua();
			//$data['total'] = $this->mlaporan->totpenjualan();
			//$this->load->view('vlaporan', $data);
		
		}

		public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Laporan Pembelian pada Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->mlappembelian->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Laporan Pembelian pada Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->mlappembelian->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Laporan Pembelian pada Tahun '.$tahun;
                $transaksi = $this->mlappembelian->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->mlappembelian->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;
        
    ob_start();
    $this->load->view('print', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
        require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data Laporan Pembelian.pdf', 'D');
  }
		public function loads_laporan(){
			$tanggal1 = $this->input->post('tanggal1');
			$tanggal2 = $this->input->post('tanggal2');
			$data = $this->mlaporan->lapertanggal($tanggal1,$tanggal2);


			header('Content-Type: application/json');
			echo json_encode(array('data'=> $data, 'status'=>true ));
		}

		public function mingguan(){
			$data['minggu'] = $this->mlaporan->lapmingguan();
			$data['totminggu'] = $this->mlaporan->totpenjmingguan();
			$this->load->view('vlapmingguan', $data);
		}

		public function bulanan(){
			$data['bulan']= $this->mlaporan->lapbulanan();
			$data['totbulan'] = $this->mlaporan->totpenjbulanan();
			$this->load->view('vlapbulanan', $data);
		}

		public function tahunan(){
			$data['tahun']= $this->mlaporan->laptahunan();
			$data['tottahunan'] = $this->mlaporan->totpenjbulanan();
			$this->load->view('vlaptahunan', $data);
		}

	}


 ?>