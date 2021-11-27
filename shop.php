<?php
//                echo $_GET["msg"];
//
//                $db = new PDO('mysql:host=127.0.0.1:3306', 'root', 'root');
//                $db->query('USE rubicon;');
//
//                $users = $db->prepare("SELECT * FROM users");
//                $users->execute();
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
            <li class="li_main text_main link"><a href="/Cabinet.php/">Профиль</a></li>
            <li class="li_main text_main link">Магазин</li>
        </ul>
        <div class="header_profile">
            <div id="profile_info_name__header"></div>
            <div id="profile_photo__header">
                <img src="">
            </div>
        </div>
    </div>
</header>
<div class="section_main">
    <div class="wrapper_fixed container">
        <h2 class="text_main">Товары</h2>
        <div class="shop-container">

        </div>
    </div>
</div>
</body>
</html>
