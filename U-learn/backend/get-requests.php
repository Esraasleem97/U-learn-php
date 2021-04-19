<?php
require('db.php');


// get student request
$query = "SELECT * FROM `users` WHERE `user-Approve`= 0  AND `GroupID` = 1";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$rowcount = mysqli_num_rows($result);
$_SESSION['student-number'] = $rowcount;
$_SESSION['student-name'] = array();
$_SESSION['student-email'] = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($_SESSION['student-name'], $row['username']);
    array_push($_SESSION['student-email'], $row['email']);

}


// get teacher request
$query2 = "SELECT * FROM `users` WHERE `user-Approve`= 0  AND `GroupID` = 2";
$result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
$rowcount2 = mysqli_num_rows($result2);
$_SESSION['teacher-number'] = $rowcount2;
$_SESSION['teacher-name'] = array();
$_SESSION['teacher-email'] = array();

while ($row = mysqli_fetch_array($result2)) {
    array_push($_SESSION['teacher-name'], $row['username']);
    array_push($_SESSION['teacher-email'], $row['email']);

}

// get video request

$query3 = "SELECT * FROM `video` INNER JOIN `course`ON `course-number` = `course-num` ";
$result3 = mysqli_query($con, $query3) or die(mysqli_error($con));
$rowcount3 = mysqli_num_rows($result3);
$_SESSION['video-number'] = $rowcount3;

$_SESSION['videoID'] = array();
$_SESSION['video-course'] = array();
$_SESSION['video-title'] = array();

while ($row = mysqli_fetch_array($result3)) {
    array_push($_SESSION['videoID'], $row['video-num']);
    array_push($_SESSION['video-course'], $row['course-name']);
    array_push($_SESSION['video-title'], $row['video-name']);
}
?>

