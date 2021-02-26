<?php
require "../../Includes/header.php";
require "../../Includes/navbar/teacher.php";
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
                    for ($i = 0; $i < 4; $i++) {
                        ?>
                        <tr>
                            <td># <?php echo $i ?></td>
                            <td>اسم المادة</td>
                            <td>عنوان المادة</td>
                            <td>الملخص</td>
                            <td>
                                <a href="view.php" class="btn btn-info">عرض</a>
                                <a href="edit.php"
                                   class="btn btn-success">تعديل</a>
                                <a href=""
                                   class="btn btn-danger">حذف</a>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>

                <div class=" text-center w-4/6 mx-auto my-36">
                    <img src="../../layouts/img/login.svg" alt="" class="h-96 mx-auto my-8">
                    <p class=" text-gray-600">لا يوجد لديك دروس حاليا</p>
                </div>

            </div>
        </div>
    </form>
</div>
<?php
require "../../Includes/footer.php";
?>
