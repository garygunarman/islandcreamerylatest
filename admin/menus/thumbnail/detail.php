<?php
session_start();
if ($_SESSION["user_status"]!="admin") {
	header("location:../login.php?redirect=orders"); }
	else {
		$prefix="../../";
		$id_thumbnail=$_GET["id_thumbnail"];
		$title_thumbnail=$_GET["title_thumbnail"];
		include($prefix."../static/connect_database.php");
		
		$get_list =mysql_query("SELECT * from tbl_menus_thumbnail WHERE id_thumbnail = '$id_thumbnail' ORDER BY order_",$con);

if (mysql_num_rows($get_list)!=null) {
	$get_list_array=mysql_fetch_array($get_list);
	$filename_thumbnail = $get_list_array["filename_thumbnail"]; }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$page_title = " | ".$title_thumbnail;
include($prefix."static/page_head.php");
?>
<script type="text/javascript" src="<?php echo $prefix;?>script/thumbnail_detail.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/general.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>../script/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/general.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/thumbnail_detail.css" />
<?php include($prefix."../static/google_track.php"); ?>
</head>

<body onload="">
<?php include($prefix."static/header.php");?>
<form method="post" id="thumb_form" action="update_detail.php" enctype="multipart/form-data">
  <div id="page_title_bar">
    <div id="page_title_bar_fill">
      <div id="page_title"> <a href="../thumbnail">
        <input type="button" class="back_button left_ black_tiny_button tiny_button" value="" />
        </a><?php echo $title_thumbnail;?></div>
      <div id="button_bar">
        <input type="button" onclick="uploadSubmit()" id="submit_button" class="save_button image_button right_ h26_button green_button button" value="Save Changes">
        <input type="button" onclick="deleteColor()" class="delete_button image_button right_ h26_button red_button button" value="Delete">
        <input type="hidden" name="id_thumbnail" value="<?php echo $id_thumbnail;?>" />
        <input type="hidden" name="status" value="<?php echo $status;?>" />
        <input type="hidden" name="action" id="action" value="" />
      </div>
    </div>
  </div>
  <div class="main_body">
    <div class="fill_container">
      <div class="fill_group">
        <div class="fill_row">
          <div class="fill_label">Thumbnails Name <font color="#d82424">*</font></div>
          <div class="form_1_auto">
            <input type="text" class="fill_text_box" id="title_thumbnail" name="title_thumbnail" value="<?php echo $title_thumbnail;?>" />
          </div>
        </div>
        
		<?php
		echo '<div class="image_row fill_row" id="" onClick="">';

		echo '<div class="image_preview">';
		if ($filename_thumbnail!=null) {
		echo '<img class="the_image_preview" src="'.$prefix."../".$filename_thumbnail.'" />'; }
		echo '</div>';

		echo '<div class="form_1_auto">';
		echo '<div class="fill_row">';
		echo '<div class="fill_label_image">Image <br/><i style="font-size:11px">(304 x 200 px transparent .PNG)</i></div> ';
		echo '<input type="button" class="left_ h22_button grey_button button" value="Browse File" onClick="selectFile(\'image_file_\')" />';

		echo '<div class="form_5_auto">';
		echo '<input type="text" class="fill_text_box_file" id="image_filename_thumbnail_" name="" value="'.$filename_thumbnail.'" />';
		echo '</div>';

		echo '</div>';
		echo '</div>';

		echo '<input type="file" class="fill_file" id="image_file_" name="image_file_" onChange="this.form.image_filename_thumbnail_.value = this.value;"/>';
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