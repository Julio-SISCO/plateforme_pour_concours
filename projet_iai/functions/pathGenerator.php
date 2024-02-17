<?php
require 'saveDocument.php';

function photoPath($file, $user_id, $concoursId, $username, $type)
{ {
        $uploadDirectory = __DIR__ . "/../uploads/{$type}/";

        $originalFileName = $file['name'];

        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);

        $newFileName = "{$user_id}_{$concoursId}_{$username}_{$type}.{$extension}";

        $targetPath = $uploadDirectory . $newFileName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {

            return "uploads/{$type}/" . $newFileName;

        }
        return null;

    }

}

function filePath($conn, $file, $user_id, $concoursId, $username, $type, $candidat_id)
{ {
        $uploadDirectory = __DIR__ . "/../uploads/{$type}/";

        $originalFileName = $file['name'];

        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);

        $newFileName = "{$user_id}_{$concoursId}_{$username}_{$type}.{$extension}";

        $targetPath = $uploadDirectory . $newFileName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {

            $path = "uploads/{$type}/" . $newFileName;

            saveDocument($conn, $newFileName, $type, $path, $candidat_id);

            return true;

        }

        return false;
    }
}