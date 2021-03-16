<?php
require "../../backend/db.php";

// When form submitted, insert values into the database.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // إحضار المعلومات من الفورم
    $title = $_POST['title'];
    $details = $_POST['details'];
    //  $stage = $_POST['stage'];
    $course = $_POST['course'];
    $media = $_FILES['media']['name'];
    $mediaTmp = $_FILES['media']['tmp_name'];
    $create_date = date("Y-m-d");


    $mediatoDB = rand(0, 100) . $_FILES['media']['name'];
    move_uploaded_file($mediaTmp, "../../videos/" . $mediatoDB);


    //  echo "title $title  details $details course $course media " . $_FILES['media']['name'];


//        // اضافة  المتسخدم إلى الداتا بيس
    $query = "INSERT INTO `video`(`video-name`, `course-number`, `video-summary`, `video-content`, `video-date`, `Validity`)
                 VALUES ('$title','$course','$details','$mediatoDB','$create_date',1)";
    $result = mysqli_query($con, $query);
    if ($result) {

    }


}

?>