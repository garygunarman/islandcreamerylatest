<?php session_start();
if ($_SESSION["user_status"]!="admin") {
	header("location:../../login.php?redirect=description"); }
	else {
		$prefix="../../../";
		include($prefix."../static/connect_database.php");
		
$get_data = mysql_query("SELECT * from tbl_menus_content ORDER BY order_",$con);
$filename = array();
$title_read = array();
$description_read = array();
$order = array();

if (mysql_num_rows($get_data)!=null) {
	for ($counter=1;$counter<=mysql_num_rows($get_data);$counter++) {
		$get_data_array = mysql_fetch_array($get_data);
		$id[$counter]=$get_data_array["id"];
		$filename[$counter]=$get_data_array["filename"];
		$file[$counter]=$prefix."../".$get_data_array["filename"];
		$title_read[$counter]=$get_data_array["title_read"];
		$description_read[$counter]=$get_data_array["description_read"]; } }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$page_title = " Home | Menus";
include($prefix."static/page_head.php");
?>
<script type="text/javascript" src="<?php echo $prefix;?>script/menus_description.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/general.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>../script/jquery.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/ui/jquery.ui.mouse.js"></script>
<!--
<script type="text/javascript" src="<?php echo $prefix;?>script/ui/jquery.ui.sortable.js"></script>
<script>
$(function() {
$( "#sortable" ).sortable();
$( "#sortable" ).disableSelection();
});
</script>
-->
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/general.css" />
<?php include($prefix."../static/google_track.php"); ?>
</head>
<body onload="initializationSidebar(),adjustSidebar()">
<?php include($prefix."static/header.php");?>
<form id="image_form" method="post" action="update.php" enctype="multipart/form-data">
  <div id="page_title_bar">
    <div id="page_title_bar_fill">
      <div id="page_title">Menus</div>
      <div id="button_bar"> <a href="<?php echo $prefix;?>menus/description/add_description">
        <input type="button" id="add_color_button" class="add_button image_button right_ h26_button green_button button" value="Add More">
        </a>
        <input type="button" id="submit_button" onclick="saveAll()" class="save_button image_button right_ h26_button green_button button" value="Save Changes">
        <input type="button" onclick="deleteSlideshow()" class="delete_button image_button right_ h26_button red_button button" value="Delete">
      </div>
    </div>
  </div>
  <div class="main_body" id="adjust">
    <div>
      <div class="admin_panelr hidden">
        <div class="panel_menu_right" id="button_panel_menu_right">
          <input type="submit" class="right_ green_tiny_button tiny_button" id="go_button" value="GO" onclick="submitForm('sortable')"/>
        </div>
        <div class="panel_menu_right">
          <input type="hidden" name="action" id="action" value="">
        </div>
        <div class="panel_label_right">Actions</div>
      </div>
      <div class="fill_container">
        <div class="fill_group">
          <ul id="sortable">
            <?php
for ($counter=1;$counter<=mysql_num_rows($get_data);$counter++) {
echo '<li list_id="'.$id[$counter].'">';
echo '  <div class="image_row fill_row" id="row_'.$counter.'" onclick="selectRowImage('.$counter.')">';
echo '    <input type="checkbox" name="id_[]" value="'.$id[$counter].'" id="check_'.$counter.'" class="hidden" onmouseover="downCheck()" onmouseout="upCheck()" onclick="selectRowCheck('.$counter.')"/>';

echo		'<div class="fill_row">';
echo			'<div class="fill_label">Title</div>';

echo			'<div class="form_2_auto">';
echo				'<input type="text" class="fill_text_box" id="title_read_'.$counter.'" name="title_read_'.$counter.'" value="'.$title_read[$counter].'" />';

echo			'</div>';
echo		'</div>';

echo		'<div class="fill_row">';
echo			'<div class="fill_label">Description</div>';

echo			'<div class="form_2_auto">';
echo				'<textarea class="fill_text_area" id="description_read_'.$counter.'" name="description_read_'.$counter.'">'.$description_read[$counter].'</textarea>';
echo			'</div>';

echo 		'<div class="void_row"></div>';
echo		'</div>';
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
