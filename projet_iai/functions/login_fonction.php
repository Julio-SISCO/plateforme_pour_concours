<?php
require  __DIR__ . '/../helpers/db_config.php';
require  __DIR__ . '/../helpers/redirectors.php';
require  __DIR__ . '/../helpers/checkSessionData.php';

function UserConnexion($username, $password) {
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['password'])) {
            // Authentification réussie, enregistrer les informations de l'utilisateur dans la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['status'] = $user['is_admin'];

            if (checkConcours()) {
                defaultRedirection();
            }
            exit();
        } else {
            $_SESSION['errormessage'] = "Nom d'utilisateur ou mot de passe invalide !";
            
            header('Location: ../login.php');
            exit();
        }
    } catch (PDOException $e) {
        // En cas d'erreur, afficher l'erreur
        echo "Erreur d'authentification : " . $e->getMessage();
    }
}

