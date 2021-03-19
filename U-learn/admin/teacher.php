<?php

session_start();
if (isset($_SESSION['username'])) {

    require "../Includes/header.php";
    require "../Includes/navbar/admin.php";


    ?>
    <div class="bg-gray-100 w-full">
        <form action="">
            <div class="container mx-auto  my-8">
                <div class="border shadow-xl rounded-md w-full bg-white px-12 pb-10">
                    <div>
                        <h1 class="text-3xl font-semibold my-8">الأساتذة</h1>
                    </div>
                    <div class="w-full sm:w-11/12 md:w-3/4 lg:w-2/3 my-16">
                    </div>
                    <?php

                        ?>
                        <table>
                            <thead>
                            <th>#</th>
                            <th>اسم الأستاذ</th>
                            <th>البريد الإلكتروني</th>
                            <th></th>
                            </thead>
                            <tbody>
                            <tr>
                            <td>1</td>
                            <td>اسم الأستاذ</td>
                            <td>البريد الإلكتروني</td>

                            <td>
                                <a href='' class='btn btn-success'>قبول</a>
                                <a href='' class='btn btn-danger'>رفض</a>
                            </td>
                        </tr>

                            </tbody>
                        </table>



                        <div class=" text-center w-4/6 mx-auto my-36">
                            <img src="../layouts/img/teaching.svg" alt="" class="h-96 mx-auto my-8">
                            <p class=" text-gray-600">لا يوجد أساتذة حاليا</p>
                        </div>

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
