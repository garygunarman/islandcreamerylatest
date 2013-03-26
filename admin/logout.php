<?php 
session_start();
$_SESSION["user_status"]="guest";
header("location:../index.php");
?>