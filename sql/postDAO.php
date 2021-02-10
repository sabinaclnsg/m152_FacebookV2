<?php

namespace facebook\sql;

use facebook\sql\DBConnection;

include_once 'dbConnection.php';

class postDAO
{

    public static function addPost($commentaire, $lienImg, $type)
    {
        $db = DBConnection::getConnection();
        $sql = "INSERT INTO `m152_facebookv2`.`post` (`id`, `commentaire`, `creationDate`, `modificationDate`, `image`, `type`) VALUES (NULL, :commentaire, now(), now(), :lienImg, :type)";
        $q = $db->prepare($sql);
        $q->execute(array(
            ':commentaire' => $commentaire,
            ':lienImg' => $lienImg,
            ':type' => $type
        ));

        return $db->lastInsertId();
    }

    public static function getPosts()
    {
        $db = DBConnection::getConnection();
        $sql = "SELECT * FROM post";

        $q = $db->prepare($sql);
        $q->execute();
        $result = $q->fetchAll();
        return $result;
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

    public static function addImage($typeMedia, $nomFichierMedia)
    {
        $db = DBConnection::getConnection();
        $sql = "INSERT INTO media (type, nom) VALUES (:typeMedia, :nomFichierMedia)";
        $request = $db->prepare($sql);
        if ($request->execute(array(
            ':typeMedia' => $typeMedia,
            ':nomFichierMedia' => $nomFichierMedia
        ))) {
            return TRUE;
        } else {
            return NULL;
        }
    }
}
