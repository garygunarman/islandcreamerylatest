<?php 
session_start();
if ($_SESSION["user_status"]!="admin") {
header("location:../../login.php?redirect=locations"); }
else {
$prefix="../";
$id=$_GET["id"];
$title=$_GET["title"];
include($prefix."../static/connect_database.php");

$get_info = mysql_query("SELECT * from tbl_locations WHERE id = '$id'",$con);

if (mysql_num_rows($get_info)!=null) {
$get_info_array = mysql_fetch_array($get_info);
$title = $get_info_array["title"];
$address = $get_info_array["address"];
$phone = $get_info_array["phone"];
$opening_hours = $get_info_array["opening_hours"];
$link = $get_info_array["link"];
$filename = $get_info_array["filename"]; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php ?>
<head>
<?php
$page_title = " Locations Detail | ".$title;
include($prefix."static/page_head.php");
?>
<script type="text/javascript" src="<?php echo $prefix;?>script/add_locations.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/general.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>../script/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/general.css" />
<?php include($prefix."../static/google_track.php"); ?>
</head>
<body onload="">
<?php include($prefix."static/header.php");?>
<form method="post" id="locations_form" action="update_detail.php" enctype="multipart/form-data">
  <div id="page_title_bar">
    <div id="page_title_bar_fill">
      <div id="page_title"><a href="../locations">
        <input type="button" class="back_button left_ black_tiny_button tiny_button" value="" />
        </a><?php echo $title;?></div>
      <div id="button_bar">
        <input type="button" onclick="uploadSubmit()" id="submit_button" class="save_button image_button right_ h26_button green_button button" value="Save Changes">
        <input type="button" onclick="deleteLocations()" class="delete_button image_button right_ h26_button red_button button" value="Delete">
        <input type="hidden" name="id" value="<?php echo $id;?>" />
        <input type="hidden" name="status" value="<?php echo $status;?>" />
        <input type="hidden" name="action" id="action" value="" />
      </div>
    </div>
  </div>
  <div class="main_body">
    <div class="fill_container">
      <div class="fill_group">
        <div class="fill_row">
          <div class="fill_label">Title <font designer="#d82424">*</font></div>
          <div class="form_1_auto">
            <input type="text" class="fill_text_box" id="title" name="title" value="<?php echo $title;?>" />
          </div>
        </div>

        <div class="fill_row">
          <div class="fill_label">Address <font designer="#d82424">*</font></div>
          <div class="form_1_auto">
            <textarea class="fill_text_area" id="address" name="address"><?php echo $address;?></textarea>
          </div>
		<div class="void_row"></div>
        </div>
		
        <div class="fill_row">
          <div class="fill_label">Phone <font designer="#d82424">*</font></div>
          <div class="form_1_auto">
            <input type="text" class="fill_text_box" id="phone" name="phone" value="<?php echo $phone;?>" />
          </div>
        </div>
		
		
        <div class="fill_row">
          <div class="fill_label">Opening Hours <font designer="#d82424">*</font></div>
          <div class="form_1_auto">
            <textarea class="fill_text_area" id="opening_hours" name="opening_hours"><?php echo $opening_hours;?></textarea>
			
          </div>
		<div class="void_row"></div>
        </div>
		
        <div class="fill_row">
          <div class="fill_label">Link <font designer="#d82424">*</font></div>
          <div class="form_1_auto">
            <input type="text" class="fill_text_box" id="link" name="link" value="<?php echo $link;?>" />
          </div>
        </div>		
		
<?php
echo '<div class="image_row fill_row" id="" onclick="">';
echo '<div class="image_preview">';
if ($filename!=null) {
echo '<img class="the_image_preview" src="'.$prefix."../".$filename.'" />'; }
echo '</div>';

echo '<div class="form_1_auto">';
echo '<div class="fill_row">';
echo '<div class="fill_label_image">Image <br/></div> ';
echo '<input type="button" class="left_ h22_button grey_button button" value="Browse File" onclick="selectFile(\'filename\')" />';
echo '<div class="form_5_auto">';
echo '<input type="text" class="fill_text_box_file" id="filename_" name="" value="'.$filename.'" />';
echo '</div>';
echo '</div>';
echo '</div>';

echo '<input type="file" class="fill_file" id="filename" name="filename" onchange="this.form.filename.value = this.value;"/>';
echo '<div class="void_row"></div>';
echo '</div>';
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
