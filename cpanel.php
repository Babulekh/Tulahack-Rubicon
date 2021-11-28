<?php include './components/header.php'; ?>

<?php
    if ($user["Username"] != "admin") {
        header("Location:/Cabinet.php");
    }

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

    function print_user($user) {
        echo "  
            <div class='user-block'>
                <div class='user-id text_main'>", $user["ID"], "</div>
                <div class='user-name text_main'>", $user["Username"], "</div>
                <div class='user-fname text_main'>", $user["FirstName"], "</div>
                <div class='user-lname text_main'>", $user["LastName"], "</div>
                <div class='user-group text_main'>", $user["GroupID"], "</div>
                <div class='user-money text_main'>", $user["Money"], "</div>
            </div>
            ";
}

    $timetable = $db->prepare("SELECT * FROM timetable");
    $timetable->execute();
    $timetable = $timetable->fetchAll(PDO::FETCH_DEFAULT);

    $users = $db->prepare("SELECT * FROM users");
    $users->execute();
    $users = $users->fetchAll(PDO::FETCH_DEFAULT);
?>

<div class="timetable-block">
    <?php foreach($timetable as $lesson){ ?>
        <?php print_lesson($lesson); ?>
    <?php } ?>
</div>

<div class="users-block">
    <?php foreach($users as $user){ ?>
        <?php print_user($user); ?>
    <?php } ?>
</div>

<form method="post" action="/components/modifyProfile.php" class="profile__edit-form">
    <label for="ID" class="text_main">ID редактируемой учётной записи: </label><input type="text" name="ID">
    <label for="Money" class="text_main">Количество монет: </label><input type="text" name="Money">
    <label for="GroupID" class="text_main">Группа: </label><input type="text" name="GroupID">
    <input type="submit" value="Редактировать" class="text_main">
</form>

<form method="post" action="/components/createTimetable.php" class="profile__edit-form">
    <label for="GroupID" class="text_main">ID Группы: </label><input type="text" name="GroupID">
    <label for="Start" class="text_main">Начало урока: </label><input type="text" name="Start">
    <label for="End" class="text_main">Конец урока: </label><input type="text" name="End">
    <label for="Subject" class="text_main">Предмет: </label><input type="text" name="Subject">
    <label for="RoomNumber" class="text_main">Номер аудитории: </label><input type="text" name="RoomNumber">
    <label for="TeacherID" class="text_main">ID учителя: </label><input type="text" name="TeacherID">
    <input type="submit" value="Добавить урок в расписание" class="text_main">
</form>

</body>
</html>