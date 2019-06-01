<?php session_start(); ?>
<?php
session_destroy();
header("location:home.php")
?>