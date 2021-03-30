<?php
session_start();
if (isset($_SESSION['userid'])) {

    require "../../Includes/header.php";
    require "../../Includes/navbar/teacher.php";
    require "../../backend/get-course.php";
    require "../../backend/add-video.php";
// احضار المواد التي يدرسها الاستاذ
    getCourse("`course-teacher`= ", $_SESSION['userid']);

    ?>
    <div class="bg-gray-100 w-full">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container mx-auto my-8">
                <div class="border shadow-xl rounded-md w-full bg-white px-12 pb-10">
                    <div>
                        <h1 class="text-3xl font-semibold my-8">إضافة درس جديد</h1>
                    </div>
                    <div class="w-full sm:w-11/12 md:w-3/4 lg:w-2/3 my-16">
                        <div class="input-form my-8">
                            <input type="text" id="title" name="title" value="" placeholder=" " class="input"
                                   required="required"/>
                            <label for="title" class="label font-bold">العنوان</label>
                        </div>
                        <div class="input-form mb-8">
                            <textarea name="details" id="details" cols="30" rows="10" placeholder=" "
                                      class="input" required="required"></textarea>
                            <label for="details" class="label font-bold">الملخص</label>
                        </div>


                        <div class="input-form my-8">
                            <select name="course" id="course" required="required" class="input">
                                <option value=''>اختيار اسم المادة</option>

                                <?php
                                for ($i = 0; $i < count($_SESSION['courseName']); $i++) {
                                    echo "<option value='" . $_SESSION['courseID'][$i] . "'>" . $_SESSION['courseName'][$i] . " </option>";

                                }
                                ?>

                            </select>
                        </div>

                        <div class="border w-full">
                            <main class="container max-w-screen-lg h-full">
                                <!-- file upload modal -->
                                <article aria-label="File Upload Modal"
                                         class="relative h-full flex flex-col bg-white shadow-xl rounded-md"
                                         ondrop="dropHandler(event);" ondragover="dragOverHandler(event);"
                                         ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">
                                    <!-- scroll area -->
                                    <section class="overflow-auto p-8 w-full h-full flex flex-col">
                                        <header
                                                class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
                                            <p class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center">
                                                <span>قم بتحميل فيديو</span>&nbsp;
                                            </p>
                                            <input type="file" name="media" id="media"
                                                   style="color:transparent; width:90px;" class="file_multi_video"
                                                   accept="video/*" required="required"/>

                                        </header>

                                        <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                                        </h1>


                                        <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                            <li id="empty"
                                                class="h-full w-full text-center flex flex-col justify-center items-center">
                                                <img class="mx-auto w-32"
                                                     src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png"
                                                     alt="no data"/>
                                                <span class="text-small text-gray-500">لم يتم تحديد ملفات</span>

                                            </li>


                                        </ul>
                                        <video class="w-full" id="view" style="display: none;" controls>
                                            <source src="mov_bbb.mp4" id="video_here">
                                            Your browser does not support HTML5 video.
                                        </video>
                                        <script>
                           //اخفاء لم يتم اختيار ملف وعرض الفيديو الذي تم اختياره

                                            const input = document.getElementById('media');
                                            const log = document.getElementById('gallery');

                                            input.addEventListener('input', updateValue);

                                            function updateValue(e) {
                                                log.style.display = "none";
                                                $(document).on("change", ".file_multi_video", function (evt) {
                                                    document.getElementById("view").style.display = "block";

                                                    var $source = $('#video_here');
                                                    $source[0].src = URL.createObjectURL(this.files[0]);
                                                    $source.parent()[0].load();
                                                });
                                            }
                                        </script>


                                    </section>
                                </article>
                            </main>
                        </div>

                        <!-- using two similar templates for simplicity in js code -->
                        <template id="file-template">
                            <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                                <article tabindex="0"
                                         class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm">
                                    <img alt="upload preview"
                                         class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed"/>

                                    <section
                                            class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                        <h1 class="flex-1 group-hover:text-blue-800"></h1>
                                        <div class="flex">
                                        <span class="p-1 text-blue-800">
                                        <i>
                                            <svg class="fill-current w-4 h-4 ml-auto pt-1"
                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24">
                                            <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z"/>
                                            </svg>
                                        </i>
                                        </span>
                                            <p class="p-1 size text-xs text-gray-700"></p>
                                            <button
                                                    class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                                <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24">
                                                    <path class="pointer-events-none"
                                                          d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </section>
                                </article>
                            </li>
                        </template>

                        <template id="image-template">
                            <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                                <article tabindex="0"
                                         class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                    <img alt="upload preview"
                                         class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed"/>

                                    <section
                                            class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                        <h1 class="flex-1"></h1>
                                        <div class="flex">
                                        <span class="p-1">
                                        <i>
                                            <svg class="fill-current w-4 h-4 ml-auto pt-"
                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24">
                                            <path
                                                    d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z"/>
                                            </svg>
                                        </i>
                                        </span>

                                            <p class="p-1 size text-xs"></p>
                                            <button
                                                    class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                                <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24">
                                                    <path class="pointer-events-none"
                                                          d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </section>
                                </article>
                            </li>
                        </template>
                    </div>


                    <div class="flex justify-center items-center mt-10">
                        <input type="submit" value="تأكيد" class="btn btn-main">
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
