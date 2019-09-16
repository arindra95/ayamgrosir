<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">
	



</head>
<body class="skin-default">
	<div id="loading">
		<div class="loader"></div>
	</div>
	<div class="wrapper">
		<div class="container-fluid d-flex justify-content-center">
			<div class="col-md-4 col-md-offset-4 col-lg-3 col-lg-offset-4 ">
				<div id="login-box"class="login-box">
					<h2 class="text-center">Ayam Grosir MB ENDANG</h2><hr>
					<?php if(isset($error)) { echo $error; }; ?>
					<p id="messages" class="alert" style="display: none;"></p>
					<form id="myForm" method="POST" action="<?php echo base_url()."auth" ?>" >
						<div class="form-group">
							<label for="username" class="control-label">Username</label>
								<input type="text" name="username" placeholder="Username" class="form-control">
							<?php echo form_error('username'); ?>
						</div>
						<div class="form-group">
							<label for="password" class="control-label">Password</label>
								<input type="password" name="password" placeholder="Password" class="form-control">
							<?php echo form_error('password'); ?>
						</div>
						<div class="text-right">
							<button id="btn-login" type="submit" class="btn btn-main btn-block">LOGIN</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>