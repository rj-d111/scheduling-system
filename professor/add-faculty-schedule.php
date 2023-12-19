<?php include "navbar.php" ?>

<main class="container-md">
    <a href="home.php" class="text-decoration-none link-dark">
        <div class="fs-6 mt-5 mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</div>
    </a>
    <div class="fs-2 mb-3 fw-bold">New Schedule</div>
</main>

<!-- schedule form -->
<div class="container-md mb-5">
    <!-- <h2>Subject Registration Form</h2> -->
    <form method="post" action="process_form.php">
        <!-- Faculty Name -->
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="facultyName" class="form-label">Faculty Name</label>
                    <input type="text" class="form-control" id="facultyName" name="facultyName" required>
                </div>
            </div>

            <!-- Semester -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <select class="form-select" id="semester" name="semester" required>
                        <option value="first">First</option>
                        <option value="second">Second</option>
                        <option value="summer">Summer</option>
                    </select>
                </div>
            </div>
            <!-- Subject Type -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="subjectType" class="form-label">Subject Type</label>
                    <select class="form-select" id="subjectType" name="subjectType" required>
                        <option value="lecture">Lecture</option>
                        <option value="lecLab">Lec + Lab</option>
                    </select>
                </div>
            </div>

            <!-- Description -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
            </div>

            <!-- Building Name -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="buildingName" class="form-label">Building Name</label>
                    <select class="form-select" id="buildingName" name="buildingName" required>
                        <option value="J">J Building</option>
                        <option value="S">S Building</option>
                        <option value="L">L Building</option>
                        <option value="C">C Building</option>
                    </select>
                </div>
            </div>
            <!-- Room Number -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="roomNumber" class="form-label">Room Number</label>
                    <select class="form-select" id="roomNumber" name="roomNumber" required>
                        <!-- Options will be dynamically populated based on the selected building -->
                    </select>
                </div>
            </div>

            <!-- Optional Fields for Lec + Lab -->
            <div id="lecLabFields" style="display: none;">
                <!-- Additional Building Name -->
                <div class="mb-3">
                    <label for="additionalBuildingName" class="form-label">Additional Building Name</label>
                    <select class="form-select" id="additionalBuildingName" name="additionalBuildingName">
                        <!-- Options will be dynamically populated based on the selected building -->
                    </select>
                </div>
            </div>

            <!-- Additional Room Number -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="additionalRoomNumber" class="form-label">Additional Room Number</label>
                    <select class="form-select" id="additionalRoomNumber" name="additionalRoomNumber">
                        <!-- Options will be dynamically populated based on the selected building -->
                    </select>
                </div>
            </div>

            <!-- Days of the Week -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="daysOfWeek" class="form-label">Days of the Week</label>
                    <select class="form-select" id="daysOfWeek" name="daysOfWeek" required>
                        <!-- Options will be dynamically populated based on the selected subject type -->
                    </select>
                </div>
            </div>

            <!-- Start Time -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="startTime" class="form-label">Start Time</label>
                    <select class="form-select" id="startTime" name="startTime" required>
                        <option value="7:00">7:00 AM</option>
                        <option value="8:30">8:30 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="11:30">11:30 AM</option>
                        <option value="13:00">1:00 PM</option>
                        <option value="14:30">2:30 PM</option>
                        <option value="16:00">4:00 PM</option>
                        <option value="17:30">5:30 PM</option>
                    </select>
                </div>
            </div>

            <!-- End Time -->

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="endTime" class="form-label">End Time</label>
                    <select class="form-select" id="endTime" name="endTime" required>
                        <!-- Options will be dynamically populated based on the selected subject type and start time -->
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-maroon">Submit</button>
        </div>
    </form>
</div>
</div>

<script src="../script/add-faculty-schedule.js"></script>