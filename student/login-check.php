<?php
session_start();
include "../php-connect/db_conn.php";

header("Location: registration.php");


// $months = [
//     'January' => 1,
//     'February' => 2,
//     'March' => 3,
//     'April' => 4,
//     'May' => 5,
//     'June' => 6,
//     'July' => 7,
//     'August' => 8,
//     'September' => 9,
//     'October' => 10,
//     'November' => 11,
//     'December' => 12,
// ];

// $username = $_POST["username"];
// $month = $months[$_POST["month"]];
// $day = $_POST["day"];
// $year = $_POST["year"];
// $pword  = $_POST["password"];

// $date = $year+"-"+$month+"-"+$day;
// //bycrypt a password
// $hash = password_hash($pword, PASSWORD_BCRYPT);

// //prepare and bind the statement
// // $sql = "SELECT * FROM tbl_school_head WHERE email='$email'";
// $sql = "";
// $result = mysqli_query($conn, $sql);



// // echo mysqli_fetch_assoc($result)['email'];

// while($row = mysqli_fetch_assoc($result)){
//     if(password_verify($pword,  $row['password'])){
//         echo "Verified";
//         $_SESSION['email'] = $row['email'];
//         header("Location: home.php");
//     }else{
//         header("Location: login.php?incorrect=true");
        
//     }
// }


?>