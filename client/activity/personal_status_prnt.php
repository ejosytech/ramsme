<?php
  ob_start();

// Include config file

define('__ROOT__', dirname(dirname(__FILE__),2));
require_once(__ROOT__.'/config.php');
//include_once(__ROOT__.'/qrcode/qrlib.php');
// Include the main TCPDF library (search for installation path).
require_once(__ROOT__.'/tcpdflib/tcpdf.php');

$todaysdate =   date("l jS \of F Y ");

// Define variables and initialize with empty values
$name_value = $mobile_no = $due = $paid = $difference = $role = $sec_due = $sec_paid = $sec_difference = $infr_due = $infr_paid = $infr_difference ="";
$name_err = $mobile_no_err = $complain_err = $attachment_err= $date_err = "";
 
// Display Exist Content
session_start(); // Initialize the session

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)// Check if the user is logged in, if not then redirect him to login page
{
    header("location: /client/login.php");
    exit();
}

// EXTRACT PREVIOUS PAYMENTS DETAILS BEFORE 2021

  // $sql = "SELECT * FROM users WHERE mobile_no = ?";
$sql = "select location, sec_contr_dec21 sec_prev_pay, sec_outst_dec21 sec_outstanding,infr_outst_dec21 infr_outstanding,infr_contr_dec21 infr_prev_pay from users where occupancy = 'landlord' and mobile_no = ?";

             
      if($stmt = mysqli_prepare($link, $sql))
      {
              // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_mobile_no);
        
        // Set parameters
        $param_mobile_no = trim($_SESSION["mobile_no"]);
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
                    $sec_prev_pay =  number_format($sec_prev_pay_temp,2);
                    $sec_outst = number_format($sec_outst_temp,2);
                    $infr_prev_pay = number_format($infr_prev_pay_temp,2);
                    $infr_outst = number_format($infr_outst_temp,2);
                    
                   
                                        
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
        $param_mobile_no = trim($_SESSION["mobile_no"]);
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
                    $sec_due = number_format($sec_row["sec_due"],2);
                    $sec_paid = number_format($sec_row["sec_paid"],2);
                    $sec_diff = number_format($sec_row["sec_difference"],2);
                    
                                       
                                        
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
        $param_mobile_no = trim($_SESSION["mobile_no"]);
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
                    $infr_due_temp =   $infr_outst_temp;                 //$infr_fixed_amount; //number_format($infr_row["infr_due"],0);
                    $infr_paid = number_format($infr_row["infr_paid"],2);
                    $infr_diff_temp = $infr_outst_temp - $infr_row["infr_paid"];  //number_format($infr_row["infr_difference"],0);
                    
                    $infr_due = number_format($infr_due_temp,2);
                    $infr_diff = number_format($infr_diff_temp,2);
                    
                   
                                        
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
    mysqli_close($link);
    //
 // PDF GENERATOR

//QR DATA
$qrdata =  $mobile_no . ',' . $name_value . ',' . $sec_diff . ',' . $infr_diff;
$image = '/upload/img/'.$location;

// create new PDF document
 // create new PDF docume, nt
     $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
     $pdf->setPrintHeader(false);
     $pdf->setPrintFooter(false);
     // set font
     $pdf->SetFont('helvetica', '', 11);
     //set margin
     //TCPDF::SetMargins($left,$top,$right = -1,$keepmargins = false)
    $pdf->SetMargins( 5, 0 , 30, true);

// add a page
$pdf->AddPage();

// QRCODE,H : QR-CODE Best error correction
//Image(file, x = '', y = '', w = 0, h = 0, type = '', link = nil, align = '', resize = false, dpi = 300, palign = '', ismask = false, imgmask = false, border = 0, fitbox = false, hidden = false, fitonpage = false) ⇒ Object
$pdf->Image(__ROOT__ . '/tcpdflib/images/letter_head_x75.jpg',0, 0, 0, 0, 'JPG','T','',false,300,'C', false,false);



//Text(x, y, txt, fstroke = false, fclip = false, ffill = true, border = 0, ln = 0, align = '', fill = 0, link = '', stretch = 0, ignore_min_height = false, calign = 'T', valign = 'M', rtloff = false)
//$pdf->Text( 20, 35, '-------------------------- RECEIPT ---------------------------------', false, false, true, 0, 0,'C');

$html_receipt = <<<EOD
        <h3>-------------------------- PAYMENT STATUS -------------------------------</h3>
        <p><h4>Payment Details for $todaysdate </h4></p>
EOD;

// Print text using writeHTMLCell()
//writeHTMLCell(w, h, x, y, html = '', border = 0, ln = 0, fill = 0, reseth = true, align = '', autopadding = true) ⇒ Object
$pdf->writeHTMLCell(0,0,20,35, $html_receipt, 0, 1, 0, true,'C', true);

$html= <<<EOD
<table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
    <tr>
        <td style="background-color:green;color:white;">Name</td>
        <td>$name_value</td>
        	
    </tr>
    <tr>
        <td style="background-color:green;color:white;">Mobile number</td>
                <td>$mobile_no</td>
    </tr>
	   
</table>
EOD;

$pdf->writeHTMLCell( 0, 0, 20, 90, $html, 0, 1, 0, true, '', true);

//QR STYLE 
$style = array(
    'border' => true,
    'padding' => 0,
    'fgcolor' => array(128,0,0),
    'bgcolor' => false
);
$pdf->write2DBarcode($qrdata, 'QRCODE,H', 120, 60, 25, 25, $style, 'N');

// PASSPORT IMAGE
//Image(file, x = '', y = '', w = 0, h = 0, type = '', link = nil, align = '', resize = false, dpi = 300, palign = '', ismask = false, imgmask = false, border = 0, fitbox = false, hidden = false, fitonpage = false) ⇒ Object
$pdf->Image(__ROOT__ . $image,120, 60, 25, 25, 'JPG','T','',false,300,'C', false,false);
///
$html_before_21 = <<<EOD
<h4>PAYMENT MADE BEFORE DECEMBER, 2021</h4>
<table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
    <tr style="background-color:green;color:white;">
        <td></td>
        <td>Security (=N=)</td>
        <td>Infrastructure (=N=)</td>
	
    </tr>
    <tr>
        <td style="background-color:green;color:white;">Contribution</td>
                <td>$sec_prev_pay</td>
		<td>$infr_prev_pay</td>
		
    </tr>
	<tr>
        <td style="background-color:green;color:white;">Outstanding</td>
       		<td>$sec_outst</td>
                <td>$infr_outst</td>
        </tr>
    
</table>
EOD;

// Print text using writeHTMLCell()
//writeHTMLCell(w, h, x, y, html = '', border = 0, ln = 0, fill = 0, reseth = true, align = '', autopadding = true) ⇒ Object
$pdf->writeHTMLCell(0,0,20,120, $html_before_21, 0, 1, 0, true,'', true);


$html_after_21 = <<<EOD
<h4>PAYMENT MADE AFTER DECEMBER, 2021</h4>
<table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
    <tr style="background-color:green;color:white;">
        <td></td>
        <td>Security (=N=)</td>
        <td>Infrastructure (=N=)</td>
	
    </tr>
    <tr>
        <td style="background-color:green;color:white;">Cumulative Amount Due</td>
                <td>$sec_due</td>
		<td>$infr_due</td>
		
    </tr>
	<tr>
        <td style="background-color:green;color:white;">Amount Paid </td>
       		<td>$sec_paid</td>
                <td>$infr_paid</td>
        </tr>
        
    <tr>
        <td style="background-color:green;color:white;">Balance</td>
       		<td>$sec_diff</td>
                <td>$infr_diff</td>
        </tr>
    
</table>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0,0, 20,170, $html_after_21, 0, 1, 0, true, '', true);

//




// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('RECEIPT.pdf', 'I');


//============================================================+
// END OF FILE
//============================================================+


  ob_end_flush();
