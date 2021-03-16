<?php
require "../../backend/db.php";
//require "../../frontend/auth/register-form.php";
// When form submitted, insert values into the database.
if (isset($_REQUEST['name'])) {

    // إحضار المعلومات من الفورم
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password_confirmation'];
    $user = $_POST['user'];
    $create_date = date("Y-m-d H:i:s");
    if ($user == 'Student') {
        $userGroup = 1;
    } elseif ($user == 'teather') {
        $userGroup = 2;
    }

// مقارنه الباسوورد المدخل للتأكد انه متشابه
    if ($password == $password2) {

        // اضافة  المتسخدم إلى الداتا بيس
        $query = "INSERT INTO `users`(`email`, `password`, `username`, `user-Approve`, `LastSeen`, `GroupID` )
                     VALUES ('$email', '$password','$username', 0 ,  '$create_date', '$userGroup')";
        $result = mysqli_query($con, $query);
        if ($result) {

            $_SESSION['Error-message'] = "<h3>You are registered successfully  $username.</h3><br/> 
                  <h3>Please wait accept your request,</h3><br/> 
                  <h3>Then try to log in.</h3><br/> 
                  ";
            echo    $_SESSION['Error-message'];

            //   header("Location: ../auth/login-form.php");

        } else {
            $_SESSION['Error-message'] =  " <h3>This email has been used before. </h3><br/>";
            echo    $_SESSION['Error-message'];

        }

    } else {

        echo "<div class=''>
                  <h3>Password did not match.</h3><br/>
                  </div>";

    }

}

?>