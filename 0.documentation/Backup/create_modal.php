<?php
  ob_start();
?>


<?php


// Define variables and initialize with empty values
$mobile_no = $location = $sec_outst_dec21= $plot_no = $name_value= $addinfo = $occupancy = $role = $email= $avenue = $street = $password = $confirm_password = $effective_date =$infr_contr_dec21 = $sec_contr_dec21 = $infr_outst_dec21 = $sec_outst_dec21 = "";
$mobile_no_err = $name_err = $role_err = $addinfo_err = $email_err= $avenue_err = $street_err = $password_err = $confirm_password_err = "";
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary align-items-lg-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Add New Record 
</button>
<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register a New Account.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
          <form class="row g-3 was-validated" method="post" action="create.php"  enctype="multipart/form-data">
                        
             <div class="mb-3">
                <input class="form-control rf-input-field" type="number" name="mobile_no" class="form-control <?php echo (!empty($mobile_no_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mobile_no; ?>" placeholder="Mobile Number" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your Mobile Number e.g 08012345678.</div>
             </div>
                          
            <div class="mb-3">
                <input class="form-control rf-input-field" type="text" name="name_value" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name_value; ?>" placeholder="Name" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your full name e.g Ngige Osinbanjo Buhari.</div>
            </div>
              
               <div class="mb-3">
                </i><input class="form-control rf-input-field" type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Password" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your password.</div>
            </div>
              
             <div class="mb-3">
                </i><input class="form-control rf-input-field" type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" placeholder="Confirm Password" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your password. It must be the same as above</div>
            </div>
            
           <div class="mb-3">
                <img id="blah" src="../images/default.png"  width="100px" height="100px"/>
                <input class="form-control" id="imgInp"  type="file" name="v_user_image" accept="image/*" >
              
            </div>
            
          <div class="mb-3"> 
                              
                 <select name="occupancy"  class="form-select" aria-label="Default select example"  required>
                     <option selected =""></option>
                    <option value ="landlord">Occupancy - Landlord</option>
                    <option value="tenant">Occupancy - Tenant</option>
                    <option value="tenant-special">Occupancy - Special Tenant</option>
                </select>
                 <div class="valid-feedback">Valid.</div>
                   <div class="invalid-feedback">Please Enter your occupancy status e.g Landlord/Tenant.</div>
         
             </div>  
              
          <div class="mb-3"> 
                              
                 <select name="role"  class="form-select" aria-label="Default select example" >
                    <option selected ="client">Role - Client</option>
                    <option selected ="client">Role - Client</option>
                    <option value="admin">Role - Admin</option>
                 </select>
                <div class="valid-feedback">Valid.</div>
                   <div class="invalid-feedback">Please Enter your role- admin/client.</div>
         
             </div>  
            <div class="mb-3">
                <input class="form-control rf-input-field" type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Email" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your Email.</div>
            </div>
              <div class="mb-3">
                <input class="form-control rf-input-field" type="text" name="plot_no" class="form-control <?php echo (!empty($plot_no_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $plot_no; ?>" placeholder="Plot Number">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your Plot No.</div>
            </div>
            <div class="mb-3">
                <input class="form-control rf-input-field" type="text" name="avenue" class="form-control <?php echo (!empty($avenue_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $avenue; ?>" placeholder="Avenue" >
                <div class="valid-feedback">Valid.</div>
                   <div class="invalid-feedback">Please Enter your Avenue.</div>
            </div>
            <div class="mb-3">
                <input class="form-control rf-input-field" type="text" name="street" class="form-control <?php echo (!empty($street_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $street; ?>" placeholder="Street" >
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter your Street.</div>
            </div>
              
             <div class="mb-3">
            
              <label><b>Date</b></label>
              <input type="date" name="effective_date" class="form-control <?php echo (!empty($effective_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $effective_date; ?>">
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please Enter Effect Date of Occupation.</div>
            </div>
              
              <div class="mb-3">
                <input class="form-control rf-input-field" type="text" name="sec_contr_dec21" class="form-control <?php echo (!empty($sec_contr_dec21_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $sec_contr_dec21; ?>" placeholder="Total Security Contribution Made as at December 2021" >
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter Total Security Contribution Made as at December 2021.</div>
            </div>
              
            <div class="mb-3">
                <input class="form-control rf-input-field" type="text" name="infr_contr_dec21" class="form-control <?php echo (!empty($infr_contr_dec21_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $infr_contr_dec21; ?>" placeholder="Total Infrastructure Contribution Made as at December 2021">
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter Total Infrastructure Contribution Made as at December 2021.</div>
            </div>
              
              <div class="mb-3">
                <input class="form-control rf-input-field" type="text" name="sec_outst_dec21" class="form-control <?php echo (!empty($sec_outst_dec21_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $sec_outst_dec21; ?>" placeholder="Total Security outstanding as at December 2021">
                <div class="invalid-feedback">Please Enter Total Security Outstanding as at December 2021.</div>
            </div>
              
                        
            <div class="mb-3">
                <label><b>Additional Information: </br> * List of Dependants,</br> * Ward's School Name  </b></label>
                <textarea class="form-control rf-input-field"  name="addinfo" class="form-control <?php echo (!empty($addinfo_err)) ? 'is-invalid' : ''; ?>"  placeholder="Additional Information"nfo; ?></textarea>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please Enter Additional Information [Optional].</div>
            </div>
            
                        
           <div class="mb-3">
                <p></p>
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                <a href="/admin/admin_home.php" class="btn btn-primary">Back</a>
            </div>       
          
          </form>  
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <!--  <button type="button" class="btn btn-primary">Save changes</button> -->
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
