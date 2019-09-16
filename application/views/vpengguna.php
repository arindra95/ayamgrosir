<!DOCTYPE html>
<html>
<head>
	<title>Pengguna</title>
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
<section class="main-wrapper">
	<div class="container-fluid">
		<div class="card card-default " id="form-edit" style="display: none">
			<div class="card-header">
				<h3 id="tittle" class="card-tittle pull-left">Tambah data pengguna baru</h3>
					<button class="btn btn-danger btn-xs pull-right" id="btn-close"><i class="fa fa-remove"></i></button>
				<div class="clearfix"></div>
			</div>
			<div class="card-body ">
				<form class="form-horizontal" id="myForm">
					<div class="row h-75 justify-content-center">
						<div class="col-sm-5 col-sm-offset-1" >
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
								<label for="nama_supp" class="col-sm-3 col-form-label text-sm-right text-left" style="">Username</label>
								<div class="col-sm-9">
									<input type="text" id="username" value="" class="form-control" required>
									<input type="hidden"  name="id" id="id" value="">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row" >
								<label for="password" class="col-form-label col-sm-3 text-sm-right text-left">Password</label>
								<div class="col-sm-9">
									<input type="text" id="password" value="" class="form-control" required="">
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row">
								<label for="role" class="col-sm-3 col-form-label text-sm-right text-left" style="">Role</label>
								<div class="col-sm-9">
									<select type="text" value="" id="role" class="form-control">
										<option value="">Pilih </option>
										<option value="Pemilik">Pemilik</option>
										<option value="Kasir">Kasir</option>
									</select>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row">
								<label for="nama" class="col-sm-3 col-form-label text-sm-right text-left" style="">Nama</label>
								<div class="col-sm-9">
									<input type="text" id="nama" value="" class="form-control" >
									<small class="help-block"></small>
								</div>
							</div>
						</div>
						<div class="col-sm-5 ">
							<div class="form-group row">
								<label for="alamat" class="col-form-label col-sm-3 text-sm-right text-left">Alamat</label>
								<div class="col-sm-9">
									<textarea type="alamat" id="alamat" value="" class="form-control" required></textarea>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row">
								<label for="jk" class="col-form-label col-sm-3 text-sm-right text-left">Jenis Kelamin</label>
								<div class="col-sm-9">
									<select type="text" value="" id="jk" class="form-control">
										<option value="">Pilih </option>
										<option value="Laki-laki">Laki-laki </option>
										<option value="Perempuan">Perempuan </option>
									</select>
									<small class="help-block"></small>
								</div>
							</div>
							<div class="form-group row">
								<label for="notel" class="col-form-label col-sm-3 text-sm-right text-left">No HP</label>
								<div class="col-sm-9">
									<input type="text" value="" id="notel" maxlength="15" class="form-control">
									<small class="help-block"></small>
								</div>

							</div>
							<div class="form-group row">
								<label for="email" class="col-form-label col-sm-3 text-sm-right text-left">Email</label>
								<div class="col-sm-9">
									<input type="email" id="email" value="" class="form-control" required>
									<small class="help-block"></small>
								</div>
							</div>
						</div>
						<div class="col-sm-12 text-center">
							<button type="reset" class="btn btn btn-default border border-12">Reset Form</button>
							<button type="submit" id="btn-loading" class="btn btn btn-main"> <i ></i>Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="card card-default">
			<div class="card-header">
				<h3 class="card-title">Data Pengguna</h3>
			</div>
			<div class="card-body">
				<p id="messages" class="alert" style="display: none"></p>
				<div class="toolbar text-right mb-4">
					<button id="btn-create" class="btn btn-main" data-toggle="modal" data-target="#madd"><i class="fa fa-plus"></i> Tambah</button>
					<button id="btn-update" class="btn btn-primary" disabled=""><i class="fa fa-pencil"></i> Edit</button>
					<button id="btn-delete" class="btn btn-danger" disabled=""><i class="fa fa-trash"></i> Hapus</button>
				</div>
				<div class="table-responsive">
					<table id="suptable" class="table table-hover" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th class="" width="50">Id</th>
								<th width="100">Username</th>
								<th width="100">Password</th>
								<th width="100">Role</th>
								<th width="100">Nama</th>
								<th width="100">Alamat</th>
								<th width="100">Jenis Kelamin</th>
								<th width="100">No.HP</th>
								<th width="150">Email</th>								
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
		var idu = $("#id");
		var uname = $("#username");
		var pass = $("#password");
		var rl = $("#role");
		var nm = $("#nama");
		var almt = $("#alamat");
		var jkl = $("#jk");
		var nmr = $("#notel");
		var email = $("#email");
		var id=0;


	$(document).ready(function(){
		

		$('suptable td').css('white-space','initial');
		var table = $("#suptable").DataTable({

			"ajax": {
				"url" : "<?php echo base_url().'pengguna/load_user'?>",

			},
			"serverPaging": true,
			"fixedHeader": true,
           	"aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], 
			columns: [
            	{ "data": "id"},
           		{ "data": "username" },
            	{ "data": "password" },
            	{ "data": "role", 'class': 'bold'},
            	{ "data": "nama" },
            	{ "data": "alamat" },
            	{ "data": "jk" },
            	{ "data": "notel"},
            	{ "data": "email"}

            ],
   

        	 "order": [[ 0, 'asc' ]]


		});

	
		$("#btn-close").click(function(){

			form.slideToggle();
			

			resetForm();
		});

		
	

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

		$('#suptable tbody').on( 'click', 'tr', function(){
    		$("#suptable tbody tr").removeClass('selected');

    		data = table.row( $(this) ).data();

     		$(this).addClass('selected');
     		btnRead.removeAttr('disabled','');
     		btnUpdate.removeAttr('disabled','');
     		btnDelete.removeAttr('disabled','');
    	});

		btnCreate.on('click', function(){
		 	//save_method = 'add';
		 	$("#tittle").text("Tambah data pengguna baru");
		 	resetForm();
			data=null;
			openForm();
			url = '<?php echo base_url().'pengguna/simpan'?>';
			reloadData();
		});

		btnUpdate.on('click', function(){
    	//closeForm();
    		//save_method = 'update';
    		$("#tittle").text("Ubah data pengguna");
  			idu.val(data.id);
  			uname.val(data.username);
  			pass.val(data.password);
  			rl.val(data.role);
  			nm.val(data.nama);
  			jkl.val(data.jk);
  			almt.val(data.alamat);
  			nmr.val(data.notel);
  			email.val(data.email);
  			nmr.val(data.notel);
    		//$('#idsuppliere').val(data.idsupplier);
			//$('#nama_suppe').val(data.nama_supp);
			//$('#alamate').val(data.alamat);
			//$('#notele').val(data.notel);
			//$('#emaile').val(data.email);
			//$('#mform').modal('show'); // show bootstrap modal
    		//$('.modal-title').text('Edit Person'); // Set Title to Bootstrap modal title
    		openForm();
			url = '<?php echo base_url().'pengguna/perbarui/'?>'+data.id;
		});



		btnDelete.on('click', function(){
			if(data.id != ''){
				var hapus=confirm("Apakah anda yakin akan menghapus data ini?");
				if(hapus){
					
					$.ajax({
						url: "<?php echo base_url().'pengguna/hapus'?>",
						type: "POST",
						data: "id="+data.id,
						beforeSend:function(){
							//btnLoader.attr('disabled','disabled');
							//btnLoader.html('<i class="fa fa-spin fa-spinner"></i>loading');
							loader.fadeOut();

						},
						success:function(res){

							reloadData();

							if(res.status) $("#messages").addClass('alert-success');
							else $("#messages").addClass('alert-error');
							$("#messages").html(res.messages).fadeIn();

						},
						error: function(){
							alert('terjadi kekeliruan dalam menghapus data');
						}
						}).done(function(){
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
				id: idu.val(),
				username: uname.val(),
				password: pass.val(),
				role: rl.val(),
				nama: nm.val(),
				jk: jkl.val(),
				alamat: almt.val(),
				notel: nmr.val(),
				email: email.val(),
				
			};
			$.ajax({
				url: url,
				type: 'POST',
				data: dataString,
				beforeSend:function(){
					btnLoader.attr('disabled','disabled');
					btnLoader.html('<i class="fa fa-spin fa-spinner"></i>loading');
					//btnLoader.button('loading');

				},
				success:function(res){
					var res = eval(res);

					reloadData();
	            	closeForm();
	            	resetForm();

					if(res.status) $("#messages").addClass('alert-success');
					else $("#messages").addClass('alert-error');
					$("#messages").html(res.messages).fadeIn();


				},
					error: function(){
					alert("Gagal update data");
					btnLoader.removeAttr('disabled');
					btnLoader.html('<i class="fa fa-save"></i>Simpan');

				}
				}).done(function(){
					btnLoader.removeAttr('disabled');
					btnLoader.html('<i class="fa fa-save"></i>Simpan');
					//btnLoader.button('reset');
				
				});	
				
		});

		
 	

	function openForm(){
	//$("#loading").button('loading')
		form.slideDown();

	}

	function closeForm(){
		form.slideToggle();
		resetForm();
	}

	function resetForm(){
		idu.val("");
		uname.val("");
		pass.val("");
		rl.val("");
		nm.val("");
		jkl.val("");
		almt.val("");
		nmr.val("");
		email.val("");
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