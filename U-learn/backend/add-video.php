<?php
require "../../backend/db.php";


// When form submitted, insert values into the database.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $allowedExts = array("mp3", "mp4", "wma" , "webm" );

    $title = $_POST['title'];
    $details = $_POST['details'];
    //  $stage = $_POST['stage'];
    $course = $_POST['course'];
    $media = $_FILES['media']['name'];
    $mediaTmp = $_FILES['media']['tmp_name'];
    $create_date = date("Y-m-d");

    $extension = pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION);
    if (in_array($extension, $allowedExts)) {
        $mediatoDB = rand(0, 100) . $_FILES['media']['name'];
        move_uploaded_file($mediaTmp, "../../videos/" . $mediatoDB);
        $query = "INSERT INTO `video`(`video-name`, `course-number`, `video-summary`, `video-content`, `video-date`, `Validity`)
                 VALUES ('$title','$course','$details','$mediatoDB','$create_date',1)";
        $result = mysqli_query($con, $query);
    } else {

        $_SESSION['Error-message'] = "invalid file";
        echo $_SESSION['Error-message'];
    }

}
?>