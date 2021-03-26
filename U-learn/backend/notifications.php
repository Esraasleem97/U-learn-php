<?php
function getcomments(){

    require('db.php');


    $query = "SELECT `comments`.* FROM  `comments` WHERE `Comment-reply` = 0 AND `Comment-user` = " . $_SESSION['userid'];
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $_SESSION['commentID'] = array();
    while ($row = mysqli_fetch_array($result)) {
        array_push($_SESSION['commentID'], $row['Comment-ID']);}
}


function getnotifications($condtion)
{


    require('db.php');

    $query = "SELECT `course`.`course-name`, `video`.`video-name` , `comments`.* , `users`.`username`
FROM `video` INNER JOIN `course`ON `course-number` = `course-num`
INNER JOIN `comments` ON `comments`.`Comment-video` = `video`.`video-num`
INNER JOIN `users` ON `users`.`userid` = `comments`.`Comment-user`
WHERE `video`.`Validity` = 1 " . $condtion;
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($result);
    $_SESSION['rowcount'] = $rowcount;
//echo $rowcount;
    $_SESSION['videoID'] = array();
    $_SESSION['video_name'] = array();
    $_SESSION['course_name'] = array();
    $_SESSION['comment_user'] = array();
    $_SESSION['comment_date'] = array();
    $_SESSION['comment_reply'] = array();
    while ($row = mysqli_fetch_array($result)) {
        array_push($_SESSION['comment_reply'], $row['Comment-reply']);
        array_push($_SESSION['comment_user'], $row['username']);
        array_push($_SESSION['videoID'], $row['Comment-video']);
        array_push($_SESSION['video_name'], $row['video-name']);
        array_push($_SESSION['course_name'], $row['course-name']);
        array_push($_SESSION['comment_date'], $row['Comment-date']);

    }

}
