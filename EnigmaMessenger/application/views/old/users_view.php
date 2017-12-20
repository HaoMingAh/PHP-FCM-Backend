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
		Manage Users
		<small>Users management view</small>
	  </h1>
	  <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="#"><i class="fa fa-user"></i> Manage Users</a></li>
	  </ol>
	</section>

    <!-- Main content -->
    <section class="content">
		<?php if($this->session->flashdata('message')){ ?>
			<div class="alert alert-info alert-dismissible" role="alert">
				<a class="close" data-dismiss="alert">×</a>
				<div><span class="fa fa-check"></span>&nbsp;<?= $this->session->flashdata('message')?></div>
			</div>
		<?php } ?>
		<div class="box">
			<div class="box-header">
				<button class="btn btn-success" data-toggle="modal" data-target="#usersModal"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New User</button>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="myusers" class="table table-bordered table-striped text-center">
					<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Account</th>
						<th>Status</th>
						<th>Last Login</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $item){  ?> 
						<tr data-user="<?= $item->id ?>">
							<td> <?= $item->id ?> </td>
							<td> <?= $item->firstname ?>&nbsp;<?= $item->lastname ?> </td>
							<td> <?= $item->email ?> </td>
							<?php if($item->status == 1){ ?>
								<td><span class="label label-success">Active</span></td>
							<?php }else{ ?>
								<td><span class="label label-danger">Blocked</span></td>
							<?php } ?>
							<td><?= $item->last_login ?></td>
							<td>
								<?php if($item->photo_url){ ?>
								<a href="#" class="showImage" data-img="<?=$item->photo_url;?>" ><span class="label label-success"><i class="fa fa-eye"></i></span></a>
								<?php }else{ ?>
								<a><span class="label label-default disabled" ><i class="fa fa-eye"></i></span></a>
								<?php } ?>
								<a href="#" class="editUser" data-id="<?= $item->id ?>"><span class="label label-primary"><i class="fa fa-edit"></i></span></a>
								<a href="#" class="delUser"><span class="label label-danger"><i class="fa fa-trash"></i></span></a>
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
						<input type="hidden" class="user-id" value="">
						<button class="deleteConfirm btn btn-danger pull-right">Delete</button>
						<div class="clearfix"></div>
					</div>

				</div>
			</div>
    </div>
		<div class="modal fade" id="imageModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<img class="imageContent" src="" alt="" style="max-height: 80vh;max-width: 100%;display:block;margin: 0 auto;">
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
		var delete_url = '<?= ?>';
		$('.showImage').on('click',function(){
			var url = $(this).data('img');
			$('#imageModal img').attr("src",url);
		})	
		$('.delUser').on('click',function(){
			$('#deleteModal').modal('show');
		})
		$('.deleteConfirm').click(function(){
			$.ajax({
				url: 
			})
		})
	})
</script>


</body>
</html>
