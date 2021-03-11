<?php
require('db.php');
session_start();

// When form submitted, check and create user session.
if (isset($_POST['email'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $create_date = date("Y-m-d");

    // Check user is exist in the database
    $query    = "SELECT * FROM `student` WHERE `std-email` =  '$email' AND `std-password`= '$password' AND `std-Approve`= '1' ";

    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rowcount =   mysqli_num_rows($result);

    $studentname= "";
   while ( $row = mysqli_fetch_assoc($result)) {
       $studentname = $row['std-name'];
   }
    $_SESSION['studentname'] = $studentname;

    $_SESSION['Errormessage']= "";
    if ($rowcount == 1) {
      //  $_SESSION['teacher-email'] = $email;
        // Redirect to user dashboard page
        echo "<div class=''>
                  <h3>correct Username/password.  </h3><br/>
                  </div>";
        $sql = "UPDATE `student` SET `std-LastSeen`= '$create_date' ";

//        if (mysqli_query($con, $sql)) {
//            echo "Record updated successfully";
//        } else {
//            echo "Error updating record: " . mysqli_error($conn);
//        }
        header("Location: ../student/Stage.php");

    } else {

        echo
        $_SESSION['Errormessage'] = "Incorrect Username/password or ". "<br>" ."Your request has not been approved yet";

      /*  "<div class=''>
                  <h3>Incorrect Username/password or Your request has not been approved yet.</h3><br/>
                  </div>";*/
    }
} else {}
    ?>

