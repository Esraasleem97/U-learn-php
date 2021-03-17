<?php
session_start();
if (isset($_SESSION['username'])){

require "../../Includes/header.php";
require "../../Includes/navbar/student.php";

?>
<div class="bg-gray-100 w-full">
    <form action="">
        <div class="container mx-auto  my-8">

            <div class="border shadow-xl rounded-md w-full bg-white px-12 pb-10">
                <div>
                    <h1 class="text-3xl font-semibold my-8">إختر المرحلة الدراسية</h1>
                </div>
                <div class="flex flex-wrap justify-center py-8">
                    <?php
                    $stage = ['المرحلة الأولى','المرحلة الثانية','المرحلة الثالثة','المرحلة الرابعة'];
                    for ($i = 0 ; $i < 4 ; $i++) {
                    echo "
                        <a href='Book.php?stage=(".$i+1 .")' class='stage m-4 w-full sm:w-3/6 md:w-2/5 lg:w-1/3 xl:w-1/5'>
                        <p class='transition duration-300'> $stage[$i] </p>
                        <i class='fas fa-arrow-left mt-2 text-main-color'></i>
                    </a>
                    "; } ?>

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
