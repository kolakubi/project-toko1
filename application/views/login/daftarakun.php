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
<body style="padding: 0 10px;">

	<div class="container">
		<div
			class="row" style="display: flex; align-items: center; justify-content: center; flex-direction: column; height: 100vh;"
        >
            <!-- logo -->
            <p class="text-center">
                <img src="<?php echo base_url() ?>asset/image/logo.png" alt="logo-sancu">
            </p>
            <h3 class="text-center">Buat Akun</h3>
			
			<!-- notif jika username sudah terdaftar -->
			<?php if($gagal) : ?>
				<p class="text-center" style="color: white; background-color: #f44242">Username Sudah Terdaftar</p>
			<?php endif ?>

            <!-- form -->
			<div class="col-md-4 col-sm-12 col-xs-12" style="padding: 20px 25px; border-radius: 7px; background-color: #f2f2f2">
				<?php echo form_open('daftarakun/daftar') ?>
					<div class="form-group">
						<label style="color: #222">Username: </label>
						<input type="text" name="username" class="form-control">
						<div style="background-color: #f44242; text-align: center;">
							<span style="color: white;"><?php echo form_error('username') ?></span>
						</div>
					</div>
                    <div class="form-group">
						<label style="color: #222">Email: </label>
						<input type="email" name="email" class="form-control">
						<div style="background-color: #f44242; text-align: center;">
							<span style="color: white;"><?php echo form_error('email') ?></span>
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
						<button type="submit" class="btn btn-info btn-block">Daftar</button>
					</div>
				<?php echo form_close() ?>
			</div> <!-- end of form -->
            <br>
            <a class="btn btn-danger" href="<?php echo base_url() ?>login">Batal</a>
		</div> <!-- end of row -->
	</div> <!-- end of container -->

	<script type="text/javascript">
		particlesJS.load('particles-js', '<?php echo base_url() ?>asset/js/particle/particles.json', function() {
			console.log('callback - particles.js config loaded');
		});
	</script>

</body>
</html>
