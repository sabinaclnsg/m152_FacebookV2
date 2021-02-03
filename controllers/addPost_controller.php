<?php

namespace facebook\sql;

use facebook\sql\DBConnection;

include_once 'sql/dbConnection.php';

define("FILE_PATH", "./assets/img/post/");
$commentaire = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);

// compter le nombre d'images publiées
if (isset($_FILES['postImage'])) {
    $totalImgs = count($_FILES['postImage']['name']);
    if (!empty($commentaire) && !$totalImgs != 0) {
        for ($i = 0; $i < $totalImgs; $i++) {
            $errorimg = $_FILES["postImage"]["error"][$i];
            if ($errorimg == UPLOAD_ERR_OK) {
                //echo "upload reussi";
                $tmp_name = $_FILES["postImage"]["name"][$i];
                $name = explode(".", $tmp_name);
                $name = $name[0] . uniqid() . "." . $name[1];
                move_uploaded_file($_FILES["postImage"]["tmp_name"][$i], FILE_PATH . $name);
                //ajout du nom du fichier dans la bd
                postDAO::changePath($name, $tmp_name);
                $lienimg = FILE_PATH . $name;
            }
            try {
                postDAO::addPost($commentaire);
                header("Location: ../index.php?page=homepage");
                exit();
            } catch (\Throwable $th) {
                $error = $th;
            }
        }
    } else {
        $error = "Veuillez entrer toutes les valeurs nécessaires ! [Nom], [Commentaire], [Image], [Coordonnées]";
    }
}
