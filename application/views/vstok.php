<!DOCTYPE html>
<html>
<head>
	<title>Pembelian</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/datatables.min.css">
	<link href="<?php echo base_url()?>assets/css/select2.min.css" rel="stylesheet" />



	<script type="text/javascript" src="<?php echo base_url()?>assets/jquery/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/custom-script.js"></script>
	<script src="<?php echo base_url()?>assets/js/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.inputmask.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.js"></script>
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
		<div class="card card-default" id="form-edit" style="display: none;">
			<div class="card-header">
				<h3 id="tittle" class="card-tittle pull-left">Tambah Data Pembelian baru</h3>
					<button class="btn btn-danger btn-xs pull-right" id="btn-close"><i class="fa fa-remove"></i></button>
				<div class="clearfix"></div>
			</div>
			<div class="card-body ">
				<form class="form-horizontal" id="myForm">
					<div class="row h-75 justify-content-center">
						
						<div class="col-sm-5 col-sm-offset-1" >
							<div class="form-group row">
								<label for="nopembelian" class="col-form-label col-sm-3 text-sm-right text-left">No Invoice</label>
								<div class="col-sm-9">
									<input type="text" id="nopembelian" value="<?php echo $no;?>" class="form-control" disabled="">
									<input type="hidden" id="iduser" value="<?php echo $iduser;?>" class="form-control" disabled="">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row">
								<label for="kodeayam" class="col-form-label col-sm-3 text-sm-right text-left">Jenis Ayam</label>
								<div class="col-sm-9">
										<select id="kodeayam" class="form-control"  onchange="">
										<option value="">Pilih </option>
										<?php foreach ($get as $row){
										echo "<option value=".$row->id.">".$row->jenis."</option>";}
										?>
										</select>
								</div>
							</div>
							<div  class="form-group row">
								<label for="idsupplier" class=" col-form-label col-sm-3 text-sm-right text-left">Nama Supplier</label>
								<div class="col-sm-9">
										<select id="idsupplier" class="form-control"  onchange="" style="width: 100%">

										<option value="">Pilih </option>
										<?php foreach ($supplier as $row){
										echo "<option value=".$row->idsupplier.">".$row->nama_supp."</option>";}
										?>
										</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="tanggal" class="col-form-label col-sm-3 text-sm-right text-left">Tanggal</label>
								<div class="col-sm-9">
									<input type="text" id="tanggal" value="<?php echo $tgl;?>" class="form-control" disabled=""></input>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row">
								<label for="totalekor"  class="col-form-label col-sm-3 text-sm-right text-left">Total Ekor</label>
								<div class="col-sm-9">
									<input type="text" min="0" id="totalekor" value="" class="form-control angka" required></input> 
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="ttlberat" class="col-form-label col-sm-3 text-sm-right text-left">Total Berat</label>
								<div class="col-sm-9">
									<input type="text" id="ttlberat" value="" class="form-control angka"></input> 
									<small class="help-block"></small>
								</div>
							</div>
						</div>
						<div class="col-sm-5 ">
							<div class="form-group row">
								<label for="jenistransaksi" class="col-form-label col-sm-3 text-sm-right text-left">Jenis Transaksi</label>
								<div class="col-sm-9">
										<select id="jenistransaksi" class="form-control"  onchange="">
										<option value="">Pilih </option>
										<?php foreach ($enum as $row){
										echo "<option value=".$row.">".$row."</option>";}
										?>
										</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="harga" class="col-form-label col-sm-3 text-sm-right text-left " >Total Harga (Rp)</label>
								<div class="col-sm-9">
									<input type="text" name="harga" value="" id="harga" maxlength="15" class="form-control uang-indo " required="">
									<small class="help-block"></small>
								</div>
							</div>
								
							<div class="form-group row">
								<label for="bayar" class="col-form-label col-sm-3 text-sm-right text-left ">Bayar (Rp)</label>
								<div class="col-sm-9">
									<input type="text" name="bayar" value="" id="bayar" maxlength="15" class="form-control uang-indo ">
									<small class="help-block"></small>
								</div>

							</div>
							<div class="form-group row">
								<label for="sisa" class="col-form-label col-sm-3 text-sm-right text-left" >Sisa (Rp)</label>
								<div class="col-sm-9">
									<input type="text" name="sisa" id="sisa" value="" class="form-control uang-indo" disabled></input> 
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row">
								<label for="status" class="col-form-label col-sm-3 text-sm-right text-left" >Status</label>
								<div class="col-sm-9">
									<input type="text" name="status" id="status" value="" class="form-control " disabled></input>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row">
								<label for="hargabeli" class="col-form-label col-sm-3 text-sm-right text-left" >Harga beli perkilo</label>
								<div class="col-sm-9">
									<input type="text" name="hargabeli" id="hargabeli" value="" class="form-control uang-indo" ></input>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row">
								<label for="hargabeli" class="col-form-label col-sm-3 text-sm-right text-left" >Harga Jual</label>
								<div class="col-sm-9">
									<input type="text" name="hargabeli" id="hargabeli" value="" class="form-control uang-indo" ></input>
									<small class="help-block"></small>
								</div>
							</div>
						</div>
						<div class="col-md-12 text-center">
							<button type="reset" class="btn btn-default border border-12">Reset Form</button>
							<button type="submit" id="btn-loading" class="btn btn btn-main"> <i ></i>Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="card card-default">
			<div class="card-header">
				<h3 class="card-title">Data Stok Ayam</h3>
			</div>
			<div class="card-body">
				
				<p id="messages" class="alert" style="display: none"></p>
				<div class="toolbar text-right mb-4">
					<button id="btn-create" class="btn btn-main" data-toggle="modal" data-target="#madd" ><i class="fa fa-plus"></i> Tambah</button>
					<button id="btn-update" class="btn btn-primary" disabled=""><i class="fa fa-pencil"></i> Edit</button>
					<button id="btn-delete" class="btn btn-danger" disabled=""><i class="fa fa-trash"></i> Hapus</button>
				</div>
				<div class="table-responsive">
					<table id="sttable" class="table table-hover" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th width="0">Kode Ayam</th>
								<th width="0">Jenis Ayam</th>
								<th width="0">Stok</th>
								<th width="0">Harga Beli</th>
								<th width="0">Harga Jual</th>
							</tr>
						</thead>
						<tbody >
                 
            			</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</div>
