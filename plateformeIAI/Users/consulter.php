<?php
session_start();
require "../helpers/checkAuthentication.php";
require "../helpers/checkInscription.php";
checkAuthentication();
checkConcours();
adminRedirection();
if(!checkInscription()){
    header("Location: inscription.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Consultation de Candidature</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .card {
            width: 75%;
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
        }

        .card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: 20px;
            background-color: #f0f0f0;
        }

        .profile-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .other-info {
            text-align: center;
            padding: 20px;
        }

        .buttons {
            text-align: center;
            padding: 20px;
        }

        .button {
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Popup styles (hidden by default) */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        /* Close button for the popup */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }


        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap');


        :root {

            font-size: 15px;

            /* Primary */
            --var-soft-blue: hsl(215, 51%, 70%);
            --var-cyan: hsl(178, 100%, 50%);
            /* Neutral */
            --var-main-darkest: hsl(217, 54%, 11%);
            --var-card-dark: hsl(216, 50%, 16%);
            --var-line-dark: hsl(215, 32%, 27%);
            --var-lightest: white;

            /* Fonts */

            --var-heading: normal normal 600 1.5em/1.6em 'Outfit', sans-serif;

            --var-small-heading: normal normal 400 1em/1em 'Outfit', sans-serif;

            --var-para: normal normal 300 1em/1.55em 'Outfit', sans-serif;
        }


        html {
            box-sizing: border-box;
        }

        *,
        *::before,
        *::after {
            box-sizing: inherit;
            margin: 0;
        }

        body {
            background-color: var(--var-main-darkest);
        }

        .image {
            width: 100%;
            border-radius: 15px;
            display: block;
        }

        a {
            color: inherit;
        }


        h1 {
            font: var(--var-heading);
            color: var(--var-lightest);
            padding: 1.2em 0;
        }

        h2 {
            font: var(--var-small-heading);
            color: var(--var-lightest);
            /* padding on .coin-base */
        }

        p {
            font: var(--var-para);
            color: var(--var-soft-blue);
        }

        span {
            color: white;
        }

        .card-container {
            width: 100%;
            max-width: 50%;
            margin: 2em auto;
            background-color: var(--var-card-dark);
            border-radius: 15px;
            margin-bottom: 1rem;
            padding: 2rem;
        }

        div.flex-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        div.coin-base,
        .time-left,
        .card-attribute {
            display: flex;
            align-items: center;
            padding: 1em 0;
        }

        .card-attribute {
            padding-bottom: 1.5em;
            border-top: 2px solid var(--var-line-dark);
        }

        a.hero-image-container {
            position: relative;
            display: block;
        }

        @media (min-width:600px) {
            body {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
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
                                        <a class="nav-link" href="index.php"> Home </a>
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


    <div class="container mt-5">
        <div class="card-container">

            <?php
            require '../helpers/db_config.php';

            function getCandidature()
            {
                global $host, $dbname, $dbusername, $dbpassword;

                if (isset($_SESSION['concoursId']) && isset($_SESSION['user_id'])) {
                    $concoursId = $_SESSION['concoursId'];
                    $user_id = $_SESSION['user_id'];

                    try {
                        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $query = "SELECT * FROM candidatures WHERE concours_id = :concours_id AND user_id = :user_id";
                        $stmt = $conn->prepare($query);
                        $stmt->bindParam(':concours_id', $concoursId);
                        $stmt->bindParam(':user_id', $user_id);
                        $stmt->execute();

                        $candidature = $stmt->fetch(PDO::FETCH_ASSOC);

                        // Afficher les informations de la candidature dans le HTML
                        if ($candidature) {
                            $candidature_id = $candidature['id'];
                            $photo = $candidature['photo_url'];
                            $query2 = "SELECT * FROM documents WHERE candidature_id = :candidature_id";
                            $stmt = $conn->prepare($query2);
                            $stmt->bindParam(':candidature_id', $candidature['id']);
                            $stmt->execute();

                            $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            echo '
                            <main class="main-content">
                            <div class="profile-info">
                            <span>' . $candidature['nom'] . ' ' . $candidature['prenoms'] . '</span>
                            <span>Date de Naissance: ' . $candidature['naissance'] . '</span>
                            <span>Sexe: ' . $candidature['genre'] . '</span>
                            </div>

                            <div class="other-info">
                            <p>Nationalité: ' . $candidature['nationalite'] . '</p>
                            <p>Année du Bac: ' . $candidature['bac'] . '</p>
                            <p>Série du Bac: ' . $candidature['serie'] . '</p>
                            </div>';

                            if ($documents) {
                                foreach ($documents as $doc) {
                                    $path = '../uploads/'. $doc['type'] .'/'. $doc['libelle'];
                                    echo '<button class="button" onclick="openPopup(\'' . $path . '\')">' . $doc['type'] . '</button>';
                                }
                            }
                            $info = pathinfo($photo);
                            $photopath = '../uploads/photos/'.$info['filename'] . '.' . $info['extension'];
                            echo '<div class="buttons">
                            </main>
                            <div class="card-attribute">
                                <img class="profile-image" src="' . $photopath . '" alt="Profile Image">
                                <p>Creation of <span><a href="#">Jules Wyvern</a></span></p>
                            </div> 
                            <div class="mt-4">
                             <a href="edit.php" class="btn btn-warning">Modifier candidature</a>
                            <a href="backend/delete.php" class="btn btn-danger">Supprimer candidature</a>
                            </div>';

                            echo '</div>';
                        } else {
                            echo "Aucune candidature trouvée.";
                        }
                    } catch (PDOException $e) {
                        echo "Erreur PDO : " . $e->getMessage();
                    } finally {
                        // Fermer la connexion à la base de données, que l'opération réussisse ou échoue
                        $conn = null;
                    }
                }
            }
            ?>


            <?php
            getCandidature();
            ?>
        </div>
    </div>

    <!-- Popup container -->
    <div id="nationalitePopup" class="popup">
        <span class="close" onclick="closePopup('nationalitePopup')">&times;</span>
        <embed src="" width="1000px" height="600px" type='application/pdf'>
    </div>

    <!-- JavaScript to handle popup functionality -->
    <script>
        function openPopup(pdfPath) {
            var popup = document.getElementById('nationalitePopup');
            popup.style.display = 'block';
            // Set the PDF path for the embed element in the popup
            popup.querySelector('embed').src = pdfPath;
        }

        function closePopup(popupId) {
            var popup = document.getElementById(popupId);
            popup.style.display = 'none';
        }

        // function del(id){
        //     var xhr = new XMLHttpRequest();
        //     xhr.open("POST", "backend/delete.php", true);
        //     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        //     xhr.onreadystatechange = function(){
        //         if(xhr.readyState == 4 && xhr.status == 200 ){
        //             // pass
        //         }
        //         xhr.send('id='+id)
        //     }
        // }
    </script>

    </div>

    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <ul class="location_icon">
                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> Address : Lorem
                                Ipsum <br>
                                is simply dummy
                            </li>
                            <li><a href="#"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></a>Phone :
                                +(1234)
                                567 890</li>
                            <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>Email : demo@gmail.com
                            </li>
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
    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>