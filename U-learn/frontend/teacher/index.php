<?php

session_start();
if (isset($_SESSION['userid'])) {

require "../../Includes/header.php";
require "../../Includes/navbar/teacher.php";
require "../../backend/get-video.php";
//require "../../backend/delete-video.php";


    getVideo ("`course-teacher` =" , $_SESSION['userid']);
?>
<div class="bg-gray-100 w-full">
    <form action="">
        <div class="container mx-auto  my-8">
            <div class="border shadow-xl rounded-md w-full bg-white px-12 pb-10">
                <div>
                    <h1 class="text-3xl font-semibold my-8">جميع الدروس</h1>
                </div>
                <div class="w-full sm:w-11/12 md:w-3/4 lg:w-2/3 my-16">
                </div>
                <?php
                if ($_SESSION['rowcount'] > 0) {
                ?>
                <table>
                    <thead>
                    <th>#</th>
                    <th>اسم المادة</th>
                    <th>العنوان</th>
                    <th>الملخص</th>
                    <th></th>
                    </thead>
                    <tbody>
                    <?php

                    // عرض الفيديوهات التي قام الاستاذ بتحميلها وتمت الموافقه عليها من المسؤول
                    for ($i = 0; $i < count($_SESSION['videoID']); $i++) {

                      echo " <tr>
                            <td> ". $i+1 ."  </td>
                            <td>". $_SESSION['video-course'][$i] ."</td>
                            <td>". $_SESSION['video-title'][$i] ."</td>
                            <td>". $_SESSION['video-details'][$i] ."</td>
                            <td>
                                <a href='../student/view.php?do=view&video=".$_SESSION['videoID'][$i]."' class='btn btn-info'>عرض</a>
                                <a href='edit.php?do=view&video=".$_SESSION['videoID'][$i]."' class='btn btn-success'>تعديل</a>
                                <a href='../../backend/delete-video.php?do=delete&video=".$_SESSION['videoID'][$i]."' class='btn btn-danger'>حذف</a>
                            </td>
                        </tr> ";
                     } ?>

                    </tbody>
                </table>

                <?php
                } elseif ( $_SESSION['rowcount'] == 0){
                ?>
                <div class=" text-center w-4/6 mx-auto my-36">
                    <img src="../../layouts/img/login.svg" alt="" class="h-96 mx-auto my-8">
                    <p class=" text-gray-600">لا يوجد لديك دروس حاليا</p>
                </div>
                <?php } ?>
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