</section>

<!--MODAL

	<div class="modal fade" id="mform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-tittle">Tambah Supplier</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
				</div>
			<form action="#" class="form-horizontal" id="form">
				<input type="hidden" value="" name="id"/> 
				<div class="modal-body">
					<div class="form-group row">
						<label class="control-label col-md-3">Id Supplier</label>
						<div class="col-md-9">
							<input type="text" id="idsuppliere" placeholder="Id Supplier" name="idsuppliere" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-md-3">Nama Supplier</label>
						<div class="col-md-9">
							<input type="text" id="nama_suppe" placeholder="nama supplier" name="nama_suppe" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-md-3 ">Alamat</label>
						<div class="col-md-9">
							<textarea type="text" id="alamate" placeholder="alamat" name="alamate" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-md-3 ">No Handphone</label>
						<div class="col-md-9">
							<input type="text" id="notele" placeholder="no handphone" name="notele" class="form-control" maxlength="15">
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label col-md-3 col-form-label">Email</label>
						<div class="col-md-9">
							<input type="email" id="emaile" placeholder="email" name="emaile" class="form-control">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="bupdate" data="'+data.id+'" class="btn btn-primary">simpan</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				</div>
			</form>	
			</div>
		</div>
	</div>
-->

<script>
		var url;
		var save_method;
 		var tb;
		var form = $("#form-edit");
		var btnClose = $(".panel-heading button");
		var btnCreate = $("#btn-create");
		var btnRead = $("#btn-read");
		var btnUpdate = $("#btn-update");
		var btnDelete = $("#btn-delete");
		var loader = $("#loading");
		var btnLoader = $("#btn-loading");
		var msg = $("#messages");

		var data;
		var nip = $("#nopembelian");
		var iu = $("#iduser");
		var kode = $("#kodeayam");
		var idsup = $("#idsupplier");
		var tgl = $("#tanggal");
		var harga = $("#hargaperkilo");
		var totekr = $("#totalekor");
		var totbrt = $("#ttlberat");
		var jt = $("#jenistransaksi");
		var hrg = $("#harga");
		var byr = $("#bayar");
		var sisa = $("#sisa");
		var stat = $("#status");
		var id=0;


	$(document).ready(function(){
		
		

		$('sttable td').css('white-space','initial');
		var table = $("#sttable").DataTable({

			"ajax": {
				"url" : "<?php echo base_url().'stok/load_stok'?>",

			},
			"serverPaging": true,
           	"aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], 
			columns: [ 
				{ "data": "id"},
				{ "data": "jenis"},
				{ "data": "stokakhir"},
				{ "data": "hargaperkilo"},
				{ "data": "hargajual"}


            ],
   

        	 "order": [[ 0, 'desc' ]]


		});

	
		$("#btn-close").click(function(){

			form.slideToggle();
			

			resetForm();
		});


		 $('#idsupplier').select2();

		tb=table;

    	setInterval( function () {
			$("#messages").fadeOut();
		}, 17000 );

		setInterval( function () {
			if(data == null) {
			btnRead.attr('disabled','');
			btnUpdate.attr('disabled','');
			btnDelete.attr('disabled','');
			}
		}, 1000 );

		$('#sttable tbody').on( 'click', 'tr', function(){
    		$("#suptable tbody tr").removeClass('selected');

    		data = table.row( $(this) ).data();

     		$(this).addClass('selected');
     		btnRead.removeAttr('disabled','');
     		//btnUpdate.removeAttr('disabled','');
     		//btnDelete.removeAttr('disabled','');
    	});

		btnCreate.on('click', function(){
		 	//save_method = 'add';
		 	$("#tittle").text("pembelian");
		 	resetForm();
			data=null;
			openForm();
			url = '<?php echo base_url().'stok/simpan'?>';
			//reloadData();
		});

		btnUpdate.on('click', function(){
    	//closeForm();
    		save_method = 'update';
    		$('#nopembelian').attr('disabled', 'disabled').hide();
    		$('#np').show().attr('disabled', 'disabled');
    		kode.show().attr('disabled', 'disabled');
    		jt.attr('disabled', 'disabled');
    		$("#tittle").text("edit data pembelian");
  			//np.val(data.nopembelian);
  			kode.val(data.kodeayam)
  			//idsup.val(data.idsupplier).attr('disabled', 'disabled');
  			//tgl.val(data.tanggal);
  			//totekr.val(data.totalekor);
  			//totbrt.val(data.totalberat);
  			//jt.val(data.jenistransaksi);
  			//hrg.val(data.harga);
  			//byr.val(data.bayar);
  			//sisa.val(data.sisa);
  			//stat.val(data.status);
    		//$('#idsuppliere').val(data.idsupplier);
			//$('#nama_suppe').val(data.nama_supp);
			//$('#alamate').val(data.alamat);
			//$('#notele').val(data.notel);
			//$('#emaile').val(data.email);
			//$('#mform').modal('show'); // show bootstrap modal
    		//$('.modal-title').text('Edit Person'); // Set Title to Bootstrap modal title
    		openForm();
			url = '<?php echo base_url().'stok/perbarui/'?>'+data.nopembelian;
		});

		
		btnDelete.on('click', function(){
			if(data.nopembelian != ''){
				var hapus=confirm("Apakah anda yakin akan menghapus data ini?");
				if(hapus){
					
					$.ajax({
						url: "<?php echo base_url().'supp/hapus'?>",
						type: "POST",
						data: "idsupplier="+data.idsupplier,
						beforeSend:function(){
							//btnLoader.attr('disabled','disabled');
							//btnLoader.html('<i class="fa fa-spin fa-spinner"></i>loading');
							loader.fadeOut();

						},
						success:function(res){
							reloadData();

						},
						error: function(){
							alert('terjadi kekeliruan dalam menghapus data');
						}
						}).complete(function(){
							//btnLoader.removeAttr('disabled');
							//btnLoader.html('<i class="fa fa-save"></i>Simpan');
							loader.fadeOut();

					});	

				}
			}else {
				alert("anda belum memilih supplier");
			}
		});



		$("#myForm").submit(function(event){

			
			event.preventDefault();
			
			var dataString = {
				nopembelian: nip.val(),
				kodeayam: kode.val(),
				idsupplier: idsup.val(),
				iduser: iu.val(),
				tanggal: tgl.val(),
				hargaperkilo: harga.val(),
				jenistransaksi: jt.val(),
				totalekor: totekr.val(),
				totalberat: totbrt.val(),
				harga: hrg.val(),
				bayar: byr.val(),
				sisa: sisa.val(),
				status: stat.val(),
						
			};
		
			$.ajax({
				url: url,
				type: 'POST',
				data: dataString,
				beforeSend:function(){

					return cek();
					btnLoader.attr('disabled','disabled');
					btnLoader.html('<i class="fa fa-spin fa-spinner"></i>loading');
				
					
				},
				success:function(res){
					var res= eval(res);
				
					
					reloadData();
	            	closeForm();
	            	resetForm();
					
					if(res.status)
					Swal.fire(
  						'Sukses',
  						'Data Telah masuk dalam database',
  						'success'
					);
					else 
					Swal.fire(
  						'Error',
  						'Data Telah masuk dalam database',
  						'error'
					);
					//$("#messages").html(res.messages).fadeIn();
					
					return nota();
					//	return true;

					
				},
					error: function(){
					alert("Terjadi kesalahan dalam mengambil data diserver");
					btnLoader.removeAttr('disabled');
					btnLoader.html('<i class="fa fa-save"></i>Simpan');
				}
					//complete:function(){
					//btnLoader.removeAttr('disabled');
					//btnLoader.html('<i class="fa fa-save"></i>Simpan');
				//},	
				}).done(function(){
					btnLoader.removeAttr('disabled');
					btnLoader.html('<i class="fa fa-save"></i>Simpan');
					//btnLoader.button('reset');
					
				
				});	
		});



		$(function() {
    				$("#bayar, #harga, #sisa, #status").on("keydown keyup", sum);

					function sum() {

			
						$("#sisa").val(Number($("#harga").val()) - Number($("#bayar").val()));

						if ($("#sisa").val()==0) {
							$("#sisa").val(0);
							$("#status").val("Lunas");
						}else{
							$("#status").val("Belum lunas");
						}
						
					}
				});

		

	function cek() {
		
		if (document.getElementById('jenistransaksi').value == "Cash") {

			if ($('#bayar').val()!= $('#harga').val()) {
				alert("nominal yang dimasukan kurang karena pembayaran cash");	
				return false;
				//return cek();
			}else {
				//$('#bayar').prop('required', false);
				//return false;
				return true;
			}
			//return true;//$('#bayar').prop('required', true);
		} else  {
			//return false;
			
			return true;
		}
	}

	function nota(){
		var no = $('#nopembelian').val();
		var link ="<?php echo base_url().'nota/pembelian/'?>"+no;
		var nota = window.open(link ,"_blank");
	}

	function openForm(){
	//$("#loading").button('loading')
		form.slideDown();
		

	}

	function closeForm(){
		form.slideToggle();
		resetForm();
	}

	function resetForm(){
		
		kode.val("");
		idsup.val("");
		jt.val("");
		totekr.val("");
		totbrt.val("");
		hrg.val("");
		byr.val("");
		sisa.val("");
		stat.val("");
	}

	function reloadData(){
		table.ajax.reload();
	}	
});


</script>
<footer class="main-footer">
	<p>
		&copy; 2019 Ayam Grosir MB ENDANG. All Right Reserved
	</p>
</footer>
</body>
</html>