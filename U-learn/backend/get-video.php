<?php

function getVideo ($column , $condition)
{

    require('db.php');
// إحضار الفيديوهات من قاعدة البيانات حسب الشروط

    $query = "SELECT * FROM `video` INNER JOIN `course`ON `course-number` = `course-num` WHERE `Validity` = 1 AND $column  $condition";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($result);
    $_SESSION['rowcount'] = $rowcount;
    $_SESSION['videoID'] = array();
    $_SESSION['video-course'] = array();
    $_SESSION['video-title'] = array();
    $_SESSION['video-details'] = array();
    $_SESSION['video-date'] = array();
    while ($row = mysqli_fetch_array($result)) {
        array_push($_SESSION['videoID'], $row['video-num']);
        array_push($_SESSION['video-course'], $row['course-name']);
        array_push($_SESSION['video-title'], $row['video-name']);
        array_push($_SESSION['video-date'], $row['video-date']);
        array_push($_SESSION['video-details'], $row['video-summary']);

    }

}
?>

