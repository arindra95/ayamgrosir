<!DOCTYPE html>
<html>
<head>
	<title>Hitung</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/datatables.min.css">



	<script type="text/javascript" src="<?php echo base_url()?>assets/jquery/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.inputmask.bundle.min.js"></script>
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
<section>
	<div>
		<div class="card card-default " id="form-edit">
			<div class="card-header">
				<h3 id="tittle" class="card-tittle pull-left">Hitung Berat</h3>
					<button class="btn btn-danger btn-xs pull-right" id="btn-close"><i class="fa fa-remove"></i></button>
				<div class="clearfix"></div>
			</div>
			<div class="card-body">
				<form class="form-horizontal " id="myForm">
					<div class="row">
						<div class="col-md-4 col-md-offset-1 text-right" >
							<!--
							<div class="form-group">
								<label for="idsupplier" class="control-label col-sm-3">Id Supplier</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="idsupplier" id="idsupplier" value="" required>
									<small class="help-block"></small>
								</div>
							</div>
							-->
							<div class="form-group row">
								<label for="nama_supp" for="nama_supp"  class="col-form-label col-sm-3" style="">Berat </label>
								<div class="col-sm-6">
									<input type="text" id="b1" name="berat" class="berat form-control text-right" required>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b2" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b3" name="berat" class="berat form-control text-right" required>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b4" name="berat" class="berat form-control text-right" required>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b5" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b6" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b7" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b8" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b9" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b10" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							
						</div>
						<div class="col-md-4 col-md-offset-1 text-right" >
							<!--
							<div class="form-group">
								<label for="idsupplier" class="control-label col-sm-3">Id Supplier</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="idsupplier" id="idsupplier" value="" required>
									<small class="help-block"></small>
								</div>
							</div>
							-->
							<div class="form-group row">
								<label for="nama_supp" for="nama_supp"  class="col-form-label col-sm-3" style="">Berat </label>
								<div class="col-sm-6">
									<input type="text" id="b11" name="berat" class="berat form-control text-right" required>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b12" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b13" name="berat" class="berat form-control text-right" required>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b14" name="berat" class="berat form-control text-right" required>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b15" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b16" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b17" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b18" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b19" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b20" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							
						</div>
						<div class="col-md-4 col-md-offset-1 text-right" >
							<!--
							<div class="form-group">
								<label for="idsupplier" class="control-label col-sm-3">Id Supplier</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="idsupplier" id="idsupplier" value="" required>
									<small class="help-block"></small>
								</div>
							</div>
							-->
							<div class="form-group row">
								<label for="nama_supp" for="nama_supp"  class="col-form-label col-sm-3" style="">Berat </label>
								<div class="col-sm-6">
									<input type="text" id="b21" name="berat" class="berat form-control text-right" required>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b22" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b23" name="berat" class="berat form-control text-right" required>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b24" name="berat" class="berat form-control text-right" required>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b25" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b26" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b27" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b28" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b9" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Berat</label>
								<div class="col-sm-6">
									<input type="text" id="b10" name="berat" class="berat form-control text-right">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="alamat" class="col-form-label col-sm-3">Total (kg)</label>
								<div class="col-sm-6">
									<span id="sum" class="form-control">0</span>
									<small class="help-block"></small>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-center">
							<button type="reset" class="btn btn btn-default border border-12">Reset Form</button>
							<button type="submit" id="btn-loading" class="btn btn btn-main"> <i ></i>Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	
	$(document).ready(function(){

		//iterate through each textboxes and add keyup
		//handler to trigger sum event
		$(".berat").each(function() {

			$(this).keyup(function(){
				calculateSum();
			});
		});

	});

	function calculateSum() {

		var sum = 0;
		//iterate through each textboxes and add the values
		$(".berat").each(function() {

			//add only if the value is number
			if(!isNaN(this.value) && this.value.length!=0) {
				sum += parseFloat(this.value);
			}

		});
		//.toFixed() method will roundoff the final sum to 2 decimal places
		$("#sum").html(sum);
	}

</script>
</html>