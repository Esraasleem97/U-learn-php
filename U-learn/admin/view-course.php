<?php
session_start();
if (isset($_SESSION['username'])) {
    require "../Includes/header.php";
    require "../Includes/navbar/admin.php";
    require "../backend/view-video.php";

    ?>
    <div class="bg-gray-100 w-full">
        <form action="">
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
                    <div class="w-full lg:w-4/5 mx-auto">
                        <video id="player" controls class="w-full">
                            <?php
                            echo "<source src='../../videos/" . $_SESSION['video-content'] . "' type='video/mp4'/>";
                            echo "<source src='../../videos/" . $_SESSION['video-content'] . "' type='video/ogg'/>";

                            ?>
                        </video>
                    </div>
                    <div class="w-full md:w-4/5 lg:w-2/3 mx-auto  mt-24">
                        <div class="text-sm border border-r-8 border-blue-900 py-4 px-4 my-8 flex justify-between items-center rounded-md">
                            <p class="">سؤال الطالب</p>
                            <a href="" class="text-red-600">حذف</a>
                        </div>
                        <div class="text-sm border border-r-8 border-blue-900 py-4 px-4 my-8 flex justify-between items-center rounded-md mr-8">
                            <p class="">رد المعلم</p>
                            <a href="" class="text-red-600">حذف</a>
                        </div>
                        <div class="input-form">
                        <textarea name="details" id="details" cols="20" rows="3" placeholder=" "
                                  class="input"></textarea>
                            <label for="details" class="label font-bold">أي تعليق أو رد</label>
                        </div>
                        <div class="flex justify-center items-center mt-10">
                            <input type="submit" value="إرسال" class="btn btn-main">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
    require "../Includes/footer.php";
} else {

    header("Location:../frontend/auth/login-form.php");
    exit();
}
?>