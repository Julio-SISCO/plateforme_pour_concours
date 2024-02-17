<?php
session_start();
require "../helpers/checkAuthentication.php";
require "../helpers/checkInscription.php";
checkAuthentication();
checkConcours();
adminRedirection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Titre</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="../assets/css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="../assets/css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="../assets/images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="../assets/images/loading.gif" alt="#" /></div>

   </div>
   <!-- end loader -->
   <!-- header -->
   <header>
      <!-- header inner -->
      <div class="header">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo">
                           <a href="index.html">
                              Logo
                              <!-- <img src="images/logo.png" alt="#" /> -->
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                  <nav class="navigation navbar navbar-expand-md navbar-dark ">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                        aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item active">
                              <a class="nav-link" href=""> Home </a>
                           </li>
                           <?php
                           if (isset($_SESSION['username'])) {
                              $username = $_SESSION['username'];
                              echo "
                                 <li class='nav-item dropdown'>
                                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                       <img src='../assets/images/profile.png' style='height:25px !important;'></img> $username
                                    </a>
                                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                       <form action='../Auth/logoutbackend.php' method='post'>
                                          <button class='dropdown-item' type='submit'>Déconnexion</button>
                                       </form>
                                    </div>
                                 </li>
                              ";
                           }
                           ?>
                        </ul>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </div>
   </header>

   <!-- end header inner -->
   <!-- end header -->
   <!-- banner -->
   <section class="banner_main">

      <div id="banner1" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#banner1" data-slide-to="0" class="active"></li>
            <li data-target="#banner1" data-slide-to="1"></li>
            <li data-target="#banner1" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container-fluid">
                  <div class="carousel-caption">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="text-bg">
                              <?php
                              if (isset($_SESSION['libelle'])) {
                                 $libelle = $_SESSION['libelle'];
                                 echo "
                              <span>concours d'entrée $libelle</span>
                              ";
                              }
                              ?>
                              <h1>IAI-TOGO</h1>
                              <p>Bienvenue sur le portail web de l'Institut Africain d'informatique, représentation du
                                 TOGO. Ouvert le 22 octobre 2002, l'IAI-TOGO est une école inter-Etats d'enseignement
                                 supérieur en Informatique. Il est membre du réseau IAI créé le 29 janvier 1971 à Fort
                                 Lamy (actuel Ndjaména) en république de TCHAD. Après quinze années d'existence, il
                                 convient de rendre plus visible l'Institut et de communiquer davantage avec nos
                                 partenaires. C'est le but de ce portail conçu pour vous permettre de prendre
                                 connaissance des missions, objectifs, activités et offres de formations de l'IAI-TOGO.
                                 C'est le lieu de remercier tous les partenaires de l'IAI-TOGO pour la confiance et les
                                 efforts consentis. </p>
                              <?php
                              if (checkInscription()) {
                                 ?>
                                 <a href="consulter.php">Consulter</a>
                              <?php } else {
                                 ?>
                                 <a href="inscription.php">Postuler</a>'
                              <?php }
                              ?>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="text_img">
                              <figure><img src="../assets/img/bg-info.jpg" alt="#" /></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="carousel-item">
               <div class="container-fluid">
                  <div class="carousel-caption">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="text-bg">
                              <?php
                              if (isset($_SESSION['libelle'])) {
                                 $libelle = $_SESSION['libelle'];
                                 echo "
                              <span>concours d'entrée $libelle</span>
                              ";
                              }
                              ?>
                              <h1>IAI-TOGO</h1>
                              <p>L’institut Africain d’Informatique, du Togo (IAI-TOGO) est une représentation de l’IAI
                                 qui a été créé le 29 janvier 1971 à Fort Lamy (actuel Ndjaména) en république du TCHAD.
                                 Son siège est à Libreville au Gabon. C’est un établissement d’enseignement supérieur en
                                 informatique. L’accord d’établissement entre l’IAI et la république Togolaise a été
                                 signé le 12 mai 2006 à Lomé. </p>
                              <?php
                              if (checkInscription()) {
                                 echo '<a href="consulter.php">Consulter</a> ';
                              } else {
                                 echo '<a href="inscription.php">Postuler</a>';
                              }
                              ?>

                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="text_img">
                              <figure><img src="../assets/images/car.png" alt="#" /></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="carousel-item">
               <div class="container-fluid">
                  <div class="carousel-caption">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="text-bg">
                              <?php
                              if (isset($_SESSION['libelle'])) {
                                 $libelle = $_SESSION['libelle'];
                                 echo "
                              <span>concours d'entrée $libelle</span>
                              ";
                              }
                              ?>
                              <h1>IAI-TOGO</h1>
                              <p>L'IAI-TOGO offre une large gamme de programmes de formation pour aider les étudiants à
                                 atteindre leurs objectifs de carrière dans l'informatique ¹⁴. Les programmes de
                                 formation sont conçus par des professionnels de l'informatique et sont mis à jour
                                 régulièrement pour rester en adéquation avec les dernières technologies et les besoins
                                 du marché du travail.</p>
                              <?php
                              if (checkInscription()) {
                                 echo '<a href="consulter.php">Consulter</a> ';
                              } else {
                                 echo '<a href="inscription.php">Postuler</a>';
                              }
                              ?>


                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="text_img">
                              <figure><img src="../assets/images/car.png" alt="#" /></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

         </div>
         <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
         </a>
         <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
         </a>
      </div>
   </section>
   <!-- end banner -->
   <!-- services section -->
   <div class="services">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Nos Formations</h2>
                  <p>L'IAI offre probablement des cursus académiques tels que des diplômes, des licences et des
                     programmes de maîtrise en informatique</p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div id="co_hocha" class="services_box">
                  <div class="flex">
                     <i><img src="../assets/images/thr.png" alt="#" /></i>
                     <h3>Génie Logiciel</h3>
                  </div>
                  <p> Cette filière est destinée aux personnes qui souhaitent acquérir des compétences en développement
                     de logiciels, conception de systèmes d'information, gestion de projets informatique</p>
               </div>
               <a class="read_more margin_bottom1" href="#">Voir Plus</a>
            </div>
            <div class="col-md-4">
               <div id="co_hocha" class="services_box">
                  <div class="flex">
                     <i><img src="../assets/images/thr1.png" alt="#" /></i>
                     <h3>Systèmes Réseaux </h3>
                  </div>
                  <p> Cette filière est destinée aux personnes qui souhaitent acquérir des compétences en administration
                     de systèmes informatiques, gestion de réseaux, sécurité informatique </p>
               </div>
               <a class="read_more margin_bottom1" href="#">Voir Plus</a>
            </div>
            <div class="col-md-4">
               <div id="co_hocha" class="services_box">
                  <div class="flex">
                     <i><img src="../assets/images/thr2.png" alt="#" /></i>
                     <h3>Multimédia (MTWI) </h3>
                  </div>
                  <p>Cette filière est destinée aux personnes qui souhaitent acquérir des compétences en conception de
                     sites web, développement d'applications multimédias, infographie </p>
               </div>
               <a class="read_more" href="#">Voir Plus</a>
            </div>
         </div>
      </div>
   </div>
   <!-- services section -->
   <!-- about -->
   <div class="about">
      <div class="container">
         <div class="row">
            <div class="col-md-6 ">
               <div class="about_box">
                  <div class="titlepage">
                     <h2>A propos de IAI-TOGO</h2>
                  </div>
                  <p> L’institut Africain d’Informatique, du Togo (IAI-TOGO) est une représentation de l’IAI qui a été
                     créé le 29 janvier 1971 à Fort Lamy (actuel Ndjaména) en république du TCHAD. Son siège est à
                     Libreville au Gabon. C’est un établissement d’enseignement supérieur en informatique. L’accord
                     d’établissement entre l’IAI et la république Togolaise a été signé le 12 mai 2006 à Lomé.
                  </p>
                  <a class="read_more">Lire Plus</a>
               </div>
            </div>
            <div class="col-md-6">
               <div class="about_img">
                  <figure><img src="../assets/images/about.png" alt="#" /></figure>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end about -->
   <!-- team  section -->
   <div class="team ">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="titlepage">
                  <h2>Nos Equipes</h2>
                  <p>Une équipe expérimenté prets à atteindre les objectifsdans le carriere informatique </p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-10 offset-md-1">
               <div class="row">
                  <div class="col-md-3 col-sm-6">
                     <div class="our_team">
                        <figure><img src="../assets/images/team1.png" alt="#" /></figure>
                        <h3>enseignant </h3>
                        <span>Des professeurs qualifiés et des experts dans le domaine de l'informatique et de l'IA
                           seraient probablement présents pour encadrer les étudiants.</span>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <div class="our_team">
                        <figure><img src="../assets/images/team2.png" alt="#" /></figure>
                        <h3>Etudiant </h3>
                        <span> compétences pratiques et théoriques en informatique, ainsi que pour les préparer à des
                           carrières dans des domaines tels que le développement de logiciels, la sécurité informatique,
                           l'analyse de données et plus encore .</span>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <div class="our_team">
                        <figure><img src="../assets/images/team3.png" alt="#" /></figure>
                        <h3>Agents </h3>
                        <span> Des experts universitaires et des professionnels de l’informatique, qui ont pour mission
                           principale la formation de cadres informaticiens africains</span></span>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <div class="our_team">
                        <figure><img src="../assets/images/team4.png" alt="#" /></figure>
                        <h3>Partenaires</h3>
                        <span>Il est impliqué dans des collaborations avec des institutions éducatives et des
                           entreprises, favorisant ainsi les opportunités de recherche et de stage pour les
                           étudiants.</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end team  section -->
   <!--  footer -->
   <footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <ul class="location_icon">
                     <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> Address : Kozah, - 07 BP
                        12456 Lomé 04 Lomé - Togo <br>
                        59, Rue de la Derrière l’Imm. UAT, Imm. CENETI Nyékonakpoé
                     </li>
                     <li><a href="#"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></a>Phone : +(1234)
                        567 890</li>
                     <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>Email : www.IAI-togo.tg</li>
                  </ul>
               </div>
               <div class="col-md-7">
                  <div class="map">
                     <figure><img src="../assets/images/map.jpg" alt="#" /></figure>
                  </div>
               </div>
            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <p>Copyright 2019 All Right Reserved By<a href="https://html.design/"> Free html Templates</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- end footer -->
   <!-- Javascript files-->
   <script src="../assets/js/jquery.min.js"></script>
   <script src="../assets/js/popper.min.js"></script>
   <script src="../assets/js/bootstrap.bundle.min.js"></script>
   <script src="../assets/js/jquery-3.0.0.min.js"></script>
   <!-- sidebar -->
   <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="../assets/js/custom.js"></script>
</body>

</html>