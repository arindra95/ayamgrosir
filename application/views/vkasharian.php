<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/jquery.datetimepicker.min.css">

	<script type="text/javascript" src="<?php echo base_url()?>assets/jquery/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.inputmask.bundle.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/custom-script.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/id.js"></script>
</head>
<body class="skin-default">
	<div id="loading">
		<div class="loader"></div>
	</div>
</body>
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
		<div class="card card-default">
			<div class="card-header">
				<h3 class="card-tittle">Laporan Kas</h3>
				<div class="clearfix"></div>
			</div>
			<div class="card-body">
				<p id="messages" class="alert" style="display: none;"></p>
				<!--<div class="toolbar btn-group">
					<a href="<?php //echo base_url().'laporan'?>" id="btnHarian" class="btn btn-default active">Harian</a>
					<a href="<?php //echo base_url().'laporan/mingguan'?>" id="btnBulanan" class="btn btn-default ">Mingguan</a>
					<a href="<?php //echo base_url().'laporan/bulanan'?>" id="btnBulanan" class="btn btn-default ">Bulanan</a>
					<a href="<?php //echo base_url().'laporan/tahunan'?>" id="btnTahunan" class="btn btn-default ">Tahunan</a>
					<a href="" id="btnTahunan" class="btn btn-default ">Tahunan</a>
					<input type="hidden" id="tipe" value="harian">
				</div>
			-->
				<div class="toolbar" >
					<form class="form-horizontal" id="myForm" method="get">
					<div class="row h-75 justify-content-center">
						<div class="col-sm-5 col-sm-offset-1" >
							<div class="form-group row" id="">
								<label for="nama_supp" class=" col-form-label  text-sm-right	" style="">Filter Berdasarkan</label>
								<div class="col-sm-9">
									 <select class="form-control" name="filter" id="filter">
            							<option value="">Pilih</option>
            							<option value="1">Per Tanggal</option>
            							<option value="2">Per Bulan</option>
            							<option value="3">Per Tahun</option>
        							</select>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" id="form-tanggal" >
								<label for="alamat" class="col-form-label col-sm-2 "></label>
								<div class="col-sm-9">
            						<input type="text" id="tanggal"  name="tanggal" value="" placeholder="Tanggal" class="form-control tanggal">
								</div>
							</div>
							<div class="form-group row" id="form-bulan">
								<label for="alamat" class="col-form-label col-sm-2 "></label>
								<div class="col-sm-9">
            						 <select class="form-control" name="bulan">
                						<option value="">Pilih</option>
                						<option value="1">Januari</option>
                						<option value="2">Februari</option>
                						<option value="3">Maret</option>
                						<option value="4">April</option>
                						<option value="5">Mei</option>
                						<option value="6">Juni</option>
                						<option value="7">Juli</option>
                						<option value="8">Agustus</option>
                						<option value="9">September</option>
                						<option value="10">Oktober</option>
                						<option value="11">November</option>
                						<option value="12">Desember</option>
            						</select>	
								</div>
							</div>
							<div class="form-group row" id="form-tahun">
								<label for="alamat" class="col-form-label col-sm-2 "></label>
								<div class="col-sm-9">
            						<select class="form-control" name="tahun">
                						<option value="">Pilih</option>
                						<?php
                						foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    					echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                							}
                						?>
            						</select>
								</div>
							</div>
						</div>
						<div class="col-sm-12 text-center">
							<a href="<?php echo base_url().'laporan/kasharian'?>" class="btn btn btn-default border border-12">Reset Filter</a>
							<button type="submit" id="btn-loading" class="btn btn btn-main"> <i ></i>Tampil</button>
						</div>
					</div>
				</form><br><br>	
				
				</div>
				<div class="table-responsive">
					<h2 style="text-align: center;">
						<b><?php echo $ket; ?></b><br>
						<small></small>
					</h2>
					<div>
    					<a href="<?php echo $url_cetak; ?>"  class="btn btn-info"><i class='fa fa-print'></i> Download Laporan</a>
    					<a href="<?php echo $url_cetak1; ?>"  class="btn btn-info" style="float: right"><i class='fa fa-print'></i> Cetak Laporan</a><br /><br />
					</div>
					<div>
    					
					</div>
					<table id="dt" class="table table-striped" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="" width="50">No</th>
								<th width="100">No Invoice</th>
								<th width="100">Tanggal Pembayaran</th>
								<th width="100">Nama</th>
								<th width="100">Ekor</th>
								<th width="100">Berat</th>
								<th width="100">Status</th>
								<th width="100">Metode</th>
								<th width="100">Total</th>					
							</tr>
						</thead>
						<tbody >
                 			<?php
   								if( ! empty($kasharian)){
     							 $no = 1;
      							foreach($kasharian as $data){
            					
            
        						echo "<tr>";
        						echo "<td>".$no."</td>";
        						echo "<td>".$data->noinvoice."</td>";
       							echo "<td>".$data->tgl_pembayaran."</td>";
        						echo "<td>".$data->nama."</td>";
        						echo "<td>".$data->totalekor."</td>";
        						echo "<td >".$data->totalberat."</td>";
        						echo "<td >".$data->status."</td>";
        						echo "<td >".$data->metode."</td>";
        						echo "<td class=uang-indo	>".$data->bayar."</td>";
        						echo "</tr>";

        					
        						
        						$no++;
      								}
    							}
    						?>
            			</tbody>
            			<tfoot>
            			
    						
            				<?php
   								if( ! empty($kasharian)){
     						
      							foreach($total as $row){
            					
            
        						echo "<tr>";
        						echo "<td colspan=8 align=right>Total Penerimaan Kas Seluruhnya :</td>";
        						echo "<td class=uang-indo colspan=1 align=right>".$row->total."</td>";
        						echo "</tr>";

        						
        						
      								}
    							}
    						?>
    						

            			</tfoot>
					</table>
					<table  class="table table-striped" >
						<tbody>
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			var btnFilter = $("#btn-filter");
			var dt = $("#dt");

			var tanggal1 = $("#tanggal1");
			var tanggal2 = $("#tanggal2");
			$(document).ready(function(){

			var table = dt.DataTable({
				
			});

			 $('#form-tanggal, #form-bulan, #form-tahun').hide();

			$('#filter').change(function(){ // Ketika user memilih filter
            	if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                	$('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                	$('#form-tanggal').show(); // Tampilkan form tanggal
            	}else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                	$('#form-tanggal').hide(); // Sembunyikan form tanggal
                	$('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            	}else{ // Jika filternya 3 (per tahun)
                	$('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                	$('#form-tahun').show(); // Tampilkan form tahun
            }
            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })



				btnFilter.on('click', function(){
					//var tgl2 = "2019-06-19";
					if(tanggal1.val() == '') tanggal1.focus();
					else if(tanggal2.val() == '') tanggal2.focus();
					else
				{
			var start = tanggal1.val();
			var end = tanggal2.val();
			window.location.href = "<?php echo base_url().'laporan/loads_laporan'?>?tanggal1="+start+"&tanggal2="+end;
					}
				});


			});

		</script>
	</div>

</section>
<footer class="main-footer">
	<p>
		&copy; 2019 Ayam Grosir MB ENDANG. All Right Reserved
	</p>
</footer>
</body>
</html>