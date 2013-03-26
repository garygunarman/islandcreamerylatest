<?php
$get_type = mysql_query("
	SELECT * from tbl_product_type
	WHERE product_id='$product_id'	
",$con);
if (mysql_num_rows($get_type)!=null){
	
	for ($counter=1;$counter<=mysql_num_rows($get_type);$counter++){
		$get_type_array = mysql_fetch_array($get_type);
		$type_id = $get_type_array["type_id"];
		
		$check = mysql_query("
			SELECT * from tbl_product_stock AS stock INNER JOIN tbl_size AS size
			ON stock.stock_name = size.size_name
			WHERE type_id='$type_id' AND stock_sold_out='0' AND size_type_id='$size_type_id'

		",$con);
		if (mysql_num_rows($check)==null){
			mysql_query("
				UPDATE tbl_product_type
				SET type_sold_out = '1'
				WHERE type_id = '$type_id'
			",$con);
		}
		else{
			mysql_query("
				UPDATE tbl_product_type
				SET type_sold_out = '0'
				WHERE type_id = '$type_id'
			",$con);	
		}
	}
	
	$check2 = mysql_query("
		SELECT * from tbl_product_type
		WHERE product_id='$product_id' AND type_sold_out='0'	
	",$con);
	if (mysql_num_rows($check2)==null){
		mysql_query("
			UPDATE tbl_product
			SET product_sold_out = '1'
			WHERE id = '$product_id'
		",$con);
	}
	else{
		mysql_query("
			UPDATE tbl_product
			SET product_sold_out = '0'
			WHERE id = '$product_id'
		",$con);	
	}
	
}


	

?>