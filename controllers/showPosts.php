<?php
require_once "./sql/postDAO.php";

use facebook\sql\postDAO;


function showPosts()
{
    $result = "";
    $posts = postDAO::getPosts();

    foreach ($posts as $p) {
        $result .= "<div class='col-sm-12 col-md-6 col-lg-4'>
    
        <div class='panel panel-default'>
            <div class='panel-thumbnail'><img src='assets/img/post/" . $p['image'] . "' class='img-responsive'></div>
            <div class='panel-body'>
                <p class='lead'>" . $p['commentaire'] . "</p>
                <p>" . $p['creationDate'] . "</p>
    
                <p>
                    <img src='assets/img/uFp_tsTJboUY7kue5XAsGAs28.png' height='28px' width='28px'>
                </p>
            </div>
        </div>
    
    </div>";
    }

    echo $result;
}
