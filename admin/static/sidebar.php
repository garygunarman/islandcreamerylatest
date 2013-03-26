<div class="sidebar">
	<div class="sidebar_menu
	<?php 
	if ($category_id==0){
		echo "sidebar_menu_selected";
	}
	?>
	" id="slideshow_side_menu" ><div class="arrow_sidebar <?php 
	if ($category_id==0){
		echo "open_arrow_selected";
	}
	else{
		echo "open_arrow";
	}
	?>
	" id="arrow_sidebar_top" onclick="toggleChild('top')"></div><a href="<?php echo $url;?>" class="sidebar_link">Root Category</a></div>
	<div class="hidden" id="status_top"><?php
	if ($category_id==0){
		echo "open";
	}
	else{
		echo "close";
	}
	?></div>
	<div class="hidden" id="selected_top"><?php
	if ($category_id==0){
		echo "1";
	}
	else{
		echo "0";
	}
	?>
	</div>
	<?php iterateCategory(0,'top',$categories);?>
</div>