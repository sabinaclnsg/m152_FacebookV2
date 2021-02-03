<?php

namespace facebook\sql;

use facebook\sql\DBConnection;

include_once 'dbConnection.php';

class postDAO
{

    public static function addPost($commentaire)
    {
        $db = DBConnection::getConnection();
        $sql = "INSERT INTO `m152_facebookv2`.`post` (`idPost`, `commentaire`, `creationDate`, `modificationDate`) VALUES (NULL, commentaire:, NULL, NULL)";
        $q = $db->prepare($sql);
        $q->execute(array(
            ':commentaire' => $commentaire
        ));
    }

    public static function changePath($name, $tempname)
    {
        $db = DBConnection::getConnection();
        $sql = "UPDATE `bird` SET `lienImage` = :named WHERE `post`.`lienImage` = :tempname";

        $q = $db->prepare($sql);
        $q->execute(array(
            ':named' => $name,
            ':tempname' => substr($tempname, 0, 2)
        ));
    }
}
