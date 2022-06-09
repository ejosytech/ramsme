<?php
  ob_start();

// Include config file

define('__ROOT__', dirname(dirname(__FILE__),2));
require_once(__ROOT__.'/config.php');
//include_once(__ROOT__.'/qrcode/qrlib.php');
// Include the main TCPDF library (search for installation path).
require_once(__ROOT__.'/tcpdflib/tcpdf.php');

session_start();   // Initialize the session

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)// Check if the user is logged in, if not then redirect him to login page
{
    header("location: /client/login.php");
    exit();
}

$todaysdate =   date("l jS \of F Y ");


$output = '';

  $page = $_SESSION["page"];
  $condition = $_SESSION["condition"];
   
  $limit = 40; // Amount of data per page
                    // Create a query to display how many data will be displayed in the tables in the database
                    $limit_start = ($page - 1) * $limit;
                                    
                    // Attempt select query execution
                   
                    $sql = "select DISTINCT users.name_value vname,users.sec_contr_dec21 contr, users.sec_outst_dec21 outst, users.mobile_no mobile, amount_due(users.occupancy, users.no_rooms, users.effective_date) due, sum(pay_sec_update.amount) paid, amount_due(users.occupancy, users.no_rooms, users.effective_date)- sum(pay_sec_update.amount) difference from users INNER JOIN pay_sec_update where users.mobile_no = pay_sec_update.mobile_no and pay_sec_update.service = 'security' " . $condition . " group by users.mobile_no LIMIT ". $limit_start . "," . $limit;
                    $no = $limit_start + 1;
                    //
                    if($result = mysqli_query($link, $sql))
                    {
                        if(mysqli_num_rows($result) > 0){
                            $output .= " <table class="."table  table-bordered table-striped". ">
                                    <thead>
                                    <tr>

                                           <th style=" . "text-align:center;" . "><u><b>Phone</b></u></th>
                                           <th style=" . "text-align:center;" . "><u><b>Name</b></u></th>
                                           <th style=" . "text-align:center;" ."><u><b>Cumulative <br> Payment Due</b></u></th>
                                            <th style=" . "text-align:center;" ."><u><b>Cumulative <br> Payment Made</b></u></th>
                                            <th style=" . "text-align:center;" ."><u><b>Balance</b></u></th>
                                            
                                    </tr>
                                                                         
                                </thead>
                                <tbody> ";
                              $output .= '<tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                                                         
                                    </tr>';
                               $output .= '<tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                                                         
                                    </tr>';
                                    
                   while($row = mysqli_fetch_array($result)){
                     
                       
                      $output .= '<tr readonly>
                                    
                                        <td style=' . 'text-align:center;' .'>' . substr($row['mobile'],0,4)."***".substr($row['mobile'],7,10). '</td>
                                        <td style=' . 'text-align:left;' .'>' . $row['vname'] . '</td>
                                            
                                                                       
                                        <td>'  . number_format($row['contr']+$row['outst']+$row['due'],2) . '</td>
                                        <td>'  . number_format($row['contr']+$row['paid'],2) . '</td>
                                        <td>'  . number_format(($row['contr']+$row['paid'])-($row['contr']+$row['outst']+$row['due']),2) . '</td>
                                       
                                            
                                                                                
                                    </tr>';
                      $output .= '<tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                                                         
                                    </tr>';
                                
                                }
                                //
                                 
                                //
                              
                                 $output.= '</tbody>                           
                                                </table>';
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            $output .= '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                          header("location: error.php");
                        //echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                 

// create new PDF document
 // create new PDF docume, nt
     $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
     $pdf->setPrintHeader(false);
     $pdf->setPrintFooter(false);
     // set font
     $pdf->SetFont('helvetica', '', 11);
     //set margin
     //TCPDF::SetMargins($left,$top,$right = -1,$keepmargins = false)
    $pdf->SetMargins( 5, 0 , 30, true);

// add a page
$pdf->AddPage();

$html_receipt = <<<EOD
        <h3>----------- SECURITY PAYMENT STATUS -----------------------</h3>
        <p><h4>Payment Details for $todaysdate </h4></p>
EOD;

$pdf->writeHTMLCell(0,0,20,35, $html_receipt, 0, 1, 0, true,'C', true);

$html_output = <<<EOD
          <div> $output </div>
EOD;

$pdf->writeHTMLCell(0,0,20,70, $html_output, 0, 1, 0, true,'C', true);


// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('security_pay_status', 'I');


//============================================================+
// END OF FILE
//============================================================+


  ob_end_flush();
