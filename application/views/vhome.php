<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/datatables.min.css">
	<link href="<?php echo base_url()?>assets/css/select2.min.css" rel="stylesheet" />


	<script type="text/javascript" src="<?php echo base_url()?>assets/jquery/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/tooltip.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/Chart.bundle.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.inputmask.bundle.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/custom-script.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/id.js"></script>
	<script src="<?php echo base_url()?>assets/js/chart.js@2.8.0"></script>
	<script src="<?php echo base_url()?>assets/js/select2.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/sweetalert2@8.js"></script>


</head>
<body class="skin-default">
	<div id="loading">
		<div class="loader"></div>
	</div>
<header class="main-header">
	<nav class="navbar-light">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-sm " style="background-color: #685AB4" >
					<button type="button" class="navbar-toggler ml-auto hidden-sm-up float-xs-right custom-toggler" data-toggle="collapse" data-target="#myNavbar"  aria-expanded="false" aria-label="Toggle navigation"  > 
						<span class="navbar-toggler-icon"></span>
					</button>

				<div class="collapse navbar-collapse" id= "myNavbar">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item"><a class="nav-link text-white" href="<?php echo base_url()."home" ?>">Home</a></li>
						<li class="nav-item"><a class="nav-link text-white" href="<?php echo base_url()."ayam" ?>">Ayam</a></li>
						<li class="nav-item"><a class="nav-link text-white" href="<?php echo base_url()."pelanggan" ?>">Pelanggan</a></li>
						<li class="nav-item"><a class="nav-link text-white " href="<?php echo base_url()."supp" ?>">Supplier</a></li>
						<li class="nav-item"><a class="nav-link text-white " href="<?php echo base_url()."pengguna" ?>">Pengguna</a></li>
						<li class="nav-item"><a class="nav-link text-white" href="<?php echo base_url()."stok" ?>">Pembelian</a></li>
						<li class="nav-item"><a class="nav-link text-white" href="<?php echo base_url()."penjualan" ?>">Transaksi</a></li>
						<li class="nav-item dropdown"><a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" href="#">Tagihan</a>
      						<div class="dropdown-menu">
       							<a class="dropdown-item" href="<?php echo base_url()."hutang" ?>">Hutang</a>
       							<a class="dropdown-item" href="<?php echo base_url()."piutang" ?>">Piutang</a>
      						</div>
						</li>

						<li class="nav-item dropdown"><a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" href="#">Laporan</a>
							<div class="dropdown-menu">
       							<a class="dropdown-item" href="<?php echo base_url()."laporan/penjualan" ?>">Penjualan</a>
       							<a class="dropdown-item" href="<?php echo base_url()."laporan/pembelian" ?>">Pembelian</a>
       							<a class="dropdown-item" href="<?php echo base_url()."laporan/kasharian" ?>">Kas</a>
      						</div>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="btn-danger"><a class="nav-link text-white" href="<?php echo base_url()."home/logout" ?>"><i class="fa fa-sign-out"></i>Logout</a></li>
					</ul>
					<span class="navbar-text">
      					
   	 				</span>
				</div>
			</nav>
		</div>
	</nav>
</header>
<section class="main-wrapper">
	<div class="container-fluid">
		<div class="page-header my-3">
			<h1 class="text-center d-none d-sm-block">Ayam Grosir MB ENDANG</h1>
			<h2 class="text-center d-block d-sm-none">Ayam Grosir MB ENDANG</h2>
		</div>
		<div style="margin: 2em 0;"></div>
		<div class="row">
			<div class="col-md-3">
				<legend class=" text-danger"> <i class="fa fa-warning"> Stok ayam yang sudah habis</i></legend>
				
				<?php  

				foreach ($stok as $row){
					$var = $row->stokakhir;

					if( $var == 0){

					
					echo "<ol class=' list'>";
					echo "<li>";
					echo "<strong>".$row->jenis."<span class= 'btn btn-xs btn-danger'> Stok: ".$row->stokakhir." Ekor</span></strong>";
					echo"<p class='help-block'>";
					echo"<button class='btn btn-xs btn-primary' data-toggle=tooltip title='Kodeayam'>".$row->id."</button>";
					echo"<button class='btn btn-xs btn-info' data-toggle=tooltip title='Jenis'>".$row->jenis."</button>";
					echo "</p>";
					echo "</li>";
					echo "</ol>";

					}
				}
				?>
			</div>
			<div class="col-md-6">
				<legend class=" text-succes"><i class="fa fa-warning"> Stok ayam yang jumlahnya kurang dari 100</i></legend>
			
				<?php  

				foreach ($stok as $row){
					$var = $row->stokakhir;

					if( $var <= 100){

					
					echo "<ol class='col-md-6 list'>";
					echo "<li>";
					echo "<strong>".$row->jenis."<span class= 'btn btn-xs btn-warning'> Stok: ".$row->stokakhir." Ekor</span></strong>";
					echo"<p class='help-block'>";
					echo"<button class='btn btn-xs btn-primary' data-toggle=tooltip title='Kodeayam'>".$row->id."</button>";
					echo"<button class='btn btn-xs btn-info' data-toggle=tooltip title='Jenis'>".$row->jenis."</button>";
					echo "</p>";
					echo "</li>";
					echo "</ol>";

					}
				}
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ">
				<legend class=" text-info"><i class="fa fa-info"> Grafik penjualan dan pembelian</i></legend>
				<canvas id="data" width="300" height="100"></canvas>
			</div>
		</div><br>
	</div>
