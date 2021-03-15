<?php
require('db.php');

//  إحضار القيم عندما يختار المسؤول قبول ارفض المستخدم
$email = isset($_GET['email']) ? $_GET['email'] : "";
$do = isset($_GET['do']) ? $_GET['do'] : "";

// عند اختيار قبول يتم تعديل بيانات الداتا بيس لقبول المستخدم الجديد
if ($do == 'accept') {

    $query1 = "UPDATE `users` SET  `user-Approve` = 1  WHERE 	`email` = '$email'";
    $result = mysqli_query($con, $query1) or die(mysqli_error($con));
    header("Location: ../admin/dashboard.php");

}
// عند اختيار رفض يتم تعديل بيانات الداتا بيس لرفض المستخدم وعدم إضهار اسمه مجدداً

elseif ($do == 'rejict') {
    $query2 = "UPDATE `users` SET  `user-Approve` = 2  WHERE 	`email` = '$email'";
    $result = mysqli_query($con, $query2) or die(mysqli_error($con));
    header("Location: ../admin/dashboard.php");
}

?>
