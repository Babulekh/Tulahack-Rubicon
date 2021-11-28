<?php
    include "db.php";

    if ($_POST["ID"]) {
        $id = $_POST["ID"];
    } else {
        $id = $_COOKIE["id"];
    }

    foreach ($_POST as $prop => $value) {
        if ($value && $prop != "ID") {
            $user = $db->prepare("UPDATE users SET $prop = :value WHERE ID=:id");
            $user->execute(array(":value"=>$value, ":id"=>$id));
        }
    }

    header("Location:/Cabinet.php");
?>