<?php
require('db.php');


// When form submitted, check and create user session.

    $_SESSION['studentnum'] ="";

    // student num
    $query    = "SELECT * FROM `users` WHERE `user-Approve`= 1  AND `GroupID` = 1";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rowcount =   mysqli_num_rows($result);
    $_SESSION['studentnum'] = $rowcount;


// teacher num
$query2    = "SELECT * FROM `users` WHERE `user-Approve`= 1  AND `GroupID` = 2";
$result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
$rowcount2 =   mysqli_num_rows($result2);
$_SESSION['teachernum'] = $rowcount2;

// video num
$query    = "SELECT * FROM `video` WHERE `Validity`= 1 ";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$rowcount =   mysqli_num_rows($result);
$_SESSION['videonum'] = $rowcount;

?>

