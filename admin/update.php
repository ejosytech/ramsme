<?php
  ob_start();
?>

<?php

// Include config file
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/config.php');
// Define variables and initialize with empty values
$name = $mobile_no = $phone = $avenue = $street = $email = $role =  $occupancy = $addinfo =  $effective_date = $sec_contr_dec21 = $infr_contr_dec21 = $infr_outst_dec21 = $sec_outst_dec21 = "";
$name_err = $phone_err = $avenue_err = $street_err = $email_err = $role_err = $occupancy_err = $addinfo_err = $location_err= "";

// Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
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
                    $plot_no = $row["plot_no"];
                    $avenue = $row["avenue"];
                    $street = $row["street"];
                    $email = $row["email"];
                    $occupancy = $row["occupancy"];
                    $no_rooms = $row["no_rooms"];
                    $addinfo = $row["addinfo"];
                    //
                    $effective_date = $row["effective_date"];
                    $sec_contr_dec21 = $row["sec_contr_dec21"];
                    $infr_contr_dec21 = $row["infr_contr_dec21"];
                    $sec_outst_dec21 = $row["sec_outst_dec21"];
                    $location = $row["location"];
                    // Capture current iamge name as $prev_location
                    $prev_location = $location;
                    //
                   
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php?errortype=accnt_select_err1");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
                    header("location: error.php?errortype=accnt_select_err2");
                    exit();
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
           // Close connection
   // mysqli_close($link);
    }
    
        
         
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"]))
{
    // Get hidden input value
    $id = $_POST["id"];
    
         //echo $id;
         //exit(); 
    
    // Validate phone
    $input_phone = trim($_POST["mobile_no"]);
    if(empty($input_phone)){
        $phone_err = "Please enter the Phone Number.";     
    } elseif(!ctype_digit($input_phone)){
        $phone_err = "Please enter a Number.";
    } else{
        $mobile_no = $input_phone;
    }
           
    // Validate name
    $input_name = trim($_POST["name_value"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name_value = $input_name;
    }
    
  
    
    //// Image File Processing Begin

    // Process Updated Image -start
        
        $imgFile = $_FILES['v_user_image']['name'];
        $tmp_dir = $_FILES['v_user_image']['tmp_name'];
        $imgSize = $_FILES['v_user_image']['size'];
                 
        if(empty($imgFile) || !isset($imgFile))
         {
         //Image File not selected, use exiting one saved as $prev_location
            $location = $prev_location;
         }
         else
        {
        //Image File selected, obtain new Image file 
        //Extract File Extension
         $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
          // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        //$imgFilename =  "img". $mobile_no ."." . $imgExt;
        $imgFilename =  $mobile_no ."-" . $_FILES['v_user_image']['name'];
        
         // allow valid image file formats
        if(in_array($imgExt, $valid_extensions))
        {   
        // Check file size '1MB'
        if($imgSize < 1000000)   
            {
            // Update New Image and Delete Previous Image 
            // Update New Image and assign to Database 
             move_uploaded_file($tmp_dir,"../upload/img/" . $imgFilename);			
	     $location = $imgFilename;
              //
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
                          //function_alert($message);
                          $location = $imgFilename;
                             }
                         else
                             {
                             header("location: error.php?errortype=image_type_err1");
                             exit();
                             }
            
            }
                }
        else{
           $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
           header("location: error.php?errortype=image_type_err");
           exit();
            }
        }
     // Validate Plot No
    $input_plot_no = trim($_POST["plot_no"]);
    if(empty($input_plot_no)){
        $plot_no_err = "Please enter your PLot No.";     
    } else{
        $plot_no = $input_plot_no;
    }     
   
     // Validate Avenue
    $input_avenue = trim($_POST["avenue"]);
    if(empty($input_avenue)){
        $avenue_err = "Please enter an Value for Avenue.";     
    } else{
        $avenue = $input_avenue;
    }
       
    // Validate Street
   $input_street = trim($_POST["street"]);
    if(empty($input_street)){
        $street_err = "Please enter an Value for Street.";     
    } else{
        $street = $input_street;
    }
    
    // Validate Email
   $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an Value for Email.";     
    } else{
        $email = $input_email;
    }
    
    // Validate Occupancy
   $input_occupancy = trim($_POST["occupancy"]);
    if(empty($input_occupancy)){
        $occupancy_err = "Please enter an Value for Occupancy.";     
    } else{
        $occupancy = $input_occupancy;
    }
    
     // Validate No of Rooms
   $input_no_rooms = trim($_POST["no_rooms"]);
    if(empty($input_no_rooms)){
        $occupancy_err = "Please enter an Value for the no of rooms.";     
    } else{
        $no_rooms = $input_no_rooms;
    }
    
       
    // Validate Additiional Information
   $input_addinfo = trim($_POST["addinfo"]);
    if(empty($input_addinfo)){
        $addinfo_err = "Please enter an Value for Additional Information.";     
    } else{
        $addinfo = $input_addinfo;
    }
    
    //Added 
     // Validate Effective_date
   $input_effective_date = trim($_POST["effective_date"]);
    if(empty($input_effective_date)){
        $effective_date_err = "Please enter an Effective_date.";     
    } else{
        $effective_date = $input_effective_date;
    }
     // Validate Security Contribution Made before Dec. 2021
   $input_sec_contr_dec21 = trim($_POST["sec_contr_dec21"]);
    if(empty($input_sec_contr_dec21)){
        $sec_contr_dec21_err = "Please enter Security Contribution Made before Dec. 2021 if any.";     
    } else{
        $sec_contr_dec21 = $input_sec_contr_dec21;
    }
    
       // Validate Infrastructure Contribution Made before Dec. 2021
   $input_infr_contr_dec21 = trim($_POST["infr_contr_dec21"]);
    if(empty($input_infr_contr_dec21)){
        $infr_contr_dec21_err = "Please enter Infrastructure Contribution Made before Dec. 2021 if any.";     
    } else{
        $infr_contr_dec21 = $input_infr_contr_dec21;
    }
    
    // Validate Security outstanding before Dec. 2021
   $input_sec_outst_dec21 = trim($_POST["sec_outst_dec21"]);
    if(empty($input_sec_outst_dec21)){
        $sec_outst_dec21_err = "Please enter Security outstanding before Dec. 2021 if any.";     
    } else{
        $sec_outst_dec21 = $input_sec_outst_dec21;
    }
    
 // Check input errors before inserting in database
     //
            echo  'mobile_no '.$mobile_no;
            echo 'name_value '.$name_value;
            echo 'plot_no '.$plot_no;
            echo 'avenue'.$avenue;
            echo 'street'.$street;
            echo 'email'.$email;
            echo 'occupancy'. $occupancy;
            echo 'no_rooms'. $no_rooms;
            echo 'role '.$role;
            echo 'effective_date '.$effective_date;
            echo 'sec_contr_dec21 '.$sec_contr_dec21;
            echo 'infr_contr_dec21 '.$infr_contr_dec21;
            echo 'sec_outst_dec21'. $sec_outst_dec21;
            //
             echo 'addinfo '.$addinfo;
             echo  'id '.$id;
           
           //exit();
    
        // Prepare an update statement
        $sql = "UPDATE users SET mobile_no=?, name_value=?,location=?,plot_no=?, avenue=?,street=?, email=?, occupancy=?, no_rooms=?, role=?, effective_date=?, sec_contr_dec21=?, infr_contr_dec21=?, sec_outst_dec21=?,  addinfo=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssissssssi", $param_mobile_no, $param_name,$param_location, $param_plot_no, $param_avenue, $param_street,$param_email, $param_occupancy, $param_no_rooms, $param_role, $param_effective_date, $param_sec_contr_dec21,$param_infr_contr_dec21, $param_sec_outst_dec21, $param_addinfo, $param_id);
            
            // Set parameters
            $param_mobile_no = $mobile_no;
            $param_name = $name_value;
            $param_location = $location;
            $param_plot_no = $plot_no;
            $param_avenue= $avenue;
            $param_street= $street;
            $param_email =$email;
            $param_occupancy = $occupancy;
            $param_no_rooms = $no_rooms;
            $param_role = $role;
            $param_effective_date = $effective_date;
            $param_sec_contr_dec21 = $sec_contr_dec21;
            $param_infr_contr_dec21 = $infr_contr_dec21;
            $param_sec_outst_dec21 = $sec_outst_dec21;
            
            $param_addinfo= $addinfo;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: admin_home.php");
                exit();
            } else{
                header("location: error.php");
                //echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    
    mysqli_close($link);
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
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($tempPath); 
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
    
    <div id="wrapper" class="container">
    <div class="row justify-content-center">
        
           <div class="row">
                <div class="col-md-10">
                    <h2 class="mt-5">Update Selected Member's Account</h2>
                    
                    
                    <form class="row g-3 was-validated"  action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" enctype="multipart/form-data" method="post">
                        
                        <div class="mb-3 row">
                             <label for="mobile_no" class="form-label"><b>Mobile Number</b></label>
                            <input type="text" name="mobile_no" class="form-control" value="<?php echo $mobile_no; ?>" readonly>
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div><!-- comment -->
                        
                        <div class="mb-3 row">
                        <label for="name_value" class="form-label"><b>Name</b></label>
                            <input type="text" name="name_value" class="form-control" value="<?php echo $name_value; ?>" readonly>
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        
                                                 
                         <div class="mb-3 row">
                            <label for="imgInp" class="form-label"><b>Passport</b></label>
                          
                            <?php if($location != ""): ?>
                            <p><img id="blah" src="../upload/img/<?php echo $location ; ?>" width="100px" height="100px" style="border:1px solid #333333;"></p>
			    <?php else: ?>
                             <p><img id="blah" src="../images/default.png" width="100px" height="100px"></p
			    <?php endif; ?>
                            <p> <input id="imgInp" class="form-control" type="file" name="v_user_image" accept="image/*"/></p>
                                                     
                        </div>
                        
                          <div class= "mb-3 row">
                            <label for="plot_no" class="form-label"><b>Plot No.</b></label>
                            <input type="text" name="plot_no" class="form-control" value="<?php echo $plot_no; ?>">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please Enter your Plot Number Correctly.</div>
                        </div>
                        
                         <div class= "mb-3 row">
                            <label for="avenue" class="form-label"><b>Avenue</b></label>
                            <input type="text" name="avenue" class="form-control " value="<?php echo $avenue; ?>">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please Enter your Avenue name (First or Second).</div>
                        </div>
                        
                         <div class= "mb-3 row">
                            <label for="street" class="form-label"><b>Street</b></label>
                            <input type="text" name="street" class="form-control" value="<?php echo $street; ?>">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please Enter your Street name (A close, B close...).</div>
                        </div>
                        
                        <div class= "mb-3 row">
                            <label for="email" class="form-label"><b>Email</b></label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please Enter your Email Correctly.</div>
                        </div>
                        
                       <div class="mb-3 row">  
                            <label for="occupancy" class="form-label"><b>Occupancy</b></label> 
                             <select name="occupancy"  class="form-select" aria-label="Default select example" >
                             <option selected = "<?php echo $occupancy; ?>" > <?php echo $occupancy; ?> </option>
                             <option value="landlord">Landlord</option>
                             <option value="tenant">Tenant</option>
                             <option value="tenant-special">Special Tenant</option>
                            </select>
                             <div class="valid-feedback">Valid.</div>
                             <div class="invalid-feedback">Please Enter your occupancy status e.g Landlord/Tenant.</div>
                        </div>
                        
                        <div class="mb-3 row">
                        <label><b>Occupancy: No of Rooms</b></label>
                        <input class="form-control" type='text' name="no_rooms" value="<?php echo $no_rooms; ?>" placeholder="No of Rooms" required>
                       <div class="valid-feedback">Valid.</div>
                       <div class="invalid-feedback">Please Enter the Amount Correctly.</div>
                        </div>
                        
                        <div class="mb-3 row">
                        <label><b>Date</b></label>
                        <input type="date" name="effective_date" class="form-control" value="<?php echo $effective_date; ?>">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please Enter your Effective Date Correctly.</div>
                        </div>
              
                        <div class="mb-3 row">
                        <label><b>Total Security Contribution Made as at December 2021</b></label>
                        <input class="form-control" type="text" name="sec_contr_dec21" value="<?php echo $sec_contr_dec21; ?>" placeholder="Total Security Contribution Made as at December 2021" required>
                       <div class="valid-feedback">Valid.</div>
                       <div class="invalid-feedback">Please Enter the Amount Correctly.</div>
                        </div>
                    
                        <div class="mb-3 row">
                            <label><b>Total Infrastructure Contribution Made as at December 2021</b></label>
                        <input class="form-control" type="text" name="infr_contr_dec21"  value="<?php echo $infr_contr_dec21; ?>" placeholder="Total Infracstructure Contribution Made as at December 2021" required>
                        <div class="valid-feedback">Valid.</div>
                       <div class="invalid-feedback">Please Enter the Amount Correctly.</div>
                        </div>
                        
                         <div class="mb-3 row">
                            <label><b>Total Security Outstanding as at December 2021</b></label>
                        <input class="form-control" type="text" name="sec_outst_dec21" value="<?php echo $sec_outst_dec21; ?>" placeholder="Total Security Outstanding as at December 2021" required>
                        <div class="valid-feedback">Valid.</div>
                       <div class="invalid-feedback">Please Enter the Amount Correctly.</div>
                        </div>
                    
                                                 
                         <div class="mb-3 row">  
                             <label for="addinfo"> <b>Additional Information: </br> * List of Dependants</br> * Ward's School Name </b></label>
                              <textarea class="form-control" name="addinfo" id="addinfo"  rows="4"><?php echo $addinfo; ?></textarea>
                              <div class="valid-feedback">Valid.</div>
                              <div class="invalid-feedback">Additional Information needed where necessary.</div>
                        </div>
                         <p></p>  
                         
                         
                         <div class="row">
                             <p><label class="form-label"> <b>Submit | Navigate</b> </label></p>
                          <div class="col">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Update">
                        <a href="/admin/admin_home.php" class="btn btn-primary">Back</a>
                            </div>
                            
                         </div>
                         
                                              
                     
                    </form>
                </div>
                
            </div>  
        </div> </div> 
     <p></p>
            
    
   <?php
 include 'adminHF/footer_admin.php';
 ?>
    
   </html>

<?php
  ob_end_flush();
?>