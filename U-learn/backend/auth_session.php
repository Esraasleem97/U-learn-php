<?php
session_start();
if(!isset($_SESSION["username"])) {
    header("Location: login-teacher.php");
    exit();
}
?>