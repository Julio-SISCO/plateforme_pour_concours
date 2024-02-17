<?php
session_start();

require "../helpers/checkAuthentication.php";
require "../helpers/checkInscription.php";

checkAuthentication();
checkConcours();
adminRedirection();
if(checkInscription()){
    header("Location: consulter.php");
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription au concours</title>

    <!-- Intégration de Bootstrap -->
    
    <!-- <link href="../assets/css/styles.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../assets/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.min.css">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var currentYear = new Date().getFullYear();
            var selectYear = document.getElementById('annee_bac');

            for (var year = currentYear; year >= currentYear - 1; year--) {
                var option = document.createElement('option');
                option.value = year;
                option.text = year;
                selectYear.appendChild(option);
            }
        });
    </script>

    <style>
        body {
            background-color: var(--var-main-darkest);
        }
    </style>
</head>

<body class="bg-primary main-layout">

    <div class="loader_bg">
        <div class="loader"><img src="../assets/images/loading.gif" alt="#" /></div>
    </div>

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
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
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
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Inscription au Concours</h3>
                                </div>
                                <div class="card-body">
                                    <form action="backend/inscriptionbackend.php" method="post"
                                        enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <label for="nom">Nom</label>
                                                    <input type="text" class="form-control" name="nom" required>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating">

                                                    <label for="prenoms">Prénoms</label>
                                                    <input type="text" class="form-control" id="prenoms" name="prenoms"
                                                        required>

                                                </div>
                                            </div>


                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <label for="adresse">Adresse</label>
                                                    <input type="text" class="form-control" id="adresse" name="adresse"
                                                        required>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating">

                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        required>

                                                </div>
                                            </div>


                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <label for="date_naissance">Date de naissance</label>
                                                    <input type="date" class="form-control" name="date_naissance"
                                                        required>


                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <label for="nationalite">Nationalité</label>
                                                    <select class="form-control" name="nationalite" required>
                                                        <option value="" disabled selected>Sélectionnez votre
                                                            nationalité</option>
                                                        <option value="Bénin">Bénin</option>
                                                        <option value="Tchad">Tchad</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Cameroun">Cameroun</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Congo Brazaville">Congo Brazaville</option>
                                                        <option value="Côte d'ivoire">Côte d'ivoire</option>
                                                        <option value="Senegal">Senegal</option>
                                                    </select>

                                                </div>
                                            </div>


                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <label for="sexe">Sexe </label> <br>
                                                    <div class="form-check form-check-inline mx-4">
                                                        <input type="radio" class="form-check-input" name="sexe"
                                                            value="Masculin" required>
                                                        <label class="form-check-label" for="sexe">Masculin</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" name="sexe"
                                                            value="Féminin" required>
                                                        <label class="form-check-label" for="sexe">Féminin</label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <label for="serie">Série </label> <br>
                                                    <div class="form-check form-check-inline mx-4">
                                                        <input type="radio" class="form-check-input" name="serie"
                                                            value="C4" required>
                                                        <label class="form-check-label" for="serie">C</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" name="serie"
                                                            value="D" required>
                                                        <label class="form-check-label" for="serie">D</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" name="serie"
                                                            value="E" required>
                                                        <label class="form-check-label" for="serie">E</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" name="serie"
                                                            value="F" required>
                                                        <label class="form-check-label" for="serie">F1</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" class="form-check-input" name="serie" value="F" required>
                                                        <label class="form-check-label" for="serie">F2</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <label for="annee_bac">Année d'obtention du BAC II </label>
                                            <select class="form-control" name="annee_bac" id="annee_bac" required>
                                            </select>
                                        </div>

                                        <div class="row mb-3">

                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <label for="photo">Photo </label>
                                                    <input type="file" class="form-control-file" name="photo"
                                                        accept="image/*" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <label for="copie_naissance">Copie de la naissance (PDF)
                                                        :</label>
                                                    <input type="file" class="form-control-file" name="copie_naissance"
                                                        accept=".pdf" required>


                                                </div>
                                            </div>


                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <label for="attestation_bac">Copie de l'attestation du BAC II
                                                        (PDF) :</label>
                                                    <input type="file" class="form-control-file" name="attestation_bac"
                                                        accept=".pdf" required>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <label for="copie_nationalite">Copie de la nationalité (PDF)
                                                        :</label>
                                                    <input type="file" class="form-control-file"
                                                        name="copie_nationalite" accept=".pdf" required>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button class="btn btn-primary btn-block"
                                                    type="submit">Soumettre</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div id="layoutAuthentication_footer">
        <footer>
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <ul class="location_icon">
                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> Address :
                                    Lorem Ipsum <br> is simply dummy
                                </li>
                                <li><a href="#"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></a>Phone :
                                    +(1234) 567 890</li>
                                <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>Email :
                                    demo@gmail.com</li>
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
                                <p>Copyright 2019 All Right Reserved By<a href="https://html.design/"> Free html
                                        Templates</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>