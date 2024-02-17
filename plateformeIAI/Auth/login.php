<?php
session_start();   
    require '../helpers/checkAuthentication.php';
    if(is_logged_in()){
        header('Location: ../Users/index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../assets/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../assets/css/jquery.mCustomScrollbar.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
                                        <!-- <img src="../assets/images/IAIlogo.png" alt="#" /> -->
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
                                        <a class="nav-link" href="../Users/index.php"> Home </a>
                                    </li>

                                    <li class="nav-item d_none">
                                        <a class="nav-link" href="">Login</a>
                                    </li>
                                    <li class="nav-item d_none">
                                        <a class="nav-link" href="../Users/register.php">Register</a>
                                    </li>
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
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="loginbackend.php" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text"
                                                placeholder="Username" name="username" />
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password"
                                                placeholder="Password" name="password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Forgot Password?</a>
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="../Users/register.php">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
                                    <li><a href="#"><i class="fa fa-volume-control-phone"
                                                aria-hidden="true"></i></a>Phone : +(1234) 567 890</li>
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