<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $prefix="";?>
<head>
<?php
$page_title = "Change Password";
include($prefix."static/page_head.php");
?>
<script type="text/javascript" src="<?php echo $prefix;?>script/change_password.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/general.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>../jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/general.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/login.css" />
<?php
include($prefix."../google_track.php");
include($prefix."../connect_database.php");
?>
</head>
<body onload="">
<?php include($prefix."static/header.php");?>
<form method="post" action="../admin/update.php" enctype="multipart/form-data">
  <div id="page_title_bar">
    <div id="page_title_bar_fill">
      <div id="page_title">Change Password</div>
      <div id="button_bar">
        <input type="submit" class="main_button button" id="submit_button" value="Change Password" disabled />
      </div>
    </div>
  </div>
  <div class="fill_container">
    <div class="fill_group">
      <div class="fill_row">
        <div class="fill_title">Admin Details</div>
      </div>
      <div class="fill_row">
        <div class="fill_label">Username</div>
        <input type="text" class="fill_text_box" id="username" name="username" value="" />
      </div>
      <div class="fill_row">
        <div class="fill_label">Old Password</div>
        <input type="password" class="fill_text_box" id="old_password" name="old_password" value="" />
      </div>
      <div class="fill_row">
        <div class="fill_label">New Password</div>
        <input type="password" class="fill_text_box" id="new_password" name="new_password" value="" onkeyup="checkConfirm()"/>
      </div>
      <div class="fill_row">
        <div class="fill_label">Confirm Password</div>
        <input type="password" class="fill_text_box" id="confirm_password" name="confirm_password" value="" onkeyup="checkConfirm()"/>
      </div>
      <div class="void_row"></div>
    </div>
  </div>
</form>
<?php include($prefix."static/footer.php");?>
</body>
</html>
