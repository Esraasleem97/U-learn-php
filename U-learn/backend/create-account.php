<?php
require "../../backend/db.php";
//require "../../frontend/auth/register-form.php";
// When form submitted, insert values into the database.
if (isset($_REQUEST['name'])) {
    // removes backslashes




    $username = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password_confirmation'];
    $user = $_POST['user'];
    /*
    $username = stripslashes($_REQUEST['name']);
    $email    = stripslashes($_REQUEST['email']);
    $password = stripslashes($_REQUEST['password']);
    $password2 = stripslashes($_REQUEST['password_confirmation']);
    $user = stripslashes($_REQUEST['user']);

    */
    $create_datetime = date("Y-m-d");
    $result    = null;


    if($password == $password2){

        if ($user == 'Student'){
            $query    = "INSERT INTO `student`(`std-email`, `std-password`, `std-name`, `std-Approve`, `std-LastSeen`)
                     VALUES ('$email', '$password','$username', 0 ,  '$create_datetime')";
            $result   = mysqli_query($con, $query);

        }

        elseif ($user == 'teather'){
            $query    = "INSERT INTO `teacher`(`teacher-email`, `teacher-password`, `teacher-name`, `teacher-Approve`, `teacher-LastSeen`)  
                     VALUES ('$email', '$password','$username', 0 ,  '$create_datetime')";
            $result   = mysqli_query($con, $query);
        }

        else {}
        if ($result) {
            echo "<div class=''>
                  <h3>You are registered successfully $user $username.</h3><br/> 
                  <h3>Please wait accept your request,</h3><br/> 
                  <h3>Then try to log in.</h3><br/> 
                  </div>";
        } else {
            echo "<div class=''>

                  <h3>This email has been used before. $user </h3><br/>
                  </div>";
        }

    } else {

        echo "<div class=''>
                  <h3>Password did not match.</h3><br/>
                  </div>";

    }

} else {


    ?>


    <?php
}
?>