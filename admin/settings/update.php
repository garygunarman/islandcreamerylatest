<?php 
session_start();
if ($_SESSION["user_status"]!="admin") {
	header("location:../login.php?redirect=settings"); }
	else {
		include("../../static/connect_database.php");
		
		$info["url"] = $_POST["url"];
		$info["website_name"] = $_POST["website_name"];
		$info["email"] = $_POST["email"];
		$info["address"] = $_POST["address"];
		$info["meta"] = $_POST["meta"];
		
		foreach($info as $parameter=>$value)mysql_query("UPDATE tbl_info SET value='$value' WHERE parameter='$parameter'",$con);
		
		header("location:../settings?success=true"); }
?>