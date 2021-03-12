<?php
require('db.php');



if ($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['acceptstudent'])) {
    acceptStudent();
    echo  $_SESSION['userEmail'];

}

function acceptStudent()
{
    //  $sql = "UPDATE `student` SET  `std-Approve` = 1  WHERE 	`std-email` = '$num'";
    echo "update student 1";

}

function acceptteacher($num)
{
    $sql = "UPDATE `student` SET  `teacher-Approve`= 1 WHERE 	`teacher-email` = '$num'";

    echo "update teather 1";
}

function rejectStudent($num)
{
    $sql = "UPDATE `student` SET  `std-Approve` = 2 WHERE 	`std-email` = '$num'";
    echo "update student 2";

}

function rejectteacher($num)
{
    $sql = "UPDATE `student` SET  `teacher-Approve`= 2 	`teacher-email` = '$num'";
    echo "update teather 2";

}

?>

<script type="text/javascript">
    function myFunction () {
        // var selectValuse = $(this).closest("tr").find("[name='text']").val();
        alert("selectValuse");
</script>
