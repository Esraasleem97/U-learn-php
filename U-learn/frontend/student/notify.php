<?php
session_start();
if (isset($_SESSION['username'])){
require "../../Includes/header.php";
require "../../Includes/navbar/student.php";
?>
    <div class="bg-gray-100 w-full">
        <form action="">
            <div class="container mx-auto my-8">

                <div class="w-full lg:w-3/5">
                    <div>
                        <h1 class="text-3xl font-semibold my-8"><i class="far fa-bell text-main-color"></i> الإشعارات
                        </h1>
                    </div>

                    <div>
                        <?php
                        for ($i = 0; $i < 4; $i++) {
                            ?>
                            <a href="" class=" my-8">
                                <div class="shadow-lg bg-white py-4 px-4 my-6 rounded-lg">
                                    <p><i class="far fa-bell text-sub-color mx-2"></i>أرسل لك الاستاذ (اسم الاستاذ) رد لمادة (اسم المادة)  </p>
                                </div>
                            </a>
                        <?php } ?>


                    </div>

                </div>
                <div class=" text-center w-4/6 mx-auto ">
                    <img src="../../layouts/img/ideas.svg" alt="" class="h-96 mx-auto my-8">
                    <p class=" text-gray-600">لا يوجد لديك إشعارات حاليا</p>
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