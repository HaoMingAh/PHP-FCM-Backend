<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Enigma Messenger | Admin Panel</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/AdminLTE.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/skins/skin-red.min.css">

</head>

<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <?php $this->load->view('includes/main-header');  ?>
  
  <!-- Left Aside -->
  <?php $this->load->view('includes/left-aside'); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
		Manage Users
		<small>Users management view</small>
	  </h1>
	  <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="#"><i class="fa fa-user"></i> Manage Users</a></li>
		<li><a href="#"><i class="fa fa-plus"></i> Add User</a></li>
	  </ol>
	</section>

    <!-- Main content -->
    <section class="content">
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
		<div class="box">
			 <div class="box-body">
				<div class="modal-header">
					<h4 class="modal-title">Add User</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= site_url('Admin/users_create')?>" >
						<div class="box-body">
							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="text" value="" class="form-control" name="email" placeholder="Name" required>
								</div>
							</div>
							<div class="form-group">
								<label for="title" class="col-sm-2 control-label">First Name</label>
								<div class="col-sm-10">
									<input type="text"  value="" class="form-control" name="firstname" placeholder="First Name" required>
								</div>
							</div>
							<div class="form-group">
								<label for="lastname" class="col-sm-2 control-label">Last Name</label>
								<div class="col-sm-10">
									<input type="text"  value="" class="form-control" name="lastname" placeholder="Last Name" required>
								</div>
							</div>
							<div class="form-group">
								<label for="sex" class="col-sm-2 control-label">Sex</label>
								<div class="col-sm-10">
									<select class="form-control" name="sex" required>
										<option value="0" >Male</option>
										<option value="1" >Female</option>
										<option value="2" >Not Set</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="photo" class="col-sm-2 control-label">Photo</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" name="photo" placeholder="Your Picture">
								</div>
							</div>
							<div class="form-group">
								<label for="start" class="col-sm-2 control-label">Trip Start</label>
								<div class="col-sm-10">
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									  <input class="datepicker" type="text" name="trip_start" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="end" class="col-sm-2 control-label">Trip End</label>
								<div class="col-sm-10">
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									  <input class="datepicker" type="text" name="trip_end" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="status" class="col-sm-2 control-label">Status</label>
								<div class="col-sm-10">
									<select class="form-control" name="status" required>
										<option value="1" >Active</option>
										<option value="0">Blocked</option>
									</select>
								</div>
							</div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<a href="<?= site_url('Admin/users') ?>" class="btn btn-default pull-right"  >Cancel</a>
							<input type="submit" value="Add User" class="btn btn-success">
						</div>
						<!-- /.box-footer -->
					</form>
				</div>
			</div>
	
		</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php $this->load->view('includes/footer'); ?>

  <div class="control-sidebar-bg"></div>
</div>

<script src="<?= base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?= base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url();?>assets/js/app.js"></script>
<script src="<?= base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
	$(document).ready(function(){
		$('#users').addClass('active');
		$('.datepicker').datepicker({
			autoclose: true,
			format: "yyyy-mm-dd"
		});
	})
</script>


</body>
</html>