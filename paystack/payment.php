<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/config.php');

//$mobile_no =  $name_value =  $email = $avenue = $street = $role = $amount= "";

session_start(); // Initialize the session
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)// Check if the user is logged in, if not then redirect him to login page
{
    header("location: /client/login.php");
    exit();
}

    // Prepare a select statement
    $sql = "SELECT * FROM users WHERE mobile_no = ?";

             
      if($stmt = mysqli_prepare($link, $sql))
      {
              // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_mobile_no);
        
        // Set parameters
        $param_mobile_no = trim(  $_SESSION["mobile_no"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $mobile_no = $row["mobile_no"];
                $name_value = $row["name_value"];
                $email = $row["email"];  //$row["email"];
                $avenue = $row["avenue"];
                $street = $row["street"];
                $role = $row["role"];
            }      
        }
      }
       // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);


?>




<!DOCTYPE html>
<html lang="en">

  <?php
 
      include 'paystackHF/header_pay.php';
   
  ?>
    
    <div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
    
                        
                            
           <div class="row">
                <div class="col-md-10">
                    <h2 class="mt-5">Payment Via My Account</h2>
                    <p>Confirm your details and make payment accordingly</p>
                    
           <form class="row g-3 was-validated" action="initialize_live.php" method="post">
                      
                                                                   
                     <div class="form-group">
                      <label>Mobile Number</label>
                      <input type="text" id="mobile_no" name="mobile_no" class="form-control" value="<?php echo $mobile_no; ?>" readonly >
                     </div>
                     
                     <div class="form-group">
                      <label>Name</label>
                      <input type="text" id="name_value" name="name_value" class="form-control" value="<?php echo $name_value; ?>" readonly >
                     </div>
                    
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>" readonly>
                     </div>
                        
                    <div class="form-group">
                            <label><b>Date</b></label>
                            <input id="complaindate" type="date" name="pay_date" class="form-control" required="">
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please Enter Today's Date</div>                                         
                    </div>
                        
                        
                    <div class="form-group">
                        <label><b>Amount</b></label>
                        <div class="input-group mb-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary align-items-lg-end" >Enter an Amount</button>
                           <span class="input-group-text"> =N=</span>
                            <input id="amount" type="number" name="amount" class="form-control"  required>
                            <span class="input-group-text">.00</span>
                            
                        </div>
                            
                    </div>
                        
                    <div class="form-group">
                        <label><b>Specify what payment is meant for: Security/Infrastructure</b></label>
                        <select name="service"  class="form-select" aria-label="Default select example"  placeholder="Specify what payment is meant for" required >
                         <option selected="security">Security</option>
                            <option value="infrastructure">Infrastructure</option>
                        </select>
                        <span class="invalid-feedback"><?php echo $occupancy_err; ?></span>
                        
                    </div> 
                        
                                              
                    <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="form-label"><b>Additional Information: Remarks/Comments </b> </label>
                          <textarea name = "remark" class="form-control" id="exampleFormControlTextarea1"  rows="4" required></textarea>
                            
                    </div>
                                 
    
                   <div class="form-submit">
                       <div class="row">
                         <p><label> <b>Submit | Navigate</b> </label></p>
                         <div class="col">
                         <input type="submit" class="btn btn-primary" value="Pay"> |
                         <a href="/client/account.php" class="btn btn-secondary">Cancel</a>
                         </div> 
                       </div>
                    </div>
               </form>
                
            </div>  
            
                     
    </div>
                </div><!-- comment -->
            </div><!-- comment -->
            </div>
    </div>
    </div>
        </div> 
        
<!-- comment -->
       
        
<!-- Modal -->
<div class="modal fade " id="payModal" tabindex="-1" aria-labelledby="payModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="payModalLabel">Charges Computation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body align-items-center">
        
         <div class="card" >
         <div class="card-body">
             <!---------------------------->
         
                        <label><b> Product/Service Amount </b></label>
                        <div class="input-group mb-3">
                           <span class="input-group-text">₦</span>
                            <input id="preamount" type="text" name="preamount" placeholder="Enter Intended Amount" class="form-control"  aria-label="Amount (to the nearest Naira)"  required>
                            <span class="input-group-text">.00</span>
                       </div>
          <!----------------------------------->
         <h6 class="card-title">Transaction Fees </h6>
            <h5 class="card-subtitle mb-2 text-muted">1.5% + NGN 200 </h5>
            <p></p>
            <div class="alert alert-success d-flex align-items-center" role="alert">
             <div>
                <p>₦100 fee waived for transactions under ₦2500</p>
              </div>
            </div>    
             
             <div class="alert alert-success d-flex align-items-center" role="alert">
             <div>
               <p> Transactions fees are capped at ₦2100. Absolute maximum payable in fees per transaction.</p>
              </div>
            </div>
            
            
            <label><b> Computed Amount Due (transaction fees inclusive)</b></label>
                        <div class="input-group mb-3">
                           <span class="input-group-text"> ₦</span>
                            <input id="postamount" type="text" name="postamount" class="form-control"  aria-label="Amount (to the nearest Naira)" readonly required>
                            <span class="input-group-text">.00</span>
                       </div>
               </div> <!-- comment --><!-- comment -->
           </div>
          <!-------------------------------->
                      
                          </div> 
        
         <div class="modal-footer">
        <button id = "btn_modal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <!--  <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
          </div> 
         <!---------------------------->
          </div>
       
         </div>
     

   
  <?php
 
      include 'paystackHF/footer_pay.php';
   
  ?>

</html>
