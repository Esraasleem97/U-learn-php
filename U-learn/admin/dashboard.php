<?php
session_start();

require "../Includes/header.php";
require "../Includes/navbar/admin.php";
require "../backend/General-report.php";
require "../backend/get-requests.php";
require "../backend/accept-reject-requests.php";

$userEmail = "";

?>
<div class="bg-gray-100 w-full">
    <div class="container mx-auto my-8">
        <h1 class="text-3xl text-blue-900 font-semibold tracking-wider mb-12 px-4 md:px-6 lg:px-12">
            التقرير العام
        </h1>
        <div class="flex flex-wrap justify-around">

            <!--عدد الأساتذة-->
            <div class="border shadow-2xl rounded-xl w-1/4 py-8 px-12 border-r-8 border-sub-color">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-semibold text-3xl text-center">
                            <?php
                            // Echo session variables that were set on previous page
                            echo $_SESSION['teachernum'] . "<br>";
                            ?>

                        </p>
                        <p class="font-medium my-4 text-sm tracking-wider">عدد الأساتذة</p>
                    </div>
                    <img src="../layouts/img/teaching.svg" alt="" class="w-32">
                </div>
            </div>

            <!--عدد الطلبة-->
            <div class="border shadow-2xl rounded-xl w-1/4 py-8 px-12 border-r-8 border-sub-color">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-semibold text-3xl text-center"> <?php
                            // Echo session variables that were set on previous page
                            echo $_SESSION['studentnum'] . "<br>";
                            ?>
                        </p>
                        <p class="font-medium my-4 text-sm tracking-wider">عدد الطلبة

                        </p>
                    </div>
                    <img src="../layouts/img/graduation.svg" alt="" class="w-32">
                </div>
            </div>

            <!--عدد الدروس-->
            <div class="border shadow-2xl rounded-xl w-1/4 py-8 px-12 border-r-8 border-sub-color">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-semibold text-3xl text-center">
                            <?php
                            // Echo session variables that were set on previous page
                            echo $_SESSION['videonum'] . "<br>";
                            ?>

                        </p>
                        <p class="font-medium my-4 text-sm tracking-wider">عدد الدروس</p>
                    </div>
                    <img src="../layouts/img/login.svg" alt="" class="w-32">
                </div>
            </div>
        </div>

        <div class="flex justify-between my-12 w-11/12">
            <!--الطلبة الجدد-->
            <div class="w-2/5">
                <h1 class="text-3xl text-blue-900 font-semibold tracking-wider mb-12 px-4 md:px-6 lg:px-12">
                    الطلبة الجدد
                </h1>

                <?php
                for ($i = 0; $i < count($_SESSION['student']); $i++) {
                    ?>
                    <div id="demo"
                         class="border border-r-8 border-sub-color flex justify-between py-4 px-8 rounded-3xl my-4">

                        <p>
                            <?php
                            $userEmail = $_SESSION['student'][$i];
                            echo $_SESSION['student'][$i];
                            ?>

                        </p>

                        <div class="text-sm">
                            <form method="post">
                                <button class="text-green-800 duration-300 hover:border-green-800"
                                        name="acceptstudent"> قبول |
                                </button>
                                <button class="text-red-700 duration-300 hover:border-red-800"
                                        name="rejictstudent" > رفض
                                </button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>


            <!--الأساتذة الجدد-->
            <div class="w-2/5">
                <h1 class="text-3xl text-blue-900 font-semibold tracking-wider mb-12 px-4 md:px-6 lg:px-12">
                    الأساتذة الجدد
                </h1>
                <?php
                for ($i = 0;
                     $i < count($_SESSION['teacher']);
                     $i++) {
                    //  echo '<td>' . $_SESSION['student'][$i] . '</td>';

                    ?>
                    <div class="border border-r-8 border-sub-color flex justify-between py-4 px-8 rounded-3xl my-4">
                        <p>
                            <?php
                            echo $_SESSION['teacher'][$i];
                            ?>

                        </p>
                        <div class="text-sm">

                            <input type="submit" class="text-green-800 duration-300 hover:border-green-800"
                                   name="accept" value="قبول" onclick="acceptteacher()"/>
                            <input type="submit" class="text-red-700 duration-300 hover:border-red-800" name="rejict"
                                   value="رفض" onclick="rejectteacher()"/>
                            <!--                            <a href="" class="text-green-800 duration-300 hover:border-green-800">قبول</a>-->
                            <!--                            <a href="" class="text-red-700 duration-300 hover:border-red-800">رفض</a>-->
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">





</script>

<?php
require "../Includes/footer.php";
?>


