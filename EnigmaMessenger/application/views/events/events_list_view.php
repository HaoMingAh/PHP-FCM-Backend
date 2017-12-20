<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Enigma Messenger | Admin Panel</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url();?>assets/bootstrap/css/bootstrap.min.css">
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
		Manage Events
		<small>Events management view</small>
	  </h1>
	  <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="#"> Manage Events</a></li>
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
			<div class="box-header">
				<a href="<?= site_url('Admin/events_add') ?>" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Event</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="myevents" class="table table-bordered table-striped text-center">
					<thead>
					<tr>
						<th>No</th>
						<th>Type</th>
						<th>Club</th>
						<th>Name</th>
						<th>Date</th>
						<th>Start Time</th>
						<th>End Time</th>
						<th>Price</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $item){  ?> 
						<tr data-user="<?= $item->id ?>">
							<td><?= $item->id ?></td>
							<td> <?= $item->event_type ? "Pirates" : "MCP" ?></td>
							<td> <?= $item->club ?> </td>
							<td> <?= $item->event_name ?> </td>
							<td> <?= $item->date ?> </td>
							<td> <?= $item->start_time ?> </td>
							<td> <?= $item->end_time ?> </td>
							<td><?= $item->price ?></td>
							<?php if($item->status == 1){ ?>
								<td><span class="label label-success">Active</span></td>
							<?php }else{ ?>
								<td><span class="label label-danger">Deleted</span></td>
							<?php } ?>
							<td>
								<a href="<?= site_url('Admin/events_edit').'/'.$item->id ?>"><span class="label label-primary"><i class="fa fa-edit"></i></span></a>
								<a href="#" class="delRow" data-id="<?= $item->id ?>"><span class="label label-danger"><i class="fa fa-trash"></i></span></a>
							</td>
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body text-center">
						<h2>Are you sure you want to delete this?</h2>
					</div>
					<div class="modal-footer">
						<button class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
						<a href="" class="deleteConfirm btn btn-danger pull-right">Delete</a>
						<div class="clearfix"></div>
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
<script src="<?= base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url();?>assets/js/app.js"></script>
<script>
	$(document).ready(function(){
		$('#events').addClass('active');
		$('#myevents').DataTable({
			"scrollX": true,
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": true
		});
		$('#myevents_filter').css('text-align','right');
		
		var delete_url = '<?= site_url('Admin/events_delete') ?>';

		$(document).on('click','.delRow',function(){
			var id = $(this).data('id');
			var url = delete_url +"/"+ id;
			$('#deleteModal .deleteConfirm').attr("href",url);
			$('#deleteModal').modal('show');
		})
	})
</script>


</body>
</html>