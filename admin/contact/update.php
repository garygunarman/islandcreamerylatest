<?php 
session_start();
if ($_SESSION["user_status"]!="admin") {
	header("location:../login.php?redirect=contact"); }
	else {
		include("../../static/connect_database.php");
		$description = $_POST["description"];		
		mysql_query("UPDATE tbl_contact SET fill='$description'	WHERE type='description'",$con);
		
		header("location:../contact?success=true"); }
?>
