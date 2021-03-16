<?php
require('db.php');

$video = isset($_GET['video']) ? $_GET['video'] : "";
$do = isset($_GET['do']) ? $_GET['do'] : "";;

if($do == 'view'){

// student request
$query = "SELECT * FROM `video` WHERE `Validity` = 1  AND `video-num` =". $video;
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$rowcount = mysqli_num_rows($result);
$_SESSION['rowcount'] = $rowcount;



while ($row = mysqli_fetch_assoc($result)) {

    $_SESSION['video-content'] = $row['video-content'];
    $_SESSION['video-title'] = $row['video-name'];
    $_SESSION['video-details'] = $row['video-summary'];
}

}
?>

