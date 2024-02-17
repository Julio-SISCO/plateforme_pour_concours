<?php
session_start();
require __DIR__ . '/../helpers/db_config.php';

global $host, $dbname, $dbusername, $dbpassword;
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $updateQuery = "UPDATE concours SET libelle = :libelle, debut = :dateDebut, fin = :dateFin WHERE id = :concours_id";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bindParam(':concours_id', $concoursId);
        $stmt->bindParam(':libelle', $libelle);
        $stmt->bindParam(':dateDebut', $dateDebut);
        $stmt->bindParam(':dateFin', $dateFin);
        $stmt->execute();

        echo "Modification du concours réussie !";
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    } finally {
        if (isset($conn)) {
            $conn = null;
            exit();
        }
    }


function updatePeriod($concoursId, $dateDebutInscription, $dateFinInscription)
{
    global $host, $dbname, $dbusername, $dbpassword;
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         
        $stmt = $conn->prepare($updateQuery);
        $stmt->bindParam(':concours_id', $concoursId);
        $stmt->bindParam(':dateDebutInscription', $dateDebutInscription);
        $stmt->bindParam(':dateFinInscription', $dateFinInscription);
        $stmt->execute();

        echo "Modification de la période d'inscription réussie !";
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    } finally {
        if (isset($conn)) {
            $conn = null;
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure that the form is submitted using POST method

    // Retrieve the submitted dates from the form
    $debutDate = $_POST['debut'];
    $finDate = $_POST['fin'];

    // Update the session variables
    $_SESSION['dateDebut'] = $debutDate;
    $_SESSION['datefin'] = $finDate;

    // Update the dates in the database
    $conn = getConnection(); // Replace with your function to establish a database connection

    // Adjust the SQL query based on your database schema
    $updateQuery = "UPDATE concours_dates SET debut_date = '$debutDate', fin_date = '$finDate' WHERE id = 1";

    // Execute the query
    $result = mysqli_query($conn, $updateQuery);

    // Check if the query was successful
    if ($result) {
        // Optionally, you can perform any additional processing or validation here

        // Redirect back to the original page or any other page as needed
        header("Location: ../path/to/original_page.php");
        exit();
    } else {
        // Handle the case where the query fails
        echo "Failed to update dates in the database.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If the form is not submitted using POST, handle accordingly (e.g., show an error message)
    echo "Invalid request method.";
}
?>
