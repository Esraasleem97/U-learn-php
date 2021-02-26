<?php
require "Includes/header.php";
require "Includes/hero.php";
?>
    <!--Section Hero-->
    <div class="container mx-auto">
        <div class="w-full xl:w-11/12 mx-auto items-center grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <div class="flex justify-start w-full">
                    <img src="layouts//img/k.png" alt="" class=" w-36 h-28 object-cover">
                    <h1 class="font-bold text-5xl py-10"><span class="text-main-color">U</span>-learn</h1>
                </div>
                <div class=" w-11/12 mx-10 leading-8">
                    <p>
                        منصة عراقية مجانية للتعلّم عن بُعد، توفر لطلبة الجامعات من المرحلة الأول وحتى المرحلة الرابعة
                        دروسًا تعليمية عن طريق مقاطع فيديو مصوَّرة مُنظّمة ومُجدولة وفقًا لمنهاج التعليم العراقي
                        يُقدّمها نخبة متميزة من الأساتذة لتسهّل على الطلبة مواصلة تعلّمهم، ومتابعة موادهم الدراسية.
                    </p>
                    <p class="my-4 font-medium">
                        تم تطوير هذه المنصة كخدمة مجتمعية
                    </p>
                </div>
            </div>
            <div>
                <img src="layouts//img/book.svg" alt="">
            </div>
        </div>
    </div>

    <!--Section login-->

    <div class="section-login w-full my-16 p-16 exams-container">

        <div class="py-2 md:py-5 xl:py-5 mx-auto flex flex-wrap items-center justify-center ">
            <p class="text-4xl font-semibold text-white text-center w-full md:w-1/2">
                ابدأ مشوار التعلم عن بعد
            </p>
            <div class="flex flex-col mt-16 justify-center mx-auto">
                <a href="frontend/auth/login-student.php" class="bg-white text-center py-4 px-4 sm:px-10 xl:px-20 mb-4 text-base sm:text-2xl">تسجيل دخول للطلبة</a>
                <a href="frontend/auth/login-teacher.php" class="bg-white text-center py-4 px-4 sm:px-10 xl:px-20 mb-4 text-base sm:text-2xl">تسجيل دخول للأساتذة</a>
            </div>
        </div>

    </div>

    <!--Section step by step-->
    <div class="container mx-auto mb-12">
        <div class="w-full xl:w-11/12 mx-auto items-center grid grid-cols-1 md:grid-cols-2 gap-4 ">
            <div class="px-12">
                <div class="flex justify-start w-full">
                    <h1 class="font-bold text-5xl py-10 text-gray-800">آلية التعلم</h1>
                </div>
                <div class=" w-11/12 leading-8">
                    <p>
                        يمكنك استخدام منصة <span class="font-bold"><span class="text-main-color">U</span>-learn</span>
                        عن بعد بكل سهولة ويسر من المرحلة الدراسية الاولى وحتى المرحلة الدراسية الرابعة ، حيث يمكنك
                        اختيار مرحلتك من الصفحة الرئيسية ثم اختيار المادة التعليمية ضمن جدول الدروس الأسبوعي. </p>

                </div>
            </div>
            <div>
                <img src="layouts//img/k.jpg" alt="">
            </div>
        </div>
    </div>


<?php
require "Includes/footer.php";
?>