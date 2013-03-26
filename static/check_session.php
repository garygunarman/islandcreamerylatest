<?php
if ($_SESSION["user_status"]==null){
		
		$_SESSION["user_status"]="guest";
		
		$_SESSION["type_id"] = array();
		$_SESSION["stock_name"] = array();
		$_SESSION["item_quantity"] = array();
		$_SESSION["item_price"]= array();
		$_SESSION["item_gender"]= array();
		$_SESSION["shopping_bag_counter"]= 0;
		
		$_SESSION["wish_type_id"] = array();
		$_SESSION["wish_stock_name"] = array();
		$_SESSION["wish_item_quantity"] = array();
		$_SESSION["wish_item_price"]= array();
		$_SESSION["wish_item_gender"]= array();
		$_SESSION["wish_counter"]= 0;
}


?>