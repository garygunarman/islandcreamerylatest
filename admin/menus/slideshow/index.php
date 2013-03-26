<?php session_start();
if ($_SESSION["user_status"]!="admin") {
	header("location:../login.php?redirect=home"); }
	else {
		$prefix="../../";
		include($prefix."../static/connect_database.php");
		
$get_data = mysql_query("SELECT * from tbl_menus ORDER BY order_",$con);
$filename = array();
$title = array();
$description = array();
$order = array();

if (mysql_num_rows($get_data)!=null) {
	for ($counter=1;$counter<=mysql_num_rows($get_data);$counter++) {
		$get_data_array = mysql_fetch_array($get_data);
		$id[$counter]=$get_data_array["id"];
		$filename[$counter]=$get_data_array["filename"];
		$file[$counter]=$prefix."../".$get_data_array["filename"];
		$title[$counter]=$get_data_array["title"];
		$description[$counter]=$get_data_array["description"]; } }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$page_title = " Home | Slideshow";
include($prefix."static/page_head.php");
?>
<script type="text/javascript" src="<?php echo $prefix;?>script/menus_slideshow.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/general.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>../script/jquery.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/ui/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/ui/jquery.ui.sortable.js"></script>
<script>
$(function() {
$( "#sortable" ).sortable();
$( "#sortable" ).disableSelection();
});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/general.css" />
<?php include($prefix."../static/google_track.php"); ?>
</head>

<body onload="initializationSidebar(),adjustSidebar()">
<?php include($prefix."static/header.php");?>
<form id="image_form" method="post" action="update.php" enctype="multipart/form-data">
<div id="page_title_bar">
  <div id="page_title_bar_fill">
    <div id="page_title">Menus</div>
    <div id="button_bar">
      <input type="button" id="submit_button" onclick="saveAll()" class="save_button image_button right_ h26_button green_button button" value="Save Changes">
      <input type="button" onclick="deleteSlideshow()" class="delete_button image_button right_ h26_button red_button button" value="Delete">
    </div>
  </div>
</div>

<div class="main_body" id="adjust"> <div>

<div class="admin_panelr hidden">
  <div class="panel_menu_right" id="button_panel_menu_right">
    <input type="submit" class="right_ green_tiny_button tiny_button" id="go_button" value="GO" onclick="submitForm('sortable')"/>
  </div>
  <div class="panel_menu_right">
    <input type="hidden" name="action" id="action" value="">
  </div>
  <div class="panel_label_right">Actions</div>
</div>

<div class="fill_container" >
<div class="fill_group">

<div class="fill_row">
  <div class="fill_title">Menus Image Slideshow</div>
  <div class="image_size">(580 x 280 px)</div>
</div>

<ul id="sortable">
<?php
for ($counter=1;$counter<=5;$counter++) {
echo '<li list_id="'.$id[$counter].'">';
echo '  <div class="image_row fill_row" id="row_'.$counter.'" onclick="selectRowImage('.$counter.')">';
echo '    <input type="checkbox" name="id_[]" value="'.$id[$counter].'" id="check_'.$counter.'" class="hidden" onmouseover="downCheck()" onmouseout="upCheck()" onclick="selectRowCheck('.$counter.')"/>';
echo '    <div class="image_preview">';

if ($file[$counter]!=null) {
echo '<img class="the_image_preview" src="'.$file[$counter].'" />'; }
echo '</div>';

echo '    <div class="form_3_auto">';
echo '      <div class="fill_row">';
echo '        <div class="fill_label_image">Image</div>';
echo '        <input type="button" class="left_ h22_button grey_button button" value="Browse File" onclick="selectFile(\'image_file_'.$counter.'\')" />';
echo '        <div class="form_5_auto">';
echo '          <input type="text" class="fill_text_box_file" id="image_filename_'.$counter.'" name="" value="'.$filename[$counter].'" />';
echo '</div>';
echo '</div>';

echo '      <div class="fill_row">';
echo '        <div class="fill_label_image">Title</div>';
echo '        <div class="form_4_auto">';
echo '          <input type="text" class="fill_text_box" id="title_'.$counter.'" name="title_'.$counter.'" value="'.$title[$counter].'" />';
echo '</div>';
echo '</div>';

echo '      <div class="fill_row">';
echo '        <div class="fill_label_image">Description</div>';
echo '        <div class="form_4_auto">';
echo '          <input type="text" class="fill_text_box" id="description_'.$counter.'" name="description_'.$counter.'" value="'.$description[$counter].'" />';
echo '</div>';
echo '</div>';

echo '</div>';
echo '    <input type="file" class="fill_file" id="image_file_'.$counter.'" name="image_file_'.$counter.'" onchange="this.form.image_filename_'.$counter.'.value = this.value;"/>';
echo '    <div class="void_row"></div>';
echo '</div>';
echo '</li>'; }
?>
</ul>

<div class="void_row"> </div>
</div>
</div>
</div>
</div>

<?php
for ($counter=1;$counter<=5;$counter++) {
echo '<input type="hidden" id="order_'.$counter.'" name="order_'.$counter.'" />'; }
?>
</form>
<?php include($prefix."static/footer.php");?>
</body>
</html>
<?php } ?>