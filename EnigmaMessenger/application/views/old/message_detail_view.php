
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">Message >  Online  > Detail   </h4>
        </div>
    </div>
    
    <div class="row">
        
        <div class="col-lg-6" style="margin-top: 20px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Message &nbsp&nbsp&nbsp (<?=$data[0]->name?>)  
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body ">
                    
                        <table cellspacing="0" cellpadding="0" class="table table-bordered table-hover" rules="cels" >
                        <!-- <table cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover"  cellspacing="0" cellpadding="0" >-->
                            
                            <tbody>
                            
                            <?php
                            $i = 1;
                                foreach ($data as $item)  {?> 
                            
                                    <tr class="odd gradeX" >                                  
                                    
                                    <?php
                                         if ($item->is_image == 1) {
                                             
                                             if ($item->type == 1) {?> 
                                             
                                             <td style="text-align: right;">
                                             <!--<img id = "myImg" class="img-thumbnail" style="width: 50%; height: auto;" src="<?=$item->message?>" onclick="showImage(this)" />-->
                                             <img class="img-thumbnail" style="width: 50%; height: auto;" src="<?=$item->message?>" onclick="showImage(this)" />
                                             <!-- The Modal -->
                                            <!--<div id="myModal" class="modal">
                                              <span class="close">×</span>
                                              <img class="modal-content" id="img01">
                                              <div id="caption"></div>
                                            </div>-->
                                             </td>
                                             
                                             <?php } else { ?>
                                                 
                                                 <td style="text-align: left;">
                                                 
                                                 <!--<img id = "myImg" class="img-thumbnail" style="width: 50%; height: auto;" src="<?=$item->message?>" />-->
                                                 <img class="img-thumbnail" style="width: 50%; height: auto;" src="<?=$item->message?>" onclick="showImage(this)" />
                                                 
                                                    <!-- The Modal -->
                                                    <!--<div id="myModal" class="modal">
                                                      <span class="close">×</span>
                                                      <img class="modal-content" id="img01">
                                                      <div id="caption"></div>
                                                    </div>-->
                                                 </td>
                                                 
                                             <?php } ?> 
                                             
                                         <?php
                                         } else {
                                         
                                             if ($item->type == 1){
                                             
                                           ?>
                                                <td style="text-align: right; color: blue;"><?=$item->message?></td>
                                           <?php
                                             } else {?>
                                                <td style="text-align: left; color: black;"><?=$item->message?></td>
                                             <?php
                                             }
                                         }
                                         ?>
                                    <td style="text-align: center; width: 200px;"><?=$item->reg_date?></td> 
                                    
                                </tr>                                      
                            <?php  $i++;}  ?>
                            
                            </tbody>
                        </table>
                    
                    <!-- /.table-responsive -->
                    
                </div>
                <!-- /.panel-body -->
                
                <!--<div class="panel-footer " style="text-align:center;"> 
                    
                    <input type="button" class="btn-flat btn-primary dropdown-toggle"  value="선 택 항 목 삭 제 ">  
                   
                </div>  -->
                
            </div>
            <!-- /.panel -->
        </div>
        
        <div class="col-lg-1" >
        
        </div>
        
        <div class="col-lg-6 panel panel-default" style="margin-top: 20px;">
            <form role="form" method="post" style="margin-top: 10px;" action="<?php echo base_url();?>index.php/admin/sendTextMessage">
            답변하기  (Text) <hr>
            <textarea  rows="10" class="col-lg-12" name="text" required placeholder = "Text here..."></textarea>
            <input type="hidden" name="id" value="<?=$data[0]->user_id?>">
            <input type="hidden" name="name" value="<?=$data[0]->name?>">
            <div  style="text-align:center; " >
                            
                <input type="submit" style="margin-top: 30px;" class="btn-flat btn-primary dropdown-toggle"  value="전송하기">  
                           
            </div>  
            </form>
            
            <form role="form" style="margin-top: 30px" method="post" action="<?php echo base_url();?>index.php/admin/sendFileMessage" enctype="multipart/form-data">
            이미지 보내기  <hr>
            <input type="file" name="file" required >
            <input type="hidden" name="id" value="<?=$data[0]->user_id?>">
            <input type="hidden" name="name" value="<?=$data[0]->name?>">
            <div  style="text-align:center; " >
                            
                <input type="submit" style="margin-top: 30px;" class="btn-flat btn-primary dropdown-toggle"  value="전송하기">  
                           
            </div>  
            </form>
            
            <form class="col-lg-12" style="margin-top: 30px; margin-bottom: 20px" role="form" method="post" action="<?php echo base_url();?>index.php/admin/sendMessageStatus">
            처리상태 (status) 설정  <hr>
            <input type="hidden" name="id" value="<?=$data[count($data) - 1]->id?>">
            <input type="hidden" name="name" value="<?=$data[0]->name?>">
            <select name="status" class="col-lg-6">
                              
                <?php
                
                    $status = array('Waiting', 'Done');
                    
                    for ($i = 0 ; $i < sizeof($status) ; $i++) {
                        
                        if ($i == 0){                                        
                            echo "<option selected>".$status[$i]."</option>";
                        } else {                                        
                            echo "<option>".$status[$i]."</option>";                                            
                        }
                    }                                
                ?>                                
            </select>
             
            <div class="col-lg-2"> </div>
            <input type="submit"  style="text-align: center; margin-left: 20px;" class="col-lg-3 btn-flat btn-primary dropdown-toggle" value="전송하기">  
                           
              
            </form>
            
        </div>
        
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    <div class="row col-lg-12" style="text-align: center; margin-bottom: 50px;" >
        <input type="button" style="margin-top: 30px;" class="btn-flat btn-primary dropdown-toggle" onclick="goback();" value="목록으로 (이전) ">
    </div>             
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

    function showImage(img){
        var src = img.src;
        window.open( src, "_blank", "toolbar=no, location=no, directories=no, status=yes, menubar=no, scrollbars=no, resizable=no, copyhistory=no, titlebar=no, top=100,left=200, width = 500, height = 500");
    }

// Get the modal
//    var modal = document.getElementById('myModal');

//     Get the image and insert it inside the modal - use its "alt" text as a caption
//    var img = document.getElementById('myImg');
//    var modalImg = document.getElementById("img01");
//    var captionText = document.getElementById("caption");
//    img.onclick = function(){
//        modal.style.display = "block";
//        modalImg.src = this.src;
//        captionText.innerHTML = this.alt;
//    }

//     Get the <span> element that closes the modal
//    var span = document.getElementsByClassName("close")[0];

//     When the user clicks on <span> (x), close the modal
//    span.onclick = function() {
//        modal.style.display = "none";
//    }

    function goback() {
            
        location.href = "<?php echo base_url();?>index.php/admin/messageInfo";         
    }    
</script>   

