<?php
require '../helpers/db_config.php';
require '../helpers/redirectors.php';
require '../helpers/checkSessionData.php';

session_start();
function UserConnexion($username, $password)
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['status'] = $user['is_admin'];

            if (checkConcours()) {
                defaultRedirection();
            }

        } else {
            header('Location: ../Auth/login.php');

        }
    } catch (PDOException $e) {

        echo "Erreur d'authentification : " . $e->getMessage();


    }
}
?>