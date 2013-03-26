<div id="address_form_province_caption" class="l_h_20 gillsans f_12 float_left w_100">
	Province
</div>
<div id="address_form_province_form" class="float_left styled-select b_all_solid float_left">
<select class="w_150" id="order_shipping_province" name="order_shipping_province" onchange="changeProvince(),checkInput2()">
	<?php
	include("../static/connect_database.php");
		echo '<option value="">--Select province--</option>';
		$country_name = $_GET["country"];
		$province = $_GET["province"];
		
		$get_country_id = mysql_query("
			SELECT * from delivery_countries	
			WHERE name = '$country_name'
		",$con);
		
		if (mysql_num_rows($get_country_id)!=null){
			$get_country_id_array = mysql_fetch_array($get_country_id);
			$country_id = $get_country_id_array["id"];
		}
		
		$province_sql = mysql_query("
			SELECT * from delivery_state
			WHERE country_id = '$country_id'
			ORDER BY id	
		",$con);
		
		
		if ($province == "" || $province==null){
			//$province = "DKI JAKARTA";
		}
		
		for ($country_counter=1;$country_counter<=mysql_num_rows($province_sql);$country_counter++){
			$province_array = mysql_fetch_array($province_sql);
			$province_name = $province_array["name"];
			echo '<option value="'.$province_name.'"';
			if ($province==$province_name){ echo 'selected="selected"';}
			//else if($province==""&&$country_counter==1){ echo 'selected="selected"';}
			echo '>'.$province_name.'</option>';
		}
	?>
</select>
</div>
