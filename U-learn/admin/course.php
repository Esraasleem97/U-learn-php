<?php

session_start();
if (isset($_SESSION['userid']) &&  $_SESSION['userid'] ==1 ) {

    require "../Includes/header.php";
    require "../Includes/navbar/admin.php";
    require "../backend/get-requests.php";
    require "../backend/accept-reject-requests.php";
    // require "../backend/db.php";

    $video = isset($_GET['video']) ? $_GET['video'] : "";
    $do = isset($_GET['do']) ? $_GET['do'] : "";
    $Approve ="";
    if ($do == "accept")
        $Approve = 1;
    elseif ($do == "reject")
        $Approve = 2;
// الموافقه على الدرس أو رفضه
    acceptvideo($video , $Approve)


   // عرض الدروس التي تم إضافتها من قبل المعلم

    ?>
    <div class="bg-gray-100 w-full min-h-screen">
        <form action="">
            <div class="container mx-auto  my-8">
                <div class="border shadow-xl rounded-md w-full bg-white px-12 pb-10">
                    <div>
                        <h1 class="text-3xl font-semibold my-8">الدروس /   <?php
                            echo $_SESSION['video-number']
                            ?></h1>                    </div>
                    <div class="w-full sm:w-11/12 md:w-3/4 lg:w-2/3 my-16">
                    </div>
                    <?php
                    if ($_SESSION['video-number'] > 0) {

                    ?>
                    <table>
                        <thead>
                        <th>#</th>
                        <th>اسم المادة</th>
                        <th>عنوان الدرس</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <?php
                        for ($i = 0; $i < $_SESSION['video-number']; $i++) {
                            echo " <tr>";
                            echo "<td>".$i+1 ."</td>";
                            echo " <td> ";
                            echo $_SESSION['video-course'][$i];
                            echo "</td>";
                            echo "<td> ";
                            echo $_SESSION['video-title'][$i];
                            echo "</td>";

                            echo "<td>";
                            
                        //     <a href='?do=accept&video=" . $_SESSION['videoID'][$i] . "' class='btn btn-success'>قبول</a>
                        //    <a href='?do=reject&video=" . $_SESSION['videoID'][$i]. "' class='btn btn-danger'> رفض</a>
                           echo "   <a href='../frontend/student/view.php?do=view&video=".$_SESSION['videoID'][$i]."' class='btn btn-info'> عرض </a>";
                            echo "</td>";
                            echo "</tr> ";
                        } ?>


                        </tbody>
                    </table>


                    <?php } else { ?>

                    <div class=" text-center w-4/6 mx-auto my-36">
                        <img src="../layouts/img/login.svg" alt="" class="h-96 mx-auto my-8">
                        <p class=" text-gray-600">لا يوجد دروس حاليا</p>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </form>
    </div>
    <?php

    require "../Includes/footer.php";

} else {

    header("Location:../frontend/auth/login-form.php");
    exit();
}
?>
