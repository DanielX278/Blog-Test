<?php
include_once 'core/bootstrap.php';
include_once 'entity/PostRepository.php';
include_once 'entity/Post.php';
include 'view/post.php';
if (isset($_POST['title'])) {
    $post = new Post($_POST['title'], $_POST['content'], $_SESSION['loggedUser']['name'], explode(", ", $_POST['tags']));
    $repo->save($post);
    $repo->uploadDatabase();
    header('Location: index.php');
}
