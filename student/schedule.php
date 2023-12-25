<?php 

session_start();
require_once "access_control.php";
include "navbar.php"; 
include "../php-connect/db_conn.php";
$sql = "SELECT f.faculty_name, ss.subject_code, subj.subject_name, subj.lec, subj.lab, subj.units, sch.day, sec.section_name, sch.start_time, sch.end_time, sch.room_no FROM tbl_schedule sch JOIN tbl_subject_section ss ON sch.subject_section_id = ss.subject_section_id JOIN tbl_subjects subj ON ss.subject_code = subj.subject_code JOIN tbl_section sec ON sec.section_id = ss.section_id JOIN tbl_faculty_assignments fa ON ss.subject_section_id = fa.subject_section_id JOIN tbl_faculty f ON fa.faculty_id = f.faculty_id;";
$result = mysqli_query($conn,$sql);

# Get the year enrolled
$date_string = $_SESSION['student_id'];
# Split the string by the delimiter "-"
$date_parts = explode("-", $date_string);
# Get the year from the first element
$year_admitted = $date_parts[0];

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
      <a class="nav-link" href="registration.php">Registration</a>

    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="schedule.php">Schedule</a>
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

<div class="container-md mt-5">
  <!-- Academic Year and Semester Dropdowns -->
  <div class="mb-3 col-md-2">
    <label for="academicYear" class="form-label">Academic Year</label>
    <select class="form-select" id="academicYear">
      <!-- Options for Academic Year (2023 to 2003) -->
      <?php
      for ($year = 2023; $year >= $year_admitted; $year--) {
        echo "<option value=\"$year\">$year</option>";
      }
      ?>
    </select>
  </div>

  <div class="mb-3 col-md-2">
    <label for="semester" class="form-label">Semester</label>
    <select class="form-select" id="semester">
      <!-- Options for Semester (First, Second, and Summer) -->
      <option value="First">First</option>
      <option value="Second">Second</option>
      <option value="Summer">Summer</option>
    </select>
  </div>

  <!-- Table -->
  <table class="table table-bordered">
    <!-- Table Header -->
    <thead class="table table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Faculty</th>
        <th scope="col">Course Code</th>
        <th scope="col">Description</th>
        <th scope="col">Lec</th>
        <th scope="col">Lab</th>
        <th scope="col">Units</th>
        <th scope="col">Schedule</th>
      </tr>
    </thead>

    <!-- Table Body -->
    <tbody>
      <?php
  
    $i = 1;
    $lastSubjectCode = null;
    $combinedSchedules = '';
    
    while ($row = mysqli_fetch_assoc($result)) {
        // Assuming that the result set is ordered by subject_code
        if ($row['subject_code'] !== $lastSubjectCode) {
            // If a new subject code is encountered, start a new row
            if ($lastSubjectCode !== null) {
              $combinedSchedules = rtrim($combinedSchedules, " /");
              echo "<td>{$combinedSchedules}</td>";
                echo "</tr>";
                $i++;
            }
            echo "<tr>";
            echo "<th scope='row'>{$i}</th>";
            echo "<td>{$row['faculty_name']}</td>";
            echo "<td>{$row['subject_code']}</td>";
            echo "<td>{$row['subject_name']}</td>";
            echo "<td>{$row['lec']}</td>";
            echo "<td>{$row['lab']}</td>";
            echo "<td>{$row['units']}</td>";
            $combinedSchedules = '';
            $lastSubjectCode = $row['subject_code'];
        }
    
        // Concatenate the schedule information

        $combinedSchedules .= "{$row['section_name']} {$row['day']} " . Convert12HourFormat($row['start_time']) . "-" . Convert12HourFormat($row['end_time']) . " {$row['room_no']}  / ";

    }
    
    // Output the last row
    if ($lastSubjectCode !== null) {
        $combinedSchedules = rtrim($combinedSchedules, " /");
        echo "<td>{$combinedSchedules}</td>";
        echo "</tr>";
    }
    
      //Convert to 12 hour format
    function Convert12HourFormat($time_from_mysql){
      $datetime = new DateTime($time_from_mysql);
      return $datetime->format('g:i a');
    }

        // echo "<tr class=''>";
        // echo  "<th scope='row'>{$i}</th>";
        // echo "<td>{$row['faculty_name']}</td>";
        // echo "<td>{$row['subject_code']}</td>";
        // echo "<td>{$row['subject_name']}</td>";
        // echo "<td>{$row['lec']}</td>";
        // echo "<td>{$row['lab']}</td>";
        // echo "<td>{$row['units']}</td>";
        // echo "<td>{$row['start_time']}</td>";
        // echo "</tr>"; 
        // $i++;
    //  }
      // Generating 8 example table rows
 
      ?>
    </tbody>
  </table>

  <!-- Start of Schedule Content -->


  <table class="table table-bordered mt-5">
    <!-- Table Head -->
    <thead class="table-dark text-center">
      <tr>
        <th scope="col" class="no-border"></th>
        <th scope="col">Monday</th>
        <th scope="col">Tuesday</th>
        <th scope="col">Wednesday</th>
        <th scope="col">Thursday</th>
        <th scope="col">Friday</th>
        <th scope="col">Saturday</th>
      </tr>
    </thead>

    <!-- Table Body -->
    <tbody>
      <?php
      // Generating rows for each hour from 7:00 AM to 9:00 PM, skipping 30 minutes
      for ($hour = 7; $hour <= 21; $hour++) {
        $am_pm = ($hour < 12) ? 'am' : 'pm';
        $display_hour = ($hour > 12) ? $hour - 12 : $hour;
        echo "<tr>
                <th scope=\"row\" rowspan=\"2\">$display_hour:00 $am_pm</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>";

        // Add row for 30 minutes past the hour
        if ($hour <= 21) {
          echo "<tr>
              
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>";
        }
      }
      ?>
    </tbody>
  </table>

  <!-- End of Schedule Content -->
</div>

<script>
  
</script>

<!-- <script src="../script/drag-schedule.js"></script> -->