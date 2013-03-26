<?php 
$prefix="../";
$page_menu = 'contact';
include($prefix."static/connect_database.php");

$get_contact = mysql_query("SELECT * from tbl_contact",$con);
$contact = array();

if (mysql_num_rows($get_contact)!=null) {
	for ($counter=1;$counter<=mysql_num_rows($get_contact);$counter++) {
		$get_contact_array = mysql_fetch_array($get_contact);
		$type = $get_contact_array["type"];
		$contact[$type]=$get_contact_array["fill"]; } }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
<?php $prefix="../";?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<?php
$page_title = " | Contact Us ";
include($prefix."static/page_head.php");
?>
<!--[if lt IE 9]>
<script src="<?php echo $prefix;?>js/html5shiv.js"></script>
<![endif]-->
<link rel="stylesheet" href="<?php echo $prefix;?>css/normalize.css">
<link rel="stylesheet" href="<?php echo $prefix;?>css/main.css">
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<script type="text/javascript" src="<?php echo $prefix;?>script/jquery.js"></script>
<script type="text/javascript" src="<?php echo $prefix;?>script/general.js"></script>
<script src="<?php echo $prefix;?>js/vendor/modernizr-2.6.1.min.js"></script>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'xx-xxxxxxxx-x']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
</head>
<body id="contact">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->

<header>
  <div id="top">
    <div class="header-container">
      <h1 class="logo ir">Island Creamery</h1>
    </div>
  </div>
  <div id="mid">
    <div>PREMIUM HOME MADE ICE CREAM IN THE MOST UNIQUE FLAVORS!</div>
  </div>
</header>
<?php include('../static/nav.php') ?>
<div class="main-content-container">
<div class="main-content" style="width: 700px">
<div class="contact-content">
<form action="submit.php" method="POST">  
<ul class="field-set" style="list-style-type:none">

<li class="contact-words"><?php echo $contact["description"];?></li>
<li class="field field-text">
  <label for="name">Name</label>
  <input type="text" class="input-text" id="name" name="name" placeholder="Your name" value="">
</li>
          
<li class="field field-text">
  <label for="email">Email</label>
  <input type="text" class="input-text" id="email" name="email" placeholder="Your email" value="">
</li>
          
<li class="field">
  <label for="message">Message</label>
  <textarea rows="3" id="message" name="message" placeholder="Your message"></textarea>
</li>

<div class="clearfix" style="margin-top:10px">
  <input type="submit" class="input-submit" value="Submit">
  <?php if ($_GET["success"]==1){?>
  <p id="submit">Thank you! We will reply to your message soon.</p>
  <?php } ?>
</div>        
</ul>      
</form>
      
</div>
</div>
<!-- main-content -->
</div>
<!--main-content-container-->

<?php include('../static/footer.php') ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script> 
<script src="<?php echo $prefix;?>js/plugins.js"></script> 
<script src="<?php echo $prefix;?>js/main.js"></script>
</body>
</html>