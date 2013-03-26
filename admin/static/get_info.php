<?php
$info_data = mysql_query("
	SELECT * from tbl_info
	WHERE parameter = 'url'
",$con);



if (mysql_num_rows($info_data)!=null){
	
		$info_data_array = mysql_fetch_array($info_data);
		$general_url=$info_data_array["value"];
	
}

$info_data = mysql_query("
	SELECT * from tbl_info
	WHERE parameter = 'email'
",$con);



if (mysql_num_rows($info_data)!=null){
	
		$info_data_array = mysql_fetch_array($info_data);
		$general_email=$info_data_array["value"];
	
}

?>