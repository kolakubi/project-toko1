<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css">
	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>asset/image/favicon-sancu.png"/>
</head>
<body style="padding: 0 10px; background-image: url('<?php echo base_url() ?>asset/image/login-bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat">

	<!-- particle -->
	<!-- <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: -999" id="particles-js"></div> -->

	<div class="container">
		<div
			class="row" style="display: flex; align-items: flex-end; justify-content: center; flex-direction: column; height: 100vh;"
		>	
			<div style="width: 400px">
				<!-- logo -->
				<p class="text-center">
					<img src="<?php echo base_url() ?>asset/image/logo.png" alt="logo-sancu">
				</p>
				<h3 class="text-center">Login</h3>

				<!-- form -->
				<div class="col-xs-12" style="background-color: #f2f2f2; padding: 10px 20px; border-radius: 7px">
					<?php if($gagal) : ?>
						<p class="text-center" style="color: white; background-color: #f44242"><?php echo 'Username atau Password salah' ?></p>
					<?php endif ?>
					<?php echo form_open('login/validasi') ?>
						<div class="form-group">
							<label style="color: #222">Username: </label>
							<input type="text" name="username" class="form-control">
							<div style="background-color: #f44242; text-align: center;">
								<span style="color: white;"><?php echo form_error('username') ?></span>
							</div>
						</div>
						<div class="form-group">
							<label style="color: #222">Password: </label>
							<input type="password" name="password" class="form-control">
							<div style="background-color: #f44242; text-align: center;">
								<span style="color: white;"><?php echo form_error('password') ?></span>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info btn-block">Login</button>
						</div>
					<?php echo form_close() ?>
				</div> <!-- end of form -->

				 <br>

				<!-- daftar klo blom ada akun -->
				<div class="well text-center" style="font-size: 1.2em">Belum punya akun ? <a href="<?php echo base_url()?>daftarakun" style="width: 100%;color: blue">Daftar.</a></div>

			</div>
            

		</div> <!-- end of row -->
	</div> <!-- end of container -->

	<script src="<?php echo base_url() ?>asset/js/particle/particles.min.js"></script>
	<script type="text/javascript">
		particlesJS.load('particles-js', '<?php echo base_url() ?>asset/js/particle/particles.json', function() {
			console.log('callback - particles.js config loaded');
		});
	</script>

</body>
</html>
