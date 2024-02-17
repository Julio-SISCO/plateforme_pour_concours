<?php
function updateCandidature($conn, $id, $nom, $prenoms, $photo, $naissance, $sexe, $nationalite, $adresse, $email, $bac, $serie) {
    
    try {
    
    $query = "UPDATE candidatures 
                    SET nom = :nom, 
                        prenoms = :prenoms , 
                        genre = :sexe, 
                        naissance = :naissance, 
                        serie = :serie, 
                        bac = :bac, 
                        adresse = :adresse, 
                        email = :email, 
                        nationalite = :nationalite, 
                        photo_url = :photo_url 
                    WHERE id = :candidature_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenoms", $prenoms);
        $stmt->bindParam(":sexe", $sexe);
        $stmt->bindParam(":naissance", $naissance);
        $stmt->bindParam(":nationalite", $nationalite);
        $stmt->bindParam(":serie", $serie);
        $stmt->bindParam(":bac", $bac);
        $stmt->bindParam(":adresse", $adresse);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":photo_url", $photo);
        $stmt->bindParam(":candidature_id", $id);
        $stmt->execute();

        return array(
            'status' => true,
            'message' => 'Modification effectuée avec succès !',
        );

    } catch (PDOException $e) {

        $error = $e->getMessage();

        return array(
            'status' => false,
            'message' => 'Erreur de modification !'
        );

    } finally {
        $conn = null;
    }
}

?>