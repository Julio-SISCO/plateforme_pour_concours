<?php
session_start();
require "../helpers/checkAuthentication.php";
require "../helpers/checkInscription.php";
checkAuthentication();
checkConcours();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mega Able bootstrap admin template by codedthemes </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <!-- am chart export.css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Inclure DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <style>
        .odd {
            background-color: #f9f9f9;
        }

        .even {
            background-color: #ffffff;
        }

        .logo-photo {
            width: 50px;
            /* Ajustez la taille selon vos besoins */
            height: 50px;
            /* Ajustez la taille selon vos besoins */
            border-radius: 50%;
            /* Assurez-vous que le border-radius est de 50% pour créer un cercle */
            object-fit: cover;
            /* Assurez-vous que l'image couvre le cercle sans déformation */
        }
    </style>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php">
                            <img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                </div>
                            </li>
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <img src="assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span>
                                        <?php
                                        if (isset($_SESSION['username'])) {
                                            echo $_SESSION['username'];
                                        }
                                        ?>
                                    </span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li class="waves-effect waves-light">
                                        <a href="">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="../Auth/logoutbackend.php">
                                            <i class="ti-layout-sidebar-left"></i> Deconnexion
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">

                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-80 img-radius" src="assets/images/avatar-4.jpg"
                                        alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details">

                                            <?php
                                            if (isset($_SESSION['username'])) {
                                                echo $_SESSION['username'];
                                            }
                                            ?>
                                            <i class="fa fa-caret-down"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href=""><i class="ti-user"></i>View Profile</a>
                                            <a href="../Auth/logoutbackend.php"><i
                                                    class="ti-layout-sidebar-left"></i>Deconnexion</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation"></div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="index.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                <div class="pcoded-navigation-label" data-i18n="nav.category.navigation"></div>
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"
                                            data-i18n="nav.basic-components.main">Candidatures</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="tablelist.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Listes
                                                    des cantidtures</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Par nationnalité</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="tablesexe.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Par sexe<i
                                                        class="fab fa-external-link-alt"></i></span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="tabledouble.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Inscrits Doublement<i
                                                        class="fab fa-external-link-alt"></i></span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="tablenodoc.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Sans Documents<i
                                                        class="fab fa-external-link-alt"></i></span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label" data-i18n="nav.category.forms"></div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Concours</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="auth-normal-sign-in.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.alert">Consulter le concours</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="auth-sign-up.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.basic-components.breadcrumbs">Gérer les dates</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>

                            <div class="pcoded-navigation-label" data-i18n="nav.category.other"></div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Comptes</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                        <li class="">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext"
                                                    data-i18n="nav.menu-levels.menu-level-23">Ajouter un admin</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Date du concours </h5>
                                            <div class="label-main">
                                                <label class="label label-success">
                                                    14 Février 2024
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="page-header-title text-right">
                                            <h5 class="m-b-10">Période d'inscription</h5>
                                            <div class="label-main">
                                                <label class="label label-inverse">
                                                    12 Décembre 2023
                                                </label>
                                            </div>
                                            <br>
                                            <div class="label-main">
                                                <label class="label label-danger">
                                                    07 Février 2024
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pcoded-inner-content">
                            <div id="nationalitePopup" class="popup">
                                <span class="close" onclick="closePopup('nationalitePopup')">&times;</span>
                                <embed src="" width="1000px" height="450px" type='application/pdf'>
                            </div>
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12">
                                                <!-- Popup container -->
                                                <div class="card p-5">

                                                    <div class="col-lg-12 col-xl-12">
                                                        <div class="sub-title">Liste par nationalité</div>
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs md-tabs" role="tablist">
                                                            <?php
                                                            require '../functions/getters.php';
                                                            $nationalities = getDistinctNationalities();

                                                            foreach ($nationalities as $index => $nationality) {
                                                                $tabId = 'tab' . $index;
                                                                $tabName = ucfirst($nationality); // Mettez en majuscule la première lettre de la nationalité
                                                                ?>
                                                                <li class="nav-item">
                                                                    <a class="nav-link <?= $index === 0 ? 'active' : '' ?>"
                                                                        data-toggle="tab" href="#<?= $tabId ?>" role="tab">
                                                                        <?= $tabName ?>
                                                                    </a>
                                                                    <div class="slide"></div>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                        <!-- Tab panes -->
                                                        <div class="tab-content card-block ">
                                                            <?php foreach ($nationalities as $index => $nationality) { ?>
                                                                <div class="tab-pane <?= $index === 0 ? 'active' : '' ?>"
                                                                    id="tab<?= $index ?>" role="tabpanel">
                                                                    <p class="m-0">
                                                                    <table id="inscriptionTable<?= $index ?>"
                                                                        class="display">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Photo</th>
                                                                                <th>Nom</th>
                                                                                <th>Prénoms</th>
                                                                                <th>Genre</th>
                                                                                <th>Né(e) le</th>
                                                                                <th>Nationalité</th>
                                                                                <th>Email</th>
                                                                                <th>Bac</th>
                                                                                <th>Série</th>
                                                                                <th>Documents</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $candidates = getCandidatesByNationality($nationality);

                                                                            foreach ($candidates as $candidate) {
                                                                                $info = pathinfo($candidate['photo_url']);
                                                                                $photopath = '../uploads/photos/' . $info['filename'] . '.' . $info['extension'];
                                                                                ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="card-attribute">
                                                                                            <img class="profile-image logo-photo"
                                                                                                src="<?= $photopath ?>"
                                                                                                alt="Photo">
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $candidate['nom'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $candidate['prenoms'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $candidate['genre'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $candidate['naissance'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $candidate['nationalite'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $candidate['email'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $candidate['bac'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?= $candidate['serie'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div>
                                                                                            <?php
                                                                                            $documents = getDocuments($candidate['id']);
                                                                                            if ($documents) {
                                                                                                foreach ($documents as $document) {
                                                                                                    $info = pathinfo($document['doc_url']);
                                                                                                    $path = '../uploads/' . $document['type'] . '/' . $info['filename'] . '.' . $info['extension'];
                                                                                                    echo '<button class="btn waves-effect waves-light btn-info btn-icon" onclick="openPopup(\'' . $path . '\')"><i class="icofont icofont-info-square"></i></button>';
                                                                                                }
                                                                                            } else {
                                                                                                echo 'Sans documents ';
                                                                                            }
                                                                                            ?>
                                                                                        </div>

                                                                                    </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                    </p>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <!--  -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            <?php foreach ($nationalities as $index => $nationality) { ?>
                $('#inscriptionTable<?= $index ?>').DataTable();
            <?php } ?>
        });
    </script>

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


    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="assets/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="assets/pages/widget/amchart/gauge.js"></script>
    <script src="assets/pages/widget/amchart/serial.js"></script>
    <script src="assets/pages/widget/amchart/light.js"></script>
    <script src="assets/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="assets/js/script.js "></script>
</body>

</html>