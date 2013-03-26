<?php 
session_start();
if ($_SESSION["user_status"]!="admin") {
header("location:../login.php?redirect=about"); }
else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $prefix="../";?>
<head>
<?php
$page_title = " | About Us";
include($prefix."static/page_head.php");
?>
<script type="text/javascript" src="<?php echo $prefix;?>script/about.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/general.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>../script/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/general.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/about.css" />
<?php
include($prefix."../static/google_track.php");
include($prefix."../static/connect_database.php");
?>
</head>
<body onload="">
<?php include($prefix."static/header.php");?>
<form method="post" action="../../admin/about/update.php" enctype="multipart/form-data">
  <div id="page_title_bar">
    <div id="page_title_bar_fill">
      <div id="page_title">About Us</div>
      <div id="button_bar">
        <input type="submit" class="save_button image_button right_ h26_button green_button button" value="Save Changes">
      </div>
    </div>
  </div>
  <?php
$get_data = mysql_query("SELECT * from tbl_about WHERE type = 'description'",$con);
if (mysql_num_rows($get_data)!=null) {
$get_data_array = mysql_fetch_array($get_data);
$description = $get_data_array["fill"]; }
?>
  <div class="main_body">
    <div class="fill_container">
      <div class="fill_group">
        <div class="fill_row">
          <div class="fill_title">About Us</div>
        </div>
        <div class="fill_row">
          <div class="fill_label">Description</div>
          <div class="form_1_auto">
            <?php
// Include the CKEditor class.
include_once $prefix."ckeditor/ckeditor.php";
// Create a class instance.
$CKEditor = new CKEditor();
$config['toolbar'] = 'abouttoolbar';
// Path to the CKEditor directory.
$CKEditor->basePath = $prefix.'ckeditor/';
//CKFinder::SetupCKEditor($CKEditor, $prefix.'ckfinder/');
// Replace a textarea element with an id (or name) of "textarea_id".
$CKEditor->editor("description", $description, $config, $events);
?>
          </div>
        </div>
        <div class="void_row"></div>
      </div>
    </div>
  </div>
</form>
<?php include($prefix."static/footer.php");?>
</body>
</html>
<?php } ?>
