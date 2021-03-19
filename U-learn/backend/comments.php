<?php
require "../../backend/db.php";




// When form submitted, insert values into the database.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // إحضار المعلومات من الفورم

    $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
    $videoID = $_POST['videoID'];
    $create_date = date("Y-m-d h:m:s");
    $userID = $_SESSION['userid'];

    if (!empty($comment)) {
        $query = "INSERT INTO  `comments`(`Comment-reply`, `Comment-video`, `Comment-content`, `Comment-date`, `Comment-user`)
                 VALUES ( 0 ,'$videoID','$comment','$create_date', '$userID')";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));

    } else {
    }
}
?>



