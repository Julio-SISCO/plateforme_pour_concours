<?php

function saveCandidature($conn, $nom, $prenom, $photoPath, $date_naissance, $sexe, $nationalite, $adresse, $email, $annee_bac, $serie, $concoursId, $user_id)
{

    try {

        $query = "INSERT INTO candidatures (nom, prenoms, naissance, genre, nationalite, adresse, email, bac, serie, photo_url, user_id, concours_id) 
                  VALUES (:nom, :prenom, :date_naissance, :sexe, :nationalite, :adresse, :email, :annee_bac, :serie, :photo, :user_id, :concours_id)";

        $stmt = $conn->prepare($query);


        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':photo', $photoPath);
        $stmt->bindParam(':date_naissance', $date_naissance);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':nationalite', $nationalite);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':annee_bac', $annee_bac);
        $stmt->bindParam(':serie', $serie);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':concours_id', $concoursId);

        $stmt->execute();

        $lastInsertId = $conn->lastInsertId();
        return $lastInsertId;
        // return array(
        //     'status' => true,
        //     'message' => 'Enregistrement effectué avec succès !',
        //     'newId' => $lastInsertId
        // );

    } catch (PDOException $e) {

        $error = $e->getMessage();
        echo 'error '.$error;
        return 0;
        // return array(
        //     'status' => false,
        //     'message' => 'Erreur d\'enregistrement !'
        // );

    } finally {
        $conn = null;
    }
}


?>