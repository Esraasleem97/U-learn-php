<!DOCTYPE html>
<html>

<head></head>

<body>
<form name="htmltest">
    <!--Here, by default we have tried
        to implement a file path using
        the value attribute. But it
        will not work here. -->
    <input type="file" value="c:/amrit.txt">
</form>
</body>

</html>
<!--We can implement the submit
    button using javascript. -->
<script>document.htmltest.submit("hiiiii");</script>