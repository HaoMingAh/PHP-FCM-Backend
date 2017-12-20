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
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/confirm/jquery-confirm.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/img-upload/img-upload.css">
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
		Manage Events
		<small>Events management view</small>
	  </h1>
	  <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="#"><i class="fa fa-user"></i> Manage Events</a></li>
		<li><a href="#"><i class="fa fa-pencil"></i> Edit Events</a></li>
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
					<h4 class="modal-title">Edit Event</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= site_url('Admin/events_update')?>" >
						<div class="box-body">
							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">Event Name</label>
								<div class="col-sm-10">
									<input type="text" value="<?= $item->event_name ?>" class="form-control" name="event_name" placeholder="Name" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="event_type" class="col-sm-2 control-label">Event Type</label>
								<div class="col-sm-10">
									<select class="form-control eventtype" name="event_type" required>
											
											<option value="1" <?php if($item->event_type){ echo "selected";}?>>Pirates</option>
											<option value="0" <?php if(!$item->event_type){ echo "selected";}?> >MCP</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="club" class="col-sm-2 control-label">Club</label>
								<div class="col-sm-10">
									<select class="form-control clubs" name="club_id" required>
										<?php foreach($clubs as $x){ ?>
											<option value="<?=$x->id;?>" <?php if($x->id == $item->club_id){echo "selected";} ?> class="<?php if($x->id ==1 || $x->id==2){echo "type2";}else{echo "type1";}?>" ><?=$x->name;?></option>
										<?php }?>
									</select>
								</div>
							</div>
							

							<div class="form-group">
								<label for="photo" class="col-sm-2 control-label">Files</label>
								<div class="col-sm-10">
									<div class="upload-container">
										<div class="input-label-container col-xs-4">
											<label for="img-upload-input0" class="input-img-label">
												<span class="fa fa-plus"></span>
											</label>
											<input type="file" id="img-upload-input0" class="img-upload-input" name="file[]" accept="image/*">
										</div>
										<div class="clearfix"></div>
										<div class="img-uploads">
										<?php if(count($files)) {?>
											<?php foreach($files as $f){?>
												<div class="col-xs-12 col-sm-6 col-md-3">
													<div class="preview-box">
														<span class="preview-delete-ajax fa fa-times" data-url="<?= site_url('Admin/file_delete').'/'.$f->id ?>"></span>
														<img class="preview-img" src="<?= base_url().'uploadfiles/file/'.$f->file_url;?>" alt="Image Uploaded">
													</div>
												</div>
											<?php } ?>
										<?php } ?>
										</div>			
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label for="date" class="col-sm-2 control-label">Date</label>
								<div class="col-sm-10">
									<div class="input-group">
									  <div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									  </div>
									  <input class="form-control datepicker" type="text" value="<?= $item->date; ?>" name="date" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="start_time" class="col-sm-2 control-label">Start time</label>
								<div class="col-sm-10">
									<input type="text" value="<?= $item->start_time ?>" class="form-control" name="start_time" placeholder="Start Time" required>
								</div>
							</div>
							<div class="form-group">
								<label for="end_time" class="col-sm-2 control-label">end time</label>
								<div class="col-sm-10">
									<input type="text" value="<?= $item->end_time ?>" class="form-control" name="end_time" placeholder="end Time" required>
								</div>
							</div>
							<div class="form-group price1">
								<label for="price" class="col-sm-2 control-label">Price</label>
								<div class="col-sm-10">
									<input type="text" value="<?= $item->price ?>" class="form-control" name="price" placeholder="price" required>
								</div>
							</div>
							<div class="form-group price2">
								<label for="price" class="col-sm-2 control-label">Price</label>
								<div class="col-sm-10">
									<table id="table1" class="table table-striped table-bordered">
										<thead>
										  <tr>
										  	<th>Name</th>
											<th>Adult</th>
											<th>Child</th>
											<th>Infant</th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
											<td>Captain’s Table</td>
											<td class="x1"><input type="text" value="63.20" required> </td>
											<td class="x2"><input type="text" value="39.20" required> </td>
											<td class="x3"><input type="text" value="0" required> </td>
										  </tr>
										  <tr>
											<td>Quarter Deck</td>
											<td class="y1"><input type="text" value="47.20" required> </td>
											<td class="y2"><input type="text" value="31.60" required> </td>
											<td class="y3"><input type="text" value="0" required> </td>
										  </tr> 
										  <tr>
											<td>Main Deck</td>
											<td class="z1"><input type="text" value="39.20" required> </td>
											<td class="z2"><input type="text" value="23.60" required> </td>
											<td class="z3"><input type="text" value="0" required> </td>
										  </tr>
										</tbody>
									</table>
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="description" class="col-sm-2 control-label">Description</label>
								<div class="col-sm-10">
									<textarea  class="form-control" name="description" placeholder="Description"><?= trim($item->description) ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="music" class="col-sm-2 control-label">music</label>
								<div class="col-sm-10">
									<textarea  class="form-control" name="music" placeholder="Music"><?=trim($item->music) ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="entry_type" class="col-sm-2 control-label">Entry type</label>
								<div class="col-sm-10">
									<select class="form-control" name="entry_type" required>
										<option value="+21" <?php if($item->entry_type == "+21"){echo "selected"; } ?> >+21</option>
										<option value="Pirates Adventure" <?php if($item->entry_type =! "+21"){echo "selected";} ?> >Pirates Adventure</option>
									</select>
								</div>
							</div>
							<input type="hidden" name="id" value="<?= $item->id ?>">
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<a class="btn btn-default pull-right"  href="<?= site_url('Admin/events') ?>" >Cancel</a>
							<input type="submit" value="Update" class="btn btn-success formSubmit">
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
<script src="<?= base_url();?>assets/plugins/confirm/jquery-confirm.min.js"></script>
<script src="<?= base_url();?>assets/plugins/img-upload/img-upload.js"></script>

