<?php
$order_data = mysql_query("
	SELECT * from tbl_user
	WHERE user_id = '$user_id'
",$con);


	$order_data_array = mysql_fetch_array($order_data);
	//$order_id = $order_data_array["order_id"];
	
	$user_status = $order_data_array["user_status"];
	
	
	
	$user_first_name = $order_data_array["user_first_name"];
	$user_last_name = $order_data_array["user_last_name"];
	$user_email = $order_data_array["user_email"];
	$user_phone = $order_data_array["user_phone"];
	
	$user_phone = $order_data_array["user_phone"];
	$user_address = $order_data_array["user_address"];
	$user_country = $order_data_array["user_country"];
	$user_province = $order_data_array["user_province"];
	$user_city = $order_data_array["user_city"];
	$user_postal_code = $order_data_array["user_postal_code"];
	
	
	$item_data = mysql_query("
		SELECT * from tbl_user_purchase
		WHERE user_id = '$user_id'
		ORDER BY order_id DESC
	",$con);
	
	if (mysql_num_rows($item_data)!=null){
		$order_id = array();
		$order_date = array();
		$order_number = array();
		$order_total_amount = array();
		$order_total_amount_raw = array();
		$order_status = array();
		$order_shipping_number = array();
		
		
		$item_data_array = mysql_fetch_array($item_data);
		
		$total_item = mysql_num_rows($item_data);
		
		for ($item_data_counter=0;$item_data_counter<mysql_num_rows($item_data);$item_data_counter++){
			
			$current_order_id = $item_data_array["order_id"];
			
			array_push($order_id,$current_order_id);
			
			
			
			
			//image
			$get_order = mysql_query("
				SELECT * from tbl_order
				WHERE order_id = '$current_order_id' 
				
			",$con);
			
			if (mysql_num_rows($get_order)!=null){
				$get_order_array = mysql_fetch_array($get_order);
				$order_date_format = date('M j, Y',strtotime($get_order_array["order_date"]));
				
				array_push($order_date,$order_date_format);
				array_push($order_number,$get_order_array["order_number"]);
				array_push($order_total_amount_raw,$get_order_array["order_total_amount"]);
				
				array_push($order_total_amount,number_format($get_order_array["order_total_amount"],0,',','.'));
				array_push($order_status,$get_order_array["order_status"]);
				array_push($order_shipping_number,$get_order_array["order_shipping_number"]);
			}
			else{
				array_push($order_date," ");
				array_push($order_number," ");
				array_push($order_total_amount_raw," ");
				array_push($order_total_amount," ");
				array_push($order_status," ");
				array_push($order_shipping_number," ");
			}
			
			
			
			$item_data_array = mysql_fetch_array($item_data);
			
		}
	}
?>