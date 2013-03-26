<?php session_start();
if ($_SESSION["user_status"]!="admin") {
	header("location:../../../login.php?redirect=thumbnail"); }
	else {
		$title_thumbnail=$_POST["title_thumbnail"];
		date_default_timezone_set("Asia/Jakarta");		
		$date = date('Y-m-d'); //$date = date('Y-m-d H:i:s');
		
		include("../../../../static/connect_database.php");
		
		$get_order = mysql_query("SELECT * from tbl_menus_thumbnail ORDER BY order_ DESC",$con);
		if (mysql_num_rows($get_order)!=null) {
			$get_order_array = mysql_fetch_array($get_order);
			$last_order = 	$get_order_array["order_"]*1+1;
		}
		
		mysql_query("INSERT INTO tbl_menus_thumbnail(title_thumbnail,order_) VALUES ('$title_thumbnail','$last_order')",$con);
		$get_id = mysql_query("SELECT * from tbl_menus_thumbnail WHERE title_thumbnail='$title_thumbnail'",$con);	

if (mysql_num_rows($get_id)!=null) {
	$get_id_array = mysql_fetch_array($get_id);
	$id_thumbnail= $get_id_array["id_thumbnail"]; }	
	
if ($_FILES["image_file_"]["tmp_name"]!=null) {
	$tmp_name = $_FILES["image_file_"]["tmp_name"];
	$name = $title_thumbnail."_".$date."_".$_FILES["image_file_"]["name"];
	$error = $_FILES["image_file_"]["error"];

if ($error == 0) {
	move_uploaded_file($tmp_name,"../../../../files/uploads/thumbnail_menus/$name");
	$img_src="files/uploads/thumbnail_menus/$name"; }
	mysql_query("UPDATE tbl_menus_thumbnail SET filename_thumbnail='$img_src' WHERE id_thumbnail='$id_thumbnail'",$con);	}
	
	header("location:../../thumbnail"); }

?>