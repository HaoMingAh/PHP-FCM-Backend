<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Enigma Messenger | Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css" >
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/AdminLTE.min.css">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="#"><b>Enigma Messenger</b>&nbsp;ADMIN</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<?php if($this->session->flashdata('error')){ ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<a class="close" data-dismiss="alert">×</a>
					<div><span class="fa fa-times"></span>&nbsp;<?= $this->session->flashdata('error')?></div>
				</div>
			<?php } ?>
			<?php if($this->session->flashdata('success')){ ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<a class="close" data-dismiss="alert">×</a>
					<div><span class="fa fa-check"></span>&nbsp;<?= $this->session->flashdata('success')?></div>
				</div>
			<?php } ?>
			
			<p class="login-box-msg">Sign in to start your session</p>
			<form method="post" action="<?php echo base_url();?>index.php/admin/loginConfirm">
				<div class="form-group has-feedback">
					<input type="text" name="username" class="form-control" placeholder="Username ID">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<!-- /.col -->
					<div class="col-xs-12">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

		</div>
		<!-- /.login-box-body -->
	</div>

<script src="<?= base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
