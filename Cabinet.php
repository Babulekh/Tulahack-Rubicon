<?php include './components/header.php'; ?>

<?php
function print_lesson($lesson) {
    echo "  
        <div class='lesson-block'>
            <div class='lesson-time'>
                <div class='lesson-time__start text_main'>", $lesson["Start"], "</div>
                <div class='lesson-time__end text_main'>", $lesson["End"], "</div>
            </div>
            <div class='lesson-name text_main'>", $lesson["Subject"], "</div>
            <div class='lesson-class text_main'>Аудитория №", $lesson["RoomNumber"], "</div>
            <div class='lesson-teacher text_main'>", $lesson["TeacherID"], "</div>
        </div>
        ";
}

    $timetable = $db->prepare("SELECT * FROM timetable WHERE GroupID = :GroupID");
    $timetable->execute(array(":GroupID"=>$user["GroupID"]));
    $timetable = $timetable->fetchAll(PDO::FETCH_DEFAULT);
?>

<div class="section_main">
    <div class="wrapper_fixed container">
        <form method="post" action="/components/modifyProfile.php" class="profile__edit-form">
            <label for="FirstName" class="text_main">Имя: </label><input type="text" name="FirstName">
            <label for="LastName" class="text_main">Фамилия: </label><input type="text" name="LastName">
            <label for="ImgPath" class="text_main">Ссылка на аватар: </label><input type="text" name="ImgPath">
            <label for="Bio" class="text_main">О себе: </label><textarea name="Bio" cols="40" rows="3"></textarea>
            <input type="submit" value="Редактировать" class="text_main">
        </form>
    </div>
</div>
<div class="section_main">
    <div class="wrapper_fixed container">
        <div class="block_info">
            <div id="profile-photo">
                <img id="profile-photo__img" src=<?=$user["ImgPath"]?>>
            </div>
            <div id="profile-info">
                <div class="switched switched_active" id="profile-data">
                    <div class="text_main" id="profile-info__name"><?=$user["Username"]?> <?=$user["FirstName"]?> <?=$user["LastName"]?></div>
                    <div class="text_main" id="profile-info__status"><?=$user["Status"]?></div>
                    <div class="text_main" id="profile-info__bio"><?=$user["Bio"]?></div>
                    <div class="text_main" id="profile-info__money">Ваши монеты: <?=$user["Money"]?></div>
                </div>
            </div>
        </div>
        <div class="block_main">
            <div id="profile_main">
                <div class="timetable-block">
                    <?php foreach($timetable as $lesson){ ?>
                        <?php print_lesson($lesson); ?>
                    <?php } ?>
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

