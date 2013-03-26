<?php

$bag_data = mysql_query("
	SELECT * from tbl_wish_list
	WHERE bag_id = '$wish_id'
",$con);


	$bag_data_array = mysql_fetch_array($bag_data);
	
	
	
	$wish_counter = $bag_data_array["bag_counter"];
	
	
	$item_data = mysql_query("
		SELECT * from tbl_wish_list_item
		WHERE bag_id = '$wish_id'
		ORDER BY item_id
	",$con);
	
	if (mysql_num_rows($item_data)!=null){
		$wish_item_id = array();
		$item_size = array();
		$item_image_source = array();
		$item_code = array();
		$item_price = array();
		$item_price_raw = array();
		$item_name = array();
		$item_sold_out = array();
		
		$designer_name = array();
		$item_product_name = array();
		$item_type_name = array();
		$item_quantity = array();
		$item_id = array();
		$item_gender = array();
		$product_id_array = array();
		
		$item_data_array = mysql_fetch_array($item_data);
		
		$total_item = mysql_num_rows($item_data);
		
		for ($item_data_counter=0;$item_data_counter<mysql_num_rows($item_data);$item_data_counter++){
			
			
			array_push($wish_item_id,$item_data_array["item_id"]);
			
			$type_id = $item_data_array["type_id"];
			
			
			array_push($item_id,$type_id);
			
			//size, quantity, gender
			array_push($item_size,$item_data_array["stock_name"]);
			array_push($item_quantity,$item_data_array["item_quantity"]);
			array_push($item_gender,$item_data_array["item_gender"]);
			
			$current_gender = $item_data_array["item_gender"];
			
			$current_quantity = $item_data_array["item_quantity"];
			
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
					$total_weight = $total_weight +  ($current_quantity*$current_type_weight);
					
					
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
			
			//stock
			$item_size_ = $item_data_array["stock_name"];
			
			$product_stock = mysql_query("
				SELECT stock_sold_out from tbl_product_stock
				WHERE type_id = '$type_id' AND stock_name='$item_size_'
			",$con);

			if (mysql_num_rows($product_stock)!=null){
				$product_stock_array = mysql_fetch_array($product_stock);

					
				array_push($item_sold_out,$product_stock_array["stock_sold_out"]);
				
			}
			else{
				array_push($item_sold_out,1);
			}
			
			$product = mysql_query("
				SELECT product_name, designer_name from tbl_product AS product INNER JOIN tbl_designer AS designer
				ON product.designer_id = designer.designer_id
				WHERE id = '$product_id'
			",$con);
			
			if (mysql_num_rows($product)!=null){
				$product_array = mysql_fetch_array($product);
				
				array_push($item_name,$product_array["product_name"]." ".$item_first_name);
				array_push($designer_name,$product_array["designer_name"]);
				array_push($item_product_name,$product_array["product_name"]);
				array_push($item_type_name,$item_first_name);
			}
			else{
				
				array_push($item_name,"0");
				
			}
			
			$item_data_array = mysql_fetch_array($item_data);
			
		}
	}

?>