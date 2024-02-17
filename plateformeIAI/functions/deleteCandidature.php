<?php
require 'deleteDocument.php';
function deleteCandidature($conn, $concoursId, $user_id)
{
    try {
        $query = "SELECT id FROM candidatures WHERE concours_id = :concours_id AND user_id = :user_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':concours_id', $concoursId);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $candidatureId = $stmt->fetchColumn();

        if ($candidatureId) {
            deleteDocument($conn, $candidatureId);

            $deleteCandidatureQuery = "DELETE FROM candidatures WHERE id = :candidature_id";
            $stmt = $conn->prepare($deleteCandidatureQuery);
            $stmt->bindParam(':candidature_id', $candidatureId);
            $stmt->execute();

            return array(
                'status' => true,
                'message' => 'Suppression effectuée !'
            );
        }
    } catch (PDOException $e) {
        $error = $e->getMessage();

        return array(
            'status' => false,
            'message' => 'Erreur de suppression !'
        );
    } finally {
        // Pas besoin de fermer la connexion ici car $conn est un paramètre et ne doit pas être fermé à ce niveau.
    }
}
?>
