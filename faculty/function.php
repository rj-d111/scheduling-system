<?php 
session_start();
include "../php-connect/db_conn.php";

$email = $_POST["email"];
$pword  = $_POST["password"];

//bycrypt a password
$hash = password_hash($pword, PASSWORD_BCRYPT);

//prepare and bind the statement
$sql = "SELECT * FROM tbl_faculty WHERE email='$email'";
$result = mysqli_query($conn, $sql);


if(!$result){
    header("Location: login.php?incorrect=true");
}

// echo mysqli_fetch_assoc($result)['email'];

while($row = mysqli_fetch_assoc($result)){
    if(password_verify($pword,  $row['password'])){
        echo "Verified";
        $_SESSION['email'] = $row['email'];
        $_SESSION['department'] = $row['department'];
        $_SESSION['id'] = $row['faculty_id'];
        $_SESSION['faculty_name'] = $row['faculty_name'];
        header("Location: home.php");
    }else{
        header("Location: login.php?incorrect=true");
        
    }
}


// if(mysqli_num_rows($result) === 1){
//     //the email must be unique
//     $row = mysqli_fetch_assoc($result);
//     // Assigning to SESSION
//     if($row['password']=== $hash){
//         $_SESSION['email'] = $row['email'];                
//         $_SESSION['id'] = $row['id'];
//     }else{
//         header("Location: login.php?incorrect=true");
//     }
// }else{
//     header("Location: login.php?incorrect=true");
// }


?>