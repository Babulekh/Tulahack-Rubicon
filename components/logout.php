<?php
    unset($_COOKIE['id']);
    setcookie('id', null, -1, $path = "/");
    header("Location:/");
?>