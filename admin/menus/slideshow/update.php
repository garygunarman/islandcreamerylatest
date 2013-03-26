<?php 
session_start();
if ($_SESSION["user_status"]!="admin"){
header("location:../../login.php?redirect=home"); } 
else {
$action=$_POST["action"];
include("../../../static/connect_database.php"); 
$id_array = array(); 
$id_array = $_POST["id_"];

if ($action=="save_order") {
for ($counter=1;$counter<=5;$counter++) {
$id = $_POST["order_".$counter];
mysql_query(" UPDATE tbl_menus SET order_='$counter' WHERE id='$id' ",$con); } }

else if($action=="delete"){ foreach ($id_array as $id) {
mysql_query(" DELETE FROM tbl_menus WHERE id='$id' ",$con); } }

else if ($action=="save_all") {
for ($counter=1;$counter<=5;$counter++) {

if ($_FILES["image_file_".$counter]["tmp_name"]!=null) {
$tmp_name = $_FILES["image_file_".$counter]["tmp_name"];
$name = $_FILES["image_file_".$counter]["name"];
$error = $_FILES["image_file_".$counter]["error"];

if ($error == 0) {
move_uploaded_file($tmp_name,"../../../files/uploads/slideshow_menus/$name");
$img_src="files/uploads/slideshow_menus/$name"; }
$check_image = mysql_query(" SELECT * from tbl_menus WHERE order_='$counter' ",$con);

if (mysql_num_rows($check_image)!=null && mysql_num_rows($check_image)!=0) {
mysql_query(" UPDATE tbl_menus SET filename = '$img_src' WHERE order_='$counter' ",$con); }
else {

mysql_query(" INSERT INTO tbl_menus(filename,order_) VALUES ('$img_src','$counter') ",$con); } }

$title = $_POST["title_".$counter];
$description = $_POST["description_".$counter];

mysql_query(" UPDATE tbl_menus SET title = '$title', description = '$description' WHERE order_='$counter' ",$con); }

for ($counter=1;$counter<=5;$counter++) {
$id = $_POST["order_".$counter];
mysql_query(" UPDATE tbl_menus SET order_='$counter' WHERE id='$id' ",$con); }

if ($_FILES["image1"]["tmp_name"]!=null) {
$tmp_name = $_FILES["image1"]["tmp_name"];
$name = $_FILES["image1"]["name"];
$error = $_FILES["image1"]["error"];

if ($error == 0) {
move_uploaded_file($tmp_name,"../../../files/uploads/pages/$name");
$img_src="files/uploads/pages/$name"; }
$check_image = mysql_query(" SELECT * from tbl_menus_info
WHERE type='image1' ",$con);

if (mysql_num_rows($check_image)!=null && mysql_num_rows($check_image)!=0){
mysql_query(" UPDATE tbl_menus_info SET fill = '$img_src' WHERE type='image1' ",$con); }
else {
mysql_query(" INSERT INTO tbl_menus_info(fill,type)
VALUES ('$img_src','image1') ",$con); } }

if ($_FILES["image2"]["tmp_name"]!=null) {
$tmp_name = $_FILES["image2"]["tmp_name"];
$name = $_FILES["image2"]["name"];
$error = $_FILES["image2"]["error"];

if ($error == 0) {
move_uploaded_file($tmp_name,"../../../files/uploads/pages/$name");
$img_src="files/uploads/pages/$name"; }
$check_image = mysql_query(" SELECT * from tbl_menus_info WHERE type='image2' ",$con);

if (mysql_num_rows($check_image)!=null && mysql_num_rows($check_image)!=0) {
mysql_query(" UPDATE tbl_menus_info SET fill = '$img_src' WHERE type='image2' ",$con); }
else {
mysql_query(" INSERT INTO tbl_menus_info(fill,type) VALUES ('$img_src','image2') ",$con); } }

$description = $_POST["description"];
$description_title = $_POST["description_title"];

mysql_query(" UPDATE tbl_menus_info SET fill='$description' WHERE type='description' ",$con);
mysql_query(" UPDATE tbl_menus_info SET fill='$description_title' WHERE type='description_title' ",$con); }

header("location:../slideshow?success=true"); }
?>