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

//
$infr_sql = "select DISTINCT users.name_value sec_name, users.mobile_no sec_mobile, users.location locatn, users.infr_outst_dec21 infr_outstanding,users.infr_contr_dec21 infr_prev_pay, sum(pay_sec_update.amount) infr_paid from users INNER JOIN pay_sec_update where users.mobile_no = pay_sec_update.mobile_no and  pay_sec_update.service = 'infrastructure' and users.occupancy = 'landlord' group by users.mobile_no";


 // PDF GENERATOR



// create new PDF document
 // create new PDF docume, nt
     $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
     $pdf->setPrintHeader(false);
     $pdf->setPrintFooter(false);
     // set font
     $pdf->SetFont('helvetica', '', 9);
     //set margin
     //TCPDF::SetMargins($left,$top,$right = -1,$keepmargins = false)
    $pdf->SetMargins( 5, 0 , 30, true);

                    //
                    if($result = $link->query($infr_sql))
                    {
                        if($result->num_rows > 0)
                        {
                           $r = 0;
                            
                                     while($row = $result->fetch_assoc())
                                         {
                                         
                                         //Extract Data and fill up Variables
                                         // Retrieve individual field value
                
                                        $mobile_no = $row["sec_mobile"];
                                        $name_value = $row["sec_name"];
                                        //
                                        $location = $row["locatn"];         
                                        $infr_due = number_format($infr_fixed_amount,0);
                                        $infr_prev_pay = $row["infr_prev_pay"];
                                        //
                                        
                                        $infr_paid = number_format($row["infr_paid"]+ $infr_prev_pay,0);
                                        $infr_diff = number_format(($row["infr_paid"]+ $infr_prev_pay) - $infr_fixed_amount,0);
                              
                                         //
                                         
                                         if (($r % 3) == 0)
                                         {                                            // add a page
                                            $pdf->AddPage();
                                             
                                            $r = 0;
                                            $adjust = 0;
                                            $header_img_y = 0;
                                            $image_y = 20;
                                            $payment_details_y = 35;
                                            $bar_y =50;
                                            $id_table_y=50;
                                            $account_table_y=62;
                                            $verify_y =77;
                                            $demarcation_y = 87;
                                            
                                         }
                                         else
                                         {
                                            
                                            $adjust = 90;
                                            $header_img_y = 0;
                                            $image_y = 20;
                                            $payment_details_y = 35;
                                            $bar_y =50;
                                            $id_table_y=50;
                                            $account_table_y=62;
                                            $verify_y =77;
                                            $demarcation_y = 87;
                                             
                                         }
                                         
                                          
                                            // ------------- CONTENT TO PRODUCED  -------- BEGINNING --------------------------------------------                      
                                                                                       
                                            // QRCODE,H : QR-CODE Best error correction
                                                    //Image(file, x = '', y = '', w = 0, h = 0, type = '', link = nil, align = '', resize = false, dpi = 300, palign = '', ismask = false, imgmask = false, border = 0, fitbox = false, hidden = false, fitonpage = false) ⇒ Object
                                                    $pdf->Image(__ROOT__ . '/tcpdflib/images/mmsd.jpg',0, ($header_img_y + ($r*$adjust)), 0, 0, 'JPG','T','',false,300,'C', false,false);
                                                    //-------------------------------------------------------------------------------------------------------------------------------------------
                                                    // PASSPORT IMAGE
                                                    if ($location === "")
                                                    { $location = "no_passport.jpg"; }
                                                   
                                                    $image = '/upload/img/'.$location;
                                                    // Image( filename, left, top, width, height, type, link, align, resize, dpi, align, ismask, imgmask, border, fitbox, hidden, fitonpage)
                                                    //Image(file, y = '', x = '', w = 0, h = 0, type = '', link = nil, align = '', resize = false, dpi = 300, palign = '', ismask = false, imgmask = false, border = 0, fitbox = false, hidden = false, fitonpage = false) ⇒ Object
                                                     $pdf->Image(__ROOT__ . $image,20 ,($image_y + ($r*$adjust)), 20, 20, 'JPG','T','',false,300,'C', false,false);
                                                    
                                                    ////
                                                    //-------------------------------------------------------------------------------------------------------------------------------------------
                                                    //QR DATA
                                                    $qrdata =  $mobile_no . ',' . $name_value . ',' . $infr_diff ;
                                                   //QR STYLE 
                                                    $style = array(
                                                        'border' => true,
                                                        'padding' => 0,
                                                        'fgcolor' => array(128,0,0),
                                                        'bgcolor' => false
                                                    );
                                                    //write2DBarcode($code, $type, $x='', $y='', $w='', $h='', $style=array(), $align='', $distort=false)
                                                    $pdf->write2DBarcode($qrdata, 'QRCODE,H', 20, ($bar_y + ($r*$adjust)), 20, 20, $style, 'N');
                                                    //-------------------------------------------------------------------------------------------------------------------------------------------
                                                    $html_receipt = <<<EOD
                                                                  <p><h4>Payment Details [Date :  $todaysdate ] </h4></p>
                                                    EOD;
                                                    // Print text using writeHTMLCell()
                                                    //writeHTMLCell(w, h, x, y, html = '', border = 0, ln = 0, fill = 0, reseth = true, align = '', autopadding = true) ⇒ Object
                                                    $pdf->writeHTMLCell(0,0,20,($payment_details_y + ($r*$adjust)), $html_receipt, 0, 1, 0, true,'C', true);
                                                    //-------------------------------------------------------------------------------------------------------------------------------------------
                                                    $html= <<<EOD
                                                    <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
                                                        <tr>
                                                            <td style="background-color:white;color: Blue;">Name</td>
                                                            <td>$name_value</td>   	
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color:white;color: Blue;">Mobile number</td>
                                                            <td>$mobile_no</td>
                                                        </tr>	   
                                                    </table>
                                                    EOD;
                                                    $pdf->writeHTMLCell( 0, 0, 50, ($id_table_y + ($r*$adjust)), $html, 0, 1, 0, true, '', true);
                                                    //-------------------------------------------------------------------------------------------------------------------------------------------
                                                    $html_after_21 = <<<EOD

                                                    <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
                                                        <tr style="background-color:white;color: Blue;">
                                                            <td></td>
                                                            <td>Infrastructure (=N=)</td>	
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color:white;color: Blue;">Cumulative Amount Due</td>
                                                                    <td>$infr_due</td>
                                                      </tr>
                                                            <tr>
                                                            <td style="background-color:white;color: Blue;">Amount Paid </td>
                                                                    <td>$infr_paid</td>

                                                            </tr>

                                                        <tr>
                                                            <td style="background-color:white;color: Blue;">Balance</td>
                                                                    <td>$infr_diff</td>

                                                            </tr>

                                                    </table>
                                                    EOD;

                                                    // Print text using writeHTMLCell()
                                                    $pdf->writeHTMLCell(0,0, 50,($account_table_y + ($r*$adjust)), $html_after_21, 0, 1, 0, true, '', true);

                                                    //-------------------------------------------------------------------------------------------------------------------------------------------

                                                    $html_receipt = <<<EOD
                                                                  <p><h4>Verified (Sign/Date) : _____________________________</h4></p>
                                                    EOD;

                                                    // Print text using writeHTMLCell()
                                                    //writeHTMLCell(w, h, x, y, html = '', border = 0, ln = 0, fill = 0, reseth = true, align = '', autopadding = true) ⇒ Object
                                                    $pdf->writeHTMLCell(0,0,20,( $verify_y + ($r*$adjust)), $html_receipt, 0, 1, 0, true,'C', true);

                                                    //-------------------------------------------------------------------------------------------------------------------------------------------
                                            
                                             // Print text using writeHTMLCell()
                                                    $pdf->writeHTMLCell(0,0, 50,($account_table_y + ($r*$adjust)), $html_after_21, 0, 1, 0, true, '', true);

                                                    //-------------------------------------------------------------------------------------------------------------------------------------------

                                                    $html_line = <<<EOD
                                                       <p>------------------------------------------------------------------------------------------------------------------------------------</p>
                                                    EOD;

                                                    // Print text using writeHTMLCell()
                                                    //writeHTMLCell(w, h, x, y, html = '', border = 0, ln = 0, fill = 0, reseth = true, align = '', autopadding = true) ⇒ Object
                                                    $pdf->writeHTMLCell(0,0,5,( $demarcation_y + ($r*$adjust)), $html_line, 0, 1, 0, true,'C', true);

                                                    //-------------------------------------------------------------------------------------------------------------------------------------------
                                            
                                            
                                            
                                            //TRACKER 
                                            
                                           $r++;
                                                  
                                            // ------------- CONTENT TO PRODUCED  -------- ENDING  --------------------------------------------             
                                                }
                  
                    }
                    else
                                                        {
                                                           echo 'No records';
                                                           exit();
                                                        }
                    
                    
                    
 
                    // Close connection
                    mysqli_close($link);
                    }
                    else{
                          
                       echo "Oops! Something went wrong. Please try again later.";
                       header("location: error.php");
                      exit();
                    }

// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('RECEIPT.pdf', 'I');


//============================================================+
// END OF FILE
//============================================================+


  ob_end_flush();
  
  

                       
                 
                          

