<?php
	ini_set(’session.gc_maxlifetime’, 8*60*60);
	ini_set(‘session.gc_probability’,1);
	ini_set(‘session.gc_divisor’,1);
	
	/*
	$_SESSION["order_billing_first_name"] 
	$_SESSION["order_billing_last_name"] 
	$_SESSION["order_billing_email"] 
	$_SESSION["order_billing_phone"] 
	$_SESSION["order_shipping_first_name"] 
	$_SESSION["order_shipping_last_name"] 
	$_SESSION["order_shipping_phone"] 
	$_SESSION["order_shipping_address"] 
	$_SESSION["order_shipping_country"] 
	$_SESSION["order_shipping_province"] 
	$_SESSION["order_shipping_city"] 
	$_SESSION["order_shipping_postal_code"] 
	$_SESSION["order_gift_flag"] 
	$_SESSION["order_gift_message"] 
	$_SESSION["order_payment_method"] 
	$_SESSION["order_purchase_amount"]
	$_SESSION["order_shipping_amount"] ;
	$_SESSION["order_total_amount"] 
	$_SESSION["shopping_bag_counter"]
	$_SESSION["user_id"]
	$_SESSION["user_status"]
	$_SESSION["bag_id"]
	$_SESSION["last_order_id"] when the order is stored in database and the order id is created, create this also, for sign up purpose
	
	
	array
	$_SESSION["type_id"]
	$_SESSION["stock_name"]
	$_SESSION["item_quantity"]
	$_SESSION["item_price"]
	
	*/
?>