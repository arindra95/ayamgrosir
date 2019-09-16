<!DOCTYPE html>
<html>
<head>
	<title>Penjualan</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/datatables.min.css">
	<link href="<?php echo base_url()?>assets/css/select2.min.css" rel="stylesheet"/>


	<script type="text/javascript" src="<?php echo base_url()?>assets/jquery/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/tooltip.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.inputmask.bundle.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/custom-script.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/id.js"></script>
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
						<li class="nav-item"><a class="nav-link text-white" href="<?php echo base_url()."kasir/penjualan" ?>">Transaksi</a></li>
						<li class="nav-item"><a class="nav-link text-white" href="<?php echo base_url()."kasir/pelanggan" ?>">Pelanggan</a></li>
						<li class="nav-item"><a class="nav-link text-white" href="<?php echo base_url()."kasir/pembelian" ?>">Pembelian</a></li>
						<li class="nav-item"><a class="nav-link text-white" href="<?php echo base_url()."kasir/supplier" ?>">Supplier</a></li>
						<li class="nav-item dropdown"><a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" href="#">Tagihan</a>
      						<div class="dropdown-menu">
       							<a class="dropdown-item" href="<?php echo base_url()."kasir/hutang" ?>">Hutang</a>
       							<a class="dropdown-item" href="<?php echo base_url()."kasir/piutang" ?>">Piutang</a>
      						</div>
						</li>


						<li class="nav-item dropdown"><a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" href="#">Laporan</a>
							<div class="dropdown-menu">
       							<a class="dropdown-item" href="<?php echo base_url()."klaporan/penjualan" ?>">Penjualan</a>
       							<a class="dropdown-item" href="<?php echo base_url()."klaporan/pembelian" ?>">Pembelian</a>
       							<a class="dropdown-item" href="<?php echo base_url()."klaporan/kasharian" ?>">Kas</a>
      						</div>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="btn-danger"><a class="nav-link text-white" href="<?php echo base_url()."kasir/logout" ?>"><i class="fa fa-sign-out"></i>Logout</a></li>
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
				<h3 class="card-tittle pull-left">Transaksi Penjualan</h3>
				<div class="clearfix"></div>
			</div>
			<div class="card-body" id=kasir>
				<form class="form-horizontal" action="#">
					<div class="row"> 
						<div class="col-md-12">
							<div class="row">
								<div class="col-sm-6">
									<?php
									echo"<strong>" .$role."</strong>";
									?>
								</div>
								<div class="col-sm-6 tex-warning text-right">
									<strong id="tgl-sekarang"></strong>
								</div>
							</div>	
						</div>	
						<div class="col-md-6 text-sm-right text-left">
							<div class="box1">
								<div class="form-group row 	">
									<label for="no_nota" class="control-label col-sm-3">No nota</label>
									<div class="col-sm-6">
										<input type="text" id="no_nota" value="<?php echo $inv;?>" class="form-control" disabled="">
										<input type="hidden" id="idpegawai" value="<?php echo $id;?>" class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<label for="pelanggan" class="control-label col-sm-3">Pelanggan</label>
									<div class="col-sm-6">
										<select   id="idpelanggan"  class="form-control">
											<?php foreach ($plgn as $row){
										echo "<option value=".$row->idpelanggan.">".$row->nama."</option>";}
										?>
										</select>
									</div>
								</div>
								<div class="form-group row">
										<label for="" class="control-label col-sm-3">Tanggal Transaksi</label>
									<div class="col-sm-6">
										<input type="text" id="tgl_transaksi" value="<?php echo $tgl;?>" class="form-control" disabled>
									</div>
								</div>
							</div>
						</div>
					<div class="col-md-6">
						<div class="box-tagihan text-center"> 
							<h1>TOTAL BAYAR = Rp. <span id="txtTotalBayar">0</span></h1>
						</div>
					</div>
					<div class="col-md-12">
						<div class="">
							<div class="row">
								<div class="col-sm-2">
									<label>Kode Ayam</label>
									<select type="text" id="kode" value="" class="form-control" onchange="getData(this.value);" required="" autofocus="">
									<option value="">Pilih </option>
										<?php foreach ($ayam as $row){
										echo "<option value=".$row->id.">".$row->id."</option>";}
										?>
									</select>
									<input type="hidden" id="notransaksi" class="form-control" required="" autofocus="">
								</div>
								<div class="col-sm-2">
									<label class="control-label">Jenis</label>
									<input type="text" name="jenisayam" id="jenisayam"class="form-control" disabled="">
								</div>
								<div class="col-sm-1">
									<label class="control-label">Stok</label>
									<input type="text" id="stokayam" value="" class="form-control angka" disabled="">
									<input type="hidden" id="stok_terjual" value="" class="form-control angka" disabled="">
								</div>
								<div class="col-sm-1">
									<label class="control-label">Ekor</label>
									<input type="text" id="ekor" value="0" class="form-control angka" disabled="">
								</div>
								<div class="col-sm-1">
									<label class="control-label">Berat</label>
									<input type="" id="beratayam" value="0" class="form-control angka" disabled="">
								</div>
								<div class="col-sm-2">
									<label class="control-label">Harga</label>
									<input type="text" id="hargaayam" value="0" class="form-control uang-indo" disabled="">
								</div>
								<div class="col-sm-1">
									<label class="control-label">Potongan</label>
									<input type="text" id="potongan" value="0" class="form-control angka" disabled="">
								</div>
								<div class="col-sm-2">
									<label class="control-label">Jumlah</label>
									<input type="text" id="totalharga" class="form-control uang-indo" value="0" disabled="">
								</div>
								<div class="col-md-12">
									<div class="pull-left" style="margin: 10px 0">
										<button type="button" id="btn-search" class="btn btn-sm btn-warning d-none"><i class="fa fa-search"></i></button>
									</div>
									<div class="pull-right" style="margin: 10px 0">
										<button type="button" id="btn-add" class="btn btn-sm btn-main " disabled="" ><i class="fa fa-check"></i>Simpan Item</button>
									</div>
									<div class="clearfix"></div>
								</div>
							</div> 
						</div>
					</div>
					<div class="col-sm-12">
						<div class="box1" style="background: lightyellow">
							<table class="table">
								<thead>
									<tr>
										<th width="50" class="">No</th>
										<th width="100" class="">Kode ayam</th>
										<th width="100" class="">Jenis ayam</th>
										<th width="50" class="text-right">Ekor </th>
										<th width="150" class="text-center">Berat (Kg)</th>
										<th width="100" class="text-right">Harga (per Kg)</th>
										<th width="100" class="text-right">Potongan</th>
										<th width="100" class="text-right">Total (Rp)</th>
										<th width="100" class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody id="list-item">
									<tr>
										<td colspan="8">
											belum ada item yang dibeli
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-8 col-md-offset-8">
						<div class="">				
						</div>
					</div>
					<div class="col-md-4">
						<div class="">
							<table class="table table-sm">
								<tbody>
									<tr>
										<td width="">Bayar</td>
										<td width="20">:</td>
										<td colspan="">
											<select class="form-control" id="jenis">
												<option class="col-sm-1" value="">Pilih</option>
												<option class="col-sm-1" value="Cash">Cash</option>
												<option class="col-sm-1" value="DP">Down Payment</option>
											</select>
										</td>
									</tr>
									<tr>
										<td width="200">Tanggal Pembayaran </td>
										<td width="10">:</td>
										<td colspan="">
											<input type="text" id="tglbayar" value="0" class="form-control" disabled="">
										</td>
									</tr>
									<tr>
										<td width="200">Total Ekor</td>
										<td width="10">:</td>
										<td colspan="">
											<input type="text" id="totekor" value="0" class="form-control angka" disabled="">
										</td>
									</tr>
									<tr>
										<td width="200">Total Berat (Kg)</td>
										<td width="10">:</td>
										<td colspan="">
											<input type="text" id="totalberat" value="0" class="form-control uang-indo" disabled="">
										</td>
									</tr>
									<tr>
										<td width="200">Total Harga (Rp)</td>
										<td width="10">:</td>
										<td colspan="">
											<input type="text" id="totharga" value="0" class="form-control uang-indo" disabled="">
										</td>
									</tr>
									<tr>
										<td width="">Jumlah Bayar (Rp)</td>
										<td width="">:</td>
										<td colspan="">
											<input type="text" id="jml_bayar" value="0" class="form-control uang-indo"data-toggle="tooltip" data-placement="top" title="Tekan <Enter> untuk menyimpan Transaksi">
											<input type="hidden" id="blm_bayar" value="0" class="form-control uang-indo">
											<input type="hidden" id="status" value="0" class="form-control uang-indo">
										</td>
									</tr>
									<tr>
										<td >Jumlah kembalian (Rp)</td>
										<td width="">:</td>
										<td colspan="">
											<input type="text" id="jml_kembalian" value="0" class="form-control uang-indo" disabled="">
										</td>
									</tr>
								</tbody>
							</table>
							<div class="text-right">
								<button type="button" id="btn-batal" class="btn btn-danger"><i class="fa fa-remove"></i>Batalkan</button>
								<button type="button" id="btn-simpan-transaksi" class="btn btn-main"><i class="fa fa-save"></i>Simpan Transaksi</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				var url;
				var data;
				var loader = $("#loading");
				var msg = $("#messages");

				var nota = $("#no_nota");
				var idpgw = $("#idpegawai");
				var idp = $("#idpelanggan");
				var tgl = $("#tgl_transaksi");
				var idp = $("#idpelanggan");

				var kd = $("#kode");
				var nama = $("#jenisayam");
				var stokakhir = $("#stokayam");
				var stokterjual = $("#stok_terjual");
				var qty = $("#ekor");
				var berat = $("#beratayam");
				var harga = $("#hargaayam");
				var ptg= $("#potongan");
				var total = $("#totalharga");
				var jml = $("#jml_bayar");

				

				qty.inputmask({
					alias: 'numeric',
					groupSeparator: ',',
					autoGroup: false,
					digits: 0,
					digitsOptional: false,
					oncomplete: function(event){
						var qty1 = $(this).val();

						if(parseInt(qty1) < 1) {
							alert('Jumlah QTY harus lebih dari 0!');
							$("#btn-add").attr('disabled','');
						}
						else if(parseInt(qty1) > parseInt(stokakhir.val())) {
							alert('Jumlah QTY melebihin Stok barang!');
							qty.val(stokakhir.val());
							$("#btn-add").attr('disabled','');
						}else{
							$("#btn-add").removeAttr('disabled','');
						}

						event.preventDefault();
					}
				});

				 $('#idpelanggan').select2();

				ptg.inputmask({
					alias: 'numeric',
					groupSeparator: ',',
					autoGroup: false,
					digits: 0,
					digitsOptional: false,
					oncomplete: function(event){
						var pot = $(this).val();
						var tot = (berat.val() * harga.val());
						total.val(tot - pot);

						event.preventDefault();
					}
				});

				qty.keyup(function(e){
					if(e.keyCode == 13)
						{
							$(this).trigger('enterkey');
						}
					});

				ptg.keyup(function(e){
					if(e.keyCode == 13)
						{
							$(this).trigger('enterkey');
						}
					});

				$("#jml_bayar").bind('enterkey', function(){
					if(parseInt($('#totharga').val().replace(/,/gi,'')) == 0){
						alert("Belum ada transaksi yang bisa disimpan!");
					}
					else if (document.getElementById('jenis').value == "Cash") {
			
						if ($('#jml_bayar').val() != $('#totharga').val()) {
							alert("nominal yang dimasukan kurang karena pembayaran cash");	
							//return false;
							//return cek();
						
						}else{
							saveTransaksi();
						}
					}else if(document.getElementById('jenis').value == "DP"){
						saveTransaksi();

					}
				});

				$('#jenis').change(function(){
					if($(this).val() == 'Cash'){
  						$('#tglbayar').val('<?php echo $tgl;?>');
  					} else if($(this).val() == 'DP'){
  						$('#tglbayar').val(0);
 				 	}
				});

				$("#jml_bayar").keyup(function(e){
					if(e.keyCode == 13)
						{
							$(this).trigger('enterkey');
						}
					});

				$("#jml_bayar").inputmask({
					oncomplete: function(event){

						var total = parseInt($("#totharga").val().replace(/,/gi, ''));
						var bayar = parseInt(this.value.replace(/,/gi, ''));
						var kembalian = 0;

						kembalian = bayar - total;
						if(bayar > total) $("#jml_kembalian").val(kembalian);

							event.preventDefault();
						}
					});
				nota.on('keyup', function(){
					getItem(this.value);
				});

				$("#btn-add").on('click', function(event){
					saveData();

					event.preventDefault();
				});

				$("#btn-simpan").on('click', function(event){
					saveTransaksi();

					event.preventDefault();
				});

				$("#btn-simpan-transaksi").on('click', function(event){

					if(parseInt($('#totharga').val().replace(/,/gi,'')) == 0){
						alert("Belum ada transaksi yang bisa disimpan!");
					}
					else if (document.getElementById('jenis').value == "Cash") {
			
						if ($('#jml_bayar').val() != $('#totharga').val()) {
							alert("nominal yang dimasukan kurang karena pembayaran cash");	
							//return false;
							//return cek();
						
						}else{
							saveTransaksi();
						}
					}else if(document.getElementById('jenis').value == "DP"){
						saveTransaksi();

					}
					
					
					event.preventDefault();
				});

				$('#btn-hapus').click(function(e){
					var no = $('#nt').val();
					$.ajax({
						url: "<?php echo base_url().'penjualan/hapus'?>",
						type: 'POST',
						data: {no:no},
						success:function(data){

							getItem();
						}
					});
					return false;
				});

			});

			var resetData = function(){
					$("#kode").val('');
					$("#jenisayam").val('');
				 	$("#stokayam").val('');
				 	$("#stok_terjual").val('');
				 	$("#ekor").val('').attr('disabled','');
					$("#beratayam").val(0).attr('disabled','');
					$("#hargaayam").val(0).attr('disabled','');
					$("#potongan").val(0).attr('disabled','');
					$("#totalharga").val(0);
				}

			var hapus = function(no){

			}

			var getData = function(id){
					url = "<?php echo base_url().'penjualan/loads_ayam'?>"
					$.ajax({
						url: url,
						type: 'POST',
						data: {id:id},
						success: function(res){
							var res = eval(res);
							data = res.data;
							if(data != null){
								data.forEach(function(row){
								$("#jenisayam").val(row.jenis);
								$("#stokayam").val(row.stokakhir);
								$("#stok_terjual").val(row.stokterjual);

								$("#ekor").val(1);

									if(row.stokakhir>0){
										$("#totalharga").val($("#hargaayam").val()-$("#potongan").val());
										$("#ekor").removeAttr('disabled','').focus();
										$("#beratayam").removeAttr('disabled','');
										$("#hargaayam").removeAttr('disabled', '');
										$("#potongan").removeAttr('disabled','');
										$("#btn-add").removeAttr('disabled','');
									}else{
										alert("Maaf stok belum diupdate atau telah habis!");
									}
								});
							}else{
								alert("Barang dengan kode "+id+" tidak ditemukan!");
								resetData();
							}
						},
						error: function(){
							alert("Terjadi kesalahan dalam mengambil data diserver");
						}
					});
			} 

			var getItem = function(nota){
				url = '<?php echo base_url().'penjualan/loads_list'?>';
				$.ajax({			
					url: url,
					type: 'POST',
					data: {nota:nota},
					beforeSend:function(){

					},
					success:function(res){
						var res = eval(res);
						if(res.status && res.data != null)
						{
							var no = 1;
							var items = '';
							var tot = [];
							var brt = []; 
							var ekr = []; 

							res.data.forEach(function(row){
								items += "<tr>"+
								"<td>"+(no)+"</td>"+
								"<td>"+row.kodeayam+"<input type='hidden' name= 'arr_notransaksi[]' id='nt' value='"+row.notransaksi+"'></td>"+
								"<td>"+row.jenis+"<input type='hidden' name= '' id='inv' value='"+row.noinvoice+"'></td></td>"+
								"<td align=center>"+row.ekor+"</td>"+
								"<td align=center>"+row.berat+"</td>"+
								"<td align=right>"+numberFormat(row.hargakiloan)+"</td>"+
								"<td align=right>"+numberFormat(row.potongan)+"</td>"+
								"<td align=right>"+numberFormat(row.total)+"</td>"+
								'<td align=center>'+
								'<a href="javascript:void(0)" id="btn-hapus" class="btn btn-sm btn-danger" onclick="deleteItem('+"'"+row.noinvoice+"'"+')"><i class="fa fa-remove"></i></a>'+	
								'</td>'+
								"</tr>";

								tot.push(parseInt(row.total));
								brt.push(parseInt(row.berat));
								ekr.push(parseInt(row.ekor));
								no++;
							});
							tot = tot.reduce(getSum);
							brt = brt.reduce(getTmbh);
							ekr = ekr.reduce(getSum);
							$('#totharga').val(tot);
							$('#txtTotalBayar').text(numberFormat(tot));
							$('#totalberat').val(brt);
							$('#totekor').val(ekr);

							$('#kode').focus();
							$("#list-item").html(items);
						}else{
							$("#list-item").html("<tr><td colspan='8'>Tidak ada transaksi untuk Nota "+$no_nota.val()+"</td></tr>");
						}
					},
					error:function(){
						alert("Terjadi kesalahan dalam mengambil data diserver");
					},
					complete:function(){
						resetData();

					}
				});
			}

			var saveData = function(){
				url = "<?php echo base_url().'penjualan/simpan_data'?>";

				var dataString = {

					noinvoice: $('#no_nota').val(),
					notransaksi: $('#notransaksi').val(),
					iduser: $('#idpegawai').val(),
					idpelanggan: $('#idpelanggan').val(),
					kodeayam: $('#kode').val(),
					nm_pelanggan: $('#nama').val(),
					tanggal: $('#tgl_transaksi').val(),
					ekor: $('#ekor').val(),
					berat: $('#beratayam').val(),
					hargakiloan: $('#hargaayam').val(),
					potongan: $('#potongan').val(),
					total: $('#totalharga').val(),


				};

				if(parseInt($('#ekor').val()) < 1){
					alert("anda belum memasukan jumlah ekor");
					$('#ekor').val().focus();
				}else{
					$.ajax({
						url: url,
						type: 'POST',
						data: dataString,
						success:function(res){
							var res= eval(res);
							if(res.status){
								getItem($('#no_nota').val());
							}else{
								alert(res.message);

							}
							$('#jml_bayar').focus();
							$('#btn-add').attr('disabled','');
						},
						error:function(){
							alert("Terjadi kesalahan dalam mengambil data diserver");
						}
					});
				}

			}

		var saveTransaksi = function(){
				url = "<?php echo base_url().'penjualan/simpan_transaksi'?>";
				
							
				var dataString = {
					noinvoice: $('#no_nota').val(),
					tanggal: $('#tgl_transaksi').val(),
					tgl_pembayaran: $('#tglbayar').val(),
					totalekor: $('#totekor').val(),
					totalberat: $('#totalberat').val(),
					totalharga: $('#totharga').val(),
					metode: $('#jenis').val(),
					bayar: $('#jml_bayar').val(),
					sisa: $('#blm_bayar').val(),
					status: $('#status').val(),
				};
					$.ajax({
						url: url,
						type: 'POST',
						data: dataString,
						beforeSend:function(){
							//return cek();
							$('#loading').show();
						},
						success:function(res){
							var res = eval(res);
							
							if(res.status){
								Swal.fire(
  									'Sukses',
  									'Data Telah masuk dalam database',
  									'success'
								)
								window.location.href = "<?php echo base_url().'kasir/penjualan'?>";
								
								return nota();
								
							}else{
								alert(res.messages);
							}
							

							$('#kode').focus();
							
						},
						error:function(){
							alert("Terjadi kesalahan dalam mengambil data diserver");
						},
						complete: function(){

							setInterval($('#loading').fadeOut(), 5000);
							

						}

						});

			}

			function deleteItem(id){
				if(confirm('anda yakin akan menghapus item?')){
					$.ajax({
						url : "<?php echo base_url().'penjualan/hapus/'?>"+id,
						type: "POST",
						dataType: "JSON",
						success:function(res){
								
							window.location.href = "<?php echo base_url().'kasir/penjualan'?>";

							$('#kode').focus();
						},
						error:function(){
							alert("Terjadi kesalahan");
						}
					});
				}
			}


	$(function() {
    				$("#jml_bayar, #blm_bayar, #status").on("keydown keyup", sum);

					function sum() {

			
						$("#blm_bayar").val(parseInt($('#totharga').val().replace(/,/gi,'')) - parseInt($("#jml_bayar").val().replace(/,/gi,'')));

						if ($("#blm_bayar").val() <= 0) {
							$("#blm_bayar").val(0);
							$("#status").val("lunas");
						}else{
							$("#status").val("belum lunas");
						}
						
					}
				});

	function cek() {
		
		if (document.getElementById('jenis').value == "Cash") {
			
			if ($('#jml_bayar').val() != $('#totharga').val()) {
				alert("nominal yang dimasukan kurang karena pembayaran cash");	
				return false;
				//return cek();
			}else{
				
				return true;
			}
			//return true;//$('#bayar').prop('required', true);
		} else  {
			//return false;
			
			return true;
		}
	}

	function nota(){
		var no = $('#no_nota').val();
		var link ="<?php echo base_url().'nota/penjualan/'?>"+no;
		var nota = window.open(link ,"_blank");
	}


	function numberFormat(bilangan){
		var	number_string = bilangan.toString(),
		sisa 	= number_string.length % 3,
		rupiah 	= number_string.substr(0, sisa),
		ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

		if (ribuan) {
			separator = sisa ? ',' : '';
			rupiah += separator + ribuan.join(',');
		}

		return rupiah;
	}

	function getSum(tot, ekr, num) {
		return tot + num;
		return ekr + num;
	}

	function getTmbh(brt, num) {
		return brt + num;
	}
		</script>
	</div>
</section>
</html>