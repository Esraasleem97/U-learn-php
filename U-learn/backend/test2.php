<?php
require "../Includes/header.php";
?>


    <table id="result" class="ui-widget ui-widget-content">
        <thead>
        <tr class="ui-widget-header ">
            <th>Name/Nr.</th>
            <th>Street</th>
            <th>Town</th>
            <th>Postcode</th>
            <th>Country</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="nr"><span>50</span>

            </td>
            <td>Some Street 1</td>
            <td>Glas</td>
            <td>G0 0XX</td>
            <td>United Kingdom</td>
            <td>
                <button type="button" id="useed" onclick="getId(this)">Use</button>
            </td>
        </tr>
        <tr>
            <td class="nr"><span>30</span>

            </td>
            <td>Some Street 2</td>
            <td>Glasgow</td>
            <td>G0 0XX</td>
            <td>United Kingdom</td>
            <td>
                <button type="button" id="useed">Use</button>
            </td>
            <!--        id ="hellobutton" class="use-address"-->
        </tr>
        </tbody>
    </table>

    <script text = "text/javascript">

        $(function() {
            $('#result').on('click', '#useed', function() {
                var id = $(this).closest("tr").find('td:eq(1)').text();
                alert(id);

            });
        })

    </script>

<?php
require "../Includes/footer.php";
?>