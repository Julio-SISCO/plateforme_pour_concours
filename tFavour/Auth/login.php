<?php
session_start();
require '../helpers/checkAuthentication.php';
if (is_logged_in()) {
    header('Location: ../Users/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>tFavour</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/assets/img/about/IAIlogo.jpg" rel="icon">
    <link href="../assets/assets/img/about/IAIlogo.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: tFavour
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/tFavour-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        .main {
            padding-top: 140px;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div class="logo">
                <h1><a href="index.php"><span>t</span>Favour</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="index.html"><img src="../assets/assets/img/logo.png" alt="" class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="../index.php">Accueil</a></li>
                    <li><a class="nav-link scrollto" href="register.php">S'inscrire</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main" class="main" >


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Login</h3>
                        </div>
                        <div class="card-body">
                            <form action="backend/loginbackend.php" method="post">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="text" placeholder="Username" name="username" required/>
                                    <label for="inputEmail">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" required />
                                    <label for="inputPassword">Password</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="password.html">Forgot Password?</a>
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="fixed-bottom" >
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright <strong>tFavour</strong>. All Rights Reserved
                            </p>
                        </div>
                        <div class="credits">
                            Designed by <a href="https://github.com/Julio-SISCO/">Julio Sisco</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/assets/js/main.js"></script>

</body>

</html>