<?php

namespace facebook\sql;

require_once "sql/postDAO.php";

use facebook\sql\DBConnection;
use facebook\sql\postDAO;

include_once 'sql/dbConnection.php';

// lien images post
$filePath = "";


// les types de fichier qui sont acceptés
$allowedTypes = array("png", "jpg", "jpeg", "gif", "mp4", "webm", "flv");
$imagesTypes = array("png", "jpg", "jpeg", "gif");
$videosTypes = array("mp4", "webm", "flv");
$commentaire = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);
$error = "";

if (isset($_POST['submit']) && isset($_FILES['postImage'])) {

    // vérification de la taille de l'image
    $countfiles = count($_FILES['postImage']['name']);
    //$extension = pathinfo($_FILES['postImage']['name'], PATHINFO_EXTENSION);

    try {
        $id = postDAO::addPost($commentaire);
    } catch (\Throwable $th) {
        throw $th;
    }

    for ($i = 0; $i < $countfiles; $i++) {

        $tmp_name = $_FILES['postImage']['name'][$i];

        if ($_FILES['postImage']['error'][$i] === UPLOAD_ERR_OK) { // vérification : si l'upload a réussi

            // générer un nom de fichier aléatoire
            $name = explode(".", $tmp_name);
            $imageType = $name[1];

            if (in_array($name[1], $allowedTypes)) {
                if (in_array($name[1], $imagesTypes)) {
                    $filePath = "./assets/img/post/";
                }else if (in_array($name[1], $videosTypes)) {
                    $filePath = "./assets/videos/post/";
                }

                $name = $name[0] . uniqid() . "." . $name[1];
                // Upload file
                move_uploaded_file($_FILES['postImage']['tmp_name'][$i], $filePath . $name);

                try {
                    postDAO::addImage($imageType, $name, $id);
                } catch (\Throwable $th) {
                    throw $th;
                }

                $error = "";
            } else {
                $error = "File type error.";
            }
            $error = "";
        } else if ($_FILES['postImage']['error'][$i] === 2) {
            $error = "File size is too large.";
        } else {
            $error = "Upload error.";
            print_r($_FILES['postImage']['error'][$i]);
        }
    }
}
