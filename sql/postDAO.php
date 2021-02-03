<?php

namespace facebook\sql;

use facebook\sql\DBConnection;

include_once 'dbConnection.php';

class postDAO
{

    public static function addPost($commentaire, $lienImg)
    {
        $db = DBConnection::getConnection();
        $sql = "INSERT INTO `m152_facebookv2`.`post` (`id`, `commentaire`, `creationDate`, `modificationDate`) VALUES (NULL, :commentaire, now(), NULL)";
        $q = $db->prepare($sql);
        $q->execute(array(
            ':commentaire' => $commentaire
        ));
    }

    public static function changePath($name, $tempname)
    {
        $db = DBConnection::getConnection();
        $sql = "UPDATE `m152_facebookv2` SET `lienImage` = :named WHERE `post`.`lienImage` = :tempname";

        $q = $db->prepare($sql);
        $q->execute(array(
            ':named' => $name,
            ':tempname' => substr($tempname, 0, 2)
        ));
    }
}
