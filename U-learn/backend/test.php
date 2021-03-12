<?php
session_start();

require "../Includes/header.php";
require "../backend/get-requests.php";
require "../backend/accept-reject-requests.php";

$userEmail = "";

?>


    <table id="result" class="ui-widget ui-widget-content">

        <?php
        for ($i = 0; $i < count($_SESSION['student']); $i++) {
            ?>

            <tr>
                <td>
                    <p>
                        <?php
                        $userEmail = $_SESSION['student'][$i];
                        echo $_SESSION['student'][$i];
                        ?>

                    </p>
                </td>
                <td>
                    <form method="get" action="../backend/accept-reject-requests.php">

                        <button type="button" id="useed" class="text-green-800 duration-300 hover:border-green-800"
                                name="acceptstudent"> قبول |
                        </button>
                        <button type="button" id="useed2" class="text-red-700 duration-300 hover:border-red-800"
                                name="rejictstudent"> رفض
                        </button>
                    </form>
                </td>
            </tr>

        <?php } ?>
    </table>


    <script text="text/javascript">

        $(function () {
            $('#result').on('click', '#useed', function () {
                var id = $(this).closest("tr").find('td:eq(0)').text();
                var x = document.getElementById("useed").name;

              //   alert(x);

            });
        })

        $(function () {
            $('#result').on('click', '#useed2', function () {
                var id = $(this).closest("tr").find('td:eq(0)').text();
                var x = document.getElementById("useed2").name;

               // alert(x);


            });
        })

    </script>



<?php
require "../Includes/footer.php";
?>