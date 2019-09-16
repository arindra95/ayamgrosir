<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class laporan extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model('mlaporan');
			$this->load->model('mlappembelian');
			$this->load->model('mlapkasharian');
            $this->load->helper('tgl_indo');
		}

		public function penjualan(){
			 if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Laporan Penjualan pada Tanggal '.date_indo(date('y-m-d', strtotime($tgl)));
                $url_cetak = 'laporan/cetakp?filter=1&tanggal='.$tgl;
                $url_cetak1 = 'laporan/cetakpenjualan?filter=1&tanggal='.$tgl;
                //$trans = $this->mlaporan->view_by_date($tgl)->row();
                
                $transaksi = $this->mlaporan->view_by_date($tgl)->result();
                $transaksi1 = $this->mlaporan->view_by_date($tgl)->row(); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Laporan Penjualan pada Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'laporan/cetakp?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $url_cetak1 = 'laporan/cetakpenjualan?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi1 = $this->mlaporan->view_by_month($bulan, $tahun)->row();
                $transaksi = $this->mlaporan->view_by_month($bulan, $tahun)->result(); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Laporan Penjualan pada Tahun '.$tahun;
                $url_cetak = 'laporan/cetakp?filter=3&tahun='.$tahun;
                $url_cetak1 = 'laporan/cetakpenjualan?filter=3&tahun='.$tahun;
                $transaksi = $this->mlaporan->view_by_year($tahun)->result(); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'laporan/cetakp';
            $url_cetak1 = 'laporan/cetakpenjualan';
            $transaksi1 = $this->mlaporan->view_all()->row();
            $transaksi = $this->mlaporan->view_all()->result(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('index.php/'.$url_cetak);
    $data['url_cetak1'] = base_url('index.php/'.$url_cetak1);
    //$data['trans'] = $trans;
    $data['transaksi'] = $transaksi;
    $data['transaksi1'] = $transaksi1;
    $data['total'] = $this->mlaporan->totpenjualan();
    $data['option_tahun'] = $this->mlaporan->option_tahun();
    $this->load->view('vlaporan', $data);
		}

			public function cetakpenjualan(){
				 if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Laporan Penjualan pada Tanggal '.date_indo(date('y-m-d', strtotime($tgl)));
                $transaksi = $this->mlaporan->view_by_date($tgl)->result(); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Laporan Penjualan pada Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->mlaporan->view_by_month($bulan, $tahun)->result(); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Laporan Penjualan pada Tahun '.$tahun;
                $transaksi = $this->mlaporan->view_by_year($tahun)->result(); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->mlaporan->view_all()->result(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
        $data['ket'] = $ket;
        $data['tgl']= date("Y-m-d");
        $data['transaksi'] = $transaksi;
        $data['total'] = $this->mlaporan->totpenjualan();
        $this->load->view('vcetaklaporan', $data);
			}

		     public function cetakp(){
            if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Laporan Penjualan pada Tanggal '.date_indo(date('y-m-d', strtotime($tgl)));
                $transaksi = $this->mlaporan->view_by_date($tgl)->result(); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Laporan Penjualan pada Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->mlaporan->view_by_month($bulan, $tahun)->result(); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Laporan Penjualan pada Tahun '.$tahun;
                $transaksi = $this->mlaporan->view_by_year($tahun)->result(); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->mlaporan->view_all()->result(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;
        $data['total'] = $this->mlaporan->totpenjualan();
    ob_start();
    $this->load->view('print2', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
        require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data Laporan Penjualan.pdf', 'D');
        }



        public function pembelian(){
				 if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Laporan Pembelian pada Tanggal '.date_indo(date('y-m-d', strtotime($tgl)));
                $url_cetak = 'laporan/cetakb?filter=1&tanggal='.$tgl;
                $url_cetak1 = 'laporan/cetakpembelian?filter=1&tanggal='.$tgl;
                $transaksi = $this->mlappembelian->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Laporan Pembelian pada Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'laporan/cetakb?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $url_cetak1 = 'laporan/cetakpembelian?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->mlappembelian->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Laporan Pembelian pada Tahun '.$tahun;
                $url_cetak = 'laporan/cetakb?filter=3&tahun='.$tahun;
                $url_cetak1 = 'laporan/cetakpembelian?filter=3&tahun='.$tahun;
                $transaksi = $this->mlappembelian->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'laporan/cetakb';
            $url_cetak1 = 'laporan/cetakpembelian';
            $transaksi = $this->mlappembelian->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('index.php/'.$url_cetak);
    $data['url_cetak1'] = base_url('index.php/'.$url_cetak1);
    $data['pembelian'] = $transaksi;

    $data['total'] = $this->mlappembelian->totpembelian();
    $data['option_tahun'] = $this->mlappembelian->option_tahun();
    $this->load->view('vlappembelian', $data);
		}

		public function cetakpembelian(){
			if(isset($_GET['filter']) && ! empty($_GET['filter'])){
			 $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Laporan Pembelian pada Tanggal '.date_indo(date('y-m-d', strtotime($tgl)));
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
        $data['tgl']= date("Y-m-d");
        $data['pembelian'] = $transaksi;
        $data['total'] = $this->mlappembelian->totpembelian();
        $this->load->view('vcetaklaporan', $data);
			}

		 public function cetakb(){
            if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Laporan Pembelian pada Tanggal '.date_indo(date('y-m-d', strtotime($tgl)));
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
        $data['pembelian'] = $transaksi;
        $data['total'] = $this->mlappembelian->totpembelian();

        
    ob_start();
    $this->load->view('print2', $data);
    $html1 = ob_get_contents();
        ob_end_clean();
        
        require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html1);
    $pdf->Output('Data Laporan Pembelian.pdf', 'D');
        }

        public function kasharian(){
			 if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Laporan Kas pada Tanggal '.date_indo(date('y-m-d', strtotime($tgl)));
                $url_cetak = 'laporan/cetakkas?filter=1&tanggal='.$tgl;
                $url_cetak1 = 'laporan/cetakkasharian?filter=1&tanggal='.$tgl;
                $transaksi = $this->mlapkasharian->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Laporan Kas pada Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'laporan/cetakkas?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $url_cetak1 = 'laporan/cetakkasharian?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->mlapkasharian->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Laporan Kas pada Tahun '.$tahun;
                $url_cetak = 'laporan/cetakkas?filter=3&tahun='.$tahun;
                $url_cetak1 = 'laporan/cetakkasharian?filter=3&tahun='.$tahun;
                $transaksi = $this->mlapkasharian->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Tagihan';
            $url_cetak = 'laporan/cetakkas';
            $url_cetak1 = 'laporan/cetakkasharian';
            $transaksi = $this->mlapkasharian->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('index.php/'.$url_cetak);
    $data['url_cetak1'] = base_url('index.php/'.$url_cetak1);
    $data['kasharian'] = $transaksi;
    $data['total'] = $this->mlapkasharian->totkasharian();
    $data['option_tahun'] = $this->mlapkasharian->option_tahun();
    $this->load->view('vkasharian', $data);
		}

			public function cetakkasharian(){
				 if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Laporan Kas pada Tanggal '.date_indo(date('y-m-d', strtotime($tgl)));
                $transaksi = $this->mlapkasharian->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Laporan Kas pada Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->mlapkasharian->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Laporan Kas pada Tahun '.$tahun;
                
                $transaksi = $this->mlapkasharian->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Tagihan';
            $transaksi = $this->mlapkasharian->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
        $data['ket'] = $ket;
        $data['tgl']= date("Y-m-d");
        $data['kasharian'] = $transaksi;
        $data['total'] = $total = $this->mlapkasharian->totkasharian();
        $this->load->view('vcetaklaporan', $data);
			}

		     public function cetakkas(){
            if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Laporan Kas pada Tanggal '.date_indo(date('y-m-d', strtotime($tgl)));
                $transaksi = $this->mlapkasharian->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Laporan Kas pada Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->mlapkasharian->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Laporan Kas pada Tahun '.$tahun;
                $transaksi = $this->mlapkasharian->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Tagihan';
            $transaksi = $this->mlapkasharian->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
        $data['ket'] = $ket;
        $data['kasharian'] = $transaksi;
        $data['total'] = $this->mlapkasharian->totkasharian();
    ob_start();
    $this->load->view('print2', $data);
    $html2 = ob_get_contents();
        ob_end_clean();
        
        require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html2);
    $pdf->Output('Data Laporan Kas.pdf', 'D');
        }


	}


 ?>