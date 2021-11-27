<?php  ?>
<?php

?>

<?php
    error_reporting(E_ALL ^ E_WARNING);

    $db = new PDO('mysql:host=127.0.0.1:3306', 'root', 'root');
    $db->query('USE rubicon;');

    $users = $db->prepare("SELECT * FROM users");
    $users->execute();

    if ($_POST["action"] == "register") {
        $id = $db->prepare("SELECT count(*) FROM users");
        $id->execute();
        $id = $id->fetchAll(PDO::FETCH_DEFAULT)[0]['count(*)'];

        $password = $db->prepare("INSERT INTO passwords (ID, password) VALUES (:id, :password)");
        $user = $db->prepare("INSERT INTO users (ID, username) VALUES (:id, :username)");

        $password->execute(array(":id"=>$id+1, ":password"=>$_POST["password"]));
        $user->execute(array(":id"=>$id+1, ":username"=>$_POST["username"]));
    } else {
        $id = $db->prepare("SELECT ID FROM users WHERE username=:username");
        $id->execute(array(":username"=>$_POST["username"]));
        $id = $id->fetchAll(PDO::FETCH_DEFAULT)[0][0];

        $password = $db->prepare("SELECT Password FROM passwords WHERE ID=:id");
        $password->execute(array(":id"=>$id));
        $password = $password->fetchAll(PDO::FETCH_DEFAULT)[0][0];

        if ($password === $_POST["password"]) {
            header("Location:Cabinet.php?id=$id");
        }
    }

?>