<?php 

$prefix="";
$page_menu = 'home';
include($prefix."static/connect_database.php");
$home_flag=1;

$get_list =mysql_query("
	SELECT * from tbl_home
	ORDER BY order_	

",$con);

if (mysql_num_rows($get_list)!=null){
	
	$filename = array();
	$link = array();
	for ($counter=1;$counter<=mysql_num_rows($get_list);$counter++){
		$get_list_array=mysql_fetch_array($get_list);
		array_push($filename,$get_list_array["filename"]);
		array_push($link,$get_list_array["link"]);
		
	}
		
}




?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    	<?php $page_title="";
			include($prefix."static/page_head.php");
		;?>
        
		<!--[if lt IE 9]>
			<script src="<?php echo $prefix;?>js/html5shiv.js"></script>
		<![endif]-->
        <link rel="stylesheet" href="<?php echo $prefix;?>css/normalize.css">
        <link rel="stylesheet" href="<?php echo $prefix;?>css/main.css">
        <script src="<?php echo $prefix;?>js/vendor/modernizr-2.6.1.min.js"></script>
		<script src="<?php echo $prefix;?>js/jquery.js"></script>
		<script src="<?php echo $prefix;?>js/home.js"></script>
		
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
    <body onload="initialization()">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
		<!--<a id="background-link" href="<?php echo $link[0];?>">-->
		<div class="background" id="background-front"></div>
		<div class="background" id="background-back"></div>
		<!--</a>-->	
		
		<style type="text/css">
		#background-front{
			background-image:url(<?php echo $prefix.$filename[0];?>); 
		}
		
		#background-back{
			background-image:url(<?php echo $prefix.$filename[1];?>); 
			opacity:0;
		}
		
		</style>


		<?php
		$link_ = current($link);
		$i=0;
		foreach ($filename as $filename_){
			echo '<div class="hidden" id="filename_'.$i.'">'.$filename_.'</div>';
			echo '<div class="hidden" id="link_'.$i.'">'.$link_.'</div>';
			$i++;
			$link_ = next($link);
		}
		echo '<div class="hidden" id="total_image">'.$i.'</div>';
		?>
        <header style="height:32px; background: #000">
            <div style="height:58px" class="hidden">
                <div class="header-container">
                    <h1 class="logo-home ir">Island Creamery</h1>
                </div>
            </div>
            <div id="mid">
                <div>PREMIUM HOME MADE ICE CREAM IN THE MOST UNIQUE FLAVORS!</div>
            </div>
        </header>

        <?php include('static/nav.php') ?>

        <div class="main-content-container">

            <!--<div class="home-content">
                <ul>
                    <li class="ice-cream"></li>
                    <li class="cafe"></li>
                    <li class="dessert"></li>
                </ul>
            </div>-->

            <div class="arrow left hidden" onclick="prev()"></div>

            <div class="arrow right hidden" onclick="next()"></div>

        </div> <!--main-content-container-->

        <footer id="footer-home">

            <div class="footer-content-home">

                <div class="twitter">
                    <div class="twitter-container">
                        <a href="https://twitter.com/IslandIndo" class="twitter-follow-button" data-show-count="false">Follow @IslandIndo</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                        <div>on Twitter</div>
                    </div>
                </div>

                <div class="footer-logo"></div>
                
                <div class="fb">
                    <div>Facebook</div>
                    <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FIsland-Creamery-Indonesia%2F199257140095267%3Ffref%3Dts&amp;send=false&amp;layout=button_count&amp;width=300&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:21px;" allowTransparency="true"></iframe>
                </div>
            </div>

            <!--<div class="footer-content hidden">
                <ul>
                    <a href=""><li>Career</li></a>
                    <a href=""><li>FAQ</li></a>
                    <a href=""><li>Contact Us</li></a>
                </ul>
            </div>-->
        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script>
        <script src="<?php echo $prefix;?>js/plugins.js"></script>
        <!--<script src="<?php echo $prefix;?>js/main.js"></script>-->

    </body>
</html>
