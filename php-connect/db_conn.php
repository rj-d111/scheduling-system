<?php
$sname = "localhost";
$uname = "root";
$password = "";

// Name of the Database
$db_name = "scheduling-system";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if(!$conn){
    echo "Connection Failed";
    exit();
}


?>