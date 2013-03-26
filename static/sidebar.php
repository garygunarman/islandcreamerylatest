<div id="sidebar">
	<div class="sidebar_group">
		<div class="sidebar_title">STYLES</div>
		<?php
		$url = getURL("category_id","",$input,$prefix);
		
		?>
		<a href="<?php echo $url;?>" class="sidebar_link">
		<div id="all_styles_sidebar_menu" class="sneaking sidebar_menu 
		<?php
		if ($input["category_id"]=="top"){
			echo "sidebar_menu_selected_style";
		}
		?>
		">All Styles</div></a>
		
		
		<?php iterateCategory(0,'top',$categories,$prefix,$input);?>
	</div>
	
	<div class="sidebar_group">
		<div class="sidebar_title">DESIGNERS</div>
		<?php
		$url = getURL("designer_id","",$input,$prefix);
		
		?>
		<a href="<?php echo $url;?>" class="sidebar_link">
		<div id="all_colors_sidebar_menu" class="sneaking sidebar_menu 
		<?php
		if ($input["designer_id"]==null){
			echo "sidebar_menu_selected_designer";
		}
		?>
		">All Designers</div></a>
		<?php
		$get_designer_list =mysql_query("
		SELECT * from tbl_designer
		ORDER BY designer_order
		",$con);
		
		if (mysql_num_rows($get_designer_list)!=null){
			
			for ($row=1;$row<=mysql_num_rows($get_designer_list);$row++){
				$get_designer_list_array=mysql_fetch_array($get_designer_list);
				$url = getURL("designer_id",$get_designer_list_array["designer_id"],$input,$prefix);
				echo '<a class="sidebar_link" href="'.$url.'"><div class="sneaking sidebar_menu ';
				if ($input["designer_id"]==$get_designer_list_array["designer_id"]){
					echo "sidebar_menu_selected_designer";
				}
				echo '">'.$get_designer_list_array["designer_name"].'</div></a>';
			}
		}
		?>
	</div>
	
	
	
	<div class="sidebar_group">
		<div class="sidebar_title">COLORS</div>
		<?php
		$url = getURL("color_id","",$input,$prefix);
		
		?>
		<a href="<?php echo $url;?>" class="sidebar_link">
		<div id="all_colors_sidebar_menu" class="sneaking sidebar_menu 
		<?php
		if ($input["color_id"]==null){
			echo "sidebar_menu_selected_color";
		}
		?>
		">All Colors</div></a>
		<?php
		$get_color_list =mysql_query("
		SELECT * from tbl_color
		ORDER BY color_order
		",$con);
		
		if (mysql_num_rows($get_color_list)!=null){
			
			for ($row=1;$row<=mysql_num_rows($get_color_list);$row++){
				$get_color_list_array=mysql_fetch_array($get_color_list);
				$url = getURL("color_id",$get_color_list_array["color_id"],$input,$prefix);
				echo '<a class="sidebar_link" href="'.$url.'"><div class="sneaking sidebar_menu ';
				if ($input["color_id"]==$get_color_list_array["color_id"]){
					echo "sidebar_menu_selected_color";
				}
				echo '"><img class="sidebar_color_image" src="'.$prefix.$get_color_list_array["color_image"].'" alt="'.$get_color_list_array["color_name"].'" />'.$get_color_list_array["color_name"].'</div></a>';
			}
		}
		?>
		
		
	</div>
	
</div>