<?php
function UserRegistration($conn, $username, $password)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $is_admin = false;
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

        return array(
            'status' => false,
            'message' => 'Erreur d\'enregistrement !'
        );

    } finally {
        $conn = null;
    }
}
?>