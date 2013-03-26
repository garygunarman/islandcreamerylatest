<div id="admin_header">
  <div id="header_bar">
    <div id="header_bar_fill">
      <div id="website_logo"></div>
      <div id="header_title"></div>
      <?php if ($_SESSION["user_status"]!="admin") {?>
      <a href="<?php echo $prefix;?>login.php">
      <div class="admin_menu">Login</div>
      </a>
      <?php } else { ?>
      <a href="<?php echo $prefix;?>change_password.php">
      <div class="admin_menu">Change Password</div>
      </a>
      <div class="panel_seperator_right">|</div>
      <div class="admin_menu" onclick="confirmLogout()">Logout</div>
      <div class="panel_seperator_right">|</div>
      <div class="admin_label">Logged in as <b><u><?php echo $_SESSION["username"];?></b></u></div>
      <?php } ?>
    </div>
  </div>
  <div id="menu_bar">
    <div id="menu_bar_fill"> 
    
    <a href="<?php echo $prefix;?>home">
      <div class="main_menu" id="home_menu">HOME</div>
      </a>
      
      <div class="main_menu" id="menus_menu" onmouseover="showSubmenu('menus_submenu_bar')" onmouseout="hideSubmenu('menus_submenu_bar')">MENUS
        <div class="submenu_bar" id="menus_submenu_bar"> 
        
        <a href="<?php echo $prefix;?>menus/slideshow">
          <div class="main_submenu" id="slideshow_submenu">Slideshow</div>
          </a> 
          
        <a href="<?php echo $prefix;?>menus/thumbnail">
          <div class="main_submenu" id="thumbnail_submenu">Thumbnail</div>
          </a>
           
        <a href="<?php echo $prefix;?>menus/description">
          <div class="main_submenu" id="description_submenu">Description</div>
          </a> 
                    
          </div>
      </div>
      <div class="main_menu" id="pages_menu" onmouseover="showSubmenu('pages_submenu_bar')" onmouseout="hideSubmenu('pages_submenu_bar')">PAGES
        <div class="submenu_bar" id="pages_submenu_bar"> 
                 
          <a href="<?php echo $prefix;?>about">
          <div class="main_submenu" id="about_submenu">About</div>
          </a> 
          
          <a href="<?php echo $prefix;?>contact">
          <div class="main_submenu" id="contact_submenu">Contact</div>
          </a> 
          
          <a href="<?php echo $prefix;?>locations">
          <div class="main_submenu" id="locations_submenu">Locations</div>
          </a> </div>
      </div>
      
      
      <a href="<?php echo $prefix;?>settings">
      <div class="main_menu" id="settings_menu">SETTINGS</div>
      </a> 
      
      </div>
  </div>
</div>
<div class="hidden" id="prefix"><?php echo $prefix;?></div>
