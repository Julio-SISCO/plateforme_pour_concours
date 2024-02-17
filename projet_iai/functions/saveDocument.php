<?php
function saveDocument($conn, $nom_document, $type_document, $chemin_fichier, $candidature_id)
{
    $date_upload = date('Y-m-d H:i:s');

    try {

        $query = "INSERT INTO documents (libelle, type, doc_url, upload_at, candidature_id) 
                  VALUES (:nom_document, :type_document, :chemin_fichier, :date_upload, :candidature_id)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':nom_document', $nom_document);
        $stmt->bindParam(':type_document', $type_document);
        $stmt->bindParam(':chemin_fichier', $chemin_fichier);
        $stmt->bindParam(':date_upload', $date_upload);
        $stmt->bindParam(':candidature_id', $candidature_id);

        $stmt->execute();

        return array(
            'status' => true,
            'message' => 'Enreistrement effectué avec succès !',
        );

    } catch (PDOException $e) {

        $error = $e->getMessage();

        return array(
            'status' => false,
            'message' => 'Erreur d\'enregistrement !'
        );

    } finally {
        $conn = null;
    }

}

?>