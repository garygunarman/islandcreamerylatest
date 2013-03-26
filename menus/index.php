<?php
$prefix="../";
$page_menu = 'menu';
include($prefix."static/connect_database.php");

$menus_flag=1;

$get_list = mysql_query("SELECT * from tbl_menus ORDER BY order_",$con); 

if (mysql_num_rows($get_list)!=null) {
	$filename = array(); $title = array(); $description = array();
	
	for ($counter=1;$counter<=mysql_num_rows($get_list);$counter++) {
		$get_list_array=mysql_fetch_array($get_list);
		array_push($filename,$get_list_array["filename"]);
		array_push($title,$get_list_array["title"]);
		array_push($description,$get_list_array["description"]); } }

$get_thumb = mysql_query("SELECT * from tbl_menus_thumbnail ORDER BY order_",$con);

if (mysql_num_rows($get_thumb)!=null) {
	$filename_thumbnail = array(); $title_thumbnail = array();
	
	for ($counter=1;$counter<=mysql_num_rows($get_thumb);$counter++) {
		$get_thumb_array=mysql_fetch_array($get_thumb);
		array_push($filename_thumbnail,$get_thumb_array["filename_thumbnail"]);
		array_push($title_thumbnail,$get_thumb_array["title_thumbnail"]); } }

$get_menus = mysql_query("SELECT * from tbl_menus_info",$con); 
$menus = array(); 

if (mysql_num_rows($get_menus)!=null) {
	for ($counter=1;$counter<=mysql_num_rows($get_menus);$counter++) {
		$get_menus_array = mysql_fetch_array($get_menus);
		$type = $get_menus_array["type"];
		$menus[$type]=$get_menus_array["fill"]; 
	} 
}

$get_read = mysql_query("SELECT * from tbl_menus_content ORDER BY order_",$con); 

if (mysql_num_rows($get_read)!=null) {
	$title_read = array(); $description_read = array();
	
	for ($counter=1;$counter<=mysql_num_rows($get_read);$counter++) {
		$get_read_array=mysql_fetch_array($get_read);
		array_push($title_read,$get_read_array["title_read"]);
		array_push($description_read,$get_read_array["description_read"]); 
	} 
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
<?php $prefix="../";?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<?php
$page_title = " | Menus ";
include($prefix."static/page_head.php");
?>
<!--[if lt IE 9]>
<script src="<?php echo $prefix;?>js/html5shiv.js"></script>
<![endif]-->
<link rel="stylesheet" href="<?php echo $prefix;?>css/normalize.css">
<link rel="stylesheet" href="<?php echo $prefix;?>css/main.css">
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<script src="<?php echo $prefix;?>js/menus.js"></script>
<script src="<?php echo $prefix;?>js/jquery.js"></script>
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
<body id="menus" onload="init()">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<header>
  <div id="top">
    <div class="top-left"></div>
    <h1 class="logo ir">Island Creamery</h1>
    <div class="top-right"></div>
  </div>
  <div id="mid">
    <div>PREMIUM HOME MADE ICE CREAM IN THE MOST UNIQUE FLAVORS!</div>
  </div>
</header>
<?php include('../static/nav.php') ?>

<div class="hidden">
<?php
for ($counter=1;$counter<=mysql_num_rows($get_list);$counter++) {
echo '<div id="filename_'.$counter.'">'.$prefix.$filename[$counter-1].'</div>';
echo '<div id="title_'.$counter.'">'.$title[$counter-1].'</div>';
echo '<div id="description_'.$counter.'">'.$description[$counter-1].'</div>'; }
echo '<div id="dot_">'.mysql_num_rows($get_list).'</div>';
echo '<div id="total_image">'.mysql_num_rows($get_list).'</div>';

for ($counter=1;$counter<=mysql_num_rows($get_thumb);$counter++) {
echo '<div id="filename_thumbnail_'.$counter.'">'.$prefix.$filename_thumbnail[$counter].'</div>'; 
echo '<div id="title_thumbnail_'.$counter.'">'.$title_thumbnail[$counter].'</div>'; }
?>
</div>

<div class="main-content-container">
<div id="menus" class="main-content">
<div class="menu-banner">
<div class="content clearfix">
      
<div id="frame" class="image"> 
<img id="image_front" src="<?php echo $prefix.$filename[0];?>" width="580" height="280"/> 
<img id="image_back" src="<?php echo $prefix.$filename[1];?>" width="580" height="280"/> 
</div>
     
<div class="text">
  <div id="text-title" class="text-title"><?= $title[0]?></div>
  <div id="text-content" class="text-content">"<?= $description[0]?>"</div>
</div>
</div>

<div class="image-selector clearfix">
<?php
for ($counter=1;$counter<=mysql_num_rows($get_list);$counter++) {
echo '<a href="javascript:void(0)" class="dot" onclick="javascript:changeImage('.$counter.')" id="dot_'.$counter.'"';
if ($counter==1) {
echo 'class="selected"'; }
echo '></a>'; }
?>
</div>

</div>
    
<!--menu-banner-->
    
<div class="menu-content" style="margin-top: 10px">
<!--<div class="header" id="ice-cream">
  <h1><?php echo $menus["title"];?></h1>
</div>-->
      
<div class="content">
<?php for ($counter=0;$counter<>mysql_num_rows($get_thumb);$counter++) { ?>
<div class="product"><img src="<?php echo $prefix.$filename_thumbnail[$counter];?>" width="152" height="100">
  <div class="product-desc"><?php echo $title_thumbnail[$counter];?></div>
</div>
<?php } ?>

<div class="description">
  <p><?php echo $menus["description"];?></p>
  <!--<img src="<?php echo $menus["image"];?>" width="720" height="1905"> </div>-->
</div>
</div>

<?php for ($counter=0;$counter<>mysql_num_rows($get_read);$counter++) { ?>
<!--<div class="menu-content" style="margin-top: 10px">
<div class="header" id="dessert">
  <h1><?php echo $title_read[$counter];?></h1>

</div>

<div class="content">
  <div class="description"><?php echo $description_read[$counter];?></div>
</div>
</div>
<?php } ?>

</div>-->
</div>

<!--main-content-container-->

<?php include('../static/footer.php') ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script> 
<script src="<?php echo $prefix;?>js/plugins.js"></script> 
<script src="<?php echo $prefix;?>js/main.js"></script>
</body>
</html>