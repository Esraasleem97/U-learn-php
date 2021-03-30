<?php
session_start();
if (isset($_SESSION['userid'])) {
    require "../../Includes/header.php";
    require "../../Includes/navbar/student.php";
    require "../../backend/notifications.php";
    getcomments();
    $commentID = "";
// احضار التعلقيات الخاصة بالمستخدم
    for ($i = 0; $i < count($_SESSION['commentID']); $i++) {
        if (($i+1) == count($_SESSION['commentID'])) {
            $commentID = $commentID . $_SESSION['commentID'][$i];
        } else {
            $commentID = $commentID . $_SESSION['commentID'][$i] . ",";
        }
    }
// احضار الردود على التعليقات الخاصه بالمستخدم
    $condtion = "AND `Comment-reply` IN (".$commentID.")";
    getnotifications($condtion)
    ?>
    <div class="bg-gray-100 w-full">
        <form action="">
            <div class="container mx-auto my-8">

                <?php
                if ($_SESSION['rowcount'] > 0) {
                    ?>
                    <div class="w-full lg:w-3/5">
                        <div>
                            <h1 class="text-3xl font-semibold my-8"><i class="far fa-bell text-main-color"></i>
                                الإشعارات
                            </h1>
                        </div>

                        <div>
                            <?php
                            for ($i = 0; $i < $_SESSION['rowcount']; $i++) {

                                    $notif = " رد " . $_SESSION['comment_user'][$i] . " على تعليقك على فيديو " . $_SESSION['video_name'][$i] . " لمادة " . $_SESSION['course_name'][$i] ;

                                $video = $_SESSION['videoID'][$i];
                                $comm_Date = $_SESSION['comment_date'][$i];
                                // اذا كان التعليق بعد اخر ظهور سوف يكون باللون الازرق
                                if (strtotime($comm_Date) > strtotime($_SESSION['LastSeen'])) { ?>

                                    <a href="../student/view.php?do=view&video=<?php echo $video ?>" class=" my-8">
                                        <div class="shadow-lg bg-white py-4 px-4 my-6 rounded-lg  bg bg-r-8 bg-blue-200">
                                            <p><i class="far fa-bell text-sub-color mx-2"></i><?php echo $notif; ?>  </p>
                                            <p class="text-gray-500 text-xs mt-2 mx-8"> <?php echo "في :" . $_SESSION['comment_date'][$i] ?></p>

                                        </div>
                                    </a>
                                <?php    } else { ?>

                                    <a href="../student/view.php?do=view&video=<?php echo $video ?>" class=" my-8">
                                        <div class="shadow-lg bg-white py-4 px-4 my-6 rounded-lg  bg bg-r-8 ">
                                            <p><i class="far fa-bell text-sub-color mx-2"></i><?php echo $notif; ?>  </p>
                                            <p class="text-gray-500 text-xs mt-2 mx-8"> <?php echo "في :" . $_SESSION['comment_date'][$i] ?></p>

                                        </div>
                                    </a>
                                <?php     }   ?>

                            <?php } ?>


                        </div>


                    </div>
                    <?php
                } elseif ($_SESSION['rowcount'] == 0) {
                    ?>
                    <div class=" text-center w-4/6 mx-auto ">
                        <img src="../../layouts/img/ideas.svg" alt="" class="h-96 mx-auto my-8">
                        <p class=" text-gray-600">لا يوجد لديك إشعارات حاليا</p>
                    </div>
                <?php } ?>

            </div>
        </form>
    </div>
    <?php
    require "../../Includes/footer.php";

} else {

    header("Location:../../frontend/auth/login-form.php");
    exit();
}
?>