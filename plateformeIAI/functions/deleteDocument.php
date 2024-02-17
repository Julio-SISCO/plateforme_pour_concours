<?php
function deleteDocument($conn, $candidature_id)
{
    global $host, $dbname, $dbusername, $dbpassword;

    try {

        $deleteDocumentsQuery = "DELETE FROM documents WHERE candidature_id = :candidature_id";
        $stmt = $conn->prepare($deleteDocumentsQuery);
        $stmt->bindParam(':candidature_id', $candidature_id);
        $stmt->execute();

        return array(
            'status' => true,
            'message' => 'Suppression effectuée !'
        );

    } catch (PDOException $e) {

        $error = $e->getMessage();

        return array(
            'status' => false,
            'message' => 'Erreur de suppression !'
        );

    } finally {

        $conn = null;

    }
}
?>