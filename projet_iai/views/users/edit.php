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


    <title>profile with data and skills - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../../assets/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../assets/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../assets/img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../assets/fonts/font-awesome/css/font-awesome.css">

    <!-- Ajoutez ces liens CDN dans la section <head> de votre document -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/nivo-lightbox/nivo-lightbox.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/nivo-lightbox/default.css">
    <link href="../../assets/https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="../../assets/https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <style type="text/css">
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .popup-content {
            position: relative;
            z-index: 1;
        }

        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>
    <!-- <script>
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
    </script> -->
</head>

<body>


    <div class="container">
        <div class="main-body">

            <div style="height: 90px;">
                <nav id="menu" class="navbar navbar-default navbar-fixed-top">
                    <div class="d-flex justify-content-between">
                        <?php
                        if (isset($_SESSION['username'])): ?>
                            <div id="1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle page-scroll" href="#" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <a class="navbar-brand page-scroll" href="#page-top">IAI-HUB-ADMIT</a>
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
            </div>
            <!-- Le reste de votre HTML ... -->

            <div class="container">
                <div class="main-body">

                    <div style="height: 90px;">
                        <nav id="menu" class="navbar navbar-default navbar-fixed-top">
                            <div class="d-flex justify-content-between">
                                <?php
                                if (isset($_SESSION['username'])): ?>
                                    <div id="1">
                                        <ul class="nav navbar-nav navbar-right">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle page-scroll" href="#" id="navbarDropdown"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-user"></i>
                                                    <?php echo $_SESSION['username']; ?>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <form action="../../auth/backend/logoutbackend.php" method="post">
                                                        <div class="dropdown-item text-center">
                                                            <button class="btn btn-danger"
                                                                type="submit">Déconnexion</button>
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
                                        <a class="navbar-brand page-scroll" href="#page-top">IAI-HUB-ADMIT</a>
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
                    </div>
                    <!-- Le reste de votre HTML ... -->

                    <form action="backend/editbackend.php" method="post" enctype="multipart/form-data">

                        <input type="text" class="form-control hide" id="id" name="id"
                            value="<?= $candidatureData['id'] ?>" required>
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <!-- Display current profile photo -->
                                            <h4>Photo de Profil</h4>
                                            <img src="../../<?= $candidatureData['photo_url'] ?>" alt="Admin"
                                                class="rounded-circle" width="150" height="150">

                                            <!-- Change profile photo section -->
                                            <div class="mt-4">
                                                <div class="col-md-12">
                                                    <div class="form-floating ml-2">
                                                        <label for="photo" class="m-4">
                                                            <h5 class="">Changer de photo</h5>
                                                        </label>
                                                        <input type="file" class="form-control mx-4" id="photo"
                                                            name="photo" accept="image/*"
                                                            placeholder="Changer de photo">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Afficher d'autres informations nécessaires -->
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3">
                                    <ul class="list-group list-group-flush">
                                        <!-- Afficher des liens pour les types de documents -->
                                        <?php if (isset($candidatureData['documents'])): ?>
                                            <?php foreach ($candidatureData['documents'] as $type => $doc):
                                                $path = '../../' . $doc['doc_url']; ?>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap text-center">
                                                    <button class="btn btn-warning" onclick="openPopup('<?php echo $path; ?>')">
                                                        <?= $type ?> actuelle
                                                    </button>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <!-- Afficher les informations du candidat -->
                                        <?php if ($candidatureData): ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <label for="nom">
                                                            <h5 class="">Nom :</h5>
                                                        </label>
                                                        <input type="text" class="form-control" name="nom"
                                                            value="<?= $candidatureData['nom'] ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <label for="prenom" class="text-white">
                                                            <h5 class=""> Prénoms :</h5>
                                                        </label>
                                                        <input type="text" class="form-control" name="prenom"
                                                            value="<?= $candidatureData['prenoms'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ... (other fields) ... -->
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <label for="sexe">
                                                            <h5 class=""> Sexe :</h5>
                                                        </label>
                                                        <select class="form-control" id="sexe" name="sexe" required>
                                                            <option value="Masculin"
                                                                <?= ($candidatureData['genre'] == 'Masculin') ? 'selected' : '' ?>>Masculin</option>
                                                            <option value="Féminin"
                                                                <?= ($candidatureData['genre'] == 'Féminin') ? 'selected' : '' ?>>Féminin</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <label for="serie">
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
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <label for="nationalite">
                                                            <h5 class=""> Nationalité :</h5>
                                                        </label>
                                                        <select class="form-control" id="nationalite" name="nationalite"
                                                            required>
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
                                                    <div class="form-floating">
                                                        <label for="annee_bac">
                                                            <h5 class=""> Année d'obtention du BAC II :</h5>
                                                        </label>
                                                        <select class="form-control" name="annee_bac" id="annee_bac"
                                                            required>
                                                            <!-- Populate options for année_bac dynamically -->
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
                                            <!-- ... (other fields) ... -->
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <label for="date_naissance">
                                                            <h5 class=""> Date de Naissance :</h5>
                                                        </label>
                                                        <input type="date" class="form-control" id="date_naissance"
                                                            name="date_naissance"
                                                            value="<?= $candidatureData['naissance'] ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <label for="copie_naissance">
                                                            <h5 class=""> Copie de la Naissance (PDF) :</h5>
                                                        </label>
                                                        <input type="file" class="form-control" id="copie_naissance"
                                                            name="copie_naissance" accept=".pdf">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <label for="photo">
                                                            <h5 class="copie_nationalite"> Copie de la
                                                                Nationalité (PDF) :</h5>
                                                        </label>
                                                        <input type="file" class="form-control" id="copie_nationalite"
                                                            name="copie_nationalite" accept="image/*">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <label for="attestation_bac">
                                                            <h5 class=""> Attestation du BAC
                                                                II (PDF) :</h5>
                                                        </label>
                                                        <input type="file" class="form-control" id="attestation_bac"
                                                            name="attestation_bac" accept=".pdf">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ... (other fields) ... -->
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-4">
                                                    <h3 class="mb-0">Inscrit le :</h3>
                                                </div>
                                                <div class="col-sm-9 col-md-8">
                                                    <h3 class="">
                                                        <?= $candidatureData['create_at'] ?>
                                                    </h3>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row text-center">
                                                <div class="col-sm-12 col-md-2">
                                                    <button type="submit" class="btn btn-success " name="submit"
                                                        style="width: 710px;">Valider</button>
                                                </div>
                                            </div>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
            // Utilisation de SweetAlert pour demander une confirmation
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
                    // Si l'utilisateur confirme, vous pouvez ajouter ici le code pour supprimer la candidature
                    Swal.fire(
                        'Supprimé!',
                        'La candidature a été supprimée.',
                        'success'
                    );
                }
            });
        }
    </script>



    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>