<div class="admin_tab_group">
	<a href="<?php echo $prefix;?>category?category_id=<?php echo $category_id;?>"><div class="admin_tab <?php if ($selected_tab=="category"){echo "selected_tab";}?>" id="category_tab">Category Info</div></a>
	<a href="<?php echo $prefix;?>products?category_id=<?php echo $category_id?>"><div class="admin_tab <?php if ($selected_tab=="product"){echo "selected_tab";}?>" id="product_tab">Product Info</div></a>
	
	<a href="<?php echo $prefix;?>display?category_id=<?php echo $category_id?>"><div class="admin_tab <?php if ($selected_tab=="display"){echo "selected_tab";}?>" id="display_tab">Display</div></a>
	<?php if ($selected_tab=="stock"||$selected_tab=="stock_2"){?>
	<a href="<?php echo $prefix;?>stock/index2.php?category_id=<?php echo $category_id?>"><div class="admin_tab_ <?php if ($selected_tab=="stock_2"){echo "selected_tab";}?> " id="stock_2_tab">View 2</div></a>
	<a href="<?php echo $prefix;?>stock/?category_id=<?php echo $category_id?>"><div class="admin_tab_ <?php if ($selected_tab=="stock"){echo "selected_tab";}?> " id="stock_1_tab">View 1</div></a>
	<?php } ?>
</div>