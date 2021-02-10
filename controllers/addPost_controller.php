<?php

namespace facebook\sql;

require_once "sql/postDAO.php";

use facebook\sql\DBConnection;
use facebook\sql\postDAO;

include_once 'sql/dbConnection.php';

// lien images post
define("FILE_PATH", "./assets/img/post/");
// les types de fichier qui sont acceptés
$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
$commentaire = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);

if (isset($_POST['submit'])) {

    $countfiles = count($_FILES['postImage']['name']);

    for ($i = 0; $i < $countfiles; $i++) {

        $tmp_name = $_FILES['postImage']['name'][$i];

        // générer un nom de fichier aléatoire
        $name = explode(".", $tmp_name);
        $imageType = $name[1];
        $name = $name[0] . uniqid() . "." . $name[1];

        // Upload file
        move_uploaded_file($_FILES['postImage']['tmp_name'][$i], FILE_PATH . $name);

        postDAO::addPost($commentaire, $name, $imageType);
    }
}
