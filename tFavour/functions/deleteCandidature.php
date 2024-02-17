<?php
require 'deleteDocument.php';

function deleteCandidature($conn, $concoursId, $user_id)
{
    try {
        $query = "SELECT id FROM candidatures WHERE concours_id = :concours_id AND user_id = :user_id";
        $stmt = $conn->prepare($query);
        
        if (!$stmt) {
            throw new Exception("Erreur de préparation de la requête.");
        }

        $stmt->bindParam(':concours_id', $concoursId);
        $stmt->bindParam(':user_id', $user_id);

        if (!$stmt->execute()) {
            throw new Exception("Erreur lors de l'exécution de la requête.");
        }

        $candidatureId = $stmt->fetchColumn();

        if ($candidatureId) {
            $conn->beginTransaction();

            try {
                deleteDocument($conn, $candidatureId);

                $deleteCandidatureQuery = "DELETE FROM candidatures WHERE id = :candidature_id";
                $stmt = $conn->prepare($deleteCandidatureQuery);

                if (!$stmt) {
                    throw new Exception("Erreur de préparation de la requête de suppression.");
                }

                $stmt->bindParam(':candidature_id', $candidatureId);

                if (!$stmt->execute()) {
                    throw new Exception("Erreur lors de la suppression de la candidature.");
                }

                $conn->commit();

                return array(
                    'status' => true,
                    'message' => 'Suppression effectuée !'
                );
            } catch (Exception $e) {
                $conn->rollBack();
                $error = $e->getMessage();
                error_log("Erreur de suppression: $error");

                return array(
                    'status' => false,
                    'message' => 'Erreur de suppression !'
                );
            }
        }
    } catch (PDOException $e) {
        $error = $e->getMessage();
        error_log("Erreur de suppression: $error");

        return array(
            'status' => false,
            'message' => 'Erreur de suppression !'
        );
    }
}
