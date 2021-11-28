<?php include 'db.php'; ?>
<?php
    if (!isset($_COOKIE["id"])) {
        header("Location:/");
    }

    $user = $db->prepare("SELECT * FROM users WHERE ID=:id");
    $user->execute(array(":id"=>$_COOKIE["id"]));
    $user = $user->fetchAll(PDO::FETCH_DEFAULT)[0];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/style.css" rel="stylesheet" />
    <title>Социальная сеть</title>
</head>
<body>
<header class="container">
    <div class="wrapper_fixed">
        <ul class="ul_main ul_horizontal list_selector header_main">
            <?php
            if ($user["Username"] == "admin") {
                echo '<li class="li_main text_main link"><a href="/cpanel.php">cpanel</a></li>';
            }
            ?>
            <li class="li_main text_main link">Обучение</li>
            <li class="li_main text_main link"><a href="/Cabinet.php">Профиль</a></li>
            <li class="li_main text_main link"><a href="/shop.php">Магазин</a></li>
            <li class="li_main text_main link"><a href="/components/logout.php">Выйти</a></li>
        </ul>
        <div class="header_profile">
            <div id="profile_info_name__header"><?=$user["FirstName"]?> <?=$user["LastName"]?></div>
            <div id="profile_photo__header">
                <img src="">
            </div>
        </div>
    </div>
</header>
