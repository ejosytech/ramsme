<?php
  ob_start();
?>

<?php

// Include config file
define('__ROOT__', dirname(dirname(__FILE__,2)));
require_once(__ROOT__.'/config.php');

?>

 <?php
// Query Buildup 
  $mobile_no =  $start_date =  $end_date = "";
  
  
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{

   // echo json_encode( array(   "status" => 1, "message" => "Form submitted", "data" => $_POST   )   );
   //Print_r($_POST);
   //echo  $_POST['mobile_no'];
    //
    if(isset($_POST["mobile_no"]))
    {   $mobile_no = $_POST['mobile_no'];  }
     else {   $mobile_no = ""; }
     if(isset($_POST["start_date"]))
    {   $start_date = $_POST['start_date'];  }
     else {   $start_date = ""; }
     if(isset($_POST["end_date"]))
    {   $end_date = $_POST['end_date'];  }
     else {   $end_date = ""; }
     
    
 
if ($mobile_no == "" AND $start_date == "" AND $end_date == "")
{
$condition = '';
}
elseif (isset($mobile_no) AND ($mobile_no!="") AND  $start_date == "" AND $end_date == "") 
{
 $condition = ' AND mobile_no LIKE "%'.$_REQUEST['mobile_no'].'%" ';
}
elseif ($mobile_no == "" AND isset($start_date) AND $start_date!="" AND isset($end_date) AND $end_date!="") 
{
$condition = ' AND pay_date between '. "'" . $_REQUEST['start_date']. "'" . ' AND '. "'" .$_REQUEST['end_date']. "'";
}
elseif((isset($_POST['mobile_no']) AND ($_POST['mobile_no']!="") AND isset($_POST['start_date']) AND $_POST['start_date']!="" AND isset($_POST['end_date']) and $_POST['end_date']!=""))
{
$condition = ' AND mobile_no LIKE "%'.$_REQUEST['mobile_no'].'%" '. ' AND pay_date between '. "'" . $_REQUEST['start_date']. "'" . ' AND '. "'" .$_REQUEST['end_date']. "'";  
}

}
           
  ?>   
    

 <?php  
 //pagination.php  
 
 $record_per_page = 5;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 $query = "SELECT * FROM payments where service = 'infrastructure' " . $condition . "LIMIT ". $start_from . "," . $record_per_page;  
 $result = mysqli_query($link, $query);  
 $output .= "  
       <table class=" . "table table-bordered table-striped". ">
                                <thead>
                                    <tr>
                                    <th>Date of Payment</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Amount Paid</th>
                                        <th>Service</th>
                                        <th>Remark</th>
                                        <th>Attachment</th>
                                         <th>Action</th>
                                    </tr>
                               
 ";  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
            <tr readonly>
                                      <td>' . $row['pay_date'] . '</td>
                                      <td>'. $row['name_value'] . '</td>
                                      <td>'. $row['mobile_no'] . '</td>
                                      <td>'. $row['amount'] . '</td>
                                      <td>' . $row['service'] .'</td>
                                      <td>' . $row['remark'] . '</td>
                                      <td>' .'<a href=" '.'/client/activity/upload/doc/' . $row['attachment'] .'" target="_blank" class="mr-3" title="View Attachment" data-toggle="tooltip"><span class="fa fa-file"></span></a>'.'</td>                  
                                      <td>' . "<span class='add_link fa fa-plus' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$row['entry']."'></span>". '</td>
                               </tr>
      ';  
 } 

 $output .= '</table><br /><div align="center">';  
 $page_query = "SELECT * FROM payments where service = 'infrastructure'" . $condition;  
 $page_result = mysqli_query($link, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= "<span class='add_pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
      
 }  
 $output .= '</div><br /><br />';  
 echo $output;  
 ?>  

<?php
  ob_end_flush();
?>
