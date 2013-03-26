<?php 
session_start();
if ($_SESSION["user_status"]!="admin") {
	header("location:../login.php?redirect=thumbnail"); }
	else {
		$action=$_POST["action"];
		include("../../../static/connect_database.php");
		
		$id_array = array();
		$id_array = $_POST["id_"];		
		$url=$_POST["url"];
		$page=$_POST["page"];
		$query_per_page=$_POST["query_per_page"];
		$search=$_POST["search"];
		$sort_by=$_POST["sort_by"];
		$category_id = $_POST["category_id"];
		
		//print_r($id_array);
		
		$action = $_POST["action"];
		
		//echo $action;
		
if($action=="delete") {
	foreach ($id_array as $id_thumbnail) {
		mysql_query("DELETE from tbl_menus_thumbnail WHERE id_thumbnail = '$id_thumbnail'",$con); } }
else if ($action=="save order") {
			
			for ($counter=1;
			$_POST["order_".$counter]!=null;$counter++) {
				$id_thumbnail = $_POST["order_".$counter];
				$order = $_POST["order_".$counter];				
				mysql_query("UPDATE tbl_menus_thumbnail SET order_='$counter' WHERE id_thumbnail='$id_thumbnail'",$con); } }
				
				header("location:".$url."?success=true&page=".$page."&query_per_page=".$query_per_page."&sort_by=".$sort_by."&search=".$search); }
?>