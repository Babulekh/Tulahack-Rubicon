<?php include 'db.php' ?>

<?php
    $users = $db->prepare("SELECT * FROM users");
    $users->execute();

    if ($_POST["action"] == "register") {
        $isregistered = $db->prepare("SELECT * FROM users WHERE Username=:username");
        $isregistered->execute(array(":username"=>$_POST["username"]));
        $isregistered = $isregistered->fetchAll(PDO::FETCH_DEFAULT)[0]["Username"];

        if ($isregistered) {
            header("Location:/");
        }

        $id = $db->prepare("SELECT count(*) FROM users");
        $id->execute();
        $id = $id->fetchAll(PDO::FETCH_DEFAULT)[0]['count(*)'];

        $password = $db->prepare("INSERT INTO passwords (ID, password) VALUES (:id, :password)");
        $user = $db->prepare("INSERT INTO users (ID, username) VALUES (:id, :username)");

        $password->execute(array(":id"=>$id+1, ":password"=>hash('ripemd160', $_POST["password"])));
        $user->execute(array(":id"=>$id+1, ":username"=>$_POST["username"]));

        setcookie("id", $id+1, time()+(3600*24), $path = "/");
        setcookie("token", hash('ripemd160', $_POST["username"] . hash('ripemd160', $_POST["password"])), time()+(3600*24), $path = "/");
        header("Location:/Cabinet.php");
    } else {
        $id = $db->prepare("SELECT ID FROM users WHERE username=:username");
        $id->execute(array(":username"=>$_POST["username"]));
        $id = $id->fetchAll(PDO::FETCH_DEFAULT)[0][0];

        $password = $db->prepare("SELECT Password FROM passwords WHERE ID=:id");
        $password->execute(array(":id"=>$id));
        $password = $password->fetchAll(PDO::FETCH_DEFAULT)[0][0];

        if ($password === hash('ripemd160', $_POST["password"])) {
            setcookie("id", $id, time()+(3600*24), $path = "/");
            setcookie("token", hash('ripemd160', $_POST["username"] . $password), time()+(3600*24), $path = "/");
            header("Location:/Cabinet.php");
        } else {
            header("Location:/");
        }
    }
?>