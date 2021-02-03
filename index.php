<?php
//session_destroy();
session_start();

//require_once "./sql/userDAO.php";

use birdlife\sql\UserDAO;

//if (!isset($_SESSION['user'])) {
//    $_SESSION['user'] = "";
//}

// variable page qui va etre utile pour rediriger les liens
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

if ($page == null) {
    header('location: ./index.php?page=homepage');
}

if (!isset($_SESSION['connected'])) {
    $_SESSION['connected'] = false;
}

if (isset($page)) {

    switch ($page) {
        case 'homepage':
            require("homepage.php");
            break;
        case 'post':
            require("post.php");
            break;
    }
} else {
    require('homepage.php');
}
