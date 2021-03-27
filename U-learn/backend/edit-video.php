<?php

require('db.php');
$video = isset($_GET['video']) ? $_GET['video'] : "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// إحضار المعلومات من الفورم
    $title = $_POST['title'];
    $details = $_POST['details'];
    $course = $_POST['course'];
    $media = $_FILES['media']['name'];
    $create_date = date("Y-m-d");

if (isset($_FILES['media']) ){
    $allowedExts = array("mp3", "mp4", "wma" , "webm" );
    $mediaTmp = $_FILES['media']['tmp_name'];
    $extension = pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION);
    if (in_array($extension, $allowedExts)) {

        $mediatoDB = rand(0, 100) . $_FILES['media']['name'];
        move_uploaded_file($mediaTmp, "../../videos/" . $mediatoDB);
        $query1 = "UPDATE `video` SET `video-name`= '$title' ,`video-summary`= '$details' ,
                   `course-number` = '$course' , `video-content` = '$mediatoDB' WHERE `video-num` = '$video' ";
    } else {

        $_SESSION['Error-message'] = "invalid file";
        echo $_SESSION['Error-message'];
    }

}else {
    $query1 = "UPDATE `video` SET `video-name`= '$title' ,`video-summary`= '$details' , `course-number` = '$course' WHERE `video-num` = '$video'";
}
    $result = mysqli_query($con, $query1) or die(mysqli_error($con));
    header("Location: ../frontend/teacher/index.php");

}
