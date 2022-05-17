<?php
  ob_start();
?>

<?php
// Include config file
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/config.php');

?>

<?php
session_start(); // Initialize the session

     
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)  // Check if the user is already logged in
{ 
    header("location: /client/account.php");
    exit();
}



// Define variables and initialize with empty values
$mobile_no = $id= $name_value = $role = $password = "";
$mobile_no_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["mobile_no"]))){
        $mobile_no_err = "Please enter Mobile Number.";
    } else{
        $mobile_no = trim($_POST["mobile_no"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($mobile_no_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, mobile_no, name_value, role, password FROM users WHERE mobile_no = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_mobile_no);
            
            // Set parameters
            $param_mobile_no = $mobile_no;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if mobile number exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $mobile_no, $name_value, $role, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                       // $hash_pass = password_hash($password, PASSWORD_DEFAULT);
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            //session_start();
                            $loginto = trim($_SESSION["loginto"]);
                            //$logintocom = trim($_SESSION["logintocom"]);
                            //echo $logintopay;
                            //echo $logintocom;
                            //exit();
                            
                            // Store data in session variables
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["mobile_no"] = $mobile_no; 
                            $_SESSION["name_value"] = $name_value;
                            $_SESSION["role"] = $role;
                            
                           
                                                    
                            
                            if ($loginto == "regpay")
                            {header("location: ../client/activity/register_payment.php");}
                            
                            if ($loginto == "regcom")
                            {header("location: ../client/activity/register_complain.php");}
                            
                             if ($loginto == "")
                             {header("location: ../client/account.php");}
                            
                            
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid mobile_no or password.";
                            
                            
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid Mobile number or password.";
                }
            } else{
                //echo "Oops! Something went wrong. Please try again later.";
                header("location: error.php?errortype=5");
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
 include '../mainHF/header_login.php';
 ?>

    <div id="main-wrapper" class="container">
        <div class="row justify-content-center">
        
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
      
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                </div>
                                <h6 class="h5 mb-0">Welcome back!</h6>
                                <p class="mt-2 mb-5">Enter your mobile number and password to access your account panel.</br>In case you don't have an account yet? Create yours now by <span class="badge rounded-pill bg-primary">  <a class="btn btn-primary action-button" role="button" href="/client/register.php" target="_self">Signing Up</a></span></p>
                               
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-group mb-3">
                                        <label class="form-label text-secondary">Mobile Number</label><input class="form-control <?php echo (!empty($mobile_no_err)) ? 'is-invalid' : ''; ?>" type="text" required="" name="mobile_no" value="<?php echo $mobile_no; ?>">
                                        <span class="invalid-feedback"><?php echo $mobile_no_err; ?></span>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label text-secondary">Password</label><input class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" type="password" name="password" required="">
                                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                    </div>
                               <button class="btn btn-info mt-2" type="submit">Log In</button>
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