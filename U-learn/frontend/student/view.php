<?php
session_start();
if (isset($_SESSION['username'])) {


    require "../../Includes/header.php";
    require "../../Includes/navbar/student.php";
    require "../../backend/view-video.php";
    require "../../backend/comments.php";
    $video = isset($_GET['video']) ? $_GET['video'] : "";
//view.php?do=view&video= <?php $video
    ?>
    <div class="bg-gray-100 w-full">
        <form action="" method="post">
            <div class="container mx-auto  my-8">

                <div class="border shadow-xl rounded-md w-full bg-white px-12 pb-10">


                    <div>
                        <h1 class="text-3xl font-semibold my-8">
                            <?php
                            echo $_SESSION['video-title'];
                            ?>
                        </h1>
                    </div>
                    <div class="w-full md:w-4/5 lg:w-2/3 font-semibold my-8">
                        <p>
                            <?php
                            echo $_SESSION['video-details'];
                            ?>
                        </p>
                    </div>

                    <div class="w-full md:w-4/5 lg:w-2/3 font-semibold my-8">
                        <p>
                        <p>
                            <?php
                            $_SESSION['video-num']; ?>
                        </p>
                        </p>
                    </div>

                    <div >
                        <input type="hidden" id="videoID" name="videoID" value="
                        <?php  echo $_SESSION['video-num'];
                        ?>" placeholder=" " class="input-" required="required"/>

                    </div>


                    <div class="w-full lg:w-4/5 mx-auto">
                        <video id="player" controls class="w-full">
                            <?php
                            echo "<source src='../../videos/" . $_SESSION['video-content'] . "' type='video/mp4'/>";
                            echo "<source src='../../videos/" . $_SESSION['video-content'] . "' type='video/ogg'/>";

                            ?>

                        </video>
                    </div>

                    <div class="w-full md:w-4/5 lg:w-2/3 mx-auto  mt-24">
                         <?php
                    for ($i = 0; $i < count($_SESSION['comment']); $i++) { ?>
                        <div class="text-sm border border-r-8 border-blue-900 py-4 px-4 my-8 flex justify-between items-center rounded-md">
                            <p class=""> <?php echo $_SESSION['comment-user'][$i]  ." | " .$_SESSION['comment'][$i] ?></p>
                            <p class=""> <?php echo "في :" .$_SESSION['comment-date'][$i]  ?></p>
                            <a href="../../backend/comments.php?do=viewReplay&comment=<?php echo $_SESSION['commentID'][$i]  ?>"
                               class="text-red-600">عرض الردود</a>

                            <?php
                            if ($_SESSION['comment-userID'][$i] == $_SESSION['userid']) {
                                echo "<a href='' class='text-red-600'>حذف   </a>";

                            } ?>

                        </div>
<!---->
<!--                        <div class="text-sm border border-r-8 border-blue-900 py-4 px-4 my-8 flex justify-between items-center rounded-md mr-8">-->
<!--                            <p class="">رد المعلم</p>-->
<!--                            <a href="" class="text-red-600">حذف</a>-->
<!--                        </div>-->

                        <?php } ?>

                        <div class="input-form">

                            <textarea name="comment" id="comment" cols="20" rows="3" placeholder=" "
                                      class="input"></textarea>
                            <label for="details" class="label font-bold">إسأل الأستاذ</label>
                        </div>
                        <div class="flex justify-center items-center mt-10">
                            <input type="submit" value="إرسال" class="btn btn-main">
                        </div>
                    </div>
                </div>
            </div>
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