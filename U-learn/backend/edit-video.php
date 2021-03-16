<?php

require('db.php');
$video = isset($_GET['video']) ? $_GET['video'] : "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// إحضار المعلومات من الفورم
    $title = $_POST['title'];
    $details = $_POST['details'];
    $create_date = date("Y-m-d");


    $query1 = "UPDATE `video` SET `video-name`= '$title' ,`video-summary`= '$details' WHERE `video-num` = '$video'" ;
    $result = mysqli_query($con, $query1) or die(mysqli_error($con));
    header("Location: ../frontend/teacher/index.php");

}
