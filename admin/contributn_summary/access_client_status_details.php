<?php

// Include config file
define('__ROOT__', dirname(dirname(__FILE__),2));
require_once(__ROOT__.'/config.php');
include_once(__ROOT__.'/qrcode/qrlib.php');

$q = intval($_GET['q']);
//mysqli_select_db($link,"ramsmedb");

$sql="SELECT * FROM users WHERE mobile_no = '" . "0". $q . "'" ;  
//echo $sql;
$result = mysqli_query($link,$sql);

while($row = mysqli_fetch_array($result)) 
{
  //echo  $row['name_value'];
     $Gmobile_no = $row['mobile_no'];
     
     
  // EXTRACT PREVIOUS PAYMENTS DETAILS BEFORE 2021

  // $sql = "SELECT * FROM users WHERE mobile_no = ?";
$sql = "select location, sec_contr_dec21 sec_prev_pay, sec_outst_dec21 sec_outstanding,infr_outst_dec21 infr_outstanding,infr_contr_dec21 infr_prev_pay from users where occupancy = 'landlord' and mobile_no = ?";

             
      if($stmt = mysqli_prepare($link, $sql))
      {
              // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_mobile_no);
        
        // Set parameters
        $param_mobile_no = $Gmobile_no; // trim($_SESSION["mobile_no"]);
        //$role = trim($_SESSION["role"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                // Retrieve individual field value
                  
                    $location = $row["location"];         
                    //$sec_prev_pay = number_format($row["sec_prev_pay"],0);
                    $sec_prev_pay_temp = $row["sec_prev_pay"];
                    $sec_outst_temp = $row["sec_outstanding"];
                    $infr_prev_pay_temp = $row["infr_prev_pay"];
                    $infr_outst_temp = ($infr_fixed_amount - $row["infr_prev_pay"]);// What was paid so far is deducted from fix amount for infracstructure
                    // Formating 
                    $sec_prev_pay =  number_format($sec_prev_pay_temp,0);
                    $sec_outst = number_format($sec_outst_temp,0);
                    $infr_prev_pay = number_format($infr_prev_pay_temp,0);
                    $infr_outst = number_format($infr_outst_temp,0);
                   
                                        
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                //echo "Oops! Something went wrong. Please try again later.";
                header("location: error.php");
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);

// Display Previous Record Content
 // Prepare a select statement


   // $sql = "SELECT * FROM users WHERE mobile_no = ?";
$sec_sql = "select DISTINCT users.name_value sec_name, users.mobile_no sec_mobile, amount_due(users.occupancy, users.no_rooms, users.effective_date) sec_due, sum(pay_sec_update.amount) sec_paid, amount_due(users.occupancy, users.no_rooms, users.effective_date)- sum(pay_sec_update.amount) sec_difference from users INNER JOIN pay_sec_update where users.mobile_no = pay_sec_update.mobile_no and  pay_sec_update.service = 'security' and users.mobile_no = ?";

             
      if($sec_stmt = mysqli_prepare($link, $sec_sql))
      {
              // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($sec_stmt, "s", $param_mobile_no);
        
        // Set parameters
        $param_mobile_no = $Gmobile_no; // trim($_SESSION["mobile_no"]);
        //$role = trim($_SESSION["role"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($sec_stmt)){
            $sec_result = mysqli_stmt_get_result($sec_stmt);
    
            if(mysqli_num_rows($sec_result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $sec_row = mysqli_fetch_array($sec_result, MYSQLI_ASSOC);
                // Retrieve individual field value
                  
                              
                    
                    $mobile_no = $sec_row["sec_mobile"];
                    $name_value = $sec_row["sec_name"];
                    $sec_due = number_format($sec_row["sec_due"],0);
                    $sec_paid = number_format($sec_row["sec_paid"],0);
                    $sec_diff = number_format($sec_row["sec_difference"],0);
                    
                                       
                                        
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                //echo "Oops! Something went wrong. Please try again later.";
                header("location: error.php");
            }
        }
        
        // Close statement
        mysqli_stmt_close($sec_stmt);
        
        
        
       // $infr_sql = "select DISTINCT users.name_value infr_name, users.mobile_no infr_mobile, amount_due(users.occupancy, users.no_rooms, users.effective_date) infr_due,sum(pay_sec_update.amount) infr_paid, amount_due(users.occupancy, users.no_rooms, users.effective_date)- sum(pay_sec_update.amount) infr_difference from users INNER JOIN pay_sec_update where users.mobile_no = pay_sec_update.mobile_no and  pay_sec_update.service= 'infrastructure' and users.occupancy = 'landlord' and users.mobile_no = ?";
        $infr_sql = "select DISTINCT users.name_value infr_name, users.mobile_no infr_mobile, sum(pay_sec_update.amount) infr_paid from users INNER JOIN pay_sec_update where users.mobile_no = pay_sec_update.mobile_no and  pay_sec_update.service= 'infrastructure' and users.occupancy = 'landlord' and users.mobile_no = ?";
        if($infr_stmt = mysqli_prepare($link, $infr_sql))
      {
              // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($infr_stmt, "s", $param_mobile_no);
        
        // Set parameters
        $param_mobile_no = $Gmobile_no; // trim($_SESSION["mobile_no"]);
        //$role = trim($_SESSION["role"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($infr_stmt)){
            $infr_result = mysqli_stmt_get_result($infr_stmt);
    
            if(mysqli_num_rows($infr_result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $infr_row = mysqli_fetch_array($infr_result, MYSQLI_ASSOC);
                // Retrieve individual field value
                  
                    
                    //$mobile_no = $row["mobile"];
                    //$name_value = $row["Name"];
                    //$name_value = $row["Name"];
                    $infr_due_temp =   $infr_outst_temp;                 //$infr_fixed_amount; //number_format($infr_row["infr_due"],0);
                    $infr_paid = number_format($infr_row["infr_paid"],0);
                    $infr_diff_temp = $infr_outst_temp - $infr_row["infr_paid"];  //number_format($infr_row["infr_difference"],0);
                    
                    $infr_due = number_format($infr_due_temp,0);
                    $infr_diff = number_format($infr_diff_temp,0);
                                        
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                //echo "Oops! Something went wrong. Please try again later.";
                header("location: error.php");
                    exit();
            }
        }
        
        // Close statement
        mysqli_stmt_close($infr_stmt);
        
        
           // Close connection
    //mysqli_close($link);
    //
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
                    <h2 class="mt-5">My Account</h2>
                    
                    <p><h3>Payment Details for  <?php echo date("l jS \of F Y ")?> </h3></p>
                    
                    <form action="personal_status_prnt.php" method="post">
                        
                        <div class="card">
                         

          <div class="card-body ">
              
                        
                        <div class="form-group">
                            <label><b>Name</b></label>
                            <input type="text" name="name_value" id="name_value" class="form-control"  value="<?php echo $name_value; ?>" readonly>
                            
                        </div>
  </div> 
</div>
                        
                        <p></p>            
                        
                        
        <?php                
         $grade = 'text-black bg-secondary'               
        ?>   
   <div class ="row"> 
     <div class="alert alert-info" role="alert">   
         <b> PAYMENT MADE BEFORE DECEMBER, 2021</b>
     </div>
     </div>                   <!------ PREVIOUS RECORDS ------>
                       
   <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body <?php echo $grade ?> ">
          <h5 class="card-title"><b>Security</b></h5>
          
                         <div class="form-group">
                            <label>Payment</label>
                            <div class="input-group mb-3">
                            <span class="input-group-text">=N=</span>
                            <input type="text" name="sec_prev_pay"  class="form-control" value="<?php echo $sec_prev_pay; ?>" readonly>
                             <span class="input-group-text">.00</span>
                         </div>
                             </div>
                        
                        <div class="form-group">
                            <label>Outstanding</label>
                            <div class="input-group mb-3">
                            <span class="input-group-text">=N=</span>
                            <input type="text" name="sec_outst"  class="form-control" value="<?php echo $sec_outst; ?>" readonly>
                            <span class="input-group-text">.00</span>
                        </div>
                             </div>
                                             
        
                        </div>
    </div>
  </div>
      
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body <?php echo $grade ?>">
          <h5 class="card-title"><b>Infrastructure</b></h5>
                        <div class="form-group">
                        <label>Payment</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">=N=</span>
                            <input type="text" name="infr_prev_pay" class="form-control" value="<?php echo $infr_prev_pay; ?>" readonly>
                            <span class="input-group-text">.00</span>
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Outstanding</label>
                            <div class="input-group mb-3">
                            <span class="input-group-text">=N=</span>
                            <input type="text" name="infr_outst" class="form-control" value="<?php echo $infr_outst; ?>" readonly>
                            <span class="input-group-text">.00</span>
                        </div>
                            </div>
                        
                       
      </div>
    </div>
  </div>
</div>                   
                        
   <p></p>                      
                        
   <div class ="row"> 
   <div class="alert alert-info" role="alert">
      <b>   PAYMENT MADE AFTER DECEMBER, 2021   </b>
  </div>
   </div>                      
                      
                       <!--- CARDS BEGINS CURRENT  -->
                       
                       
                       
                       <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body text-white bg-success">
          <h5 class="card-title"><b>Security</b></h5>
          
         

                        
                         <div class="form-group">
                            <label>Cumulative Amount Due</label>
                            <div class="input-group mb-3">
                            <span class="input-group-text">=N=</span>
                            <input type="text" name="sec_due"  class="form-control" value="<?php echo $sec_due; ?>" readonly>
                             <span class="input-group-text">.00</span>
                         </div>
                             </div>
                        
                        <div class="form-group">
                            <label>Amount Paid so Far </label>
                            <div class="input-group mb-3">
                            <span class="input-group-text">=N=</span>
                            <input type="text" name="sec_paid"  class="form-control" value="<?php echo $sec_paid; ?>" readonly>
                            <span class="input-group-text">.00</span>
                        </div>
                             </div>
                        
                        <div class="form-group">
                            <label>Balance</label>
                            <div class="input-group mb-3">
                            <span class="input-group-text">=N=</span>
                            <input type="text" name="sec_diff" class="form-control" value="<?php echo $sec_diff; ?>" readonly>
                            <span class="input-group-text">.00</span>
                        </div>
        
                        </div>
    </div>
  </div>
      </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body text-white bg-success">
          <h5 class="card-title"><b>Infrastructure</b></h5>
                        <div class="form-group">
                        <label>Cumulative Amount Due</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">=N=</span>
                            <input type="text" name="infr_due" class="form-control" value="<?php echo $infr_due; ?>" readonly>
                            <span class="input-group-text">.00</span>
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Amount Paid so Far </label>
                            <div class="input-group mb-3">
                            <span class="input-group-text">=N=</span>
                            <input type="text" name="infr_paid" class="form-control" value="<?php echo $infr_paid; ?>" readonly>
                            <span class="input-group-text">.00</span>
                        </div>
                            </div>
                        
                        <div class="form-group">
                            <label>Balance</label>
                            <div class="input-group mb-3">
                            <span class="input-group-text">=N=</span>
                            <input type="text" name="infr_diff" class="form-control" value="<?php echo $infr_diff; ?>" readonly>
                            <span class="input-group-text">.00</span>
                        </div>
                            </div>
      </div>
    </div>
  </div>
</div>
                 <!--- CARDS ENDS -->    
                 
                        
                        
                       
                         <?php
                               $tempDir = "tempdir/";
    
                     // we building raw data
                       $codeContents  = 'BEGIN:VCARD'."\n";
                       $codeContents .= 'FN:'.$name_value."\n";
                       $codeContents .= 'TEL:'.$mobile_no."\n";
                       $codeContents .= 'END:VCARD';
    
                   // generating
                  QRcode::png($codeContents, $tempDir.'draw.png', QR_ECLEVEL_L, 3);
   
                    // displaying
                  
                  ?>
                 
                  <div class="card text-center">
                        <div class="card-header">
                             
                        </div>
                        <div class="card-body">
                            <?php echo '<img src="'.$tempDir.'draw.png" />'; ?>
                        </div>
                      
                      <input type="hidden" name="location" value="<?php echo $location; ?>"/>
                        
                      
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

<?php
}
//


mysqli_close($link);

