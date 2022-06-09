<?php
  ob_start();
?>

<?php

// Include config file
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/config.php');


// Define variables and initialize with empty values
$mobile_no = $plot_no =  $name_value= $occupancy = $location = $email= $avenue = $street = $password = $confirm_password = "";
$mobile_no_err = $name_err = $location_err = $email_err= $avenue_err = $street_err = $password_err = $confirm_password_err = "";

?>


<?php
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")

{    
    // Validate Mobile Number
    if(empty(trim($_POST["mobile_no"]))){
        $mobile_no_err  = "Please enter a mobile number.";
    } elseif (!ctype_digit(trim($_POST["mobile_no"])))
    {
        $mobile_no_err = "Mobile Number can only contain letters, and numbers.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE mobile_no = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_mobile_no);
            
            // Set parameters
            $param_mobile_no = trim($_POST["mobile_no"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    //$mobile_no_err = "This mobile number is already taken.";
                    header("location: error.php?errortype=mobile_no_err");
                    exit();
                } else{
                    $mobile_no = trim($_POST["mobile_no"]);
                }
            } else{
                //echo "Oops! Something went wrong. Please try again later.";
                header("location: error.php?errortype=select_sql_exe_err");
                exit();
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
      // Validate name
    if(empty(trim($_POST["name_value"]))){
        $name_err = "Please enter your Name.";
    } elseif(!filter_var(trim($_POST["name_value"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
        $name_err = "Name can only contain letters, numbers, and underscores.";
    } else{
        $name_value = trim($_POST["name_value"]);
    }
    
     // Validate occupancy
    if(empty(trim($_POST["occupancy"]))){
        $occupancy_err = "Please select the occupancy that applies";
    } elseif(!filter_var(trim($_POST["occupancy"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
        $occupancy_err = "Occupancy should either be Landlord, Tenant or Tenant [Special]";
    } else{
        $occupancy = trim($_POST["occupancy"]);
         }
       
    
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL))
    {
        $email_err = "Email can only contain letters, numbers, and underscores.";
    } else{
        $email = trim($_POST["email"]);
    }
     // Validate Plot No.
    if(empty(trim($_POST["plot_no"]))){
        $plot_no_err = "Please enter your Plot Number";
    } elseif(!filter_var(trim($_POST["plot_no"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/"))))
    {
        $plot_no_err = "Plot no can only contain letters, numbers, and underscores.";
    } else{
        $plot_no = trim($_POST["plot_no"]);
    }
    
    // Validate Avenue
    if(empty(trim($_POST["avenue"]))){
        $avenue_err = "Please enter an Avenue Address.";
    } elseif(!filter_var(trim($_POST["avenue"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/"))))
    {
        $avenue_err = "Avenue can only contain letters, numbers, and underscores.";
    } else{
        $avenue = trim($_POST["avenue"]);
    }
    // Validate Street
    if(empty(trim($_POST["street"]))){
        $street_err = "Please enter  Street Address.";
    } elseif(!filter_var(trim($_POST["street"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/"))))
    {
        $street_err = "Street can only contain letters, numbers, and underscores.";
    } else{
        $street = trim($_POST["street"]);
    }
       
    //// Immage File Processing Begin
        $imgFile = $_FILES['v_user_image']['name'];
        $tmp_dir = $_FILES['v_user_image']['tmp_name'];
        $imgSize = $_FILES['v_user_image']['size'];
          
        if(empty($imgFile))
         {
            $errMSG = "Please Select Image File.";
         }
         else
        {
        // echo $upload_dir;
         $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
         // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $imgFilename =  $mobile_no ."-" . $_FILES['v_user_image']['name'];;
        // allow valid image file formats
        if(in_array($imgExt, $valid_extensions))
        {   
                    // Check file size '1MB'
                    if($imgSize < 1000000)   
                        {
                         move_uploaded_file($tmp_dir,"../upload/img/" . $imgFilename);			
                         $location = $imgFilename;

                        }
                        else
                        {
                        //$errMSG = "Sorry, your file is too large. Maximum of 1MB allowed.";
                        //header("location: error.php?errortype=image_size_err");
                         
                         // $compressedImage = compress_image($tempPath, $originalPath, $imageQuality);
                         //  $imageQuality Declared in the config.php file 
                         $compressedImage = compress_image($tmp_dir, "../upload/img/" . $imgFilename, $imageQuality);
                         if($compressedImage)
                             {
                          $message = "Image was compressed and uploaded to server";   
                          function_alert($message);
                          $location = $imgFilename;
                             }
                         else
                             {
                             header("location: error.php?errortype=image_type_err1");
                             exit();
                             }

                        }
         }
        else
        {
           $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
           header("location: error.php?errortype=image_type_err");
           exit();
            }
        }
 
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 4){
        $password_err = "Password must have atleast 4 characters.";
        header("location: error.php?errortype=pass_size_err");
        exit();
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else
    {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password))
        {
            $confirm_password_err = "Password did not match.";
        }
    }
    
    
    // Check input errors before inserting in database
            
        // Prepare an insert statement
        $sql = "INSERT INTO users (mobile_no, name_value, location, occupancy, email, plot_no, avenue, street, password) VALUES (?,?,?,?,?,?,?,?,?)";
       
       try {
            
          if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_mobile_no, $param_name, $param_location, $param_occupancy, $param_email,$param_plot_no, $param_avenue, $param_street, $param_password);
            
            // Set parameters
            $param_mobile_no = $mobile_no;
            $param_name = $name_value;
            $param_location = $location;
            $param_occupancy = $occupancy;
            $param_email = $email;
            $param_plot_no = $plot_no;
            $param_avenue = $avenue;
            $param_street = $street;               
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
          //
       
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                 //header("location: valid.php?successmsg=success_reg");
                //header("location: login.php");
                 
                 // INITIALIZE pay_sec_update for if Landloard 
                 
                 initialize_pay_sec_update_sec($link,$occupancy,$mobile_no,$name_value);
                 initialize_pay_sec_update_infr($link,$occupancy,$mobile_no,$name_value);
                
                 exit();
            } 
            else
            {
                 header("location: error.php?errortype=insert_sql_err1");
                 exit();
                 //echo "Oops! Something went wrong. Please try again later.";
            }
                    // Close statement
            mysqli_stmt_close($stmt);
        }
        
       
    
    } 
            catch (Exception $ex) 
            { //echo 'Message: ';
                header("location: error.php?errortype=insert_sql_err2");
                exit();
            }

   
   
        
        // Close connection
    mysqli_close($link);
} 

function initialize_pay_sec_update_sec($linkx,$occupancyx,$mobile_nox,$name_valuex)
{
           $sql = "INSERT INTO pay_sec_update (mobile_no, pay_date, name_value, amount, service, attachment,remark) VALUES (?,?,?,?,?,?,?)";
         
        if($stmtx = mysqli_prepare($linkx, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmtx, "sssssss", $param_mobile_no, $param_date,$param_name, $param_amount, $param_service, $param_attachment,$param_remark );
       
            // Set parameters
            $param_mobile_no = $mobile_nox;
            $param_name = $name_valuex;
            $param_date = "";
            $param_amount = 0;
            $param_service = "security";
            $param_attachment = "";
           $param_remark = "initiation";
            //
      
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmtx))
            {
               //header("location: valid.php?successmsg=success_reg");
               
                } 
            else
            {
                // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php?errortype=insert_sql_err1");
                    //echo "Oops! Something went wrong. Please try again later.";
                    exit();
               
            }

            // Close statement
            mysqli_stmt_close($stmtx);
            }
        }          


function initialize_pay_sec_update_infr($linkx,$occupancyx,$mobile_nox,$name_valuex)
{
           if ($occupancyx == "landlord")
        {
            $sql = "INSERT INTO pay_sec_update (mobile_no, pay_date, name_value, amount, service, attachment,remark) VALUES (?,?,?,?,?,?,?)";
         
        if($stmtx = mysqli_prepare($linkx, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmtx, "sssssss", $param_mobile_no, $param_date,$param_name, $param_amount, $param_service, $param_attachment,$param_remark );
       
            // Set parameters
            $param_mobile_no = $mobile_nox;
            $param_name = $name_valuex;
            $param_date = "";
            $param_amount = 0;
            $param_service = "infrastructure";
            $param_attachment = "";
           $param_remark = "initiation";
            //
      
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmtx))
            {
               header("location: valid.php?successmsg=success_reg");
               
                } 
            else
            {
                // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php?errortype=insert_sql_err1");
                    //echo "Oops! Something went wrong. Please try again later.";
                    exit();
               
            }

            // Close statement
            mysqli_stmt_close($stmtx);
            }
        }          
}

// Function defnition
function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}

function compress_image($tempPath, $originalPath, $imageQuality)
{
  
    // Get image info 
    $imgInfo = getimagesize($tempPath); 
    $mime = $imgInfo['mime']; 
     
    // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($tempPath); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($tempPath); 
        case 'image/gif': 
            $image = imagecreatefromgif($tempPath); 
            break; 
            break; 
        default: 
            $image = imagecreatefromjpeg($tempPath); 
    } 
     
    // Save image 
    imagejpeg($image, $originalPath, $imageQuality);    
    // Return compressed image 
    return $originalPath; 
}
?>
 
<!DOCTYPE html>
<html lang="en">
    
<?php
include '../mainHF/header_reg.php';
 ?>
        
    <div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
    
        <form class="row g-3 was-validated" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post">
             <h2>Register a New Account</h2>
            <p>Please fill this form to create an account.</p>
            
             <div class="mb-3 row">
                  <label for="mobile_no" class="form-label"><b>Mobile Number</b></label>
                <input class="form-control " type="number" id="mobile_no"  name="mobile_no" class="form-control"  placeholder="Mobile Number" required>
                   <div class="valid-feedback">Valid.</div>
                   <div class="invalid-feedback">Please Enter your Mobile Number e.g 08012345678.</div>
                 </div>
                                      
            
            <div class="mb-3 row">
                <label for="name_value" class="form-label"><b>Name</b></label>
                <input class="form-control" type="text" name="name_value" class="form-control" placeholder="Name" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your full name e.g Ngige Osinbanjo Buhari.</div>
            </div>
            
            <div class="mb-3 row">
                <label for="imgInp" class="form-label"><b>Passport</b></label>
                            
                            <p><img id="blah" src="../images/default.png" width="100px" height="100px" style="border:1px solid #333333;"><p>
                            <p><input id="imgInp" class="form-control" type="file" name="v_user_image" accept="image/*"   /></p>
                            
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please Browse and insert a recent passport image of yourself.</div>
                                       
             </div>
                     
            
            <div class="mb-3 row">  
                  <label for="occupancy" class="form-label"><b>Occupancy</b></label>            
                 <select name="occupancy" id ="occupancy" class="form-select"  required>
                    <option selected ="landlord">landlord</option>
                    <option value="landlord">landlord</option>
                    <option value="tenant">tenant</option>
                    <option value="tenant-special">special-tenant</option>
                </select>
                   <div class="valid-feedback">Valid.</div>
                   <div class="invalid-feedback">Please Enter your occupancy status e.g Landlord/Tenant.</div>
             </div>     
           
            <div class= "mb-3 row">
                <label for="email" class="form-label"><b>Email</b></label>
                <input class="form-control is-invalid" type="email" name="email" class="form-control" placeholder="Email" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your Email Correctly.</div>
            </div>
            
            <div class= "mb-3 row">
                <label for="plot_no" class="form-label"><b>Plot No.</b></label>
                <input class="form-control rf-input-field" type="text" name="plot_no" class="form-control" placeholder="Plot Number" >
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your Plot Number Correctly.</div>
            </div>
            
            <div class= "mb-3 row">
                <label for="avenue" class="form-label"><b>Avenue</b></label>
                <input class="form-control rf-input-field" type="text" name="avenue" class="form-control" placeholder="Avenue" >
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your Avenue name (First or Second).</div>
            </div>
            
            <div class= "mb-3 row">
                <label for="street" class="form-label"><b>Street</b></label>
                <input class="form-control" type="text" name="street" class="form-control" placeholder="Street" >
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your Street name (A close, B close...).</div>
            </div>
            
            <div class= "mb-3 row">
                <label for="password" class="form-label"><b>Password</b></label>
                </i><input class="form-control" type="password" name="password" class="form-control" placeholder="Password: must be more than three characters" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your password.The Password must be more than three characters</div>
            </div>
            
             <div class= "mb-3 row">
                <label for="confirm_password" class="form-label"><b>Confirm Password</b></label>
                 <input class="form-control" type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your password. It must be the same as above</div>
            </div>
            
            <p></p>
            
            
                
                <div class="row">
                             <p><label class="form-label"> <b>Submit | Navigate</b> </label></p>
                              <div class="col">
                              <input type="submit" class="btn btn-primary" value="Submit">
                              <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                              <a href="login.php" class="btn btn-primary">Cancel</a>
                              </div> 
                             </div> 
            </form>
                    
                    </div>
        
    </div>
                        
                        
        </div>  
        </div> 
           
         </div>  
        </div> 
       
   
   <script>
            imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
              blah.src = URL.createObjectURL(file)
              
                        }
         
            }
            </script>
    
 <?php
include '../mainHF/footer.php';
 ?>
    
</html>

<?php
  ob_end_flush();
?>