</section>
<script type="text/javascript">
	var ctx = document.getElementById('data').getContext('2d');

	Chart.defaults.global.defaultFontSize = 15;
	var datapenjualan = {
		label: 'Data Penjualan',
		data: [<?php foreach ($penjualan as $row){ echo '"'.$row->totalekor.'",';} ?>],
		backgroundColor: 'rgba(0, 99, 132, 0.6)',
		borderWidth: 3,
		lineTension: 0,
		fill: false,
		borderColor: 'red',
		backgroundColor: 'rgba(255,0,0,1)',
		borderDash: [0, 0],
		pointBorderColor: 'red',
		pointBackgroundColor: 'red',
		pointRadius: 5,
		pointHoverRadius: 10,
		pointHitRadius: 30,
		pointBorderWidth: 2,
		pointStyle: 'rectRounded'
	};

	var datapembelian = {
		label: 'Data Pembelian',
		data: [<?php foreach ($pembelian as $row){ echo '"'.$row->totalekor.'",' ;} ?>],
		backgroundColor: 'rgba(0, 99, 132, 0.6)',
		borderWidth: 3,
		lineTension: 0,
		fill: false,
		borderColor: 'green',
		backgroundColor: 'rgba(2,116,13,1)',
		borderDash: [0, 0],
		pointBorderColor: 'green',
		pointBackgroundColor: 'green',
		pointRadius: 5,
		pointHoverRadius: 10,
		pointHitRadius: 30,
		pointBorderWidth: 2,
		pointStyle: 'rectRounded'
	};

	var datasemua = {
		labels: [<?php foreach ($pembelian as $row){ $tgl = $row->tanggal; 
			if($tgl==1){
				$tgl = "Januari";
			}else if($tgl==2){
				$tgl = "Februari";
			} else if($tgl==2){
				$tgl = "Maret";
			}else if($tgl==3){
				$tgl = "April";
			}else if($tgl==4){
				$tgl = "Mei";
			}else if($tgl==5){
				$tgl = "Juni";
			}else if($tgl==6){
				$tgl = "Juli";
			}else if($tgl==7){
				$tgl = "Agustus";
			}else if($tgl==8){
				$tgl = "September";
			}else if($tgl==10){
				$tgl = "Oktober";
			}else if($tgl==11){
				$tgl = "November";
			}else if($tgl==12){
				$tgl = "Desember";
			} echo '"'.$tgl.'",';
		} ?>],
		datasets: [datapenjualan,datapembelian]
	};

	var chartOptions = {
		scales: {
		yAxes: [{
		display: true,
		scaleLabel: {
		display: true,
		labelString: 'Ekor'
		}
	}],
		xAxes: [{
		display: true,
		scaleLabel: {
		display: true,
		labelString: 'Bulan'
		}
	}]
	},
		legend: {
		display: true,
		position: 'bottom',
		labels: {
		boxWidth: 80,
		fontColor: 'black'
		}
	}};

	var data = new Chart(ctx,{
		type: 'line',
		data: datasemua,
		option: chartOptions

	});


</script>
<footer class="main-footer">
	<p>
		&copy; 2019 Ayam Grosir MB ENDANG. All Right Reserved
	</p>
</footer>
</body>
</html>