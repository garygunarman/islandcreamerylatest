<?php 
session_start();
if ($_SESSION["user_status"]!="admin"){
header("location:../../login.php?redirect=home"); } 
else {
$action=$_POST["action"];
include("../../../../static/connect_database.php"); 
$id_array = array(); 
$id_array = $_POST["id_"];

if ($action=="save_order") {
for ($counter=1;$counter<=5;$counter++) {
$id = $_POST["order_".$counter];
mysql_query(" UPDATE tbl_menus_content SET order_='$counter' WHERE id='$id' ",$con); } }

else if($action=="delete"){ foreach ($id_array as $id) {
mysql_query(" DELETE FROM tbl_menus_content WHERE id='$id' ",$con); } }

else if ($action=="save_all") {
for ($counter=1;$counter<=5;$counter++) {

if ($_FILES["image_file_".$counter]["tmp_name"]!=null) {
$tmp_name = $_FILES["image_file_".$counter]["tmp_name"];
$name = $_FILES["image_file_".$counter]["name"];
$error = $_FILES["image_file_".$counter]["error"];

if ($error == 0) {
move_uploaded_file($tmp_name,"../../files/uploads/slideshow_menus/$name");
$img_src="files/uploads/slideshow_menus/$name"; }
$check_image = mysql_query(" SELECT * from tbl_menus_content WHERE order_='$counter' ",$con);

if (mysql_num_rows($check_image)!=null && mysql_num_rows($check_image)!=0) {
mysql_query(" UPDATE tbl_menus_content SET filename = '$img_src' WHERE order_='$counter' ",$con); }
else {

mysql_query(" INSERT INTO tbl_menus_content(filename,order_) VALUES ('$img_src','$counter') ",$con); } }

$title_read = $_POST["title_read_".$counter];
$description_read = $_POST["description_read_".$counter];

mysql_query(" UPDATE tbl_menus_content SET title_read = '$title_read', description_read = '$description_read' WHERE order_='$counter' ",$con); }

for ($counter=1;$counter<=5;$counter++) {
$id = $_POST["order_".$counter];
mysql_query(" UPDATE tbl_menus_content SET order_='$counter' WHERE id='$id' ",$con); } }

header("location:../view_description?success=true"); } 
?>