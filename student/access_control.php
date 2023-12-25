<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    $_SESSION['message'] = <<<AOT
    <div class="alert alert-warning" role="alert">Please log in first</div>
    AOT;
    header("location: login.php");
    exit; // Use exit for immediate termination
}
