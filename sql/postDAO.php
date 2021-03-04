<?php

namespace facebook\sql;

use Exception;
use facebook\sql\DBConnection;

include_once 'dbConnection.php';

class postDAO
{

    //$db->beginTransaction()
    // ... execute prepare ...
    // $db->commit()
    // $db->rollBack()



    public static function addPost($commentaire)
    {
        try {
            $db = DBConnection::getConnection();
            //$db->beginTransaction();
            $sql = "INSERT INTO `m152_facebookv2`.`post` (`id`, `commentaire`, `creationDate`, `modificationDate`, `image`, `type`) VALUES (NULL, :commentaire, now(), now(), NULL, NULL)";
            $q = $db->prepare($sql);
            $q->execute(array(
                ':commentaire' => $commentaire,
            ));
            //$db->commit();
            return $db->lastInsertId();
        } catch (Exception $e) {
            //$db->rollBack();
            return false;
        }
    }

    public static function addImage($type, $nom, $idPost)
    {
        try {
            $db = DBConnection::getConnection();
            //$db->beginTransaction();
            $sql = "INSERT INTO `m152_facebookv2`.`media` (`id`, `type`, `nom`, `creationDate`, `modificationDate`, `idPost`) VALUES (NULL, :type, :nom, now(), now(), :idPost)";
            $q = $db->prepare($sql);
            $q->execute(array(
                ':type' => $type,
                ':nom' => $nom,
                ':idPost' => $idPost
            ));
            //$db->commit();
            return $db->lastInsertId();
        } catch (Exception $e) {
            //$db->rollBack();
            return false;
        }
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

    public static function getImgFromPost($id)
    {
        $db = DBConnection::getConnection();
        $sql = "SELECT * FROM post INNER JOIN media ON media.idPost=post.id WHERE post.id = :id";

        $q = $db->prepare($sql);
        $q->execute(array(':id' => $id));
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
}
