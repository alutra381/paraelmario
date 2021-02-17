<?php
require_once 'lib/Controller.php';
require_once 'lib/Security.php';

if (isset($_REQUEST['create'])) {
    Security::getNewUser($_POST['email'], $_POST['password']);
    header("Location: index.php");
}
if (isset($_REQUEST['upload'])) {
    if (!Security::isAllowed()) {
        header("Location: index.php");
    } else {
        $controller = new Controller();
        $controller->handleUploadRequest();
        header("Location: index.php");
    }
}
else if (isset($_REQUEST['login'])) {
    $controller = new Controller();
    $controller->handleLoginRequest($_REQUEST['usuario'], $_REQUEST['password']);
    header("Location: index.php");
}
else if (isset($_REQUEST['logout'])) {
    if (!Security::isAllowed()) {
        header("Location: index.php");
    } else {
        $controller = new Controller();
        $controller->handleLogoutRequest();
        header("Location: index.php");
    }
}
else {
    header("Location: index.php");
}
