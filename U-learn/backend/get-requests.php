<?php
require('db.php');


// student request
$query = "SELECT * FROM `users` WHERE `user-Approve`= 0  AND `GroupID` = 1";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$rowcount = mysqli_num_rows($result);
$_SESSION['student'] = $rowcount;
$_SESSION['student'] = array();
while ($row = mysqli_fetch_array($result)) {
    array_push($_SESSION['student'], $row['email']);

}


// teacher request
$query2 = "SELECT * FROM `users` WHERE `user-Approve`= 0  AND `GroupID` = 2";
$result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
$rowcount2 = mysqli_num_rows($result2);
$_SESSION['teacher'] = $rowcount2;
$_SESSION['teacher'] = array();
while ($row = mysqli_fetch_array($result2)) {
    array_push($_SESSION['teacher'], $row['email']);

}

?>

