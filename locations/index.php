<?php
$prefix="../";
$page_menu = 'location';
include($prefix."static/connect_database.php");

$get_locations = mysql_query("SELECT * from tbl_locations ORDER BY order_",$con); 

if (mysql_num_rows($get_locations)!=null) {
	$title = array(); $address = array(); $phone = array(); $opening_hours = array(); $maps = array(); $filename = array();

for ($counter=1;$counter<=mysql_num_rows($get_locations);$counter++) {
	$get_locations_array=mysql_fetch_array($get_locations);
	array_push($title,$get_locations_array["title"]);
	array_push($address,nl2br($get_locations_array["address"]));
	array_push($phone,$get_locations_array["phone"]); 
	array_push($opening_hours,nl2br($get_locations_array["opening_hours"])); 
	array_push($maps,$get_locations_array["maps"]); 
	array_push($filename,$get_locations_array["filename"]); } }
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
$page_title = " | Locations ";
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body id="locations">
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
<div class="main-content">
<div class="locations-content">
    
<?php for ($counter=0;$counter<>mysql_num_rows($get_locations);$counter++) { ?>
<div class="description clearfix">
<div class="location left">
<div class="map" id="map_<?php echo $counter; ?>">

<style type="text/css">
#map_<?php echo $counter;?> {
background: url(<?php echo $prefix.$filename[$counter];?>) no-repeat center; }
</style>

<a href="<?php echo $maps[$counter];?>">
<div class="view-map">View <br>
  Map</div>
</a>
</div>
            
<div class="address">
  <div class="address-header"> <?php echo $title[$counter];?></div>
  <div class="address-content"> <span>Address:</span> <?php echo $address[$counter];?><br/>
    <span>Phone:</span> <?php echo $phone[$counter];?><br/>
    <span>Opening Hours:</span> <br/>
    <?php echo $opening_hours[$counter];?> </div>
</div>
</div>
</div>
<?php } ?>
      
<!-- description --> 
</div>
<!-- locations-content--> 
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