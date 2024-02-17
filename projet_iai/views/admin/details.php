<?php
session_start();
require "../../helpers/checkAuthentication.php";
require "../../helpers/checkInscription.php";
checkAuthentication();
checkConcours();
userRedirection();
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/img/1z.jpg" />
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/1z.jpg" />
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/1z.jpg" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css"
        href="../../assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="../../assets/src/plugins/datatables/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/vendors/styles/style.css" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-GBZ3SGGX85");
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div>

    <div class="header">
        <div class="header-left">
            <div class="menu-icon bi bi-list"></div>
            <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
        </div>
        <div class="header-right">
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div>
            <div class="user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="icon-copy dw dw-notification"></i>
                        <span class="badge notification-active"></span>
                    </a>
                </div>
            </div>
            <div class="user-info-dropdown mx-4">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="../../assets/vendors/images/photo1.jpg" alt="" />
                        </span>
                        <?php if (isset($_SESSION['username'])): ?>
                            <span class="user-name">
                                <?php echo $_SESSION['username']; ?>
                            </span>
                        <?php endif; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="../../auth/backend/logoutbackend.php"><i
                                class="dw dw-logout"></i>Deconnexion</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-1" checked="" />
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-2" />
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
                            value="icon-style-3" />
                        <label class="custom-control-label" for="sidebaricon-3"><i
                                class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-1" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-1"><i
                                class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-2" />
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                                aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-3" />
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-4" checked="" />
                        <label class="custom-control-label" for="sidebariconlist-4"><i
                                class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-5" />
                        <label class="custom-control-label" for="sidebariconlist-5"><i
                                class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input"
                            value="icon-list-style-6" />
                        <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">
                        Reset Settings
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="index.html">

                <h3 class="dark-logo"><strong>IAI-HUB-ADMIT</strong></h3>
                <h3 class="light-logo" style="color:white;"><strong>IAI-HUB-ADMIT</strong></h3>
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="active">
                        <a href="index.php" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-house"></span><span class="mtext">Tableau de bord</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-textarea-resize"></span><span class="mtext">Candidatures</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="tablelist.php">Liste des candidatures</a></li>
                            <li>
                                <a href="tablenationalite.php">Par nationalité</a>
                            </li>
                            <li><a href="tablesexe.php">Par sexe</a></li>
                            <li><a href="tabledouble.php">Inscrits doublement</a></li>
                            <li><a href="tablenodoc.php">Sans documents</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-table"></span><span class="mtext">Concours</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="details.php">Détails</a></li>
                            <li><a href="addConcours.php">Organiser un nouveau</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="addadmin.php" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-person"></span><span class="mtext">Ajouter un Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="../users/index.php" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-bricks"></span><span class="mtext">Accédez à la plateforme</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <nav aria-label="breadcrumb" role="navigation">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                                        Bienvenue
                                        <div class="weight-600 font-30 text-blue">
                                            <?php if (isset($_SESSION['username'])): ?>
                                                <span class="user-name"> Admin
                                                    <?php echo $_SESSION['username']; ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </h4>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                                        <?php require_once "../../helpers/checkSessionData.php";
                                        initConcoursInfos(); ?>
                                        <?php if (isSameDate()): ?>
                                            Date du concours
                                            <div class="weight-600 font-20 text-blue">
                                                <?php if (isset($_SESSION['dateDebut'])): ?>
                                                    <span class="user-name">
                                                        <?php echo $_SESSION['dateDebut']; ?>
                                                    </span>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                Prériode du concours
                                                <div class="weight-600 font-20 text-blue">
                                                    <?php if (isset($_SESSION['dateDebut']) && isset($_SESSION['dateFin'])): ?>
                                                        <span class="user-name">
                                                            <?php echo $_SESSION['dateDebut']; ?>
                                                            au
                                                            <?php echo $_SESSION['dateFin']; ?>
                                                        </span>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                    </h4>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                                        Période d'inscription
                                        <div class="weight-600 font-20 text-blue">
                                            <?php if (isset($_SESSION['dateDebutInscription']) && isset($_SESSION['dateFinInscription'])): ?>
                                                <span class="user-name">
                                                    <?php echo $_SESSION['dateDebutInscription']; ?>
                                                    au
                                                    <?php echo $_SESSION['dateFinInscription']; ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </h4>
                                </div>
                            </div>

                        </nav>
                    </div>
                </div>
            </div>
            <?php require_once '../../helpers/checkSessionData.php';
            checkConcours(); ?>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Détails du conours </h4>
                        <p class="mb-30"></p>
                    </div>
                </div>
                <form>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Libelle</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" disabled
                                value="<?php echo $_SESSION['libelle']; ?>  <?php echo $_SESSION['concoursId']; ?> " />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Date début du concours</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control date-picker" disabled
                                value="<?php echo $_SESSION['dateDebut']; ?>" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Date fin du concours</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control date-picker" disabled value="<?php echo $_SESSION['dateFin']; ?>"
                                type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Début des inscriptions</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control date-picker" disabled
                                value="<?php echo $_SESSION['dateDebutInscription']; ?>" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Fin des inscriptions</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control date-picker" disabled
                                value="<?php echo $_SESSION['dateFinInscription']; ?>" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-4">
                            <a href="editconcours.php" class="btn btn-warning">Modifier les infos du conscours</a>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <a href="editperiod.php" class="btn btn-secondary">Modifier la période d'inscriptions</a>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <a href="editdate.php" class="btn btn-primary">Modifier les dates de compositions</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>



    <div class="footer-wrap pd-20 mb-20 card-box">
        DeskApp - Bootstrap 4 Admin Template By
        <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
    </div>
    </div>
    </div>

    <script src="../../assets/vendors/scripts/core.js"></script>
    <script src="../../assets/vendors/scripts/script.min.js"></script>
    <script src="../../assets/vendors/scripts/process.js"></script>
    <script src="../../assets/vendors/scripts/layout-settings.js"></script>
    <script src="../../assets/src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="../../assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="../../assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <script src="../../assets/vendors/scripts/dashboard3.js"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>