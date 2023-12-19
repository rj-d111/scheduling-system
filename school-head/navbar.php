<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AIMS Student Portal</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="../assets/fontawesome6/css/fontawesome.css" rel="stylesheet">
        <link href="../assets/fontawesome6/css/brands.css" rel="stylesheet">
        <link href="../assets/fontawesome6/css/solid.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="../style/style.css">
    </head>
</head>

<body>


    <!-- Navbar in mobile devices -->
    <div class="fixed-top bg-maroon text-iwata text-white" id="navbar-all">
        <!-- Start of Logo -->
        <div class="container-md d-flex align-items-center my-3 mx-auto text-center d-none">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="../img/lpu-logo.png" alt="Bootstrap" style="max-width: 60px; margin-right: 10px;">

                <h4 class="text-white ms-0 mb-0 text-start">LYCEUM OF THE PHILIPPINES UNIVERSITY <br><small>CAVITE</small></h4>          
            </a>
            <?php if ( basename($_SERVER['SCRIPT_FILENAME']) !== 'login.php') : ?>
            <div class="d-flex ms-auto text-start">
              <a class="navbar-brand fs-6" href="logout.php">LOGOUT</a>
            </div>
          <?php endif; ?>
        </div>
    </div>

    <!-- End of Logo -->

    <nav class="navbar navbar-expand-md navbar-dark bg-maroon" aria-label="Offcanvas navbar large" style="
    height: 80px;
">

        <div class="container-fluid">
          
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-1 justify-content-center d-flex">
                    <a href="index.php" class="">
                        <img src="../img/lpu-logo.png" alt="" srcset="" id="logo-white" class="img-fluid position-absolute start-46 top-15" style="height: 55px;">
                    </a>
                </div>
    
            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                <div class="offcanvas-header bg-maroon">
                    <h5 class="offcanvas-title" id="offcanvasNavbar2Label">MENU</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body bg-maroon">
                    <ul class="navbar-nav justify-content-evenly flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#section-1">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#id-types">REGISTER</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section-3">HOW TO APPLY</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section-4">REQUIREMENTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="customer/check-status.php">CHECK STATUS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section-5">CONTACT US</a>
                        </li>
                        <span class="admin-log-in">
                            <hr>
                            <li class="nav-item">
                                <a class="nav-link" href="admin/login.php">ADMIN LOG IN</a>
                            </li>
                        </span>

                    </ul>
                </div>
            </div>
        </div>

    </nav>

    <!-- End of navbar in mobile devices -->

    <section id="fix-top"></section>


    <!-- Script for navbar -->
    <script src="../script/navbar.js"></script>