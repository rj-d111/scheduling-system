<?php include "navbar.php" ?>

<div class="d-flex justify-content-center">
    <div class="card py-3 px-5 my-5 col-lg-5 col-md-6 col-sm-8 col-10">
        <!-- Start of Login Page-->
        <form method="post" action="login-check.php">
            <!-- Picture -->
            <div class="text-center">
                    <img src="../img/student-logo.png" alt="" width="100" height="100" class="mb-4">
                    <h1 class="h3 mb-3 fw-bold">STUDENT ACCESS MODULE</h1>
                </div>
                <?php if(isset($_GET['incorrect']) && $_GET['incorrect']){ ?>
                <div class="alert alert-danger" role="alert">Incorrect Email or Password</div>
                <?php }?>
            <!-- User Name -->
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <!-- Birth Date -->
            <div class="mb-3">
                <label class="form-label">Birth Date</label>
                <div class="row">
                    <div class="col">
                        <select class="form-select" name="month" required>
                            <option value="" disabled selected>Month</option>
                            <!-- Add options for each month -->
                            <!-- Example for the first three months -->
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                            <!-- Add the rest of the months -->
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-select" name="day" required>
                            <option value="" disabled selected>Day</option>
                            <!-- Add options for each day -->
                            <!-- Example for the first three days -->
                            <?php
                            for ($day = 1; $day <= 31; $day++) {
                                echo "<option value=\"$day\">$day</option>";
                            }
                            ?>
                            <!-- Add the rest of the days -->
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-select" name="year" required>
                            <option value="" disabled selected>Year</option>
                            <!-- Add options for each year -->
                            <!-- Example for the years 1963 to 2023 -->
                            <?php
                            for ($year = date("Y"); $year >= 1943; $year--) {
                                echo "<option value=\"$year\">$year</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-maroon btn-lg">Login</button>
            </div>
        </form>
        <!-- End of Login Page -->
    </div>
</div>


                    