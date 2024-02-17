<?php
require __DIR__ . '/../helpers/db_config.php';
function UserRegistration($conn, $username, $password)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $is_admin = 0;
    try {

        $query = "INSERT INTO users (username, password, is_admin) VALUES (:username, :password, :is_admin)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':is_admin', $is_admin);
        $stmt->execute();

        return array(
            'status' => true,
            'message' => 'Enregistrement effectué avec succès !',
        );

    } catch (PDOException $e) {

        $error = $e->getMessage();
        echo''. $error;
        return array(
            'status' => false,
            'message' => 'Erreur d\'enregistrement !'
        );

    } finally {
        $conn = null;
    }
}

function AdminRegistration($username, $password)
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {
        //INITIATION DE CONNEXION A LA BASE DE DONNEE
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérifier si l'utilisateur existe déjà
        $queryCheck = "SELECT * FROM users WHERE username = :username";
        $stmtCheck = $conn->prepare($queryCheck);
        $stmtCheck->bindParam(':username', $username);
        $stmtCheck->execute();

        if ($stmtCheck->rowCount() > 0) {

            $_SESSION['errormessage'] = "Le nom d'utilisateur existe déjà !";

            header('Location: ../addadmin.php');
        }

        // Hachage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $is_admin = true;
        // Requête pour insérer un nouvel utilisateur dans la base de données
        $query = "INSERT INTO users (username, password, is_admin) VALUES (:username, :password, :is_admin)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':is_admin', $is_admin);
        $result = $stmt->execute();

        // Fermeture de la connexion à la base de données
        $conn = null;


        $_SESSION['errormessage'] = "";
        $_SESSION['successmessage'] = "Vous avez été bien enregistré !";

        header('Location: ../addadmin.php');
    } catch (PDOException $e) {
        // En cas d'erreur, afficher l'erreur
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

