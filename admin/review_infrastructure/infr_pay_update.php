<?php
  ob_start();
?>

<?php

// Include config file
define('__ROOT__', dirname(dirname(__FILE__,2)));
require_once(__ROOT__.'/config.php');

?>

<?php
session_start();   // Initialize the session
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)   // Check if the user is logged in, if not then redirect him to login page
{
    header("location: /client/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

 <?php
 include 'adminInfrHF/header_adminInfr.php';
 ?>
    
    <div id="main-wrapper" class="container justify-content-center">
   
           <h1> Update Infrastructure Records </h1>
      
        <div class="alert alert-success" role="alert">
                   <p> #1 Click the button with label inscription "Display/Search" to display all records </p>
                   <p> #2 Enter desired query(mobile number, start and end dates to display selected records</p>
                           
                 </div>
        
         <!--------------------------------------<!-- --> 
      
           <div class="row">
           <div class="col-sm-12">
                <h4><b> <u> Residents' Registered Payments Review Panel</u> </b></h4>
				<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>
                        <form action="javascript:void(0);" id="frmdata" onsubmit="submitFormData_reg(this)"  >    <!--method="get" -->
				  <div class="row">
                                      
                                      <div class="col-sm-2">
                                         <div class="form-group">
                                    <label for="mobile_no" class="form-label"><b>Mobile Numbers</b></label>
                                        <select id="mobile_no" name ="mobile_no" class="form-control" onchange="admin_register_pay(this.value)" >
                                        <option value="" selected="selected">Mobile Number</option>
                                            <?php
                                                $sql = "SELECT mobile_no FROM users";
                                                $resultset = mysqli_query($link, $sql);
                                                while( $rows = mysqli_fetch_assoc($resultset) )
                                                { 
                                                ?>
                                                <option value="<?php echo $rows["mobile_no"]; ?>"><?php echo $rows["mobile_no"]; ?></option>
                                                <?php }	?>
                                    </select> 
                                        </div>
                                          </div>
                            
				    
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                        <label class="form-label"><b>Start Date</b></label>
					<input type="date" name="start_date" id="start_date" class="form-control" value="" placeholder="Start Date">
					</div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                        <label class="form-label"><b>End Date</b></label>
					<input type="date" name="end_date" id="end_date" class="form-control" value="" placeholder="End Date">
					</div>
                                    </div>
                		    <div class="col-sm-4">
					<div class="form-group">
					<label>&nbsp;</label>
          				<div>
				<button type="submit" name="submitreg" value="search" id="submitreg"  class="btn btn-primary"><i class="fa fa-fw fa-search"></i>Display/Search</button>
				<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
				</div>
				</div>
			</div>
			</div>
			</form>
		</div> 
                
                <br><!-- comment -->
                <hr>
                <hr> 
               
              <div id="viewresponseupdate_infr_reg"> 
                
                 </div>
                 </div>
          
        <!--------------------------------------<!-- Update Infrastructure Records -->
                 <hr>
                <hr>        
            <div class="row">
     
            <div class="col-sm-12">
                <h4><b> <u> Administrator's Payments Update Panel</u> </b></h4>
				<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>
                        <form action="javascript:void(0);" id="frmdata" onsubmit="submitFormData_upd(this)"  >    <!--method="get" -->
				  <div class="row">
                                      
                                      <div class="col-sm-2">
                                         <div class="form-group">
                                    <label for="mobile_no" class="form-label"><b>Mobile Numbers</b></label>
                                        <select id="mobile_no" name ="mobile_nox" class="form-control" onchange="admin_register_pay(this.value)" >
                                        <option value="" selected="selected">Mobile Number</option>
                                            <?php
                                                $sql = "SELECT mobile_no FROM users";
                                                $resultset = mysqli_query($link, $sql);
                                                while( $rows = mysqli_fetch_assoc($resultset) )
                                                { 
                                                ?>
                                                <option value="<?php echo $rows["mobile_no"]; ?>"><?php echo $rows["mobile_no"]; ?></option>
                                                <?php }	?>
                                    </select> 
                                        </div>
                                          </div>
                            
				    
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                        <label class="form-label"><b>Start Date</b></label>
					<input type="date" name="start_datex" id="start_date" class="form-control" value="" placeholder="Start Date">
					</div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                        <label class="form-label"><b>End Date</b></label>
					<input type="date" name="end_datex" id="end_date" class="form-control" value="" placeholder="End Date">
					</div>
                                    </div>
                		    <div class="col-sm-4">
					<div class="form-group">
					<label>&nbsp;</label>
          				<div>
				<button type="submit" name="submitupd" value="search" id="submitupd"  class="btn btn-primary"><i class="fa fa-fw fa-search"></i>Display/Search</button>
				<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
				</div>
				</div>
			</div>
			</div>
			</form>
		</div> 
                
                <br><!-- comment -->
                <hr>
                <hr> 
               
              <div id="viewresponseupdate_infr_upd">  </div> 
                
                
                 </div>
    
        </div> 
     
    
<?php
 include 'adminInfrHF/footer_adminInfr.php';
 ?>
    
</html>

<?php
  ob_end_flush();
?>
