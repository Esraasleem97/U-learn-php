<?php
require('db.php');

$video = isset($_GET['video']) ? $_GET['video'] : "";
$do = isset($_GET['do']) ? $_GET['do'] : "";



if ($do == 'view') {

    $query = "SELECT * FROM `video` WHERE  `video-num` =" . $video;
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($result);
    $_SESSION['rowcount'] = $rowcount;


    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['video-num'] = $row['video-num'];
        $_SESSION['video-content'] = $row['video-content'];
        $_SESSION['video-title'] = $row['video-name'];
        $_SESSION['video-details'] = $row['video-summary'];
        $_SESSION['video-course'] = $row['course-number'];

    }

    $query2 = "SELECT * FROM `comments` INNER JOIN `users`ON `userid` = `Comment-user` WHERE 	`Comment-reply` = 0 AND `Comment-video` = " . $video;
    $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
    $_SESSION['commentID'] = array();
    $_SESSION['comment'] = array();
    $_SESSION['comment-user'] = array();
    $_SESSION['comment-date'] = array();
    $_SESSION['comment-userID'] = array();

    while ($row2 = mysqli_fetch_array($result2)) {
        array_push($_SESSION['commentID'], $row2['Comment-ID']);
        array_push($_SESSION['comment'], $row2['Comment-content']);
        array_push($_SESSION['comment-user'], $row2['username']);
        array_push($_SESSION['comment-userID'], $row2['Comment-user']);
        array_push($_SESSION['comment-date'], $row2['Comment-date']);

    }

}
?>

