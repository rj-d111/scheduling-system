<?php
session_start();

require_once "access_control.php";

$continuing = "";
if ($_SESSION['year_standing'] == 1 && $_SESSION['semester'] == 'first') {
    $continuing = "Freshman";
} else {
    $continuing = "Continuing";
}

$year_standing = "";
switch ($_SESSION['year_standing']) {
    case 1:
        $year_standing = "First Year";
        break;
    case 2:
        $year_standing = "Second Year";
        break;
    case 3:
        $year_standing = "Third Year";
        break;
    case 4:
        $year_standing = "Fourth Year";
        break;
    case 5:
        $year_standing = "Fifth Year";
        break;
}


include "navbar.php";
?>


<!-- Nav tabs -->
<div class="container-md mt-5">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#">Message</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Section Offering</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="registration.php">Registration</a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="schedule.php">Schedule</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Grades</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Calendar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Password</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Faculty Evaluation</a>
        </li>
    </ul>

</div>

<!-- Welcome Message -->
<div class="container my-3">
    <h6>Welcome, <strong><?= strtoupper($_SESSION['last_name'] . ', ' . $_SESSION['first_name'] . ' (' . $_SESSION['student_id'] . ')') ?></strong></h6>
</div>


<div class="container-md">
    <div class="card p-3">
        <div class="row justify-content-between">
            <!-- 1st Col -->
            <div class="col-sm">
                <div class="row">
                    <div class="col-md-4">
                        <strong>Student Name:</strong>
                    </div>
                    <div class="col">
                        <?= strtoupper($_SESSION['last_name'] . ', ' . $_SESSION['first_name']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <strong>Program</strong>
                    </div>
                    <div class="col">
                        <?= $_SESSION['program'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <strong>Academic Year:</strong>
                    </div>
                    <div class="col">
                        <?= $_SESSION['academic_year'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <strong>Status:</strong>
                    </div>
                    <div class="col">
                        <?= $continuing . ' (' . ucwords($_SESSION['status']) . ') (' . number_format($_SESSION['allowed_units'], 2) . ' Unit(s) Allowed)' ?>
                    </div>
                </div>
            </div>
            <!-- 2nd Col -->
            <div class="col-sm-5">
                <div class="row">
                    <div class="col-md-4">
                        <strong>Student No:</strong>
                    </div>
                    <div class="col">
                        <?= $_SESSION['student_id'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <strong>Year Level:</strong>
                    </div>
                    <div class="col">
                        <?= $year_standing; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <strong>Semester</strong>
                    </div>
                    <div class="col">
                        <?= ucwords($_SESSION['semester']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <strong>Section</strong>
                    </div>
                    <div class="col">
                        <select class="form-select" id="section">
                          <option value="" selected disabled>Please select section</option>
                          <option value="IT 301">IT 301</option>
                          <option value="IT 302">IT 302</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="container-md mt-5">
    <div class="text-center">
        <img src="../img/form-warning.png" alt="" srcset="" style="width: 200px">
        <h3 class="text-maroon fs-3 mt-3">Registration is not yet open</h3>
    </div>
</section>