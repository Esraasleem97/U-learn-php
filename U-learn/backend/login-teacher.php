<?php
require('db.php');
session_start();

// When form submitted, check and create user session.
if (isset($_POST['email'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $create_date = date("Y-m-d");

    // Check user is exist in the database
    $query    = "SELECT * FROM `teacher` WHERE `teacher-email` =  '$email' AND `teacher-password`= '$password' AND `teacher-Approve`= '1' ";

    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rowcount =   mysqli_num_rows($result);

    $teachername = "";
   while ( $row = mysqli_fetch_assoc($result)) {
       $teachername = $row['teacher-name'];
   }
    $_SESSION['teachername'] = $teachername;

    $_SESSION['Errormessage']= "";
    if ($rowcount == 1) {
      //  $_SESSION['teacher-email'] = $email;
        // Redirect to user dashboard page
        echo "<div class=''>
                  <h3>correct Username/password.  </h3><br/>
                  </div>";
        $sql = "UPDATE `teacher` SET `teacher-LastSeen`= '$create_date' ";

//        if (mysqli_query($con, $sql)) {
//            echo "Record updated successfully";
//        } else {
//            echo "Error updating record: " . mysqli_error($conn);
//        }
        header("Location: ../teacher/Stage.php");

    } else {

        echo
        $_SESSION['Errormessage'] = "Incorrect Username/password or ". "<br>" ."Your request has not been approved yet";

      /*  "<div class=''>
                  <h3>Incorrect Username/password or Your request has not been approved yet.</h3><br/>
                  </div>";*/
    }
} else {}
    ?>

