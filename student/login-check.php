<?php
session_start();
include "../php-connect/db_conn.php";

// header("Location: registration.php");

$months = [
    'January' => 1,
    'February' => 2,
    'March' => 3,
    'April' => 4,
    'May' => 5,
    'June' => 6,
    'July' => 7,
    'August' => 8,
    'September' => 9,
    'October' => 10,
    'November' => 11,
    'December' => 12,
];

$username = $_POST["username"];
$month = $months[$_POST["month"]];
$day = $_POST["day"];
$year = $_POST["year"];
$pword  = $_POST["password"];


$dateString = "$year-$month-$day";
$mysqlDate = date("Y-m-d", strtotime($dateString));

//bycrypt a password
$hash = password_hash($pword, PASSWORD_BCRYPT);

//prepare and bind the statement
$sql = "SELECT * FROM tbl_student WHERE student_id='$username'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){
    wrongcredentials();
}

while($row = mysqli_fetch_assoc($result)){

    if(password_verify($pword,  $row['password']) && $row['date_of_birth'] == $mysqlDate){
        echo "Verified";
        // Assign values to session variables
        $_SESSION['student_id'] = $row['student_id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['date_of_birth'] = $row['date_of_birth'];
        $_SESSION['program'] = $row['program'];
        $_SESSION['semester'] = $row['semester'];
        $_SESSION['academic_year'] = $row['academic_year'];
        $_SESSION['year_standing'] = $row['year_standing'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['allowed_units'] = $row['allowed_units'];
        header("Location: home.php");
    }else{
        wrongcredentials();
    }
}

function wrongcredentials(){
    echo "Wrong Credentials";
    $_SESSION['message'] = <<<AOT
    <div class="alert alert-danger" role="alert">Incorrect User Name, Birth Date, or Password</div>
    AOT;
    header("location: login.php");
}


?>