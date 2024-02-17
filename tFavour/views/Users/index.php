<?php
session_start();
require "../../helpers/checkAuthentication.php";
require "../../helpers/checkInscription.php";
// require "../../helpers/checkstatus.php";
checkAuthentication();
checkConcours();
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
  * Template Name: eBusiness
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
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

    /* .dec:hover {
      background-color: #fff;
      color: red;
    } */
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
          <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#about">A propos</a></li>
          <li><a class="nav-link scrollto" href="#services">Formation</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Galerie</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
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

  <!-- ======= hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(../../assets/assets/img/hero-carousel/1.jpg)">
            <div class="carousel-container">
              <div class="column">
                <div class="container">
                  <h2 class="animate__animated animate__fadeInDown">Concours d'entrée à IAI-Togo</h2>
                  <p class="animate__animated animate__fadeInUp">Bienvenue sur le portail web de l'Institut Africain d'informatique, représentation du TOGO.</p>
                </div>
                <div class="h-400">
                </div>
                <div class="container">
                  <?php
                  if (checkInscription()) { ?>
                    <a href="consulter.php" class="btn btn-get-started">Consulter</a>
                  <?php } else { ?>
                    <a href="inscription.php" class="btn btn-get-started">Postuler</a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(../../assets/assets/img/hero-carousel/2.jpg)">
            <div class="carousel-container">
              <div class="column">
                <div class="container">
                  <h2 class="animate__animated animate__fadeInDown">Concours d'entrée à IAI-Togo</h2>
                  <p class="animate__animated animate__fadeInUp">
                    C'est le but de ce portail conçu pour vous permettre de prendre connaissance des missions, objectifs, activités et offres de formations de l'IAI-TOGO.
                  </p>
                </div>
                <div class="h-400">
                </div>
                <div class="container">
                  <?php
                  if (checkInscription()) { ?>
                    <a href="consulter.php" class="btn btn-get-started">Consulter</a>
                  <?php } else { ?>
                    <a href="inscription.php" class="btn btn-get-started">Postuler</a>
                  <?php } ?>
                </div>

              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(../../assets/assets/img/hero-carousel/3.jpg)">
            <div class="carousel-container">
              <div class="column">
                <div class="container">
                  <h2 class="animate__animated animate__fadeInDown">Concours d'entrée à IAI-Togo</h2>
                  <p class="animate__animated animate__fadeInUp"> C'est le lieu de remercier tous les partenaires de l'IAI-TOGO pour la confiance et les efforts consentis.</p>
                </div>
                <div class="h-400">
                </div>
                <div class="container">
                  <?php
                  if (checkInscription()) { ?>
                    <a href="consulter.php" class="btn btn-get-started">Consulter</a>
                  <?php } else { ?>
                    <a href="inscription.php" class="btn btn-get-started">Postuler</a>
                  <?php } ?>
                </div>

              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>A propos</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single-well start-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="../../assets/assets/img/about/IAIlogo.jpg" alt="" width="400">
                </a>
              </div>
            </div>
          </div>
          <!-- single-well end-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <!-- <h4 class="sec-head">A propos</h4> -->
                </a>
                <p>Le cycle licence forme au métier d'Analyste Programmeur en Informatique. Deux parcours sont proposés : License Professionnelle en Informatique (LPI) et Ingénieur des Travaux Informatiques (ITI) . Ces parcours sont proposés dans trois filières différentes : Génie Logiciel et Systèmes d'Information (GLSI), Administration des Systèmes et Réseaux (ASR)puis Multimédia, Technologies Web et Infographie MTWI. La fin du cycle est sanctionnée par l'obtention d'un diplôme de Licence Professionnelle en Informatique ou d'Ingénieur des Travaux Informatiques donnant droit à une admission par voie de concours soit en 1è" année du Cycle master, soit en filière Ingénieur. Une admission sur titre est possible au Cycle Master sous réserve de certaines conditions définies par la Direction Générale de l'IAI </p>

              </div>
            </div>
          </div>
          <!-- End col-->
        </div>
      </div>
    </div><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <div id="services" class="services-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>Nos Formations</h2>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-briefcase"></i>
                  </a>
                  <h4>Génie Logiciel</h4>
                  <p>
                    La filière Génie Logiciel forme des informaticiens capables de concevoir et de maintenir des logiciels en s’appuyant sur des méthodes et des outils très évolués. les principaux acquis après une formation en Génie Logiciel sont la maîtrise des systèmes d'information, des outils d'analyse et de modélisation, de programmation dans les langages de pointe ainsi que l'administration des bases de données. A cet effet, l'IAI-TOGO met à la disposition de ses étudiants des centres de calcul équipés de micro-ordinateurs le tout dans un réseau local pour le partage des ressources. La formation est théorique et pratique renforcée par des stages d'entreprise. </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-brightness-high"></i>
                  </a>
                  <h4>Système Réseaux</h4>
                  <p>La filière Systèmes et Réseaux, créée il y a deux ans forme des informaticiens capables de concevoir, implanter, interconnecter et administrer des réseaux informatiques et d'assurer également la maintenance de tout matériel informatique. L'accent est donc mis sur l'étude des réseaux sous la norme CISCO CCNA, les systèmes d'exploitation, l'électricité, l'électronique et la maintenance. A cet effet, l'IAI-TOGO met à la disposition de ses étudiants des salles de réseaux équipées de micro-ordinateurs le tout dans un réseau local pour le partage des ressources. La formation est très pratique. La première promotion de sept (7) étudiants ont reçu leur diplôme en 2010. </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-binoculars"></i>
                  </a>
                  <h4>Multimédia</h4>
                  <p>La licence Multimédia, Technologie Web et Infographie (M-TWI), vise à apporter aux étudiants les compétences nécessaires pour réussir leur projet, qu’il soit de création, d’administration ou d’industrialisation des produits de communication audiovisuelle. L’identité de la formation est liée à la nature pluridisciplinaire des enseignements (connaissance technologiques, informatique, gestion de projet, création audiovisuelle, infographie) et à l’opportunité d’affirmer une bonne communication via des documents multimédias. Il s’agit aussi d’intégrer une culture de management de projets multimédia et infographie. </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <div id="portfolio" class="portfolio-area area-padding fix">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Galerie</h2>
            </div>
          </div>
        </div>
        <div class="row wesome-project-1 fix">
          <!-- Start Portfolio -page -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row awesome-project-content portfolio-container">

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-app portfolio-item">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="../../assets/assets/img/portfolio/p0.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="../../assets/assets/img/portfolio/p0.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="../../assets/assets/img/portfolio/p1.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="../../assets/assets/img/portfolio/p1.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-card">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="../../assets/assets/img/portfolio/p2.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="../../assets/assets/img/portfolio/p2.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="../../assets/assets/img/portfolio/p3.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="../../assets/assets/img/portfolio/p3.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-app">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="../../assets/assets/img/portfolio/p4.jpg" alt="" /></a>
                <div class="add-actions text-center text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="../../assets/assets/img/portfolio/p4.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-web">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="../../assets/assets/img/portfolio/p5.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="portfolio-lightbox" data-gallery="myGallery" href="../../assets/assets/img/portfolio/p5.jpg">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->

        </div>
      </div>
    </div><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <div id="contact" class="contact-area">
      <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
        <div class="container ">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center">
                <h2>Contact</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-phone"></i>
                  <p>
                    Call: +1 5589 55488 55<br>
                    <span>Monday-Friday (9am-5pm)</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-envelope"></i>
                  <p>
                    Email: info@example.com<br>
                    <span>Web: www.example.com</span>
                  </p>
                </div>
              </div>
            </div>
            <!-- Start contact icon column -->
            <div class="col-md-4">
              <div class="contact-icon text-center">
                <div class="single-icon">
                  <i class="bi bi-geo-alt"></i>
                  <p>
                    Location: A108 Adam Street<br>
                    <span>NY 535022, USA</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Contact Section -->

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer>
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
  <script src="../../assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../assets/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/assets/js/main.js"></script>

</body>

</html>