
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">User Manage >  User list    </h4>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User List   
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th style="width : 50px;">No</th>
                                            <th style="text-align: center;" width="50px" >Photo</th>
                                            <th style="text-align: center;" >Name</th>  
                                            <th style="text-align: center;" >Account</th>  
                                            <th style="text-align: center;" >Last login</th>                                                
                                            <!--<th style="text-align: center;" >Action</th>-->                                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                    $i = 1;
                                        foreach ($data as $item)  {?> 
                                    
                                            <tr class="odd gradeX">
                                            <td style="text-align: center; text-align: center; vertical-align: middle;">
                                                <?=$i?></td>                                            
                                            
                                            <?php
                                                if($item->photo_url){
                                                ?>
                                                    <td style="vertical-align: middle; text-align: center; ">
                                                    <img class="img-rounded img-thumbnail" width="50px" height="50px" onclick="showImage(this)" src="<?=$item->photo_url?>" width=200,height=100")" /></td>
                                                <?php
                                                   } else {
                                                ?>                                      
                                                    <td style="vertical-align: middle; text-align: center; vertical-align: middle;"><img class=img-rounded width="30px" height="30px" src="<?php echo base_url();?>skins/images/user.png" alt=""></td>    
                                                <?php
                                                }
                                                ?>                                                                                          

                                            <td style="text-align: center; vertical-align: middle;"><?=$item->name?></td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <?php
                                                    if (strlen($item->email) !=0)  echo $item->email;
                                                    else if (strlen($item->wechat_id) !=0 ) echo $item->wechat_id;
                                                    else if (strlen($item->qq_id) !=0 ) echo $item->qq_id;
                                                    else if (strlen($item->phone_number) !=0 ) echo $item->phone_number;
                                                    
                                                ?>
                                            </td>
                                            
                                            <td style="text-align: center; vertical-align: middle;"><?=$item->last_login?></td>
                                            <!--<td style="text-align: center;">
                                                <div class="dropdown">
                                                   <button class="btn-flat btn-primary dropdown-toggle" 
                                                          type="button" id="dropdownMenu1" data-toggle="dropdown">Action
                                                                <span class="caret"></span>
                                                   </button>
                                                       <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                          <li role="presentation">
                                                          <a role="menuitem" tabindex="-1" 
                                                                href="<?php echo base_url();?>index.php/admin/editUser/<?=$item->id?>">Edit                                  
                                                          </a>
                                                          </li>                                                            
                                                          <li role="presentation">
                                                          <a role="menuitem" tabindex="-1" 
                                                                href="<?php echo base_url();?>index.php/admin/deleteUser/<?=$item->id?>">Delete </a>
                                                          </li>

                                                       </ul>
                                                 </div>                                                                     
                                            </td>--> 
                                        </tr>                                      
                                    <?php  $i++;}  ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                        
                        <!--<div class="panel-footer " style="text-align:center;"> 
                            
                            <input type="button" class="btn-flat btn-primary dropdown-toggle"  value="선 택 항 목 삭 제 ">  
                           
                        </div>  -->
                        
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->             
        </div>
        <!-- /#page-wrapper -->
        
        <script type="text/javascript">
            function showImage(img) {
                
                var src = img.src;
                window.open( src, "_blank", "toolbar=no, location=no, directories=no, status=yes, menubar=no, scrollbars=no, resizable=no, copyhistory=no, titlebar=no, top=100,left=200, width = 256, height = 256");
    
            }
        </script>
    
