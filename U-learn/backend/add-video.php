<?php
require "../../backend/db.php";


// When form submitted, insert values into the database.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// الملفات التي يمكن قبولها
    // $allowedExts = array("mp3", "mp4", "wma", "webm" );

    $title = $_POST['title'];
    $details = $_POST['details'];
    $course = $_POST['course'];
    $media = $_FILES['media']['name'];
    $mediaTmp = $_FILES['media']['tmp_name'];
    $create_date = date("Y-m-d");
    $media2 = $_FILES['media2']['name'];
    $mediaTmp2 = $_FILES['media2']['tmp_name'];

    $extension = pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION);
    $extension2 = pathinfo($_FILES['media2']['name'], PATHINFO_EXTENSION);

// التأكد من أن امتداد الفيديو مسموح به
    // if (in_array($extension, $allowedExts)) {
        $mediatoDB2 = "";
        $mediatoDB = "";

        if ( !empty ($_FILES['media']['name'])){
        $mediatoDB = rand(0, 100) . $_FILES['media']['name'];
        }

  if ( !empty ($_FILES['media2']['name'])){
        $mediatoDB2 = rand(0, 100) . $_FILES['media2']['name'];
        }
        move_uploaded_file($mediaTmp, "../../videos/" . $mediatoDB);
        move_uploaded_file($mediaTmp2, "../../videos/" . $mediatoDB2);

$query = "INSERT INTO `video`(`video-name`, `course-number`, `video-summary`, `video-content`, `video-date`, `Validity` , `lesson-content`)
                 VALUES ('$title','$course','$details','$mediatoDB2','$create_date',0 , '$mediatoDB')";
        $result = mysqli_query($con, $query);
    // } else {

    //     $_SESSION['Error-message'] = "invalid file";
    //     echo $_SESSION['Error-message'];
    // }

}
?>