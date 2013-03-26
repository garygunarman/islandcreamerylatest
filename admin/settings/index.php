<?php session_start();
if ($_SESSION["user_status"]!="admin") {
	header("location:../login.php?redirect=settings"); }
	else {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $prefix="../";?>
<head>
<?php
$page_title = " Setting";
include($prefix."static/page_head.php");
?>
<script type="text/javascript" src="<?php echo $prefix;?>script/general.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>../script/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/general.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/setting.css" />
<?php
include($prefix."../static/google_track.php");
include($prefix."../static/connect_database.php");
?>
</head>

<body onload="">
<?php include($prefix."static/header.php");?>
<form method="post" action="update.php" enctype="multipart/form-data">
  <div id="page_title_bar">
    <div id="page_title_bar_fill">
      <div id="page_title">Settings</div>
      <div id="button_bar">
        <input type="submit" class="save_button image_button right_ h26_button green_button button" value="Save Changes">
      </div>
    </div>
  </div>

<?php
$get_data = mysql_query("SELECT * from tbl_info",$con);
$info = array();

if (mysql_num_rows($get_data)!=null) {
	for ($counter=0;$counter<mysql_num_rows($get_data);$counter++) {
		$get_data_array = mysql_fetch_array($get_data);
		$parameter = $get_data_array["parameter"];
		$info[$parameter] = $get_data_array["value"]; }	}
?>
  <div class="main_body">
    <div class="fill_container">
      <div class="fill_group">
        <div class="fill_row">
          <div class="fill_title">Settings</div>
        </div>

<?php
echo		'<div class="fill_row">';
echo			'<div class="fill_label">URL</div>';

echo			'<div class="form_2_auto">';
echo				'<input type="text" class="fill_text_box" id="url" name="url" value="'.$info["url"].'" />';

echo			'</div>';
echo		'</div>';

echo		'<div class="fill_row">';
echo			'<div class="fill_label">Email</div>';

echo			'<div class="form_2_auto">';
echo				'<input type="text" class="fill_text_box" id="email" name="email" value="'.$info["email"].'" />';

echo			'</div>';
echo		'</div>';

echo		'<div class="fill_row">';
echo			'<div class="fill_label">Website Name</div>';

echo			'<div class="form_2_auto">';
echo				'<input type="text" class="fill_text_box" id="website_name" name="website_name" value="'.$info["website_name"].'" />';

echo			'</div>';
echo		'</div>';

echo		'<div class="fill_row">';
echo			'<div class="fill_label">Address</div>';

echo			'<div class="form_2_auto">';
echo				'<textarea class="fill_text_area" id="address" name="address">'.$info["address"].'</textarea>';

echo			'</div>';
echo 		'<div class="void_row"></div>';
echo		'</div>';
?>

        <div class="void_row"></div>
      </div>
    </div>
  </div>
</form>

<?php include($prefix."static/footer.php");?>

</body>
</html>

<?php } ?>