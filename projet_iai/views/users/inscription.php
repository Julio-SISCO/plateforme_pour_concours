<?php
session_start();

require "../../helpers/checkAuthentication.php";
require "../../helpers/checkInscription.php";

checkAuthentication();
checkConcours();
if (checkInscription()) {
    header("Location: consulter.php");
}

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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
                        <li><a href="index.php" class="page-scroll">
                                <i class="fa fa-home"></i>
                                Acceuil</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>

 <!-- Header -->
<header id="header">
    <div class="intr">
            <div class="overlay">
                <div class="container ">
                    <div class="col-xs-12 col-md-12 col-md-offset-0 intro-text">
                        <div id="get-touch">
                            <div id="ins">
                                <h1 class="">Formulaire d'inscription</h1>
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-md-offset-2">
                                        <div class="card mx-auto mt-5" style="max-width: 740px;">
                                            <div class="card-body">
                                                <form action="backend/inscriptionbackend.php" method="POST"
                                                    enctype="multipart/form-data">
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <label for="nom">
                                                                    <h5 class="">Nom :</h5>
                                                                </label>
                                                                <input type="text" class="form-control" id="nom" name="nom" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <label for="prenom" class="text-white">
                                                                    <h5 class=""> Prénoms :</h5>
                                                                </label>
                                                                <input type="text" class="form-control" id="prenom"
                                                                    name="prenom" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <label for="date_naissance">
                                                                    <h5 class=""> Date de Naissance
                                                                        :</h5>
                                                                </label>
                                                                <input type="date" class="form-control" id="date_naissance"
                                                                    name="date_naissance" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <label for="sexe">
                                                                    <h5 class=""> Sexe :</h5>
                                                                </label>
                                                                <select class="form-control" id="sexe" name="sexe" required>
                                                                    <option value="Masculin">Masculin</option>
                                                                    <option value="Féminin">Féminin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <label for="nationalite">
                                                                    <h5 class=""> Nationalité :</h5>
                                                                </label>
                                                                <select class="form-control" id="nationalite"
                                                                    name="nationalite" required>
                                                                    <option value="Bénin">Bénin</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Cameroun">Cameroun</option>
                                                                    <option value="Centrafrique">Centrafrique</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Congo Brazaville">Congo Brazaville
                                                                    </option>
                                                                    <option value="Côte d'ivore">Côte d'ivore</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Sénégal">Sénégal</option>
                                                                    <option value="Tchad">Tchad</option>
                                                                    <option value="Togo">Togo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <label for="annee_bac">
                                                                    <h5 class=""> Année d'obtention du BAC
                                                                        II :</h5>
                                                                </label>
                                                                <select class="form-control" name="annee_bac" id="annee_bac"
                                                                    required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-12">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <label for="serie">
                                                                    <h5 class=""> Série du BAC II :</h5>
                                                                </label>
                                                                <select class="form-control" id="serie" name="serie"
                                                                    required>
                                                                    <option value="C">C</option>
                                                                    <option value="D">D</option>
                                                                    <option value="E">E</option>
                                                                    <option value="F1">F1</option>
                                                                    <option value="F2">F2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <label for="photo">
                                                                    <h5 class=""> Photo :</h5>
                                                                </label>
                                                                <input type="file" class="form-control" id="photo"
                                                                    name="photo" accept="image/*" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <label for="copie_naissance">
                                                                    <h5 class=""> Copie de la
                                                                        Naissance (PDF) :</h5>
                                                                </label>
                                                                <input type="file" class="form-control" id="copie_naissance"
                                                                    name="copie_naissance" accept=".pdf" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3 mb-md-0">
                                                                <label for="copie_nationalite">
                                                                    <h5 class=""> Copie de la
                                                                        Nationalité (PDF) :</h5>
                                                                </label>
                                                                <input type="file" class="form-control"
                                                                    id="copie_nationalite" name="copie_nationalite"
                                                                    accept=".pdf" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <label for="attestation_bac">
                                                                    <h5 class=""> Attestation du BAC
                                                                        II (PDF) :</h5>
                                                                </label>
                                                                <input type="file" class="form-control" id="attestation_bac"
                                                                    name="attestation_bac" accept=".pdf" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"></div>
                                                    <button type="submit" class="btn btn-custom btn-lg page-scroll">Soumettre la Candidature</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
    <!-- Fin du Header -->


    <!-- <script type="text/javascript" src="../../assets/js/jquery.1.11.1.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../assets/js/SmoothScroll.js"></script>
    <script type="text/javascript" src="../../assets/js/nivo-lightbox.js"></script>
    <script type="text/javascript" src="../../assets/js/jqBootstrapValidation.js"></script> -->
    <!-- <script type="text/javascript" src="../../assets/js/contact_me.js"></script> -->
    <!-- <script type="text/javascript" src="../../assets/js/main.js"></script> -->
</body>

</html>