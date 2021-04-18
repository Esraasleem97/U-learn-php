<?php

require('db.php');
$video = isset($_GET['video']) ? $_GET['video'] : "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // تعديل الفيديو

    $title = $_POST['title'];
    $details = $_POST['details'];
    $course = $_POST['course'];
    $create_date = date("Y-m-d");
    $mediatoDB = "";
    $mediatoDB2 = "";
    $create_date = date("Y-m-d");


    if (!empty($_FILES['media']['name'])) {

        $media = $_FILES['media']['name'];
        $mediaTmp = $_FILES['media']['tmp_name'];
        $extension = pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION);
        $mediatoDB = rand(0, 100) . $_FILES['media']['name'];
        move_uploaded_file($mediaTmp, "../../videos/" . $mediatoDB);
    }

    if (!empty($_FILES['media2']['name'])) {

        $media2 = $_FILES['media2']['name'];
        $mediaTmp2 = $_FILES['media2']['tmp_name'];
        $extension2 = pathinfo($_FILES['media2']['name'], PATHINFO_EXTENSION);
        $mediatoDB2 = rand(0, 100) . $_FILES['media2']['name'];
        move_uploaded_file($mediaTmp2, "../../videos/" . $mediatoDB2);
    }

    if($mediatoDB2 != "" && $mediatoDB != ""){

            $query1 = "UPDATE `video` SET `video-name`= '$title' ,`video-summary`= '$details' ,
                        `course-number` = '$course' , `video-content` = '$mediatoDB2' , `lesson-content` = '$mediatoDB'
                         WHERE `video-num` = '$video' ";

      
    } 
    
    elseif($mediatoDB2 != "" && $mediatoDB == ""){

            $query1 = "UPDATE `video` SET `video-name`= '$title' ,`video-summary`= '$details' ,
                        `course-number` = '$course' , `video-content` = '$mediatoDB2' 
                         WHERE `video-num` = '$video' ";

      
    } 
    elseif($mediatoDB2 == "" && $mediatoDB != ""){

        $query1 = "UPDATE `video` SET `video-name`= '$title' ,`video-summary`= '$details' ,
                    `course-number` = '$course' ,`lesson-content` = '$mediatoDB'
                     WHERE `video-num` = '$video' ";

  
} 
    else {


        $query1 = "UPDATE `video` SET `video-name`= '$title' ,`video-summary`= '$details' , `course-number` = '$course' WHERE `video-num` = '$video'";
        echo "heloooooooooo";
    }
    $result = mysqli_query($con, $query1) or die(mysqli_error($con));
    header("Location: ../teacher/index.php");

}
