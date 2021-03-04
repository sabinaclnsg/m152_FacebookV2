<?php
require_once "./sql/postDAO.php";

use facebook\sql\postDAO;


function showPosts()
{
    $imagesTypes = array('png', 'jpg', 'jpeg', 'gif');
    $videosTypes = array('mp4', 'webm', 'flv');
    $result = "";
    $posts = postDAO::getPosts();
    $active = "active";
    $maxRowSize = 2; // affiche 3 posts par row
    $postCounter = 0;

    foreach ($posts as $p) {
        if ($postCounter == 0) {
            $result .= "<div class='card-group pt-5'>";
        }
        $counter = 1;
        $img =  postDAO::getImgFromPost($p['id']);
        $result .= "<div class='card p-0 col-xs-12 col-sm-12 col-md-12 col-lg-12 m-2'>
                        <div id='carousel" . $p['id'] . "' class='carousel slide' data-ride='carousel'>
                        <ol class='carousel-indicators'>
    <li data-target='#carousel" . $p['id'] . "' data-slide-to='0' class='active'></li>
    <li data-target='#carousel" . $p['id'] . "' data-slide-to='1'></li>
    <li data-target='#carousel" . $p['id'] . "' data-slide-to='2'></li>
  </ol>
                            <div class='carousel-inner'>";

        foreach ($img as $i) {
            if ($counter < 1) {
                $active = "";
            } else {
                $active = "active";
            }

            // si file est une image
            if (in_array($i['type'], $imagesTypes)) {
                $result .= "
            <div class='carousel-item item $active'>
					<img class='d-block w-100' src='assets/img/post/" . $i['nom'] . "' alt='" . $i['nom'] . "'>
			</div>";
            } else if (in_array($i['type'], $videosTypes)) {
                $result .= "
                <div class='carousel-item item $active'>
                    <video width='100%' autoplay loop muted controls>
                        <source class='d-block w-100' src='assets/videos/post/" . $i['nom'] . "' alt='" . $i['nom'] . "'>
                    </video>
                </div>";
            }

            $counter = 0;
        }

        $result .= "</div>
        <a class='carousel-control-prev' href='#carousel" . $p['id'] . "' role='button' data-slide='prev'>
        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
        <span class='sr-only'>Previous</span>
    </a>
    <a class='carousel-control-next' href='#carousel" . $p['id'] . "' role='button' data-slide='next'>
        <span class='carousel-control-next-icon' aria-hidden='true'></span>
        <span class='sr-only'>Next</span>
    </a>  

    </div>
    <div class='card-body'>
            <p class='card-text'>" . $p['commentaire'] . "</p>
    </div>
    <div class='card-footer'>
      <small class='text-muted'>" . $p['creationDate'] . "</small>
        <div class='float-right'>
            <a href=''><img src='assets/img/other/edit.svg' alt='edit' style='width: 20px;'></a>
            <a href=''><img src='assets/img/other/delete.svg' alt='delete' style='width: 20px;'></a>
        </div>
    </div>
</div>
        ";

        if ($postCounter >= $maxRowSize) {
            $result .= "</div>";
            $postCounter = -1;
        }

        $postCounter++;
    }
    echo $result;
}
