<?php
  ob_start();
// Include config file
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/config.php');

$q = intval($_GET['q']);
//mysqli_select_db($link,"ramsmedb");

$sql="SELECT * FROM users WHERE mobile_no = '" . "0". $q . "'" ;  
//echo $sql;
$result = mysqli_query($link,$sql);

while($row = mysqli_fetch_array($result)) {
  echo  $row['name_value'];
}
mysqli_close($link);

  ob_end_flush();



