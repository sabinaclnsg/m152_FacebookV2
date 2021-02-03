<?php
namespace facebook\sql;

require_once "sql/postDAO.php";

use facebook\sql\DBConnection;
use facebook\sql\postDAO;

include_once 'sql/dbConnection.php';

define("FILE_PATH", "./assets/img/post/");
$commentaire = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);
$img = array_filter($_FILES['postImage']['name']);

// compter le nombre d'images publiées
if (!empty($_POST)) {

    if (isset($commentaire)) {
        postDAO::addPost($commentaire, $lienimg);
    }

    if (!($totalImgs < 1)) {
        if (isset($_FILES['uploaded_file'])) {
            $errors = array();
            $maxsize = 3145728; // max file size 3MB
            $acceptable = array(
                'image/jpeg',
                'image/jpg',
                'image/png'
            );

            if(($_FILES['uploaded_file']['size'] >= $maxsize) || ($_FILES["uploaded_file"]["size"] == 0)) {
                $errors[] = 'File too large. File must be less than 2 megabytes.';
            }
        
            if((!in_array($_FILES['uploaded_file']['type'], $acceptable)) && (!empty($_FILES["uploaded_file"]["type"]))) {
                $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
            }
        
            if(count($errors) === 0) {
                move_uploaded_file($_FILES['uploaded_file']['tmpname'], '/store/to/location.file');
            } else {
                foreach($errors as $error) {
                    echo '<script>alert("'.$error.'");</script>';
                }
        
                die(); //Ensure no more processing is done
            }
        }
    }





    $totalImgs = count($_FILES[$img]['name']);

    if (!empty($commentaire) / $totalImgs != 0) {
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
