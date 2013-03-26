<?php 
session_start();
if ($_SESSION["user_status"]!="admin") {
	header("location:../login.php?redirect=home"); }
	else {
		$action=$_POST["action"];		
		include("../../static/connect_database.php");
		
		$id_array = array();
		$id_array = $_POST["id_"];
		
if ($action=="save_order") {
	for ($counter=1;$counter<=5;$counter++) {
		$id = $_POST["order_".$counter];
		mysql_query("UPDATE tbl_home SET order_='$counter' WHERE id='$id'",$con); } }
		
		else if($action=="delete") {
			foreach ($id_array as $id) {
				mysql_query("DELETE FROM tbl_home WHERE id='$id'",$con); } }
				
				else if ($action=="save_all") {
					for ($counter=1;$counter<=5;$counter++) {
						if ($_FILES["image_file_".$counter]["tmp_name"]!=null) {
							$tmp_name = $_FILES["image_file_".$counter]["tmp_name"];
							$name = $_FILES["image_file_".$counter]["name"];
							$error = $_FILES["image_file_".$counter]["error"];
							$title = $_POST["title".$counter];
							$description = $_POST["description".$counter];
if ($error == 0) {
	move_uploaded_file($tmp_name,"../../files/uploads/slideshow/$name");
	$img_src="files/uploads/slideshow/$name"; }
	
	$check_image = mysql_query("SELECT * from tbl_home WHERE order_='$counter'",$con);

if (mysql_num_rows($check_image)!=null && mysql_num_rows($check_image)!=0) {
	mysql_query("UPDATE tbl_home SET filename = '$img_src' WHERE order_='$counter'",$con); }
	else {
		mysql_query("INSERT INTO tbl_home(filename,order_) VALUES ('$img_src','$counter')",$con); } }
		
		$title = $_POST["title_".$counter];
		mysql_query("UPDATE tbl_home SET title = '$title' WHERE order_='$counter'",$con);
		$description = $_POST["description_".$counter];
		
		mysql_query("UPDATE tbl_home SET description = '$description' WHERE order_='$counter'",$con); }
		for ($counter=1;$counter<=5;$counter++) {
			$id = $_POST["order_".$counter];
			mysql_query("UPDATE tbl_home SET order_='$counter' WHERE id='$id'",$con); }

if ($_FILES["image_a"]["tmp_name"]!=null) {
	$tmp_name = $_FILES["image_a"]["tmp_name"];
	$name = $_FILES["image_a"]["name"];
	$error = $_FILES["image_a"]["error"];
	
if ($error == 0) {
	move_uploaded_file($tmp_name,"../../files/uploads/pages/$name");
	$img_src="files/uploads/pages/$name"; }
	
	$check_image = mysql_query("SELECT * from tbl_home_info WHERE type='image_a'",$con);
	
if (mysql_num_rows($check_image)!=null && mysql_num_rows($check_image)!=0) {
	mysql_query("UPDATE tbl_home_info SET fill = '$img_src' WHERE type='image_a'",$con); }
	else {
		mysql_query("INSERT INTO tbl_home_info(fill,type) VALUES ('$img_src','image_a')",$con); } }

if ($_FILES["image_b"]["tmp_name"]!=null) {
	$tmp_name = $_FILES["image_b"]["tmp_name"];
	$name = $_FILES["image_b"]["name"];
	$error = $_FILES["image_b"]["error"];

if ($error == 0) {
	move_uploaded_file($tmp_name,"../../files/uploads/pages/$name");
	$img_src="files/uploads/pages/$name"; }
	
	$check_image = mysql_query("SELECT * from tbl_home_info WHERE type='image_b'",$con);

if (mysql_num_rows($check_image)!=null && mysql_num_rows($check_image)!=0) {
	mysql_query("UPDATE tbl_home_info SET fill = '$img_src' WHERE type='image_b'",$con); }
	else {
		mysql_query("INSERT INTO tbl_home_info(fill,type) VALUES ('$img_src','image_b')",$con); } }
		
		$title = $_POST["title"];
		$description = $_POST["description"];
		$description_title = $_POST["description_title"];
		
		mysql_query("UPDATE tbl_home_info SET fill='$description_title' WHERE type='description_title'",$con); }
		
		header("location:../home?success=true"); }
?>