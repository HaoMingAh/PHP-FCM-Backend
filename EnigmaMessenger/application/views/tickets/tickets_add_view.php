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
  <style>
	#table1 input {
	  max-width: 60px;
	}
  </style>
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
		Manage Tickets
		<small>Tickets management view</small>
	  </h1>
	  <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="#"><i class="fa fa-user"></i> Manage Tickets</a></li>
		<li><a href="#"><i class="fa fa-plus"></i> Add Ticket</a></li>
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
					<h4 class="modal-title">Add Booking</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= site_url('Admin/tickets_create')?>" >
						<div class="box-body">
							<div class="form-group">
								<label for="user_id" class="col-sm-2 control-label">User</label>
								<div class="col-sm-10">
									<select class="form-control" name="user_id" required>
										<?php foreach($users as $x){ ?>
											<option value="<?=$x->id;?>" ><?=$x->firstname;?>&nbsp;<?=$x->lastname;?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="booking_id" class="col-sm-2 control-label">Booking ID</label>
								<div class="col-sm-10">
									<select class="form-control" name="booking_id" required>
										<?php foreach($bookings as $y){ ?>
											<option value="<?=$y->id;?>" ><?=$y->id;?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="barcode" class="col-sm-2 control-label">Barcode</label>
								<div class="col-sm-10">
									<input type="text" value="" class="form-control" name="barcode" placeholder="barcode" required>
								</div>
							</div>
							
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<button class="btn btn-default pull-right" data-dismiss="modal" >Cancel</button>
							<input type="submit" value="Add Ticket" class="btn btn-success formSubmit">
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
		$('#tickets').addClass('active');
		
		$('.datepicker').datepicker({
			autoclose: true,
			format: "yyyy-mm-dd"
		});		
	})
</script>


</body>
</html>