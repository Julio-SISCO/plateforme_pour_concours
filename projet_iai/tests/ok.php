<?php
$pi = round(M_PI, 2); 
$quest='QCMQUIZ';
echo $quest[2];


// Vérifier si le formulaire a été soumis!
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupère les données du formulaire
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $pnom = isset($_POST['pnom']) ? $_POST['pnom'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    // Affiche les données récupérées
    echo "Nom : $nom<br>";
    echo "Prénom : $pnom<br>";
    echo "Âge : $age<br>";
}
echo"voici un \"test\" php";
?>