<?php
require 'vendor/autoload.php';

use Faker\Factory;
use Carbon\Carbon;

// Configuration de la connexion à la base de données
$host = 'localhost';
$dbname = 'recrutements';
$dbusername = 'root';
$dbpassword = '';

// Connexion à la base de données
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$faker = Factory::create('fr_FR');

// Génération et enregistrement de plusieurs utilisateurs avec candidatures et documents
for ($i = 0; $i < 25; $i++) {
    // Génération d'un utilisateur
    $username = $faker->userName;
    $password = password_hash('password123', PASSWORD_DEFAULT);
    $is_admin = false;

    // Enregistrement de l'utilisateur
    // $stmt = $conn->prepare("INSERT INTO users (username, password, is_admin) VALUES (:username, :password, :is_admin)");
    // $stmt->bindParam(':username', $username);
    // $stmt->bindParam(':password', $password);
    // $stmt->bindParam(':is_admin', $is_admin);
    // $stmt->execute();

    // $user_id = $conn->lastInsertId();
    // Sélectionnez un utilisateur au hasard
    $query = "SELECT * FROM users ORDER BY RAND() LIMIT 1";
    $stmt = $conn->query($query);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $user_id =  $user['id'];


    // Génération d'une candidature
    $nom = $faker->lastName;
    $prenoms = $faker->firstName;
    $naissance = $faker->date;
    $genre = $faker->randomElement(['Masculin', 'Féminin']);
    $nationalite = $faker->randomElement(['Togo', 'Bénin', 'Côte d\'ivore', 'Congo Brazaville', 'Tchad', 'Niger', 'Burkina Faso', 'Cameroun', 'Gabon', 'Congo', 'Centrafrique', 'Sénégal']);;
    $adresse = $faker->address;
    $email = $faker->email;
    $bac = $faker->randomElement(['2023', '2022']);
    $serie = $faker->randomElement(['C', 'D', 'E', 'F2', 'F3']);
    $photo_url = 'C:/wamp/www/pages/app/uploads/photos/photo_fake.png';
    $concours_id = 1;

    // Enregistrement de la candidature
    $stmt = $conn->prepare("INSERT INTO candidatures (nom, prenoms, naissance, genre, nationalite, adresse, email, bac, serie, photo_url, concours_id, user_id) 
                            VALUES (:nom, :prenoms, :naissance, :genre, :nationalite, :adresse, :email, :bac, :serie, :photo_url, :concours_id, :user_id)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenoms', $prenoms);
    $stmt->bindParam(':naissance', $naissance);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':nationalite', $nationalite);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':bac', $bac);
    $stmt->bindParam(':serie', $serie);
    $stmt->bindParam(':photo_url', $photo_url);
    $stmt->bindParam(':concours_id', $concours_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    $candidature_id = $conn->lastInsertId();

    // Génération et enregistrement de trois documents pour chaque candidature
    // for ($j = 0; $j < 3; $j++) {
    //     $libelle = $faker->word;
    //     $type = ['naissances', 'nationalites', 'attestations'][$j];
    //     $doc_url = "C:/wamp/www/pages/app/uploads/$type/doc_fake.pdf";

    //     // Enregistrement du document
    //     $stmt = $conn->prepare("INSERT INTO documents (libelle, type, doc_url, upload_at, candidature_id) 
    //                             VALUES (:libelle, :type, :doc_url, :upload_at, :candidature_id)");
    //     $stmt->bindParam(':libelle', $libelle);
    //     $stmt->bindParam(':type', $type);
    //     $stmt->bindParam(':doc_url', $doc_url);
    //     $stmt->bindValue(':upload_at', date('Y-m-d H:i:s'));
    //     $stmt->bindParam(':candidature_id', $candidature_id);
    //     $stmt->execute();
    // }
}

// Fermeture de la connexion
$conn = null;

echo 'Données générées avec succès.';
?>
