<?php include './components/header.php'; ?>

<?php
    $id = $_GET["id"];

    $profile = $db->prepare("SELECT * FROM users WHERE ID=$id");
    $profile->execute();
    $profile = $profile->fetchAll(PDO::FETCH_DEFAULT)[0];
?>

<div class="section_main">
    <div class="wrapper_fixed container">
        <div class="block_info">
            <div id="profile-photo">
                <img id="profile-photo__img" src=<?=$profile["ImgPath"]?>>
            </div>
            <div id="profile-info">
                <div class="switched switched_active" id="profile-data">
                    <div class="text_main" id="profile-info__name"><?=$profile["profilename"]?> <?=$profile["FirstName"]?> <?=$profile["LastName"]?></div>
                    <div class="text_main" id="profile-info__status"><?=$profile["Status"]?></div>
                    <div class="text_main" id="profile-info__bio"><?=$profile["Bio"]?></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>