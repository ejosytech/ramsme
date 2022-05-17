<?php
  ob_start();
?>


<?php

// Include config file
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/config.php');

?>



<?php
// Initialize the session
session_start();
 
//Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: login.php");
   exit;
}
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 3){
        $new_password_err = "Password must have atleast 3 characters.";
        header("location: error.php?errortype=pass_size_err");
        exit();
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                //header("location: login.php");
                header("location: valid.php?successmsg=success_reset");
                //header("location: account.php");
               
                exit();
            } else{
                
                //echo "Oops! Something went wrong. Please try again later.";
                header("location: error.php?errortype=pass_reset_err");
                exit();
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">

        
 <?php
include '../mainHF/header_rst.php';
 ?>
    
    <div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">

         <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        
        <form class="row g-3 was-validated" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            
                      
               <div class="input-group mb-3">
                    <span class="input-group-text" id="new_password"><i class="fa fa-key rf-icon"></i></span>
                    <input type="password" name="new_password" class="form-control" placeholder="New password" aria-label="new_password" aria-describedby="new_password" required>
               </div>
                
                             
             <div class="input-group mb-3">
                 <span class="input-group-text" id="confirm_password"><i class="fa fa-key rf-icon"></i></span>
                 <input class="form-control" type="password" name="confirm_password"  placeholder="Confirm Password" aria-label="Confirm_password" aria-describedby="Confirm_password" required>
             </div>
            
           
            <p></p>
            
            <div class="row">
                             <p><label class="form-label"> <b>Submit | Navigate</b> </label></p>
                <div class="col">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link ml-2" href="account.php">Cancel</a>
                 </div>
             </div>
            
            
        </form>
        
         </div> 
    </div>  
        </div> 
                           </div> 
                       </div> 
                   </div> 
               
 <?php
 
 
include '../mainHF/footer.php';

 
 ?>
    
</html>

<?php
  ob_end_flush();
?>