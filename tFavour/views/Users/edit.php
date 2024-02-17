<?php
require_once '../../functions/getters.php';
require_once '../../helpers/db_config.php';
require_once "../../helpers/checkAuthentication.php";
require_once "../../helpers/checkInscription.php";
session_start();
if (!is_logged_in()) {
    header('Locaton: ../../auth/login.php');
}
checkConcours();
if (!checkInscription()) {
    header("Location: inscription.php");
}

$candidatureData = getCandidature();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>tFavour</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Ajoutez ces liens CDN dans la section <head> de votre document -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <!-- Favicons -->
    <link href="../../assets/assets/img/about/IAIlogo.jpg" rel="icon">
    <link href="../../assets/assets/img/about/IAIlogo.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../assets/assets/css/style.css" rel="stylesheet">

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
            padding-bottom: 140px;
        }

        .photo img {
            height: 100px;
            width: 100px;
            margin: 6px;
            margin-right: 15px;
            margin-bottom: 15px;
        }

        .photo1 img {
            height: 100px;
            width: 100px;
            margin: 6px;
            margin-right: 15px;
            margin-bottom: 15px;
        }

        .photo {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
        }

        .photo1 {
            display: flex;
            flex-direction: row;
            justify-content: center;
            width: 100%;
        }

        .pos {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            /* align-items: center;
            align-self: center; */
        }

        .pos0 {
            display: flex;
            flex-direction: row;
            justify-content: center;
            width: 100%;
        }

        .test {
            width: 100%;
        }

        .dec {
            width: auto;
            margin-right: 30px;
            margin-left: 30px;
            font-weight: bold;
        }

        .admin {
            width: auto;
            margin-right: 25px;
            margin-left: 25px;
            margin-bottom: 15px !important;
            font-weight: bold;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var currentYear = new Date().getFullYear();
            var selectYear = document.getElementById('annee_bac');

            for (var year = currentYear; year >= currentYear - 2; year--) {
                var option = document.createElement('option');
                option.value = year;
                option.text = year;
                selectYear.appendChild(option);
            }
        });
    </script>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div class="logo">
                <h1><a href="index.php"><span>t</span>Favour</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="index.html"><img src="../../assets/assets/img/logo.png" alt="" class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="../index.php">Accueil</a></li>
                    <li class="dropdown">
                        <?php if (isset($_SESSION['username'])) { ?>
                            <a href="#">
                                <span>
                                    <?= $_SESSION['username'] ?>
                                </span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                        <?php } else { ?>
                        <?php } ?>
                        <ul>
                            <?php if (is_admin()) { ?>
                                <li>
                                    <form action='../admin/index.php' method='post'>
                                        <button class='btn btn-warning admin' type='submit'>Espace Admin</button>
                                    </form>
                                    <!-- <button class=' btn btn-warning admin'href="../admin/index.php">Espace Admin</button></li> -->
                                <?php } ?>
                                <li>
                                    <form action='../../Auth/backend/logoutbackend.php' method='post'>
                                        <button class=' btn btn-danger dec ' type='submit'>Déconnexion</button>
                                    </form>
                                </li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main" class="main">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Ma Candidature</h3>
                        </div>
                        <div class="card-body" style="background-color: #04c88aaa;">
                            <form action="backend/editbackend.php" method="POST" enctype="multipart/form-data">
                                <input type="text" class="form-control hide" style="display: none;" id="id" name="id" value="<?= $candidatureData['id'] ?>" required>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 mb-md-0">
                                            <label>
                                                <h5 class="">Nom :</h5>
                                            </label>
                                            <input type="text" class="form-control" id="nom" name="nom" value="<?= $candidatureData['nom'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-white">
                                                <h5 class=""> Prénoms :</h5>
                                            </label>
                                            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $candidatureData['prenoms'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 mb-md-0">
                                            <label>
                                                <h5 class=""> Date de Naissance
                                                    :</h5>
                                            </label>
                                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?= $candidatureData['naissance'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <h5 class=""> Sexe :</h5>
                                            </label>
                                            <select class="form-control" id="sexe" name="sexe" required>
                                                <option value="Masculin" <?= ($candidatureData['genre'] == 'Masculin') ? 'selected' : '' ?>>Masculin</option>
                                                <option value="Féminin" <?= ($candidatureData['genre'] == 'Féminin') ? 'selected' : '' ?>>Féminin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 mb-md-0">
                                            <label>
                                                <h5 class=""> Nationalité :</h5>
                                            </label>
                                            <select class="form-control" id="nationalite" name="nationalite" required>
                                                <?php
                                                $availableNationalities = array("Bénin", "Burkina Faso", "Cameroun", "Centrafrique", "Congo", "Congo Brazaville", "Côte d'ivoire", "Gabon", "Niger", "Sénégal", "Tchad", "Togo");

                                                foreach ($availableNationalities as $nationality) {
                                                    echo '<option value="' . $nationality . '" ' . ($candidatureData['nationalite'] == $nationality ? 'selected' : '') . '>' . $nationality . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <h5 class=""> Année d'obtention du BAC
                                                    II :</h5>
                                            </label>
                                            <select class="form-control" name="annee_bac" required>
                                                <?php
                                                $currentYear = date('Y');
                                                for ($year = $currentYear; $year >= $currentYear - 2; $year--) {
                                                    echo '<option value="' . $year . '" ' . (($candidatureData['bac'] == $year) ? 'selected' : '') . '>' . $year . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3 mb-md-0">
                                            <label>
                                                <h5 class=""> Série du BAC II :</h5>
                                            </label>
                                            <select class="form-control" id="serie" name="serie" required>
                                                <!-- Add options for serie here -->
                                                <option value="C" <?= ($candidatureData['serie'] == 'C') ? 'selected' : '' ?>>C</option>
                                                <option value="D" <?= ($candidatureData['serie'] == 'D') ? 'selected' : '' ?>>D</option>
                                                <option value="E" <?= ($candidatureData['serie'] == 'E') ? 'selected' : '' ?>>E</option>
                                                <option value="F1" <?= ($candidatureData['serie'] == 'F1') ? 'selected' : '' ?>>F1</option>
                                                <option value="F2" <?= ($candidatureData['serie'] == 'F2') ? 'selected' : '' ?>>F2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 mb-md-0">
                                            <label>
                                                <h5 class=""> Photo :</h5>
                                            </label>
                                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <h5 class=""> Copie de la
                                                    Naissance (PDF) :</h5>
                                            </label>
                                            <input type="file" class="form-control" id="copie_naissance" name="copie_naissance" accept=".pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3 mb-md-0">
                                            <label>
                                                <h5 class=""> Copie de la
                                                    Nationalité (PDF) :</h5>
                                            </label>
                                            <input type="file" class="form-control" id="copie_nationalite" name="copie_nationalite" accept=".pdf">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <h5 class=""> Attestation du BAC
                                                    II (PDF) :</h5>
                                            </label>
                                            <input type="file" class="form-control" id="attestation_bac" name="attestation_bac" accept=".pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-danger btn-lg page-scroll">Valider les modifications</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="row text-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="fixed-bottom">
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

    <script src="../../assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../../assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../../assets/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/assets/js/main.js"></script>

</body>

</html>