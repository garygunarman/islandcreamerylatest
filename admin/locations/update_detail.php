<?php session_start();
if ($_SESSION["user_status"]!="admin") {
header("location:../login.php?redirect=locations"); }
else {
$id=$_POST["id"]; $title=$_POST["title"]; $address=$_POST["address"]; $phone=$_POST["phone"]; $opening_hours=$_POST["opening_hours"]; $link=$_POST["link"];

date_default_timezone_set("Asia/Jakarta");
$date = date('Y-m-d'); //$date = date('Y-m-d H:i:s'); echo $date;

include("../../static/connect_database.php");

$action = $_POST["action"];
if ($action=="delete") {
mysql_query("DELETE FROM tbl_locations WHERE id = '$id'",$con);
header("location:../locations"); }
else {
	
mysql_query("UPDATE tbl_locations SET title = '$title' WHERE id = '$id'",$con);
mysql_query("UPDATE tbl_locations SET address = '$address' WHERE id = '$id'",$con);
mysql_query("UPDATE tbl_locations SET phone = '$phone' WHERE id = '$id'",$con);
mysql_query("UPDATE tbl_locations SET opening_hours = '$opening_hours' WHERE id = '$id'",$con);
mysql_query("UPDATE tbl_locations SET link = '$link' WHERE id = '$id'",$con);

if ($_FILES["filename"]["tmp_name"]!=null) {
$tmp_name = $_FILES["filename"]["tmp_name"];
$name = $title."_".$date."_".$_FILES["filename"]["name"];
$error = $_FILES["filename"]["error"];

if ($error == 0) {
move_uploaded_file($tmp_name,"../../files/uploads/locations_map/$name");
$img_src="files/uploads/locations_map/$name"; }

mysql_query("UPDATE tbl_locations SET filename='$img_src' WHERE id='$id'",$con); }
header("location:detail.php?id=".$id."&title=".$title); } }
?>