<?php session_start();
if ($_SESSION["user_status"]!="admin") {
	header("location:../../login.php?redirect=thumbnail"); }
	else {
		$id_thumbnail=$_POST["id_thumbnail"];
		$title_thumbnail=$_POST["title_thumbnail"];
		date_default_timezone_set("Asia/Jakarta");			
		$date = date('Y-m-d'); //$date = date('Y-m-d H:i:s');	
		
		include("../../../static/connect_database.php");
		$action = $_POST["action"];

if ($action=="delete") {
	mysql_query("DELETE FROM tbl_menus_thumbnail WHERE id_thumbnail = '$id_thumbnail'",$con);
	header("location:../thumbnail"); }
	else {
		mysql_query("UPDATE tbl_menus_thumbnail SET title_thumbnail = '$title_thumbnail' WHERE id_thumbnail = '$id_thumbnail'",$con);

if ($_FILES["image_file_"]["tmp_name"]!=null) {
	$tmp_name = $_FILES["image_file_"]["tmp_name"];
	$name = $title_thumbnail."_".$date."_".$_FILES["image_file_"]["name"];
	$error = $_FILES["image_file_"]["error"];

if ($error == 0) {
	move_uploaded_file($tmp_name,"../../../files/uploads/thumbnail_menus/$name");
	$img_src="files/uploads/thumbnail_menus/$name"; }	
	mysql_query("UPDATE tbl_menus_thumbnail SET filename_thumbnail = '$img_src' WHERE id_thumbnail='$id_thumbnail'",$con); }
	
	header("location:detail.php?id_thumbnail=".$id_thumbnail."&title_thumbnail=".$title_thumbnail); } }
?>