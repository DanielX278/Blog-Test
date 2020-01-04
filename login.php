<?php
include_once 'core/bootstrap.php';
include_once 'core/login-handler.php';
include_once 'view/login.php';
if (isset($_POST['email'])) {
    loginUser($_POST['email'], $_POST['password']);
};
?>
