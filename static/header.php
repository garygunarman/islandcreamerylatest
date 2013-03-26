<div id="prefix" class="hidden"><?php echo $prefix;?></div>
<div id="header" class="clearboth m_t_20 w_750 h_26">
        	<div class="float_left mediagothic f_11  m_r_15">
            CURRENCY
            </div>
            <div class="float_left styled-select b_all_solid m_t_-4 w_50 float_left">
            	<select class="w_50">
                <option value="IDR">IDR</option>
                <option value="USD">USD</option>
                </select>
           	</div>
            
            <a class="main" href="<?php echo $prefix;?>order/shopping_bag/index.php"><div class="float_right">
            	<div class="float_right gillsans f_12 m_l_15" style="margin-top:-1px;">
            		<?php

					if ($_SESSION["user_status"]=='guest'){

						if ($_SESSION["shopping_bag_counter"]==null){
							echo "0";
						}
						else{
							echo $_SESSION["shopping_bag_counter"];
						}
					}

					else if ($_SESSION["user_status"]=='member'){

						$user_id = $_SESSION["user_id"];
						$bag_id = $_SESSION["bag_id"];

						$bag_counter = mysql_query("
							SELECT bag_counter from tbl_shopping_bag 
							WHERE bag_id = '$bag_id' AND user_id = '$user_id'
						",$con);

						if (mysql_num_rows($bag_counter)!=0){
							$bag_counter_array = mysql_fetch_array($bag_counter);
							if ($bag_counter_array["bag_counter"]!=null){
								echo $bag_counter_array["bag_counter"];
							}
							else{
								echo '0';

							}
						}

						else{
							echo "0";
						}

					}

					?>
 				item(s)
            	</div>
           
            	<div class="float_right mediagothic f_11 m_l_17">
            	MY BAG
            	</div>
            </div></a>
            
            <a class="main" href="<?php echo $prefix;?>confirm/index.php"><div class="float_right mediagothic f_11 m_l_17">
            CONFIRM PAYMENT
            </div></a>
            
            <img class="float_right m_l_17" src="<?php echo $prefix;?>files/web_images/separator.gif" width="1" height="10" style="margin-top:3px;"/>
            
            <a class="main" href="<?php echo $prefix;?>account/wish_list/index.php"><div class="float_right mediagothic f_11 m_l_17">
            MY WISH LIST
            </div></a>
            
            <a class="main" href="<?php echo $prefix;?>account/my_account"><div class="float_right mediagothic f_11 m_l_17">
            MY ACCOUNT
            </div></a>
            
            <img class="float_right m_l_17" src="<?php echo $prefix;?>files/web_images/separator.gif" width="1" height="10" style="margin-top:3px;"/>
            
            <a class="main" href="<?php echo $prefix;?>account/login"><div class="float_right mediagothic f_11 m_l_17">
            LOG IN
            </div></a>
            
        </div><!--end header-->