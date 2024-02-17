<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Réussie</title>
</head>

<body>

    <h1>Connexion réussie!</h1>

    <?php
    // Assurez-vous d'appeler session_start() au début de chaque script qui utilise les sessions.
    session_start();

    // Vérifiez si la clé 'username' existe dans la session
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<h3>Bonjour $username!</h3>";
    } else {
        echo "<h3>Bonjour Inconnu(e)!</h3>";
        exit();
    }
    ?>
    <form action="logoutbackend.php" method="post">
        <button type="submit">Déconnexion</button>
    </form>
</body>

</html>