<?php
session_start();
if (isset($_SESSION['userid'])){
require "../../Includes/header.php";
require "../../Includes/navbar/student.php";
require "../../backend/get-course.php";


    // اذا دخل إلى صفحة المواد عبر اختيار قائمة الدروس
    getCourse("`course-stage` = ", $_SESSION['Stage']);

?>
<div class="bg-gray-100 w-full">
    <form action="">
        <div class="container mx-auto my-8">
            <div class="border shadow-xl rounded-md w-full bg-white px-12 pb-10">
                <div>
                    <h1 class="text-3xl font-semibold my-8">إختر المادة</h1>
                </div>
                <div class="flex flex-wrap justify-center py-8">


                    <?php
                    // عرض اسماء المواد المخزنة في قاعدة البيانات
                    for ($i = 0; $i < count($_SESSION['courseName']); $i++) {
                   echo "<a href='index.php?courseID=".$_SESSION['courseID'][$i]."' class='stage m-4 w-full sm:w-3/6 md:w-2/5 lg:w-1/3 xl:w-1/5'>
                        <p class='transition duration-300'>" . $_SESSION['courseName'][$i] . "</p>
                        <i class='fas fa-arrow-left mt-2 text-main-color'></i>
                    </a>

                   ";
                    }
                    ?>

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
