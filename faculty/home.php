<?php
session_start();
include "navbar.php";
include "../php-connect/db_conn.php";

$sql = "SELECT tbl_subjects.subject_code, tbl_subjects.subject_name, tbl_section.section_name, tbl_schedule.day, tbl_schedule.start_time, tbl_schedule.end_time, tbl_schedule.room_no, tbl_faculty.department
FROM tbl_schedule
JOIN tbl_subject_section
ON tbl_schedule.subject_section_id = tbl_subject_section.subject_section_id
JOIN tbl_subjects
ON tbl_subject_section.subject_code = tbl_subjects.subject_code
JOIN tbl_section
ON tbl_subject_section.section_id = tbl_section.section_id
JOIN tbl_faculty_assignments
ON tbl_schedule.subject_section_id = tbl_faculty_assignments.subject_section_id
JOIN tbl_faculty
ON tbl_faculty_assignments.faculty_id = tbl_faculty.faculty_id
WHERE tbl_faculty_assignments.faculty_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();

?>

<div class="container-md mt-5">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="#">Message</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Dashboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="registration.php">Schedule</a>

    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="home.php">Courses</a>

    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Students</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Reports</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Settings</a>
    </li>
  </ul>

</div>

<div class="container-md">
    <h4 class="my-3">Good day, <?= $_SESSION['faculty_name'] ?></h4>
</div>

<section class="container-md">
    <h4 class="my-3">Your Subjects</h4>

    <div class="row  row-cols-1 row-cols-lg-3 row-cols-md-3 row-cols-sm-2 gy-3">
        <?php
if (mysqli_num_rows($result) > 0) {
    $unique_data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $subject_code = $row["subject_code"];
        $subject_name = $row["subject_name"];
        $section_name = $row["section_name"];
        $schedule_day = $row["day"];
        $start_time = $row["start_time"];
        $end_time = $row["end_time"];
        $room_no = $row["room_no"];
        $department = $row["department"];

        $key = $subject_code . $subject_name . $section_name;
        if (array_key_exists($key, $unique_data)) {
            $unique_data[$key]['schedule'] .= ' ' . $schedule_day . ' ' . date('g:i A', strtotime($start_time)) . '-' . date('g:i A', strtotime($end_time)) . ' ' . $room_no;
        } else {
            $unique_data[$key] = array(
                'subject_code' => $subject_code,
                'subject_name' => $subject_name,
                'section_name' => $section_name,
                'schedule' => $schedule_day . ' ' . date('g:i A', strtotime($start_time)) . '-' . date('g:i A', strtotime($end_time)) . ' ' . $room_no,
                'department' => $department
            );
        }
    }

    foreach ($unique_data as $data) {
        echo '<div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 mt-0 fs-3">
                            <i class="fas fa-computer"></i>
                        </div>
                        <h4 class="card-title">' . $data['subject_code'] . ' ' . $data['subject_name'] . '</h4>
                        <h5 class="card-subtitle mb-2 mt-5">' . $data['section_name'] . '</h5>
                        <h5 class="card-subtitle mb-2">' . $data['schedule'] . '</h5>
                        <p class="card-text">' . $data['department'] . '</p>
                    </div>
                </div>
            </div>';
    }
}

?>
    </div>
</section>