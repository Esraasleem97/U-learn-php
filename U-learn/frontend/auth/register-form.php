<?php
require "../../Includes/header.php";
require "../../backend/create-account.php";


?>

<div class="bg-gray-100 w-full min-h-screen flex">
    <div class="container m-auto px-8">
        <div class="grid grid-cols-2 gap-4">
            <form action=""  method="post" class="mx-auto rounded-lg shadow-xl overflow-hidden p-6 space-y-10 bg-white w-7/12" class="register-form">
                <h2 class="text-2xl font-bold text-center">تسجيل</h2>
                <div class="input-form">
                    <input type="text" id="username" name="name" placeholder="" class="input" required />
                    <label for="username" class="label"><i class="far fa-user"></i> الاسم كامل</label>
                </div>
                <div class="input-form">
                    <input type="email" id="email" name="email" placeholder=" " class="input" required />
                    <label for="email" class="label"><i class="ti ti-email relative top-px"></i> البريد الإلكتروني</label>
                </div>
                <div class="input-form">
                    <input type="password"  id="password" name="password" placeholder=" " class="input" required />
                    <label for="password" class="label"><i class="ti ti-lock"></i> كلمة المرور</label>
                </div>
                <div class="input-form">
                    <input type="password"  id="password_confirmation" name="password_confirmation" placeholder=" " class="input" required />
                    <label for="password_confirmation" class="label"><i class="ti ti-lock"></i> تأكيد كلمة المرور</label>
                </div>

                <div class="input-form" required>

                    <input type="radio" id="student" name="user" value="Student">
                    <label for="student">طالب  </label><br>
                    <input type="radio" id="teather" name="user" value="teather">
                    <label for="teather">معلم </label><br>
                    <label for="student" class="label"><i class="ti ti-lock"></i> تسجل بحساب  </label>

                </div>

                <div class="my-12 flex justify-center w-full">
                    <input type="submit" class="btn btn-main" value="تسجيل">
                </div>


            </form>
            <div>
                <img src="../../layouts/img/login.svg" alt="">
            </div>
        </div>
    </div>
</div>


<?php
require "../../Includes/footer.php";
?>