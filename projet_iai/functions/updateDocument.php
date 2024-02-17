<?php
function updateDocument($conn, $id, $file, $user_id, $concoursId, $username, $type)
{

    $uploadDirectory = __DIR__ . "/../uploads/{$type}/";

    $originalFileName = $file['name'];
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $newFileName = "{$user_id}_{$concoursId}_{$username}_{$type}.{$extension}";
    $targetPath = $uploadDirectory . $newFileName;

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        $path = "uploads/{$type}/" . $newFileName;

        try {
            $query = "UPDATE documents 
                    SET doc_url = :doc_url
                    WHERE candidature_id = :candidature_id AND type = :doc_type";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":doc_url", $path);
            $stmt->bindParam(":doc_type", $type);
            $stmt->bindParam(":candidature_id", $id, PDO::PARAM_INT);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo $error;
            return false;
        }
    }

    return null;
}

function updatePhoto($conn, $id, $file, $user_id, $concoursId, $username, $type)
{

    $uploadDirectory = __DIR__ . "/../uploads/{$type}/";

    $originalFileName = $file['name'];
    $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $newFileName = "{$user_id}_{$concoursId}_{$username}_{$type}.{$extension}";
    $targetPath = $uploadDirectory . $newFileName;

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        $path = "uploads/{$type}/" . $newFileName;

        try {
            $query = "UPDATE candidatures 
                    SET photo_url = :doc_url
                    WHERE id = :candidature_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":doc_url", $path);
            $stmt->bindParam(":candidature_id", $id, PDO::PARAM_INT);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo $error;
            return false;
        }
    }

    return null;
}
