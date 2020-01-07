<?php
include_once 'core/bootstrap.php';
include_once 'entity/Post.php';
include_once 'entity/PostRepository.php';
if (isset($_GET['tag'])) {
    $posts = $repo->getAllPostsByTag($_GET['tag']);
} else {
    $posts = $repo->getAllByDatabase();
}
if (isset($_GET['remove'])){
    
    $repo->removeByDatabase($_GET['remove']);
    header("Location: index.php");
}
include 'view/index.php';
