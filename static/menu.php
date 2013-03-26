<?php include($prefix."static/initial.php");?>	

    	<div id="menu" class="float_left menu m_r_25">
			<img class="m_b_10" src="<?php echo $prefix;?>files/web_images/logo.gif" width="160" height="60" />
			<hr noshade="noshade" size="1" width="20px" color="#666666" />

			<div id="menu_text" class="f_11 mediagothic l_h_32 ta_center m_t_25 m_b_15">
				<a class="main" href="<?php echo $prefix;?>products?new_arrival=1"><div id="new_arrival_menu" class="l_h_32">
				NEW ARRIVALS
				</div></a>
				<?php iterateCategory(0,'top',$categories,$prefix,$input);?>

				

				<a class="main" href="<?php echo $prefix;?>products?sale=1"><div id="sale_menu" class="l_h_32">
				SALE
				</div></a>

				<a class="main" href="<?php echo $prefix;?>designer/index.php"><div id="designer_index_menu" class="l_h_32">
				DESIGNER INDEX
				</div></a>

			</div><!--end menu_text-->
		</div><!--end menu-->
