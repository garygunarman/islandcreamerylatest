<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $prefix="";?>
<head>
<?php
$page_title = " | Login";
include($prefix."static/page_head.php");
?>
<script type="text/javascript" src="<?php echo $prefix;?>script/login.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/general.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>../script/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/general.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $prefix;?>style/login.css" />
<?php
include($prefix."../static/google_track.php");
include($prefix."../static/connect_database.php");
?>
</head>
<body onload="">
<form method="post" action="../admin/check.php" enctype="multipart/form-data">
  <div id="login_container">
    <div id="login_body">
      <div id="login_banner"></div>
      <div class="login_label">Username</div>
      <input type="text" class="login_text_box" id="username" name="username" value="<?php echo $branch_link;?>" />
      <div class="login_label">Password</div>
      <input type="password" class="login_text_box" id="password" name="password" value="<?php echo $branch_link;?>" />
      <div class="submit_row">
        <input type="submit"  class="key_button image_button right_ h26_button green_button button" value="Login">
      </div>
      <div class="void_row"></div>
    </div>
    <div id="login_footer">Copyright by &copy;2012 Antikode</div>
  </div>
</form>
</body>
</html>
