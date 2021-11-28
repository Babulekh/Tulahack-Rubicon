<?php
include "db.php";

$lesson = $db->prepare("insert into timetable (GroupID, Start, End, Subject, RoomNumber, TeacherID) values (:groupid, :start, :end, :subject, :roomnumber, :teacher);");
$lesson->execute(array(":groupid"=>$_POST["GroupID"], ":start"=>$_POST["Start"], ":end"=>$_POST["End"], ":subject"=>$_POST["Subject"], ":roomnumber"=>$_POST["RoomNumber"], ":teacher"=>$_POST["TeacherID"]));

header("Location:/cpanel.php");
?>