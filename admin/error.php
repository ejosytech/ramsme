<?php
  ob_start();
?>



<!DOCTYPE html>
<html lang="en">
 <?php
 include 'adminHF/header_admin.php';
 ?>
      <div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
    
    <div class="rf-register-form">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Oops! </h2>
                  <?php  
                    switch ($_GET['errortype']) 
                    {
            case 'mobile_no_err':
                    ?> 
                    <div class="alert alert-danger"> [Register] Someone has used this mobile number earlier. Please click to <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?> and try again using another mobile number, Thank you. </div>
                    <?php
                    break;
            case 'select_sql_exe_err':
                    ?> 
                    <div class="alert alert-danger"> [Register] Data Extraction Process Error,   Please click to  <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?></div>
                    <?php 
                    break;
            case 'insert_sql_err1':
                    ?> 
                    <div class="alert alert-danger"> [Register] Data Insertion Process Error,   Please click to  <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?>  </div>
                    <?php 
                    break;
                
            case 'insert_sql_err2':
                    ?> 
                    <div class="alert alert-danger"> [Register] Data Insertion Process Error,   Please click to  <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?>  </div>
                    <?php 
                    break; 
            case 'image_size_err':
                    ?> 
                    <div class="alert alert-danger"> [Register] Sorry, your file is too large.Maximum of 1MB allowed.,   Please click to  <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?> </div>
                    <?php 
                    break;
            case 'image_type_err':
                    ?> 
                    <div class="alert alert-danger"> [Register] Sorry, only JPG, JPEG, PNG & GIF files are allowed.,   Please click to  <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?> </div>
                    <?php 
                    break;
            case 'pass_size_err':
                    ?> 
                    <div class="alert alert-danger"> [Register] Password size must have atleast 3 characters.,   Please click to  <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?> </div>
                    <?php 
                    break;
            case 'accnt_select_err1':
                    ?> 
                    <div class="alert alert-danger"> [Account] Data Extraction Process Error1.,   Please click to  <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?> </div>
                    <?php 
                    break;
            case 'accnt_select_err2':
                    ?> 
                    <div class="alert alert-danger"> [Account] Data Extraction Process Error2.,   Please click to  <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?> </div>
                    <?php 
                    break;
            case 'accnt_update_err':
                    ?> 
                    <div class="alert alert-danger"> [Account] Data Update Process Error.,   Please click to  <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?> </div>
                    <?php 
                    break;
            case 'pass_reset_err':
                    ?> 
                    <div class="alert alert-danger"> [Password Reset] Password Reset Process Error.,   Please click to  <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?> </div>
                    <?php 
                    break;
                
               default:
                    ?>
                     <div class="alert alert-danger"> Unknown Process Error, Please click to  <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?> </div>
                    <?php
                } 
                ?>
                    
                </div>
            </div>        
        </div>
    </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
 <?php
  include 'adminHF/footer_admin.php';
 ?>
    
</html>

<?php
  ob_end_flush();
?>