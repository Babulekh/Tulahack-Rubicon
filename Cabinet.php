<?php
    error_reporting(E_ALL ^ E_WARNING);

    $db = new PDO('mysql:host=127.0.0.1:3306', 'root', 'root');
    $db->query('USE rubicon;');

    $user = $db->prepare("SELECT * FROM users WHERE ID=:id");
    $user->execute(array(":id"=>$_GET["id"]));
    $user = $user->fetchAll(PDO::FETCH_DEFAULT)[0];

    print_r($user["ID"]);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style.css" rel="stylesheet" />
    <title>Социальная сеть учащегося</title>
</head>
<body>
<header class="container">
    <div class="wrapper_fixed">
        <ul class="ul_main ul_horizontal list_selector header_main">
            <li class="li_main text_main link">Обучение</li>
            <li class="li_main text_main link">Профиль</li>
            <li class="li_main text_main link"><a href="/shop.php/">Магазин</a></li>
        </ul>
    </div>
</header>
<div class="section_main">
    <div class="wrapper_fixed container">
        <div class="block_info">
            <div id="profile-photo">
                <img id="profile-photo__img" src="./test/photo.jpg">
            </div>
            <div id="profile-info">
                <div class="text_main" id="profile-info__name"><?=$user["Username"]?> <?=$user["FirstName"]?> <?=$user["LastName"]?></div>
                <div class="text_main" id="profile-info__status">Ученик</div>
                <div class="text_main" id="profile-info__bio">Привет! Я люблю делать сайты :)</div>
                <div></div>
            </div>
        </div>
        <div class="block_main">
            <div id="profile_main">
                <div class="text_main" id="profile-main__schedule">
                    <!-- подтягивается из БД-->
                </div>
                <div class="text_main" id="profile-main__courses">
                    <!-- подтягивается из БД-->
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>