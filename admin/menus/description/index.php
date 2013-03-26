<?php 
session_start();
if ($_SESSION["user_status"]!="admin") {
header("location:../login.php?redirect=description"); }
else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $prefix="../../";?>
<head>
<?php
$page_title = " Menus";
include($prefix."static/page_head.php");
?>
<script type="text/javascript" src="<?php echo $prefix;?>script/general.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>../script/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/general.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/menu_description.css" />
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
      <div id="page_title">Menus</div>
      <div id="button_bar"> <a href="<?php echo $prefix;?>menus/description/view_description">
        
        </a>
        <input type="submit" class="save_button image_button right_ h26_button green_button button" value="Save Changes">
      </div>
    </div>
  </div>
  <?php
$get_menus = mysql_query("SELECT * from tbl_menus_info",$con); 
$menus = array(); 

if (mysql_num_rows($get_menus)!=null) {
	for ($counter=1;$counter<=mysql_num_rows($get_menus);$counter++) {
		$get_menus_array = mysql_fetch_array($get_menus);
		$type = $get_menus_array["type"];
		$menus[$type]=$get_menus_array["fill"]; 
	} 
}
?>
  <div class="main_body">
    <div class="fill_container">
      <div class="fill_group">
        
        
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
$CKEditor->editor("description", $menus['description'], $config, $events);
?>
          </div>
          <div class="void_row"></div>
        </div>
      </div>
	<!--
		<div class="fill_group">
	        <div class="fill_row">
	          <div class="fill_title">Cafe</div>
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
	$CKEditor->editor("cafe", $description['Cafe'], $config, $events);
	?>
	          </div>
	          <div class="void_row"></div>
	        </div>
	      </div>
	
		<div class="fill_group">
	        <div class="fill_row">
	          <div class="fill_title">Dessert</div>
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
	$CKEditor->editor("dessert", $description['Dessert'], $config, $events);
	?>
	          </div>
	          <div class="void_row"></div>
	        </div>
	      </div>
    -->
	</div>
  </div>
</form>
<?php include($prefix."static/footer.php");?>
</body>
</html>
<?php } ?>
