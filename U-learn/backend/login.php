<?php
require('db.php');

// When form submitted, check and create user session.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $create_date = date("Y-m-d H:i:s");

    // اشيك اذا موجود اليوزر بالداتا بيس
    $query = "SELECT * FROM `users` WHERE `email` =  '$email' AND `password`= '$password'  ";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($result);

    // يعيد المعلومات اليوزر من الداتا بيس

    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $row['username'];
        $Approve = $row['user-Approve'];
        $userid = intval($row['userid']);
        $_SESSION['userid'] = $userid;
        $GroupID = $row['GroupID'];

    }
    // اذا عاد صف واحد معناه أنه اليوزر موجود وإلا سوف يخبره أن الاسم أو الباسوورد خاطء
    if ($rowcount == 1) {
        // يختبر اذا تم الموافقة عليه أم لا
        if ($Approve == 1) {

            $query2 = "UPDATE `users` SET `LastSeen`= '$create_date'  WHERE `userid` = " . $_SESSION['userid'];
            $result = mysqli_query($con, $query2) or die(mysqli_error($con));


            if ($GroupID == 1) {
                header("Location: ../student/Stage.php");
            } elseif ($GroupID == 2) {
                header("Location: ../teacher/Stage.php");
            } elseif ($GroupID == 3) {
                header("Location: ../../admin/dashboard.php");
            }

        } elseif ($Approve == 0) {

            $_SESSION['Error-message'] = "Your request has not been approved yet";
echo  $_SESSION['Error-message'];
        }
    } else {

            $_SESSION['Error-message'] = "Incorrect Username/password";
        echo  $_SESSION['Error-message'];

    }
} else {
}
?>

