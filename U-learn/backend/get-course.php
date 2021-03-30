<?php


function getCourse($column, $condition)
{
    require('db.php');

    // إحضار المواد من قاعدة البيانات بنائ على الشروط المدخلة

    $query = "SELECT `course-name` , `course-num` FROM `course` WHERE " . $column . " " . $condition;
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $_SESSION['courseName'] = array();
    $_SESSION['courseID'] = array();

    while ($row = mysqli_fetch_array($result)) {
        array_push($_SESSION['courseName'], $row['course-name']);
        array_push($_SESSION['courseID'], $row['course-num']);

    }
}

?>

