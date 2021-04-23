<?php
session_start();
$_SESSION['Error-message'] = "";

require('../../backend/db.php');
require "../../Includes/header.php";
require "../../backend/login.php";
?>

<div class="bg-gray-100 w-full min-h-screen flex">
    <div class="container m-auto px-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">

            <div>
                <?php
                if (!empty($_SESSION['Error-message'])) { ?>
                <p class="text-red-500 bg-red-100 mt-4 border-r-4 border-red-500 py-2 px-4 mx-auto w-full lg:w-7/12">
                    <?php echo $_SESSION['Error-message'];
                    echo "</p>";
                    }
                    ?>
            </div>
            <div></div>
            <form action="" method="post"
                  class="mx-auto rounded-lg shadow-xl overflow-hidden p-6 space-y-10 bg-white w-full lg:w-7/12">

                <h2 class="text-2xl font-bold text-center">تسجيل الدخول </h2>
                <div class="input-form">
                    <input type="email" id="email" name="email" placeholder=" " class="input"/>
                    <label for="email" class="label"><i class="ti ti-email relative top-px"></i> البريد
                        الإلكتروني</label>
                </div>
                <div class="input-form">
                    <input type="password" id="password" name="password" placeholder=" " class="input"/>
                    <label for="password" class="label"><i class="ti ti-lock"></i> كلمة المرور</label>
                </div>

                <div class="flex justify-center w-full">
                    <input type="submit" class="btn btn-main" value="تسجيل الدخول">
                </div>
                <div class="w-full text-center">
                    <a href="register-form.php" class="text-sm text-main-color hover:underline">إنشاء
                        حساب معلم</a> <br>
                    <a href="register-form-std.php" class="text-sm text-main-color hover:underline">إنشاء
                        حساب طالب</a>
                </div>
            </form>
            <div class="hidden md:block">
                <img src="../../layouts/img/login.svg" alt="">
            </div>
        </div>
    </div>
</div>

<?php
require "../../Includes/footer.php";
?>
