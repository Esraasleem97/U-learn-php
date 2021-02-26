<?php
require "../../Includes/header.php";
require "../../Includes/navbar/student.php";
?>
<div class="bg-gray-100 w-full">
    <form action="">
        <div class="container mx-auto my-8">
            <div class="border shadow-xl rounded-md w-full bg-white px-12 pb-10">
                <div>
                    <h1 class="text-3xl font-semibold my-8">الدروس</h1>
                </div>
                <div class="flex flex-wrap">
                    <?php
                    for ($i = 0 ; $i < 6 ; $i++) {
                    ?>
                        <div class="w-1/4 m-4 text-center">
                            <a href="view.php" class=" ">
                                <div class="h-44 bg-gray-500 w-full p-8  flex justify-center items-center my-4 rounded-lg">
                                    <div class="w-10 h-10 rounded-full bg-blue-700 opacity-90">
                                        <i class="fas fa-caret-right flex justify-center items-center w-8 h-10  ml-1 mt-0.5 text-4xl text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-xl tracking-wide mb-4">(عنوان الدرس)</p>
                                    <p>الأحد 20 ديسمبر</p>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                    <div class=" text-center w-4/6 mx-auto my-36">
                        <img src="../../layouts/img/login.svg" alt="" class="h-96 mx-auto my-8">
                        <p class=" text-gray-600">لا يوجد لديك دروس حاليا</p>
                    </div>
                </div>
            </div>

        </div>
    </form>

</div>
<?php
require "../../Includes/footer.php";
?>