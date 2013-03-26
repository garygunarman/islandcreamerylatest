<?php
$info_data = mysql_query("
	SELECT * from tbl_info
	ORDER BY id
",$con);

$info = array();


if (mysql_num_rows($info_data)!=null){
	for ($counter=0;$counter<mysql_num_rows($info_data);$counter++){
		$info_data_array = mysql_fetch_array($info_data);
		$parameter = $info_data_array["parameter"];
		$info[$parameter]=$info_data_array["value"];
		
	}
}

?>