<?php
require('db.php');


// عند اختيار قبول يتم تعديل بيانات الداتا بيس لقبول المستخدم الجديد


function acceptuser($email , $Approve)
{
    require('db.php');

    $query1 = "UPDATE `users` SET  `user-Approve` = '$Approve'  WHERE 	`email` = '$email'";
    $result = mysqli_query($con, $query1) or die(mysqli_error($con));
    require('get-requests.php');
}

function acceptvideo($video , $Approve)
{
    require('db.php');

    $query1 = "UPDATE `video` SET  `Validity` = '$Approve'  WHERE 	`video-num` = '$video'";
    $result = mysqli_query($con, $query1) or die(mysqli_error($con));
    require('get-requests.php');
}

?>
