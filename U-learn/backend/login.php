<?php
require('db.php');

// When form submitted, check and create user session.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // اشيك اذا موجود اليوزر بالداتا بيس
    $query = "SELECT * FROM `users` WHERE `email` =  '$email' AND `password`= '$password'  ";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($result);

    // يعيد المعلومات  من الداتا بيس
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $row['username'];
        $Approve = $row['user-Approve'];
        $userid = intval($row['userid']);
        $_SESSION['userid'] = $userid;
        $_SESSION['GroupID'] = $row['GroupID'];
        $_SESSION['Stage'] = $row['Stage'];



    }
    // اذا عاد صف واحد معناه أنه اليوزر موجود وإلا سوف يخبره أن الاسم أو الباسوورد خاطء
    if ($rowcount == 1) {
        // يختبر اذا تم الموافقة عليه أم لا
        if ($Approve == 1) {



            if ($_SESSION['GroupID'] == 1) {
                header("Location: ../student/book.php");
            } elseif ($_SESSION['GroupID'] == 2) {
                header("Location: ../teacher/index.php");
            } elseif ($_SESSION['GroupID'] == 3) {
                header("Location: ../../admin/dashboard.php");
            }

        } elseif ($Approve == 0) {

            $_SESSION['Error-message'] = "لم تتم الموافقة على طلبك حتى الآن";
//            echo $_SESSION['Error-message'];
        }
    } else {

        $_SESSION['Error-message'] = "اسم المستخدم او كلمة المرور غير صحيحة";
//        echo $_SESSION['Error-message'];

    }
} else {
}
?>

