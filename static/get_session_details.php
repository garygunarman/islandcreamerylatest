<?php session_start();
	$shipping_method = $_SESSION["shipping_method"];


	$shopping_bag_counter = $_SESSION["shopping_bag_counter"];

	$order_payment_method = $_SESSION["order_payment_method"];
	if ($_SESSION["order_purchase_amount"]!=""){
		$order_purchase_amount = number_format($_SESSION["order_purchase_amount"],0,',','.');
	}
	if ($_SESSION["order_shipping_amount"]!=""){
	$order_shipping_amount = number_format($_SESSION["order_shipping_amount"],0,',','.');

	}
	
	if ($_SESSION["order_total_amount"]!=""){
	$order_total_amount = number_format($_SESSION["order_total_amount"],0,',','.');
	}
	
	
	$order_purchase_amount_raw = $_SESSION["order_purchase_amount"];
	$order_shipping_amount_raw = $_SESSION["order_shipping_amount"];
	$order_total_amount_raw = $_SESSION["order_total_amount"];
	if ($_SESSION["voucher_value"]!=null&&$_SESSION["voucher_value"]!=""){
		$order_voucher_value = $_SESSION["voucher_value"];
	}
	else{
		$order_voucher_value = 0;
	}
	
	$order_billing_first_name = $_SESSION["order_billing_first_name"];
	$order_billing_last_name = $_SESSION["order_billing_last_name"];
	$order_billing_email = $_SESSION["order_billing_email"];
	$order_billing_phone = $_SESSION["order_billing_phone"];
	$order_shipping_first_name = $_SESSION["order_shipping_first_name"];
	$order_shipping_last_name = $_SESSION["order_shipping_last_name"];
	$order_shipping_phone = $_SESSION["order_shipping_phone"];
	$order_shipping_address = $_SESSION["order_shipping_address"];
	$order_shipping_country = $_SESSION["order_shipping_country"];
	$order_shipping_province = $_SESSION["order_shipping_province"];
	$order_shipping_city = $_SESSION["order_shipping_city"];
	$order_shipping_postal_code = $_SESSION["order_shipping_postal_code"];
	
	$order_gift_flag = $_SESSION["order_gift_flag"];
	$order_gift_message = $_SESSION["order_gift_message"];
	
	
	$total_weight = 0;
	
		$item_size = array();
		$item_image_source = array();
		$item_code = array();
		$item_price = array();
		$item_price_raw = array(); //for calculation
		$item_name = array();
		$designer_name = array();
		$item_product_name = array();
		$item_type_name = array();
		$item_quantity = array();
		$item_id = array();
		$item_gender = array();
		$product_id_array = array();
		
		
		$total_item = $_SESSION["shopping_bag_counter"];
		
		
		
		for ($item_data_counter=0;$item_data_counter<$total_item;$item_data_counter++){
			
			$type_id = $_SESSION["type_id"][$item_data_counter];
			
			
			array_push($item_id,$type_id);
			
			//size, quantity, gender
			array_push($item_size,$_SESSION["stock_name"][$item_data_counter]);
			array_push($item_quantity,$_SESSION["item_quantity"][$item_data_counter]);
			array_push($item_gender,$_SESSION["item_gender"][$item_data_counter]);
			$current_quantity = $_SESSION["item_quantity"][$item_data_counter];
			$current_gender = $_SESSION["item_gender"][$item_data_counter];
			
			//echo $current_gender;
		
			//image
			$product_image = mysql_query("
				SELECT img_src from tbl_product_image
				WHERE type_id = '$type_id' AND image_order='1' AND image_type='$current_gender'
				
			",$con);
			
			if (mysql_num_rows($product_image)!=null){
				$product_image_array = mysql_fetch_array($product_image);
				array_push($item_image_source,$prefix.$product_image_array["img_src"]);
			}
			else{
				array_push($item_image_source,"0");
			}
			
			//name, code, price
			$product_type = mysql_query("
				SELECT type_weight,type_code,type_name,type_price,product_id,type_sale,type_sale_amount from tbl_product_type
				WHERE type_id = '$type_id'
			",$con);
			
			if (mysql_num_rows($product_type)!=null){
		
				$product_type_array = mysql_fetch_array($product_type);
				
				$current_type_weight = $product_type_array["type_weight"];
				$total_weight += $current_quantity*$current_type_weight;
				
				
				$item_first_name = $product_type_array["type_name"];
				$product_id=$product_type_array["product_id"];
				array_push($product_id_array,$product_type_array["product_id"]);
				array_push($item_code,$product_type_array["type_code"]);
				if ($product_type_array["type_sale"]!=1){
					array_push($item_price,number_format($product_type_array["type_price"],0,',','.'));
					array_push($item_price_raw,$product_type_array["type_price"]);
				}
				else{
					array_push($item_price,number_format($product_type_array["type_sale_amount"],0,',','.'));
					array_push($item_price_raw,$product_type_array["type_sale_amount"]);
				}
			}
			else{
				$item_first_name = "";
				$product_id="";
				array_push($item_code,"0");
				array_push($item_price,"0");
			}
			
			$product = mysql_query("
				SELECT product_name, designer_name from tbl_product AS product INNER JOIN tbl_designer AS designer
				ON product.designer_id = designer.designer_id
				WHERE id = '$product_id'
			",$con);
			
			if (mysql_num_rows($product)!=null){
				$product_array = mysql_fetch_array($product);
				
				array_push($item_name,$product_array["product_name"]." ".$item_first_name);
				array_push($item_product_name,$product_array["product_name"]);
				array_push($designer_name,$product_array["designer_name"]);
				array_push($item_type_name,$item_first_name);
			}
			else{
				
				array_push($item_name,"0");
				
			}
			
			
		}
	

?>