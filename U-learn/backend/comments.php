<?php
require "db.php";
$video = isset($_GET['video']) ? $_GET['video'] : "";

// When form submitted, insert values into the database.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // إدخال التعليقات أو الدرود إلى قاعدة البيانات

    $create_date = date("Y-m-d H:i:s");
    $userID = $_SESSION['userid'];

    if (!empty($_POST['comment'])) {

        $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
        $videoID = $_POST['videoID'];

        $query = "INSERT INTO  `comments`(`Comment-reply`, `Comment-video`, `Comment-content`, `Comment-date`, `Comment-user`)
                 VALUES ( 0 ,'$videoID','$comment','$create_date', '$userID')";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        header("Location: ../student/view.php?do=view&video=" . $video);
    }
    if (!empty($_POST['reply'])) {

        $reply = filter_var($_POST['reply'], FILTER_SANITIZE_STRING);
        $commentID = $_POST['reply_of'];
        $videoID = $_POST['videoID'];

        $query2 = "INSERT INTO  `comments`(`Comment-reply`, `Comment-video`, `Comment-content`, `Comment-date`, `Comment-user`)
              VALUES ( '$commentID' ,'$videoID','$reply','$create_date', '$userID')";
        $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
        header("Location: ../student/view.php?do=view&video=" . $video);

    }

}

function deleteComment($commentID, $video)
{
    require('db.php');
    $query1 = "DELETE FROM `comments` WHERE `Comment-ID` = " . $commentID;
    $result2 = mysqli_query($con, $query1) or die(mysqli_error($con));
    header("Location: ../student/view.php?do=view&video=" . $video);


}

?>



