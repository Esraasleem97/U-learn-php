<?php
require('db.php');

// حذف الفيديو عندما يختار الاستاذ حذف
$video = isset($_GET['video']) ? $_GET['video'] : "";;
$do = isset($_GET['do']) ? $_GET['do'] : "";;

if($do == 'delete'){
    $query1 = "DELETE FROM `video` WHERE `video-num` = ". $video;
    $result = mysqli_query($con, $query1) or die(mysqli_error($con));
    // header("Location: ../frontend/teacher/index.php");

    ?>

<script type="text/javascript">
    alert('تم حذف الدرس بنجاح!');
    window.location.replace('../frontend/teacher/index.php');

</script>
    <?php
}
?>