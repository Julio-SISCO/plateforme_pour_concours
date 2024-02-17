<?php
session_start();   
    require '../helpers/checkAuthentication.php';
    if(is_logged_in()){
        header('Location: ../views/users/index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


</head>

<body>
    
    <div class="container mt-5">
        <!-- <h2 class="text-center">Connexion</h2> -->
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-8 col-lg-6 pb-5">


                <!--Form with header-->

                <form action="backend/loginbackend.php" method="post">
                    <div class="card border-primary rounded-0">
                        <div class="card-header p-0">
                            <div class="bg-info text-white text-center py-2">
                                <h3><i class="fa fa-key"></i>connectez-vous</h3>
                                <!-- <p class="m-0">Con gusto te ayudaremos</p> -->
                            </div>
                        </div>
                        <div class="card-body p-3">

                            <!--Body-->
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="username"
                                        placeholder="Nom d'utilisateur" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-key text-info"></i></div>
                                    </div>
                                    <input type="password" class="form-control" id="nombre" name="password"
                                        placeholder="Mot de passe" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" value="Se connecter" class="btn btn-info btn-block rounded-0 py-2">
                            </div>
                            <div class="text-center mt-2">
                                <p>Pas de compte ?<a href="register.php">S'inscrire</a></p>
                            </div>
                        </div>

                    </div>
                </form>
                <!--Form with header-->


            </div>
        </div>
    </div>

</body>

</html>