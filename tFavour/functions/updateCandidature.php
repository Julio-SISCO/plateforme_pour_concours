<?php
function updateCandidature($conn, $id, $nom, $prenoms, $naissance, $sexe, $nationalite, $bac, $serie)
{

    try {

        $query = "UPDATE candidatures 
                    SET nom = :nom, 
                        prenoms = :prenoms , 
                        genre = :sexe, 
                        naissance = :naissance, 
                        serie = :serie, 
                        bac = :bac, 
                        nationalite = :nationalite
                        WHERE id = :candidature_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenoms", $prenoms);
        $stmt->bindParam(":sexe", $sexe);
        $stmt->bindParam(":naissance", $naissance);
        $stmt->bindParam(":nationalite", $nationalite);
        $stmt->bindParam(":serie", $serie);
        $stmt->bindParam(":bac", $bac);
        $stmt->bindParam(":candidature_id", $id, PDO::PARAM_INT); // Utilisez PDO::PARAM_INT si id est un entier

        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo $error;
    } finally {
        $conn = null;
    }
}
