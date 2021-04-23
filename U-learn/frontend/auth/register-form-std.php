<?php
session_start();
$_SESSION['success-message'] = "";
$_SESSION['Error-message'] = "";
require "../../Includes/header.php";
require "../../backend/create-account.php";


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
                      <?php
                if (!empty($_SESSION['success-message'])) { ?>
                <p class="text-green-500 bg-green-100 mt-4 border-r-4 border-green-500 py-2 px-4 mx-auto w-full lg:w-7/12">
                    <?php echo $_SESSION['success-message'];
                    echo "</p>";
                    header('Refresh: 8; URL=login-form.php');

                    }
                    ?>
            </div>

            <div></div>
            <form action=""  method="post" class="mx-auto rounded-lg shadow-xl overflow-hidden p-6 space-y-10 bg-white w-full my-4  lg:w-7/12" class="register-form">
                <h2 class="text-2xl font-bold text-center">  تسجيل بحساب طالب</h2>
                <div class="input-form">
                    <input type="text" id="username" name="name" placeholder=" " class="input" required />
                    <label for="username" class="label"><i class="far fa-user"></i> الاسم كامل</label>
                </div>
                <div class="input-form">
                    <input type="email" id="email" name="email" placeholder=" " class="input" required />
                    <label for="email" class="label"><i class="far fa-envelope relative top-px"></i> البريد الإلكتروني</label>
                </div>
                <div class="input-form">
                    <input type="password"  id="password" name="password" placeholder=" " class="input" required />
                    <label for="password" class="label"><i class="fas fa-lock"></i> كلمة المرور</label>
                </div>
                <div class="input-form">
                    <input type="password"  id="password_confirmation" name="password_confirmation" placeholder=" " class="input" required />
                    <label for="password_confirmation" class="label"><i class="fas fa-lock"></i> تأكيد كلمة المرور</label>
                </div>

                <div class="input-form" id="user" style="display: none;">

                    <input type="text" id="user" name="user" value="Student">

                </div>

                <div class="input-form"  required>

                    <input type="radio" id="1" name="studentStage" value="1">
                    <label for="1"> سنة أولى  </label><br>
                    <input type="radio" id="2" name="studentStage" value="2">
                    <label for="2"> سنة ثانية  </label><br>
                    <input type="radio" id="3" name="studentStage" value="3">
                    <label for="3"> سنة ثالثة  </label><br>
                    <input type="radio" id="4" name="studentStage" value="4">
                    <label for="4"> سنة رابعة  </label><br>
                    <label for="student" class="label"><i class="ti ti-lock"></i> السنة الدراسية  </label>

                </div>

                <div class="my-12 flex justify-center w-full">
                    <input type="submit" class="btn btn-main" value="تسجيل">
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