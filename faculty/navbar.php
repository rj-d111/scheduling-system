<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="../assets/fontawesome6/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/fontawesome6/css/brands.css" rel="stylesheet">
    <link href="../assets/fontawesome6/css/solid.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <!-- start of navbar -->
    <nav class="navbar navbar-dark fixed-top bg-maroon text-iwata" style="">
        <div class="container">

            <a class="navbar-brand me-auto" href="login.php">
                <div class="row align-items-center">
                    <div class="col ps-3 pe-0">
                        <img src="../img/lpu-logo.png" style="height: 80px" alt="" srcset="">
                    </div>
                    <div class="col" id="title-logo">
                        <span class="fs-4">LYCEUM OF THE PHILIPPINES UNIVERSITY <br>CAVITE</span>
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- offcanvas -->
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header bg-maroon">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body bg-maroon">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <?php if (basename($_SERVER['SCRIPT_FILENAME']) !== 'login.php') { ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Messsage</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="registration.php">Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Students</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="schedule.php">Reports</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Settings</a>
                            </li>
                            <hr>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="logout.php">LOG OUT</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../school-head/login.php">School Head Log in</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../student/login.php">Student Log in</a>
                            </li>

                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

    </nav>
    <section class="fix-top" style="height: 106px"></section>

    <!-- script -->
    <script src="../script/nav.js"></script>

</body>

</html>