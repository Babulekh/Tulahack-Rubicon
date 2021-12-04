<?php
    unset($_COOKIE['id']);
    unset($_COOKIE['token']);
    setcookie('id', null, -1, $path = "/");
    setcookie('token', null, -1, $path = "/");
    header("Location:/");
?>