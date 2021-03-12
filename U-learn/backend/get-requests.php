<?php
require('db.php');


// student request
$query = "SELECT * FROM `student` WHERE `std-Approve`= '0' ";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$rowcount = mysqli_num_rows($result);
$_SESSION['student'] = $rowcount;

$_SESSION['student'] = array();

$studentname = "";
while ($row = mysqli_fetch_array($result)) {
    $studentname = $row['std-email'];
    array_push($_SESSION['student'], $row['std-email']);

}


// student request
$query2 = "SELECT * FROM `teacher` WHERE `teacher-Approve`= 0 ";
$result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
$rowcount2 = mysqli_num_rows($result2);
$_SESSION['teacher'] = $rowcount2;

$_SESSION['teacher'] = array();

while ($row = mysqli_fetch_array($result2)) {
    array_push($_SESSION['teacher'], $row['teacher-email']);

}

?>

