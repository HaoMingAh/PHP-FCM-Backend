<!DOCTYPE html>
<html lang="en">

<head>
    <title>Enigma Messenger Admin</title>  
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="<?php echo base_url(); ?>skins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>skins/dist/css/sb-admin-2.css" rel="stylesheet">
    

    
</head>

<body>    
    
    <div class="container">

        <!-- login form-->
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Enigma Messenger Admin</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo base_url();?>index.php/admin/loginConfirm">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Admin ID" name="username" type="text" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>
                               <div class="form-group">
                                
                                    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Login">
                               </div>                               
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  

</body>

</html>   

<?php
        if($this->session->flashdata('message')){
        ?>
        <script>
            alert('<?=$this->session->flashdata('message')?>');
        </script>
        <?php
        }
?>     