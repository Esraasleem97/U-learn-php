<?php
?>

<div class="container mx-auto">
    <div class="flex justify-start w-full -mt-1">
        <img src="../../layouts//img/k.png" alt="" class="h-28 object-cover">
        <h1 class="font-bold text-5xl py-10"><span class="text-main-color">U</span>-learn</h1>
    </div>
    <nav class="border-b-2 border-gray-200 py-3 ">

        <ul class="flex justify-between">
            <div class="flex">
                <li class="list-border-b relative"><a href="index.php">الدروس </a></li>
<!--                <li class="relative mx-12"><a href="Book.php">الكتب الدراسية</a></li>-->
                <li class="relative mx-12"><a href="add.php">إضافة دروس</a></li>
            </div>
            <div class="flex items-center relative">
                <li class="text-main-color font-medium text-xl"><a href="notify.php"><i class="far fa-bell"></i></a></li>
                <li class="mr-4"> |</li>
                <li class="mr-4"><a href="../../backend/Logout.php">تسجيل الخروج</a></li>
            </div>
        </ul>
    </nav>
    <div class="border bg-gray-50 shadow-md px-12 py-6 my-4 text-2xl tracking-wide">
<h1>

    <?php
    // Echo session variables that were set on previous page
    echo     $_SESSION['username'].  "<br>";
    ?>



</h1>

    </div>
</div>