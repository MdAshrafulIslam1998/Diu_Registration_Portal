<?php


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'trupples_naim');
define('DB_PASSWORD', 'ashtray12271');
define('DB_NAME', 'trupples_registration');
 

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>