<?php
$account_data = mysql_query("
	SELECT * from tbl_account
	ORDER BY id
",$con);

$account_bank_array = array();
$account_number_array = array();
$account_name_array = array();

if (mysql_num_rows($account_data)!=null){
	for ($counter=0;$counter<mysql_num_rows($account_data);$counter++){
		$account_data_array = mysql_fetch_array($account_data);
		$account_bank_array[$counter]=$account_data_array["account_bank"];
		$account_number_array[$counter]=$account_data_array["account_number"];
		$account_name_array[$counter]=$account_data_array["account_name"];
	}
}

?>