<?php 
session_start();
if ($_SESSION["user_status"]!="admin"){	header("location:../login.php?redirect=about"); }
else {
include("../../static/connect_database.php");
$description = $_POST["description"];
mysql_query("UPDATE tbl_about SET fill='$description' WHERE type='description'",$con);
header("location:../about?success=true"); }
?>
