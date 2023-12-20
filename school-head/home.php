<?php
session_start();
include "navbar.php";
include "../php-connect/db_conn.php";

// Assume you have a database connection established
// Include your database connection logic here

if (isset($_SESSION['email'])) {
?>

  <!-- Start of Content -->
  <main class="flex-shrink-0">
    <div class="container my-5">

  
          <!-- Start of tab 1 -->
          <?php
          //SQL query to join tbl_application and tbl_customer
          $sql = "SELECT * FROM tbl_course GROUP BY department, course_id";
          // Execute the query
          $result = mysqli_query($conn, $sql);
          ?>
          <a href="add-course.php" class="btn btn-maroon my-3">+ Add Course</a>


          <h2 class="text-maroon mb-3">Courses List</h2>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Course Code</th>
                <th scope="col">Description</th>
                <th scope="col">Department</th>
                <th scope="col">Lec</th>
                <th scope="col">Lab</th>
                <th scope="col">Units</th>
                <!-- <th scope="col">Schedule</th> -->

              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo '<th scope="row">' . $i . '</td>';
                  echo "<td>{$row['course_id']}</td>";
                  echo "<td>{$row['subject_name']}</td>";
                  echo "<td>{$row['department']}</td>";
                ?>
                <td>3</td>
                <td>0</td>
                <td>3</td>
                  <td>
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                  </td>
                <?php
                  echo "</tr>";
                  $i++;
                }
                ?>
            </tbody>
          </table>
        </div>
        <!-- End of tab 1 -->
      </div>
   
    </div>
    </div>

  </main>

<?php
 // include "../footer.php";
} else {
    header("Location: login.php");
}
?>