<?php include "navbar.php"; 
include "../php-connect/db_conn.php";
$sql = "SELECT * FROM tbl_schedule";
$result = mysqli_query($conn,$sql);
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
      for ($year = 2023; $year >= 2003; $year--) {
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
      while($row = mysqli_fetch_assoc($result)){
        echo "<tr class=''>";
        echo  "<th scope='row'>{$i}</th>";
        echo "<td>{$row['faculty']}</td>";
        echo "<td>{$row['course_id']}</td>";
        echo "<td>{$row['description']}</td>";
        echo "<td>{$row['lec']}</td>";
        echo "<td>{$row['lab']}</td>";
        echo "<td>{$row['units']}</td>";
        echo "<td>{$row['schedule']}</td>";
        echo "</tr>"; 
        $i++;
      }
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

<!-- <script src="../script/drag-schedule.js"></script> -->