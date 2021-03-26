<?php
session_start();
if (isset($_SESSION['userid']) && $_SESSION['userid'] == 1) {

    require "../Includes/header.php";
    require "../Includes/navbar/admin.php";
    require "../backend/General-report.php";
    require "../backend/get-requests.php";
    require "../backend/accept-reject-requests.php";
    // require "../backend/db.php";

    $email = isset($_GET['email']) ? $_GET['email'] : "";
    $do = isset($_GET['do']) ? $_GET['do'] : "";
    $Approve ="";
    if ($do == "accept")
        $Approve = 1;
    elseif ($do == "reject")
        $Approve = 2;

    acceptuser($email , $Approve);

    ?>
    <div class="bg-gray-100 w-full min-h-screen">
        <form action="">
            <div class="container mx-auto  my-8">
                <div class="border shadow-xl rounded-md w-full bg-white px-12 pb-10">
                    <div>
                        <h1 class="text-3xl font-semibold my-8">الطلبة /   <?php
                           echo $_SESSION['student-number']
                            ?></h1>
                    </div>
                    <div class="w-full sm:w-11/12 md:w-3/4 lg:w-2/3 my-16">
                    </div>
                    <?php
                    if ($_SESSION['student-number'] > 0) {
                        ?>
                        <table>
                            <thead>
                            <th>#</th>
                            <th>اسم الطالب</th>
                            <th>البريد الإلكتروني</th>
                            <th></th>
                            </thead>
                            <tbody>
                            <?php
                            for ($i = 0; $i < count($_SESSION['student-email']); $i++) {
                                echo " <tr>";
                                echo "<td>".$i+1 ."</td>";
                                echo " <td> ";
                                echo $_SESSION['student-name'][$i];
                                echo "</td>";
                                echo "<td> ";
                                $userEmail = $_SESSION['student-email'][$i];
                                echo $userEmail;
                                echo "</td>";

                                echo "<td>";
                                echo "<a href='?do=accept&email=" . $userEmail . "' class='btn btn-success'>قبول</a>";
                                echo " <a href='?do=reject&email=" . $userEmail . "' class='btn btn-danger'>رفض</a>";
                                echo "</td>";
                                echo "</tr> ";
                            } ?>
                            </tbody>
                        </table>

                    <?php } else { ?>
                        <div class=" text-center w-4/6 mx-auto my-36">
                            <img src=" ../layouts /img/graduation.svg" alt="" class="h-96 mx-auto my-8">
                            <p class="text- gray-600">لا يوجد طلبة حاليا</p>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </form>
    </div>
    <?php

    require "../Includes/footer.php";

} else {

    header("Location:../frontend / auth / login - form . php");
    exit();
}
?>
