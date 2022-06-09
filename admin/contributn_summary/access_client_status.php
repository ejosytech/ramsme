<?php
  ob_start();
?>


<?php

// Include config file

define('__ROOT__', dirname(dirname(__FILE__),2));
require_once(__ROOT__.'/config.php');



// Define variables and initialize with empty values
$name_value = $mobile_no = $due = $paid = $difference = $role = $sec_due = $sec_paid = $sec_difference = $infr_due = $infr_paid = $infr_difference ="";
$name_err = $mobile_no_err = $complain_err = $attachment_err= $date_err = "";
 
// Display Exist Content
session_start(); // Initialize the session

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)// Check if the user is logged in, if not then redirect him to login page
{
    header("location: /client/login.php");
    exit();
}
?>

 ?>
    <!DOCTYPE html>
<html lang="en">

  <?php
  
      include (__ROOT__.'/admin/adminHF/header_admin.php');
  
  ?>
    
         <div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
 
    <div class="rf-register-form">
            
   
           <div class="row">
                <div class="col-md-10">
                    <h2 class="mt-5">To Check for Residents Account Status, Click the Input Box below and Select the corresponding Mobile number</h2>
<br>
    <br>
                        <div class="form-group">
                              <label for="mobile_no" class="form-label"><b>Resident's Mobile Numbers</b></label>
                            <select id="mobile_no" name ="mobile_no" class="form-control" onchange="access_client_status(this.value)" readonly >
				<option value="Mobile Number" selected="selected">Mobile Number</option>
				<?php
				$sql = "SELECT mobile_no,name_value FROM users";
				$resultset = mysqli_query($link, $sql);
				while( $rows = mysqli_fetch_assoc($resultset) )
                                { 
				?>
				<option value="<?php echo $rows["mobile_no"]; ?>"><?php echo $rows["mobile_no"] . " : " . $rows["name_value"] ; ?></option>
				<?php }	?>
			</select>  
                        </div>
    
    <br>
    <br>
<div id="viewresponse"> </div> 


</div>
           </div><!--  -->
           </div>
                    </div><!-- comment -->
                </div><!-- comment -->
                </div>
            </div>
        </div>
             </div>
   

<?php


include (__ROOT__.'/admin/adminHF/footer_admin.php');
 ?>
    
</html>

<?php
  ob_end_flush();
?>