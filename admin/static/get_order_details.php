<?php

$order_data = mysql_query("
	SELECT * from tbl_order
	WHERE order_number = '$order_number'
",$con);


	$order_data_array = mysql_fetch_array($order_data);
	$order_id = $order_data_array["order_id"];
	
	$order_status = $order_data_array["order_status"];
	
	$order_payment_method = $order_data_array["order_payment_method"];
	$order_purchase_amount = number_format($order_data_array["order_purchase_amount"],0,',','.');
	$order_shipping_amount = number_format($order_data_array["order_shipping_amount"],0,',','.');
	$order_voucher_value = number_format($order_data_array["order_voucher_value"],0,',','.');
	$order_total_amount = number_format($order_data_array["order_total_amount"],0,',','.');
	$order_purchase_amount_raw = $order_data_array["order_purchase_amount"];
	$order_shipping_amount_raw = $order_data_array["order_shipping_amount"];
	$order_total_amount_raw = $order_data_array["order_total_amount"];
	$order_voucher_value_raw = $order_data_array["order_voucher_value"];
	
	
	$order_shipping_number = $order_data_array["order_shipping_number"];
	
	$order_billing_first_name = $order_data_array["order_billing_first_name"];
	$order_billing_last_name = $order_data_array["order_billing_last_name"];
	$order_billing_email = $order_data_array["order_billing_email"];
	$order_billing_phone = $order_data_array["order_billing_phone"];
	$order_shipping_first_name = $order_data_array["order_shipping_first_name"];
	$order_shipping_last_name = $order_data_array["order_shipping_last_name"];
	$order_shipping_phone = $order_data_array["order_shipping_phone"];
	$order_shipping_address = $order_data_array["order_shipping_address"];
	$order_shipping_country = $order_data_array["order_shipping_country"];
	$order_shipping_province = $order_data_array["order_shipping_province"];
	$order_shipping_city = $order_data_array["order_shipping_city"];
	$order_shipping_postal_code = $order_data_array["order_shipping_postal_code"];
	
	$order_gift_flag = $order_data_array["order_gift_flag"];
	$order_gift_message = $order_data_array["order_gift_message"];
	
	$item_data = mysql_query("
		SELECT * from tbl_order_item
		WHERE order_id = '$order_id'
		ORDER BY item_id
	",$con);
	
	if (mysql_num_rows($item_data)!=null){
		$item_size = array();
		$item_image_source = array();
		$item_code = array();
		$item_price = array();
		$item_price_raw = array();
		$item_name = array();
		$item_quantity = array();
		$item_id = array();
		$item_gender = array();
		
		$item_data_array = mysql_fetch_array($item_data);
		
		$total_item = mysql_num_rows($item_data);
		
		for ($item_data_counter=0;$item_data_counter<mysql_num_rows($item_data);$item_data_counter++){
			
			$type_id = $item_data_array["type_id"];
			
			array_push($item_id,$type_id);
			
			//size, quantity, gender
			array_push($item_size,$item_data_array["stock_name"]);
			array_push($item_quantity,$item_data_array["item_quantity"]);
			array_push($item_gender,$item_data_array["item_gender"]);
			
			$current_gender = $item_data_array["item_gender"];
			
			
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
				array_push($item_image_source,"0`");
			}
			
			//name, code, price
			$product_type = mysql_query("
				SELECT type_code,type_name,type_price,product_id,type_sale,type_sale_amount from tbl_product_type
				WHERE type_id = '$type_id'
			",$con);
			
			if (mysql_num_rows($product_type)!=null){
				$product_type_array = mysql_fetch_array($product_type);
				$item_first_name = $product_type_array["type_name"];
				$product_id=$product_type_array["product_id"];
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
				SELECT product_name from tbl_product
				WHERE id = '$product_id'
			",$con);
			
			if (mysql_num_rows($product)!=null){
				$product_array = mysql_fetch_array($product);
				
				array_push($item_name,$product_array["product_name"]." ".$item_first_name);
				
			}
			else{
				
				array_push($item_name,"0");
				
			}
			
			$item_data_array = mysql_fetch_array($item_data);
			
		}
	}

?>