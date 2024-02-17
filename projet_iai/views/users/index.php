<?php
session_start();
require "../../helpers/checkAuthentication.php";
require "../../helpers/checkInscription.php";
checkAuthentication();
checkConcours();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IAI-HUB-ADMIT</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Favicons
    ================================================== -->
  <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="../../assets/img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../../assets/img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../../assets/img/apple-touch-icon-114x114.png">

  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fonts/font-awesome/css/font-awesome.css">

  <!-- Stylesheet
    ================================================== -->
  <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/nivo-lightbox/nivo-lightbox.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/nivo-lightbox/default.css">
  <link href="../../assets/https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="../../assets/https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
  <!-- Navigation
    ==========================================-->
  <nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="d-flex justify-content-between">
      <?php
      if (isset($_SESSION['username'])): ?>
        <div id="1">
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle page-scroll" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i>
                <?php echo $_SESSION['username']; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <form action="../../auth/backend/logoutbackend.php" method="post">
                  <div class="dropdown-item text-center">
                    <button class="btn btn-danger" type="submit">Déconnexion</button>
                  </div>
                </form>
              </div>
            </li>
          </ul>
        </div>
      <?php endif; ?>

      <div class="container" id="0">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand page-scroll" href="#page-top">IAI OFFICIEL</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#about" class="page-scroll">Préambule</a></li>
            <li><a href="#services" class="page-scroll">Formations</a></li>
            <li><a href="#portfolio" class="page-scroll">Galerie</a></li>
            <li><a href="#contact" class="page-scroll">Contact</a></li>
          </ul>
        </div>
      </div>

    </div>
  </nav>

  <!-- Header -->
  <header id="header">
    <div class="intro">
      <div class="overlay">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2 intro-text">
              <h1>La Plateforme Du Concours D'entrée A<br>
                l'IAI-TOGO</h1>
                <p>L'admission à I'IAI se fait sur concours, conformément aux recommandations 8 et 9 du Comité
                  Scientifrque tenu à Libreville du 29 Juin au 1" Juillet 1998 et adoptées par le Conseil
                  d'Administration de I'IAI (Résolution N" 7/CA/98) tenu à Libreville en Novembre 1998
              </p>
              <a href="#about" class="btn btn-custom btn-lg page-scroll">Lire plus</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Get Touch Section -->
  <div id="get-touch">
    <div class="container">
      <?php require_once "../../helpers/checkInscription.php";
      if (checkInscription()): ?>
        <div class="row">
          <div class="col-xs-12 col-md-6 col-md-offset-1">
            <h3>Vous avez déjà postulé à ce concours.</h3>
            <p>Appuyez sur consulter pour voir les détails...</p>
          </div>
          <div class="col-xs-12 col-md-4 text-center">
            <a class="btn btn-custom btn-lg page-scroll" href="consulter.php">Consulter</a>
          <?php else: ?>
            <div class="row">
              <div class="col-xs-12 col-md-6 col-md-offset-1">
                <h3>Vous n'avez pas encore postuler à ce conrours.</h3>
                <p>Cliquez sur postuler pour vous inscrire au concours.</p>
              </div>
              <div class="col-xs-12 col-md-4 text-center">
                <a class="btn btn-custom btn-lg page-scroll" href="inscription.php">Postuler</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

      <!-- About Section -->
      <div id="about">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-md-6"> <img src="../../assets/img/about.jpg" class="img-responsive" alt="">
            </div>
             <div class="col-xs-12 col-md-6">
              <div class="about-text">
                <h2>Préambule</h2>
                <p>Le cycle licence forme au métier d'Analyste Programmeur en Informatique. Deux parcours sont
                  proposés : License Professionnelle en Informatique <strong>(LPI)</strong> et Ingénieur des Travaux Informatiques
                  <strong>(ITI)</strong> . Ces parcours sont proposés dans trois filières différentes : Génie Logiciel et Systèmes
                  d'Information <strong>(GLSI)</strong>, Administration des Systèmes et Réseaux <strong>(ASR)</strong>puis Multimédia,
                  Technologies Web et Infographie <strong>MTWI</strong>. La fin du cycle est sanctionnée par l'obtention d'un
                  diplôme de Licence Professionnelle en Informatique ou d'Ingénieur des Travaux Informatiques
                  donnant droit à une admission par voie de concours soit en 1è" année du Cycle master, soit en filière
                  Ingénieur. Une admission sur titre est possible au Cycle Master sous réserve de certaines conditions
                  définies par la Direction Générale de l'IAI
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- Services Section -->
      <div id="services">
        <div class="container">
          <div class="section-title">
          <h2>LES FORMATIONS ET CERTIFICATIONS QUE NOUS PROPOSONS A NOS FUTURS CADRE.</h2>
          <h3>Notre école informatique offre une large gamme de programmes de formation pour aider les étudiants à atteindre
          leurs objectifs de carrière dans l'informatique. Que vous soyez débutant ou que vous cherchiez à développer
          vos compétences existantes, nous avons une option de formation qui vous conviendra.
  </br></br>
          Nos programmes de formation sont conçus par des professionnels expérimentés de l'industrie et mis à jour régulièrement pour refléter les dernières technologies et tendances du marché.
           Nous proposons des cours en classe, en ligne et en mode hybride pour s'adapter aux besoins de chaque étudiant. 
          En plus de notre programme de formation de base, nous offrons également des cours de perfectionnement et des certifications professionnelles pour aider nos diplômés à se démarquer sur le marché du travail. <br>
                  </h3>
        </div>
          <div class="row">
            <div class="col-md-4">
              <div class="service-media"> <img src="../../assets/img/services/service-1.jpg" alt=" "> </div>
              <div class="service-desc">
                <h3>Génie Logiciel</h3>
                <p>La filière Génie Logiciel forme des informaticiens capables de concevoir et de maintenir des logiciels en s’appuyant sur des méthodes et des outils très évolués. 
                  les principaux acquis après une formation en Génie Logiciel sont la maîtrise des systèmes d'information, des outils d'analyse et de modélisation, de programmation dans les langages de pointe ainsi que l'administration des bases de données. A cet effet, l'IAI-TOGO met à la disposition de ses étudiants des centres de calcul équipés de micro-ordinateurs le tout dans un réseau local pour le partage des ressources.
                  La formation est théorique et pratique renforcée par des stages d'entreprise.
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="service-media"> <img src="../../assets/img/services/service-2.jpg" alt=" "> </div>
              <div class="service-desc">
                <h3>Système Réseaux</h3>
                <p>La filière Systèmes et Réseaux, créée il y a deux ans forme des informaticiens capables de concevoir, implanter, interconnecter et administrer des réseaux informatiques et d'assurer également la maintenance de tout matériel informatique.
                  L'accent est donc mis sur l'étude des réseaux sous la norme CISCO CCNA, les systèmes d'exploitation, l'électricité, l'électronique et la maintenance. 
                  A cet effet, l'IAI-TOGO met à la disposition de ses étudiants des salles de réseaux équipées de micro-ordinateurs le tout dans un réseau local pour le partage des ressources.
                  La formation est très pratique.
                  La première promotion de sept (7) étudiants ont reçu leur diplôme en 2010.
                  </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="service-media"> <img src="../../assets/img/services/service-3.jpg" alt=" "> </div>
              <div class="service-desc">
                <h3>Multimédia</h3>
                <p>La licence Multimédia, Technologie Web et Infographie (M-TWI), vise à apporter aux étudiants les compétences nécessaires pour réussir leur projet, qu’il soit de création, d’administration ou d’industrialisation des produits de communication audiovisuelle.
                  L’identité de la formation est liée à la nature pluridisciplinaire des enseignements (connaissance technologiques, informatique, gestion de projet, création audiovisuelle, infographie) et à l’opportunité d’affirmer une bonne communication via des documents multimédias. 
                  Il s’agit aussi d’intégrer une culture de management de projets multimédia et infographie.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Gallery Section -->
    <div id="portfolio">
      <div class="container">
        <div class="section-title">
          <h2>Quelques images de l'institut </h2>
        </div>
        <div class="row">
          <div class="portfolio-items">
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="../../assets/img/portfolio/01-large.jpg" title="Project Title"
                    data-lightbox-gallery="gallery1">
                    <div class="hover-text">
                      <h4>Lorem Ipsum</h4>
                    </div>
                    <img src="../../assets/img/portfolio/01-small.jpg" class="img-responsive" alt="Project Title">
                  </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="../../assets/img/portfolio/02-large.jpg" title="Project Title"
                    data-lightbox-gallery="gallery1">
                    <div class="hover-text">
                      <h4>Adipiscing Elit</h4>
                    </div>
                    <img src="../../assets/img/portfolio/02-small.jpg" class="img-responsive" alt="Project Title">
                  </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="../../assets/img/portfolio/03-large.jpg" title="Project Title"
                    data-lightbox-gallery="gallery1">
                    <div class="hover-text">
                      <h4>Lorem Ipsum</h4>
                    </div>
                    <img src="../../assets/img/portfolio/03-small.jpg" class="img-responsive" alt="Project Title">
                  </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="../../assets/img/portfolio/04-large.jpg" title="Project Title"
                    data-lightbox-gallery="gallery1">
                    <div class="hover-text">
                      <h4>Lorem Ipsum</h4>
                    </div>
                    <img src="../../assets/img/portfolio/04-small.jpg" class="img-responsive" alt="Project Title">
                  </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="../../assets/img/portfolio/05-large.jpg" title="Project Title"
                    data-lightbox-gallery="gallery1">
                    <div class="hover-text">
                      <h4>Adipiscing Elit</h4>
                    </div>
                    <img src="../../assets/img/portfolio/05-small.jpg" class="img-responsive" alt="Project Title">
                  </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="../../assets/img/portfolio/06-large.jpg" title="Project Title"
                    data-lightbox-gallery="gallery1">
                    <div class="hover-text">
                      <h4>Dolor Sit</h4>
                    </div>
                    <img src="../../assets/img/portfolio/06-small.jpg" class="img-responsive" alt="Project Title">
                  </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="../../assets/img/portfolio/07-large.jpg" title="Project Title"
                    data-lightbox-gallery="gallery1">
                    <div class="hover-text">
                      <h4>Dolor Sit</h4>
                    </div>
                    <img src="../../assets/img/portfolio/07-small.jpg" class="img-responsive" alt="Project Title">
                  </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="../../assets/img/portfolio/08-large.jpg" title="Project Title"
                    data-lightbox-gallery="gallery1">
                    <div class="hover-text">
                      <h4>Lorem Ipsum</h4>
                    </div>
                    <img src="../../assets/img/portfolio/08-small.jpg" class="img-responsive" alt="Project Title">
                  </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="../../assets/img/portfolio/09-large.jpg" title="Project Title"
                    data-lightbox-gallery="gallery1">
                    <div class="hover-text">
                      <h4>Adipiscing Elit</h4>
                    </div>
                    <img src="../../assets/img/portfolio/09-small.jpg" class="img-responsive" alt="Project Title">
                  </a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact Section -->
    <div id="contact">
      <div class="container">
        <div class="col-md-8">
          <div class="row">
            <div class="section-title">
            <h2>Contactez-NOUS</h2>
            <p>Nous avons une équipe dévouée et une communauté dynamique qui sont prêtes à
              vous soutenir tout au long de votre parcours scolaire.
            </p>
            </div>
            <form name="sentMessage" id="contactForm" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" id="name" class="form-control" placeholder="Name" required="required">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" id="email" class="form-control" placeholder="Email" required="required">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message"
                  required></textarea>
                <p class="help-block text-danger"></p>
              </div>
              <div id="success"></div>
              <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
            </form>
          </div>
        </div>
        <div class="col-md-3 col-md-offset-1 contact-info">
          <div class="contact-item">
            <h4>Contact Info</h4>
            <p><strong><span>Address</span>59 rue de la Kozah Nyékonakpoè,<br>
            07 BP:12456 Lomé 07, Togo</strong>
        </div>
        <div class="contact-item">
          <p><span>Phone</span><strong>(00228) 22 20 47 00</strong></p>
        </div>
        <div class="contact-item">
          <p><span>Email</span><strong>iaitogo@iai-togo.tg</strong></p>
        </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="social">
            <ul>
              <li><a href="https://www.facebook.com/people/Iai-Togo/100057185240900/"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/iaicmr_officiel"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.new.iai-togo.tg/"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://www.youtube.com/@iaicamerounaics2580"><i class="fa fa-youtube"></i></a></li>
            </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Section -->
    <div id="footer">
      <div class="container text-center">
      <p>&copy; 2024 PROJET. Design by <a href="assets/http://" rel="nofollow">ANAID</a></p>
      </div>
    </div>
    <script type="text/javascript" src="../../assets/js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../assets/js/SmoothScroll.js"></script>
    <script type="text/javascript" src="../../assets/js/nivo-lightbox.js"></script>
    <script type="text/javascript" src="../../assets/js/jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="../../assets/js/contact_me.js"></script>
    <script type="text/javascript" src="../../assets/js/main.js"></script>
</body>

</html>