<div id="sidebar_account">
	<?php
	$get_img = mysql_query("
		SELECT * from tbl_info
		WHERE parameter = 'account_image'
		
	",$con);
	
	if (mysql_num_rows($get_img)!=null){
		$get_img_array = mysql_fetch_array($get_img);
		$account_image = $prefix.$get_img_array["value"];
	}
	?>
	
	<img id="account_image" src="<?php echo $account_image;?>" />	
</div>