<?php
require('db.php');
session_start();

// When form submitted, check and create user session.
if (isset($_POST['email'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Check user is exist in the database
    $query    = "SELECT * FROM `admin` WHERE `admin-email` =  '$email' AND `admin-password`= '$password'  ";

    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rowcount =   mysqli_num_rows($result);

    $adminname = "";
   while ( $row = mysqli_fetch_assoc($result)) {
       $adminname = $row['admin-name'];
   }
    $_SESSION['adminname'] = $adminname;

    $_SESSION['Errormessage']= "";
    if ($rowcount == 1) {
      //  $_SESSION['teacher-email'] = $email;
        // Redirect to user dashboard page
        echo "<div class=''>
                  <h3>correct Username/password.  </h3><br/>
                  </div>";

//        }
        header("Location: ../dashboard.php");

    } else {

        echo
        $_SESSION['Errormessage'] = "Incorrect Username/password or ". "<br>" ."Your request has not been approved yet";

      /*  "<div class=''>
                  <h3>Incorrect Username/password or Your request has not been approved yet.</h3><br/>
                  </div>";*/
    }
} else {}
    ?>

