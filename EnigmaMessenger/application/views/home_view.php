<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Enigma Messenger | Admin Panel</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
        Dashboard
        <small>Statistics overview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
      	<div class="box-body">
      		<div class="row">
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-green">
					<div class="inner">
					<h3><?= $item->users ?></h3>
					<p>Total Users</p>
					</div>
					<div class="icon">
					<i class="ion ion-person-stalker"></i>
					</div>
					<a href="<?= site_url('Admin/users') ?>" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
					</a>
					</div>
				</div>
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-red">
					<div class="inner">
					<h3><?= $item->events ?></h3>
					<p>Total Events</p>
					</div>
					<div class="icon">
					<i class="ion ion-flag"></i>
					</div>
					<a href="<?= site_url('Admin/events') ?>" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
					</a>
					</div>
				</div>
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-aqua">
					<div class="inner">
					<h3><?= $item->bookings ?></h3>
					<p>Total Bookings</p>
					</div>
					<div class="icon">
					<i class="ion ion-ios-list"></i>
					</div>
					<a href="<?= site_url('Admin/bookings') ?>" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
					</a>
					</div>
				</div>
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-yellow">
					<div class="inner">
					<h3><?= $item->purchases ?></h3>
					<p>Total Purchases</p>
					</div>
					<div class="icon">
					<i class="ion ion-bag"></i>
					</div>
					<a href="<?= site_url('Admin/purchases') ?>" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
					</a>
					</div>
				</div>
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-purple">
					<div class="inner">
					<h3><?= $item->tickets ?></h3>
					<p>Total Tickets</p>
					</div>
					<div class="icon">
					<i class="ion ion-pricetags"></i>
					</div>
					<a href="<?= site_url('Admin/tickets') ?>" class="small-box-footer">
					More info <i class="fa fa-arrow-circle-right"></i>
					</a>
					</div>
				</div>	
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
<script>
	$(document).ready(function(){
		$('#dash').addClass('active');
	});
</script>


</body>
</html>
