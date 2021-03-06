<?php
include_once 'core/bootstrap.php';
include_once 'entity/PostRepository.php';
include_once 'entity/Post.php';
include 'view/post.php';
if (!isLogged()) {
    header("Location: index.php");
} else {
    if (isset($_POST['title'])) {
        $post = new Post($_POST['title'], $_POST['content'], $_SESSION['loggedUser']['name'], explode(", ", $_POST['tags']));
        $repo->save($post);
        $repo->uploadDatabase($post);

        header('Location: index.php');
    }
}