<script>
	$(document).ready(function(){
		$('#events').addClass('active');
		
		$('.datepicker').datepicker({
			autoclose: true,
			format: "yyyy-mm-dd"
		});
		$('.addRow').on('click',function(e){
			e.preventDefault();
			var row = '<input type="file" class="form-control" name="file[]" placeholder="select File">';
			$('.files').append(row);
		})	
		
		if($('.eventtype').val() == 0){
			$('.type2').css("display","none");
			$('.type1').css("display","block");
			$('.clubs').val(""+$('.type1').first().val()+"");
			$('.price1').show();
			$('.price2').hide();
		}else{
			$('.type1').css("display","none");
			$('.type2').css("display","block");
			$('.clubs').val(""+$('.type2').first().val()+"");
			$('.price1').hide();
			$('.price2').show();
		}
		$('.eventtype').change(function(){
			console.log('x');
			if($('.eventtype').val() == 0){
				$('.type2').css("display","none");
				$('.type1').css("display","block");
				$('.clubs').val(""+$('.type1').first().val()+"");
				$('.price1').show();
				$('.price2').hide();
			}else{
				$('.type1').css("display","none");
				$('.type2').css("display","block");
				$('.clubs').val(""+$('.type2').first().val()+"");
				$('.price1').hide();
				$('.price2').show();
			}
		})
		
		$('.formSubmit').click(function(e){
			e.preventDefault();
			if($('.eventtype').val() == 1){
				var vals = $('.x1 input').val()+","+$('.x2 input').val()+","+$('.x3 input').val()+","+$('.y1 input').val()+","+$('.y2 input').val()+","+$('.y3 input').val()+","+$('.z1 input').val()+","+$('.z2 input').val()+","+$('.z3 input').val();
				$('.price1 input').val(vals);
			}
			$('form').submit();

		})
	})
</script>


</body>
</html>