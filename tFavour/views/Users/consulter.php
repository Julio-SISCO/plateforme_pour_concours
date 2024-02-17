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
                        <?php if ($candidatureData) : ?>
                            <div class="card-body">
                                <div class="pos">
                                    <div class="photo1">
                                        <img src="../../<?= $candidatureData['photo_url'] ?>" alt="Photo">
                                        <div class="photo">
                                            <div class="row">
                                                <div class="col-4">
                                                    <h5><strong>Nom:</strong></h5>
                                                </div>
                                                <div class="col-8">
                                                    <h5><strong> <?= $candidatureData['nom'] ?></strong></h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <h5><strong>Prenoms:</strong></h5>
                                                </div>
                                                <div class="col-8">
                                                    <h5><strong><?= $candidatureData['prenoms'] ?></strong></h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <h5><strong>Né(e) le :</strong></h5>
                                                </div>
                                                <div class="col-8">
                                                    <h5><strong><?= $candidatureData['naissance'] ?></strong></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pos0">
                                        <div class="test">
                                            <div class="test0 text-center">
                                                <sapn> <strong>Nationalité : <?= $candidatureData['nationalite'] ?> | Sexe : <?= $candidatureData['genre'] ?> | BAC : <?= $candidatureData['bac'] ?> | Série : <?= $candidatureData['serie'] ?></strong> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pos0">
                                        <div class="test mt-5">
                                            <ul class="row text-center">
                                                <?php if (isset($candidatureData['documents'])) : ?>
                                                    <?php foreach ($candidatureData['documents'] as $type => $doc) :
                                                        $path = '../../' . $doc['doc_url']; ?>
                                                        <div class="col-4">
                                                            <button class="btn btn-secondary" onclick="openPopup('<?php echo $path; ?>')">
                                                                <?= $type ?>
                                                            </button>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php else : ?>
                            <p>Aucune candidature trouvée.</p>
                        <?php endif; ?>
                        <div class="card-footer text-center py-3">
                            <div class="row text-center">
                                <div class="col-6">
                                    <a class="btn btn-info " href="edit.php">Modifier</a>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-danger" onclick="confirmDelete()">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="nationalitePopup" class="popup">
            <span class="close mt-4" onclick="closePopup('nationalitePopup')">&times; Fermer</span>
            <div class="popup-content">
                <embed src="" width="1000px" height="600px" type='application/pdf'>
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

    <script>
        function openPopup(pdfPath) {
            var popup = document.getElementById('nationalitePopup');
            popup.style.display = 'block';
            popup.querySelector('embed').src = pdfPath;
        }

        function closePopup(popupId) {
            var popup = document.getElementById(popupId);
            popup.style.display = 'none';
        }

        function confirmDelete() {
            Swal.fire({
                title: 'Êtes-vous sûr de vouloir supprimer cette candidature?',
                text: "Cette action est irréversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: 'backend/delete.php',

                        success: function(response) {
                            if (response.status) {
                                Swal.fire(
                                    'Supprimé!',
                                    'La candidature a été supprimée.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Erreur!',
                                    'Une erreur est survenue lors de la suppression.',
                                    'error'
                                );
                            }
                        },
                        error: function() {
                            Swal.fire(
                                'Erreur!',
                                'Une erreur est survenue lors de la suppression.',
                                'error'
                            );
                        }
                    });
                }
            });
        }

        function deleteCandidature() {
            $.ajax({
                type: 'POST',
                url: 'backend/delete.php',

                success: function(response) {
                    if (response.status) {
                        Swal.fire(
                            'Supprimé!',
                            'La candidature a été supprimée.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire(
                            'Erreur!',
                            'Une erreur est survenue lors de la suppression.',
                            'error'
                        );
                    }
                },
                error: function() {
                    Swal.fire(
                        'Erreur!',
                        'Une erreur est survenue lors de la suppression.',
                        'error'
                    );
                }
            });
        }
    </script>
    <!-- Vendor JS Files -->
    <script src="../../assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../../assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../../assets/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/assets/js/main.js"></script>
    
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>