<?php

// Include config file
define('__ROOT__', dirname(dirname(__FILE__,2)));
require_once(__ROOT__.'/config.php');

// Define variables and initialize with empty values
$name = $mobile_no = $role = $service = $remark = $attachment = $pay_date = $amount="";
$name_err = $mobile_no_err = $complain_err = $attachment_err= $date_err = "";
 
// Display Exist Content
session_start(); // Initialize the session
$_SESSION["loginto"] = "regpay";

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)// Check if the user is logged in, if not then redirect him to login page
{
    header("location: /client/login.php");
    exit();
}

$_SESSION["loginto"] = "";

// Display Previous Record Content
 // Prepare a select statement


    $sql = "SELECT * FROM users WHERE mobile_no = ?";

             
      if($stmt = mysqli_prepare($link, $sql))
      {
              // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_mobile_no);
        
        // Set parameters
        $param_mobile_no = trim($_SESSION["mobile_no"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                // Retrieve individual field value
                  
                    $name_value = $row["name_value"];
                    $mobile_no = $row["mobile_no"];
                    $role = $row["role"];
                                        
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
           // Close connection
   // mysqli_close($link);
                  
// Processing form data when form is submitted
if(isset($_POST["mobile_no"]) && !empty($_POST["mobile_no"]))
{        
    // Validate phone
    $input_phone = trim($_POST["mobile_no"]);
    if(empty($input_phone)){
        $phone_err = "Please enter the Phone Number.";     
    } elseif(!ctype_digit($input_phone)){
        $phone_err = "Please enter a Number.";
    } else{
        $mobile_no = $input_phone;
    }
     
    // Validate amount
    $input_amount = trim($_POST["amount"]);
    if(empty($input_amount)){
        $amount_err = "Please enter the amount paid.";
    }  else{
        $amount = $input_amount;
    }
    
     // Validate service
    $input_service = trim($_POST["service"]);
    if(empty($input_service)){
        $service_err = "Please enter the amount paid.";
    }  else{
        $service = $input_service;
    }
    
    // Validate name
    $input_remark = trim($_POST["remark"]);
    if(empty($input_remark)){
        $remark_err = "Please enter your Remark.";
    } elseif(!filter_var($input_remark, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $remark_err = "Please enter a valid Remark.";
    } else{
        $remark = $input_remark;
    }
    
    //// Immage File Processing Begin
        $docFile = $_FILES['user_doc']['name'];
        $tmp_dir = $_FILES['user_doc']['tmp_name'];
        $docSize = $_FILES['user_doc']['size'];
        
                             
        if(empty($docFile))
         {
            $errMSG = "Please Select Document File.";
         }
         else
        {
      
         // echo $upload_dir;
         $docExt = strtolower(pathinfo($docFile,PATHINFO_EXTENSION)); // get image extension
  
        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf','doc', 'docx', 'rtf', 'txt'); // valid extensions
        
        $docFilename =  "doc" . $mobile_no . $docFile;
           
        // allow valid image file formats
        if(in_array($docExt, $valid_extensions))
        {   
        // Check file size '5MB'
        if($docSize < 5000000)   
            {
             move_uploaded_file($tmp_dir,"upload/doc/" . $docFilename);			
	     $attachment = $docFilename;
            }
            else
            {
            $errMSG = "Sorry, your file is too large.";
            }
                }
        else{
           $errMSG = "Sorry, only JPG, JPEG, PNG , GIF 'PDF',DOC & DOCX files are allowed.";  
            }
        }
                                                        
        //
   
     // Validate Date
    $input_date = trim($_POST["pay_date"]);
    if(empty($input_date)){
        $date_err = "Please enter an Value for the Date.";     
    } else{
        $pay_date = $input_date;
    }
    
    //
    
    $pay_channel = 'others';
    
                
         $sql = "INSERT INTO payments (mobile_no,name_value, pay_date, amount, pay_channel, service, attachment,remark) VALUES (?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_mobile_no,$param_name_value, $param_date, $param_amount, $param_pay_channel, $param_service, $param_attachment,$param_remark );
            
            // Set parameters
            $param_mobile_no = $mobile_no;
            $param_name_value = $name_value;
            $param_date = $pay_date;
            $param_amount = $amount;
            $param_pay_channel = $pay_channel;
            $param_service = $service;
            $param_attachment = $attachment;
            $param_remark = $remark;
            //
      
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                //header("location: /index.php");
                header('Location: ' . '/client/account.php');
                exit();
            } 
            else
            {
                // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    //echo "Oops! Something went wrong. Please try again later.";
                    exit();
               
            }

            // Close statement
            mysqli_stmt_close($stmt);
            // Close connection
            mysqli_close($link);
        }
    
  
}
?>

 <!DOCTYPE html>
<html lang="en">

 <?php
  if ($role === "admin")
  {
      include (__ROOT__.'/admin/adminHF/header_admin.php');
  }
 else {
      include '../clientHF/header_client.php';
  }  
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
                    
                    <h2 class="mt-5">Register Your Payments Here</h2>
                     <h2 class="mt-5"></h2>
                    <form class="row g-3 was-validated" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" enctype="multipart/form-data" method="post">
                          
                        <div class="form-group">
                            <label><b>Mobile Number</b></label>
                            <input type="text" name="mobile_no" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mobile_no; ?>" readonly>
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div><!-- comment -->
                        
                        <div class="form-group">
                            <label><b>Name</b></label>
                            <input type="text" name="name_value" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name_value; ?>" readonly>
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        
                              <!-- comment -->
                        <div class="form-group">
                            <label><b>Date</b></label>
                            <input id="complaindate" type="date" name="pay_date" class="form-control" required="">
                            <span class="invalid-feedback"><?php echo $date_err;?></span>
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please Enter Today's Date</div>
                   
                       </div>
                        
                        <div class="form-group">
                        <label><b>Amount Paid</b></label>
                        <div class="input-group mb-3">
                           <span class="input-group-text">=N=</span>
                            <input type="number" name="amount" class="form-control" aria-label="Amount (to the nearest Naira)"  required>
                            <span class="input-group-text">.00</span>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please Enter the Amount Involved: Only numbers allowed, no decimal or comma please.</div>
                   
                        </div>
                        </div>
                        
                                          
                <div class="form-group">
                <label><b>Specify what payment is meant for: Security/Infrastructure</b></label>
                <select name="service"  class="form-select" aria-label="Default select example"  placeholder="Specify what payment is meant for" required >
                    <option selected="security">Security</option>
                    <option value="security">Security</option>
                    <option value="infrastructure">Infrastructure</option>
                </select>
                <span class="invalid-feedback"><?php echo $occupancy_err; ?></span>
         
                </div> 
                        
                      
                        
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="form-label"><b>Additional Information: Remarks/Comments </b> </label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" name = "remark" rows="4" required></textarea>
                            
                        </div>
                        
                        
                                                
                         
                        <div class="mb-3">
                        <label for="formFile" class="form-label"><b>Attachment: Support Document </b></label>
                        <input class="form-control" type="file" id="imgInp" name="user_doc">
                        <p><a id="blah" href="" target ="_blank">view uploaded file</a></p> 
                        
                        </div>
                        
                        
                                              
                    <div class="form-group">
                            <div class ="row">
                                <p><label> <b>Submit | Navigate</b> </label></p>
                            <div class="col">
                         <input type="submit" class="btn btn-primary" value="Submit"> |
                         <a href="/client/account.php" class="btn btn-secondary">Cancel</a>
                            </div>
                                    </div><!-- comment -->
                     </div>
                      
                    </form>
                </div>
                
            </div>  
            
                     </div>
    </div>
                </div><!-- comment -->
            </div><!-- comment -->
            </div>
    </div>
    </div>
    
     <footer class="footer_area section_padding_130_0">
      <div class="container" >
        <div class="row">
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Footer Logo-->
              <div class="footer-logo mb-3"></div>
              <p>Residents Association of Ministry of Mines and Steel MidHill Estate Managment Suites.</p>
              
              <div class="copywrite-text mb-5">
                <p class="mb-0">Made with <i class="lni-heart mr-1"></i>by<a class="ml-1" href="https://ejosytechconsult.com"> Ejosy Tech Consult Ltd</a></p>
              </div>
              <!-- Footer Social Area-->
              <div class="footer_social_area"><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype"><i class="fa fa-skype"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></div>
            </div>
          </div>
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">About</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="about_us.php">About Us</a></li>
                  <li><a href="#">Terms &amp; Policy</a></li>
                  <li><a href="#">Community</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">Support</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="#">Help</a></li>
                  <li><a href="#">Support</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  </ul>
              </div>
            </div>
          </div>
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">Contact</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="#">Contact Us</a></li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
         
      </div>
    </footer>
   
    <script>
            imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                        blah.href = URL.createObjectURL(file)
         
                        }
              
            }
            </script>
            <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</body>
       
   
        <!-- comment -->
    
    
    
</html>

