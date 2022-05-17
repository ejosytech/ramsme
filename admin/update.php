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
                    $plot_no = $row["plot_no"];
                    $avenue = $row["avenue"];
                    $street = $row["street"];
                    $email = $row["email"];
                    $occupancy = $row["occupancy"];
                    $role = $row["role"];
                    $addinfo = $row["addinfo"];
                    $effective_date = $row["effective_date"];
                    $sec_contr_dec21 = $row["sec_contr_dec21"];
                    $infr_contr_dec21 = $row["infr_contr_dec21"];
                    $sec_outst_dec21 = $row["sec_outst_dec21"];
                    
                    
                   
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                header("location: error.php");
                //echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
   
    
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
    
       // Validate Plot No
    $input_plot_no = trim($_POST["plot_no"]);
    if(empty($input_plot_no)){
        $plot_no_err = "Please enter Your Plot No.";     
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
    
    // Validate Role
   $input_role = trim($_POST["role"]);
    if(empty($input_role)){
        $role_err = "Please enter an Value for Role.";     
    } else{
        $role = $input_role;
    }
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
    
         
    // Validate Additional Information
   $input_addinfo = trim($_POST["addinfo"]);
    if(empty($input_addinfo)){
        $addinfo_err = "Please enter an Value for Additional Information.";     
    } else{
        $addinfo = $input_addinfo;
    }
    
    // Check input errors before inserting in database
    
        // Prepare an update statement
        $sql = "UPDATE users SET mobile_no=?, name_value=?,plot_no=?, avenue=?,street=?, email=?, occupancy=?, role=?, effective_date=?, sec_contr_dec21=?, infr_contr_dec21=?, sec_outst_dec21=?,  addinfo=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssssi", $param_mobile_no, $param_name,$param_plot_no, $param_avenue, $param_street,$param_email, $param_occupancy, $param_role, $param_effective_date, $param_sec_contr_dec21,$param_infr_contr_dec21, $param_sec_outst_dec21, $param_addinfo, $param_id);
            
            // Set parameters
            $param_mobile_no = $mobile_no;
            $param_name = $name_value;
            $param_plot_no = $plot_no;
            $param_avenue= $avenue;
            $param_street= $street;
            $param_email =$email;
            $param_occupancy = $occupancy;
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
    
    
    // Close connection
    mysqli_close($link);
}



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

                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label><b>Mobile Number</b></label>
                            <input type="text" name="mobile_no" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mobile_no; ?>" readonly>
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div><!-- comment -->
                        
                        <div class="form-group">
                            <label><b>Name</b></label>
                            <input type="text" name="name_value" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name_value; ?>" >
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        
                         <div class="form-group">
                            <label><b>Plot No.</b></label>
                            <input type="text" name="plot_no" class="form-control <?php echo (!empty($plot_no_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $plot_no; ?>">
                            <span class="invalid-feedback"><?php echo $plot_no_err;?></span>
                        </div>
                        
                                               
                        <div class="form-group">
                            <label><b>Avenue</b></label>
                            <input type="text" name="avenue" class="form-control <?php echo (!empty($avenue_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $avenue; ?>">
                            <span class="invalid-feedback"><?php echo $avenue_err;?></span>
                        </div>
                        <div class="form-group">
                            <label><b>Street</b></label>
                            <input type="text" name="street" class="form-control <?php echo (!empty($street_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $street; ?>">
                            <span class="invalid-feedback"><?php echo $street_err;?></span>
                        </div>
                        
                        <div class="form-group">
                            <label><b>Email</b></label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        
                        <div class="form-group">
                            <label><b>Occupancy</b></label>
                             <select name="occupancy"  class="form-select" aria-label="Default select example" >
                             <option selected = "<?php echo $occupancy; ?>" > <?php echo $occupancy; ?> </option>
                             <option value="landlord">Landlord</option>
                             <option value="tenant">Tenant</option>
                             <option value="tenant-special">Special Tenant</option>
                            </select>
                             <span class="invalid-feedback"><?php echo $occupancy_err; ?></span>
                        </div>
                        
                        <div class="form-group">
                            <label><b>Role</b></label>
                             <select name="role"  class="form-select" aria-label="Default select example" >
                             <option selected = "<?php echo $role; ?>" > <?php echo $role; ?> </option>
                             <option value="client">Client</option>
                             <option value="admin">Admin</option>
                            </select>
                             <span class="invalid-feedback"><?php echo $role_err; ?></span>
                        </div>
                        
                        <div class="form-group">
                        <label><b>Date</b></label>
                        <input type="date" name="effective_date" class="form-control <?php echo (!empty($effective_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $effective_date; ?>">
                        <span class="invalid-feedback"><?php echo $effective_date_err;?></span>
                        </div>
              
                        <div class="form-group">
                            <label><b>Total Security Contribution Made as at December 2021</b></label>
                        <input class="form-control rf-input-field" type="text" name="sec_contr_dec21" class="form-control <?php echo (!empty($sec_contr_dec21_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $sec_contr_dec21; ?>" placeholder="Total Security Contribution Made as at December 2021" required>
                        <span class="invalid-feedback"><?php echo $sec_contr_dec21_err; ?></span>
                        </div>
                    
                        <div class="form-group">
                            <label><b>Total Infrastructure Contribution Made as at December 2021</b></label>
                        <input class="form-control rf-input-field" type="text" name="infr_contr_dec21" class="form-control <?php echo (!empty($infr_contr_dec21_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $infr_contr_dec21; ?>" placeholder="Total Infracstructure Contribution Made as at December 2021" required>
                        <span class="invalid-feedback"><?php echo $infr_contr_dec21_err; ?></span>
                        </div>
                        
                         <div class="form-group">
                            <label><b>Total Security Outstanding as at December 2021</b></label>
                        <input class="form-control rf-input-field" type="text" name="sec_outst_dec21" class="form-control <?php echo (!empty($sec_outst_dec21_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $sec_outst_dec21; ?>" placeholder="Total Security Outstanding as at December 2021" required>
                        <span class="invalid-feedback"><?php echo $sec_outst_dec21_err; ?></span>
                        </div>
                    
                                                
                        
                         <div class="form-group">
                            <label><b>Additional Information</b></label>
                            <textarea  name="addinfo" class="form-control <?php echo (!empty($addinfo_err)) ? 'is-invalid' : ''; ?>" ><?php echo $addinfo; ?> </textarea>
                            <span class="invalid-feedback"><?php echo $addinfo_err;?></span>
                        </div>
                        
                        <div class="form-group">
                            <p><label><b> Update | Navigate</b> </label></p>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Update">
                        <a href="/admin/admin_home.php" class="btn btn-primary">Back</a>
                        </div>
                    </form>
                    
        </div><!-- comment -->
        </div>
        </div></div></div></div>        
<script>
            imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                        blah.src = URL.createObjectURL(file)
                      
                        }
        
            }
            </script>
     
   
 
 <?php
 include 'adminHF/footer_admin.php';
 ?>
    
</html>

<?php
  ob_end_flush();
?>