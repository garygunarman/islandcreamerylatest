<?php session_start();
if ($_SESSION["user_status"]!="admin") {
header("location:../../login.php?redirect=locations"); }
else {

$title=$_POST["title"];
$address=$_POST["address"];
$phone=$_POST["phone"];
$opening_hours=$_POST["opening_hours"];
$link=$_POST["link"];

date_default_timezone_set("Asia/Jakarta");
$date = date('Y-m-d'); //$date = date('Y-m-d H:i:s'); echo $date;

include("../../../static/connect_database.php");

$get_order = mysql_query("SELECT * from tbl_locations ORDER BY order_ DESC",$con);

if (mysql_num_rows($get_order)!=null){
$get_order_array = mysql_fetch_array($get_order);
$order = $get_order_array["order_"];
$order = $order*1+1; }

mysql_query("INSERT INTO tbl_locations(title,address,phone,opening_hours,link,order_) VALUES ('$title','$address','$phone','$opening_hours','$link','$order')",$con);

$get_id = mysql_query("SELECT * from tbl_locations WHERE title='$title'",$con);

if (mysql_num_rows($get_id)!=null) {
$get_id_array = mysql_fetch_array($get_id);
$id = $get_id_array["id"]; }

if ($_FILES["filename"]["tmp_name"]!=null) {
$tmp_name = $_FILES["filename"]["tmp_name"];
$name = $title."_".$date."_".$_FILES["filename"]["name"];
$error = $_FILES["filename"]["error"];

if ($error == 0){
move_uploaded_file($tmp_name,"../../../files/uploads/locations_map/$name");
$img_src="files/uploads/locations_map/$name"; }

mysql_query("UPDATE tbl_locations SET filename='$img_src' WHERE id='$id'",$con); }

header("location:../../locations"); }

?>