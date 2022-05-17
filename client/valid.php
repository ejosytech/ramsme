<?php
  ob_start();
?>


<!DOCTYPE html>
<html lang="en">
 <?php
 include 'clientHF/header_client.php';
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
                    <h2 class="mt-5 mb-3">Hurray! </h2>
                  <?php  
                    switch ($_GET['successmsg']) 
                    {
            case 'success_reg':
                    ?> 
                    <div class="alert alert-secondary"> You have been successfully registered. Please click here to <?php  echo "<a href='login.php'>Log in</a>";  ?> Thank you. </div>
                    <?php
                    break;
            case 'success_update':
                    ?> 
                    <div class="alert alert-secondary">You have successfully updated your records. Please click here to  <?php   echo "<a href='account.php'>Go Back</a>";  ?></div>
                    <?php 
                    break;
            case 'success_reset':
                    ?> 
                    <div class="alert alert-secondary">You have successfully reset your password,   Please click here to  <?php   echo "<a href='login.php'>Log in</a>";  ?></div>
                    <?php 
                    break;
           
               default:
                    ?>
                     <div class="alert alert-secondary"> Unknown Process Success, Please click to  <?php   $url = htmlspecialchars($_SERVER['HTTP_REFERER']);  echo "<a href='$url'>Go Back</a>";  ?> </div>
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
  include 'clientHF/footer_client.php';
      ?>

<?php
  ob_end_flush();
?>