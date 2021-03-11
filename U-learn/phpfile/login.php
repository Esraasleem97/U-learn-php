<?php
require('db.php');
session_start();

// When form submitted, check and create user session.
if (isset($_POST['email'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $create_date = date("Y-m-d");

    // Check user is exist in the database
    $query    = "SELECT * FROM `teacher` WHERE `teacher-email` =  '$email' AND `teacher-password`= '$password'";

    $result = mysqli_query($con, $query) ;
    $rowcount =   mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);
    $teachername = $row['teacher-name'];


    $_SESSION['teachername'] = $teachername;


    if ($rowcount == 1) {
      //  $_SESSION['teacher-email'] = $email;
        // Redirect to user dashboard page
        echo "<div class=''>
                  <h3>correct Username/password.  </h3><br/>

                  </div>";
       header("Location: ../student/Stage.php");

    } else {
        echo "<div class=''>
                  <h3>Incorrect Username/password.</h3><br/>
                  </div>";
    }
} else {}
    ?>

