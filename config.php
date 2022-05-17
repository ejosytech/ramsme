<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'eronumaj_majiero');
define('DB_PASSWORD', 'Majiyebo73@');
define('DB_NAME', 'ramsmedb');
//Remote 
//define('DB_NAME', 'eronumaj_ramsme');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// INFRASTRUCTURE 
        $infr_fixed_amount = 650000;
        
 // IMAGE QUALITY        
        $imageQuality= 70;
 ?>