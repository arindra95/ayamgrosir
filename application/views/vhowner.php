<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">

	<script type="text/javascript" src="<?php echo base_url()?>assets/jquery/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>


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
						<li class="nav-item"><a class="nav-link text-white" href="">Tagihan</a></li>
						<li class="nav-item"><a class="nav-link text-white" href="">Laporan</a></li>
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
				<legend class="text-succes"><i class="fa fa-warning">Transaksi terakhir</i></legend>
				<ol class="list"></ol>
			</div>
			<div class="col-md-3">
				<legend class="text-succes"><i class="fa fa-warning">Pembelian Terakhir</i></legend>
			</div>
		</div>
	</div>
</section>
</body>
</html>