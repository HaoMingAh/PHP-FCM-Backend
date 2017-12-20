
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">Notice >  Timeline   </h4>
        </div>
    </div>
    
    <div class="row">
    
        <div class = "col-lg-12">                                             
        </div>
        
        <div class="col-lg-6" style="margin-top: 20px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    현재 등록된 Notice  
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body ">
                
                    <div style="margin-top: 15px; " >
                        <textarea class="col-lg-12" rows="10" style="margin-bottom: 30px;"><?php if(count($data) > 0) echo $data->content; ?></textarea>                          
                        <br>
                    </div>                    
                    
                    <div style="margin-top: 15px; " >
                    Link : <br>
                        <input type="text" class="col-lg-12" value="<?php if(count($data) > 0) echo $data->link ?>">
                        <br> 
                    </div>
                    <?php
                        
                        if (count($files) > 0) {
                            echo '<div class="col-lg-12"  style="margin-top: 15px;">';
                        $i = 0;
                         foreach($files as $file ) {                             
                             if ($i % 3 == 0) echo '<br>';
                          ?>                     
                            <img class="img-thumbnail col-lg-4" style="width: 33.33%; " src="<?=$file->file_url?>" />                          
                                                        
                         <?php $i++; }
                         echo '</div>';
                        }
                     ?>                    
                </div>
                <!-- /.panel-body -->
                
                <div class="panel-footer" align="center">
                    <input type="button" style=" width: 200px;" class="btn-flat btn-primary dropdown-toggle" onclick="deleteNote();" value="삭 제">
                </div>
                
            </div>
            <!-- /.panel -->
        </div>
        
        <div class="col-lg-6 panel panel-default" style="margin-top: 20px; height: auto;">
            <form role="form" method="post" style="margin-top: 10px;" action="<?php echo base_url();?>index.php/admin/sendNotice" enctype="multipart/form-data">
                Text <hr>
                <textarea  rows="10" class="col-lg-12" name="text" maxlength="1000" style="margin-bottom: 30px;" required placeholder = "Text here..."></textarea>
                
                Link :<br>
                <input type="text" class="col-lg-12" style="margin-bottom: 30px;" name="link" placeholder="link">
                Attach(Img)  <hr>

                <div class="col-lg-12" style="margin-top: 10px;">
                    <input type=file name = upload_file[] multiple="" >
                    <p class="help-block">Please upload the image files in jpg, png, gif format.</p>                                    
                </div>
                <br>
                <div class="col-lg-12" align="center">
                    <input type="submit" style="text-align: center; width: 200px; margin-bottom: 50px; margin-top: 20px;;" class="btn-flat btn-primary dropdown-toggle" value="등   록">                             
                </div>
          </form>
            
        </div>
        
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->        
</div>
<!-- /#page-wrapper -->

<?php
    if($this->session->flashdata('message')){
    ?>
    <script>
        alert('<?=$this->session->flashdata('message')?>');
    </script>
    <?php
    }
?>
        

<script>

    function deleteNote() {
        
        if (confirm('Are you sure want to delete this notice?')) {
            
            location.href = "<?php echo base_url();?>index.php/admin/deleteNote/<?=$data->id?>";         
        }    
    }
</script>   

