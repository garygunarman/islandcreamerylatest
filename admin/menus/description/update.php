<?php 
session_start();
if ($_SESSION["user_status"]!="admin") {
	header("location:../login.php?redirect=read"); }
else {
		include("../../../static/connect_database.php");
		
		$description = $_POST["description"];
	
		
			mysql_query("
				UPDATE tbl_menus_info 
				SET fill='$description' 
				WHERE type='description'
			",$con);
		
		
		header("location:../description?success=true"); 
}
?>