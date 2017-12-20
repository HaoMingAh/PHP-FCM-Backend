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
		Manage Booking
		<small>Booking management view</small>
	  </h1>
	  <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="#"><i class="fa fa-user"></i> Manage Booking</a></li>
		<li><a href="#"><i class="fa fa-plus"></i> Add Booking</a></li>
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
					<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= site_url('Admin/bookings_create')?>" >
						<div class="box-body">
							<div class="form-group">
								<label for="user_id" class="col-sm-2 control-label">User</label>
								<div class="col-sm-10">
									<select class="form-control clubs" name="user_id" required>
										<?php foreach($users as $x){ ?>
											<option value="<?=$x->id;?>" ><?=$x->firstname;?>&nbsp;<?=$x->lastname;?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="event_id" class="col-sm-2 control-label">Event</label>
								<div class="col-sm-10">
									<select class="form-control" name="event_id" required>
										<?php foreach($events as $y){ ?>
											<option value="<?=$y->id;?>" ><?=$y->event_name;?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="seat" class="col-sm-2 control-label">Seats</label>
								<div class="col-sm-10">
									<input type="text" value="" class="form-control" name="seat" placeholder="Seats" required>
								</div>
							</div>
							<div class="form-group">
								<label for="attendees" class="col-sm-2 control-label">Attendees</label>
								<div class="col-sm-10">
									<input type="text" value="0,0,0" class="form-control" name="attendees" placeholder="attendees" required>
								</div>
							</div>
							<div class="form-group">
								<label for="price" class="col-sm-2 control-label">Price</label>
								<div class="col-sm-10">
									<input type="text" value="" class="form-control" name="price" placeholder="price" required>
								</div>
							</div>
							<div class="form-group">
								<label for="date" class="col-sm-2 control-label">Date</label>
								<div class="col-sm-10">
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									  <input class="form-control datepicker" type="text" name="date" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="purchased" class="col-sm-2 control-label">Purchased</label>
								<div class="col-sm-10">
									<select class="form-control" name="purchased" required>
										<option value="0" >No</option>
										<option value="1">Yes</option>
									</select>
								</div>
							</div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<button class="btn btn-default pull-right" data-dismiss="modal" >Cancel</button>
							<input type="submit" value="Add Booking" class="btn btn-success formSubmit">
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
		$('#bookings').addClass('active');
		
		$('.datepicker').datepicker({
			autoclose: true,
			format: "yyyy-mm-dd"
		});		
	})
</script>


</body>
</html>