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
		Manage Bookings
		<small>Bookings management view</small>
	  </h1>
	  <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="#"> Manage Bookings</a></li>
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
			<?php if($show_add){ ?>
				<div class="box-header">
					<a href="<?= site_url('Admin/bookings_add') ?>" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Booking</a>
				</div>
			<?php } ?>
			
			<!-- /.box-header -->
			<div class="box-body">
				<table id="mybookings" class="table table-bordered table-striped text-center">
					<thead>
					<tr>
						<th>ID</th>
						<th>User</th>
						<th>Event Name</th>
						<th>Club</th>
						<th>Event Date</th>
						<th>Seat</th>
						<th>Attendees</th>
						<th>Time</th>
						<th>Price</th>
						<th>Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $item){  ?> 
						<tr data-user="<?= $item->id ?>">
							<td><?= $item->id ?></td>
							<td><?= $item->email ?></td>
							<td> <?= $item->event_name ?> </td>
							<td> <?= $item->club_name ?> </td>
							<td> <?= $item->event_date ?> </td>
							<td>
								<?php if($item->event_type){ 
										if($item->seat == 0){
											echo "Captain's Table";
										}else if($item->seat == 1){
											echo "Quarter Deck";
										}else if($item->seat == 2){
											echo "Main Deck";
										}
									}else{
										echo $item->seat;
									}
								?>
							</td>
							<td> <?= $item->attendees ?> </td>
							<td> <?= $item->time ?> </td>
							<td> <?= $item->price ?> </td>
							<td> <?= $item->date ?> </td>
							<?php if($item->purchased == 1){ ?>
								<td><span class="label label-default">Purchased</span></td>
							<?php }else{ ?>
								<td><span class="label label-success">Available</span></td>
							<?php } ?>
							<td>
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
		$('#bookings').addClass('active');
		$('#mybookings').DataTable({
			"scrollX": true,
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": true
		});
		$('#mybookings_filter').css('text-align','right');
		
		var delete_url = '<?= site_url('Admin/bookings_delete') ?>';

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