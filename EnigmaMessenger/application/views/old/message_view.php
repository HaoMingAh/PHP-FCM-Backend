
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">Message >  Online    </h4>
                </div>
            </div>
            
            <div class="row">
            
                <div class="col-lg-12">
                
                    <strong>All :  <?=$all?>&nbsp&nbsp&nbsp / &nbsp&nbsp&nbsp Waiting : <?=$waiting?>&nbsp&nbsp&nbsp / &nbsp&nbsp&nbsp Done : <?=$done?>&nbsp&nbsp&nbsp / &nbsp&nbsp&nbsp Reinquiry : <?=$reinquiry?></strong>
                    
                </div>
                
                <div class="col-lg-12" style="margin-top: 20px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Online Message   
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width : 50px;">No</th>
                                            <th style="text-align: center;" >Name</th>  
                                            <th style="text-align: center;" >Message</th>                                                
                                            <th style="text-align: center;" >Date</th>                                                
                                            <th style="text-align: center;" >Status</th>                                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                    $i = 1;
                                    if (count($data) > 0) {
                                        foreach ($data as $item)  {?> 
                                    
                                            <tr class="odd gradeX">
                                            <td style="text-align: center; text-align: center;">
                                                <?=$i?></td> 
                                            
                                            <td style="text-align: center;"><?=$item->name?></td>
                                            <?php
                                                 if ($item->is_image == 1) {?>
                                                 
                                                 <td style="text-align: center;"><a href = "<?php echo base_url();?>index.php/admin/messageDetail/<?=$item->user_id?>">(Img)</a></td>
                                                     
                                                 <?php
                                                 } else { 
                                                   ?>
                                                   <td style="text-align: center;"><a href = "<?php echo base_url();?>index.php/admin/messageDetail/<?=$item->user_id?>"><?=$item->message?></a></td>
                                                   <?php
                                                 }
                                                 ?>
                                            <td style="text-align: center;"><?=$item->reg_date?></td>
                                            <td style="text-align: center;"><?=$item->status?></td>                                            
                                            
                                            
                                        </tr>                                      
                                    <?php  $i++;} 
                                        } ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->                       
                        
                        
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->             
        </div>
        <!-- /#page-wrapper -->
        

    
