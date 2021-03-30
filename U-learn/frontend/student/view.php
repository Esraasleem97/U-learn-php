<?php
session_start();
if (isset($_SESSION['userid'])) {


    require "../../Includes/header.php";
    if ($_SESSION['GroupID'] == 1) {
        require "../../Includes/navbar/student.php";
    } elseif ($_SESSION['GroupID'] == 2) {
        require "../../Includes/navbar/teacher.php";
    }
    require "../../backend/view-video.php";
    require "../../backend/comments.php";

    $video = isset($_GET['video']) ? $_GET['video'] : "";
    $do = isset($_GET['do']) ? $_GET['do'] : "";
    $commentID = isset($_GET['commentID']) ? $_GET['commentID'] : "";

    if ($do == "delete") {
// استدعاء فنكشن حذف الكومينت
        deleteComment($commentID, $video);

    }
    ?>


    <script>

        function showReplyForm(self) {
            const commentId = self.getAttribute("data-id");
            if (document.getElementById("form-" + commentId).style.display === "none") {
                document.getElementById("form-" + commentId).style.display = "block";
            } else {
                document.getElementById("form-" + commentId).style.display = "none";
            }
        }

    </script>

    <div class="bg-gray-100 w-full">
        <form action='' method="post">
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

                    <div>
                        <input type="hidden" id="videoID" name="videoID" value="
                        <?php echo $_SESSION['video-num']; ?>" placeholder=" " class="input-" "/>

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

                        // عرض التعليقات

                        for ($i = 0; $i < count($_SESSION['comment']); $i++) {
                            if ($_SESSION['comment-reply'] [$i] == 0) {
                                ?>
                                <div class="text-sm border border-r-8 border-blue-900 py-4 px-4 my-8 flex justify-between items-center rounded-md">
                                    <div>
                                        <p class=""> <?php echo $_SESSION['comment-user'][$i] . " | " . $_SESSION['comment'][$i] ?></p>
                                        <p class="text-gray-500 text-xs mt-2"> <?php echo "في :" . $_SESSION['comment-date'][$i] ?></p>
                                    </div>
                                    <input type="hidden" id="commentID" name="commentID" value="
                                       <?php echo $_SESSION['commentID'][$i]; ?>" placeholder=" "/>
                                    <div class="flex">
                                        <?php
                                        if ($_SESSION['comment-userID'][$i] == $_SESSION['userid']) {
                                            echo "<a href='?do=delete&commentID=" . $_SESSION['commentID'][$i] . "&video=" . $video . "' class='text-red-600'>حذف   </a>";
                                            echo "<span class='mx-1'>|</span>";

                                        } ?>

                                        <div class="text-blue-800 cursor-pointer"
                                             onclick="showReplyForm(this);"
                                             data-id="<?php echo $_SESSION['commentID'][$i]; ?>"
                                        >
                                            الرد
                                        </div>
                                    </div>

                                </div>
                                <form action="" method="post" id="form-<?php echo $_SESSION['commentID'][$i]; ?>"
                                      style="display: none;">
                                    <?php
                                    // عرض الردود على التعليقات

                                    for ($y = 0; $y < count($_SESSION['comment']); $y++) {
                                        if ($_SESSION['comment-reply'] [$y] == $_SESSION['commentID'][$i]) {

                                            ?>
                                            <div class="text-sm border border-r-8 border-blue-900 py-4 px-4 my-8 flex justify-between items-center rounded-md mr-8">
                                                <div>
                                                    <p class=""> <?php echo $_SESSION['comment-user'][$y] . " | " . $_SESSION['comment'][$y] ?></p>
                                                    <p class="text-gray-500 text-xs mt-2"> <?php echo "في :" . $_SESSION['comment-date'][$y] ?></p>
                                                </div>
                                                <input type="hidden" id="commentID" name="commentID" value="
                                       <?php echo $_SESSION['commentID'][$y]; ?>" placeholder=""/>

                                                <?php
                                                if ($_SESSION['comment-userID'][$y] == $_SESSION['userid']) {
                                                    echo "<a href='?do=delete&commentID=" . $_SESSION['commentID'][$y] . "&video=" . $video . "' class='text-red-600'>حذف   </a>";
                                                } ?>
                                            </div>

                                        <?php }
                                    } ?>

                                    <div class="input-form  mr-8">

                                        <input type="hidden" id="videoID" name="videoID"
                                               value=" <?php echo $_SESSION['video-num']; ?>" placeholder=" "
                                               class="input-" "/>

                                        <input type="hidden" name="reply_of"
                                               value="<?php echo $_SESSION['commentID'][$i]; ?>"
                                               required>
                                        <p>
                                    <textarea name="reply" id="reply" cols="50" rows="2" placeholder=" "
                                              class="input"></textarea>
                                            <label for="details" class="label font-bold">إضافة رد</label>
                                        </p>


                                    </div>
                                    <div class="flex justify-end">
                                        <input class="btn btn-info" type="submit" value="رد" name="do_reply">
                                    </div>

                                </form>


                            <?php }
                        } ?>

                        <div class="input-form">
                            <textarea name="comment" id="comment" cols="20" rows="3" placeholder=" "
                                      class="input"></textarea>
                            <label for="details" class="label font-bold">إضافة تعليق</label>
                        </div>
                        <div class="flex justify-center items-center mt-10" name="post_comment">
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