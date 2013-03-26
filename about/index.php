<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->

<head>
<?php 
$prefix="../";
$page_menu = 'about';
include($prefix."static/connect_database.php");
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<?php
$page_title = " | About Us";
include($prefix."static/page_head.php");
?>

<!--[if lt IE 9]>
<script src="<?php echo $prefix;?>js/html5shiv.js"></script>
<![endif]-->

<link rel="stylesheet" href="<?php echo $prefix;?>css/normalize.css">
<link rel="stylesheet" href="<?php echo $prefix;?>css/main.css">
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
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
<?php include($prefix."static/google_track.php"); ?>
</head>

<body id="about">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<header>
  <div id="top">
    <div class="header-container">
      <a href="<?php echo $prefix;?>index.php"><h1 class="logo ir">Island Creamery</h1></a>
    </div>
  </div>
  <div id="mid">
    <div>PREMIUM HOME MADE ICE CREAM IN THE MOST UNIQUE FLAVORS!</div>
  </div>
</header>

<?php 
include('../static/nav.php');

$get_about = mysql_query("SELECT * from tbl_about",$con);
$about = array();

if(mysql_num_rows($get_about)!=null) {
	for ($counter=1;$counter<=mysql_num_rows($get_about);$counter++) {
		$get_about_array = mysql_fetch_array($get_about);
		$type = $get_about_array["type"];
		$about[$type] = $get_about_array["fill"]; } }
?>

<div class="main-content-container">
  <div class="main-content">
    <div class="about-content">
      <div class="about-logo hidden"></div>
      <div class="about-header">WHO WE ARE</div>
      <div> <?php echo $about['description']; ?> </div>
    </div>
  </div>
</div>

<?php include('../static/footer.php') ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script> 
<script src="<?php echo $prefix;?>js/plugins.js"></script> 
<script src="<?php echo $prefix;?>js/main.js"></script>
</body>
</html>