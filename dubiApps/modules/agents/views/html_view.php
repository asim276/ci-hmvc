<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>Dubimotors - Login</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?=base_url().'jic-repo/css/bootstrap.min.css'?>">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?=base_url().'jic-repo/css/bootstrap-responsive.min.css'?>">
	<!-- icheck -->
	<link rel="stylesheet" href="<?=base_url().'jic-repo/css/plugins/icheck/all.css'?>">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?=base_url().'jic-repo/css/style.css'?>">
	<!-- Color CSS -->
	<link rel="stylesheet" href="<?=base_url().'jic-repo/css/themes.css'?>">


	<!-- jQuery -->
	<script src="<?=base_url().'jic-repo/js/jquery.min.js'?>"></script>
	
	<!-- Nice Scroll -->
	<script src="<?=base_url().'jic-repo/js/plugins/nicescroll/jquery.nicescroll.min.js'?>"></script>
	<!-- Validation -->
	<script src="<?=base_url().'jic-repo/js/plugins/validation/jquery.validate.min.js'?>"></script>
	<script src="<?=base_url().'jic-repo/js/plugins/validation/additional-methods.min.js'?>"></script>
	<!-- icheck -->
	<script src="<?=base_url().'jic-repo/js/plugins/icheck/jquery.icheck.min.js'?>"></script>
	<!-- Bootstrap -->
	<script src="<?=base_url().'jic-repo/js/bootstrap.min.js'?>"></script>
	<script src="<?=base_url().'jic-repo/js/eakroko.js'?>"></script>

	<!--[if lte IE 9]>
		<script src="<?=base_url().'jic-repo/js/plugins/placeholder/jquery.placeholder.min.js'?>"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?=base_url().'jic-repo/fav/favicon.ico'?>">
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="<?=base_url().'jic-repo/fav/apple-icon-114x114.png'?>" />

</head>

<body class='login'>
	<div class="wrapper" style="top:40%;">
		<div style="background:#d20000; width:100%;"><h1 style="margin:0;"><a href="<?=base_url()?>"><img src="<?=base_url().'jic-repo/img/logo-big.png'?>" alt="" class='retina-ready' style="margin-right:0; margin-top:-2px; margin-bottom:1px;"></a></h1></div>
		<div class="login-body" style="margin-top:-12px;">
			<h2>SIGN IN</h2>
            <?=$notify_message?>
			<form action="#" method="post" class='form-validate' id="back_admin_login">
				<div class="control-group">
					<div class="email controls">
						<input type="text" name="email" id="email" placeholder="Email address" class='input-block-level' data-rule-required="true" data-rule-email="true" autocomplete="off">
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						<input type="text" name="agent_name" id="agent_name" placeholder="Name" class='input-block-level' data-rule-required="true" autocomplete="off">
					</div>
				</div>
                
                <div class="control-group">
					<div class="pw controls">
						<input type="password" name="password" id="password" placeholder="Password" class='input-block-level' data-rule-required="true" autocomplete="off">
					</div>
				</div>
				<div class="submit">
					<div class="remember">
						<input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember"> <label for="remember">Remember me</label>
					</div>
					<input type="submit" value="Sign me in" class='btn btn-primary'>
				</div>
			</form>
			<div class="forget">
				<a href="#"><span>Forgot password?</span></a>
			</div>
		</div>
	</div>
</body>
</html>
