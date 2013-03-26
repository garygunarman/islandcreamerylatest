<nav>
    <div id="nav-container">
    <ul>
        <a href="<?php echo $prefix;?>index.php" <?php if($page_menu=='home'){echo 'class="selected"';}?> ><li>Home</li></a>
        <a href="<?php echo $prefix;?>about" <?php if($page_menu=='about'){echo 'class="selected"';}?> ><li>About Us</li></a>
        <a href="<?php echo $prefix;?>menus" <?php if($page_menu=='menu'){echo 'class="selected"';}?> ><li>Menus</li></a>
            <!--<ul>
                <a href=""><li>Ice Cream</li></a>
                <a href=""><li>Cakes</li></a>
                <a href=""><li>Cafe</li></a>
            </ul>-->
        <a href="<?php echo $prefix;?>contact" <?php if($page_menu=='contact'){echo 'class="selected"';}?> ><li>Contact Us</li></a>
        <a href="<?php echo $prefix;?>locations" style="border-right: 1px dashed #fff" <?php if($page_menu=='location'){echo 'class="selected"';}?> ><li>Locations</li></a>
    </ul>
    </div>
</nav>