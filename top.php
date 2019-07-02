<?php get_top($data); ?>
<?php 
$user = new ArchimedaUser();
?>
   <body>
	<div class="loader">
	<div class="header header-logo-center header-dark">
         <a href="#" class="header-icon header-icon-1 hamburger-animated open-sidebar-left"><em class="hm1"></em><em class="hm2"></em><em class="hm3"></em></a>
         <span class="header-logo-text"><?php echo $data['headline']?></span>
		 <a href="#" class="header-icon header-icon-4 open-sidebar-right"><i class="login-icon ion-person"></i></a>
		 </div>
		 <div class="bottom-navigation-wrap">
          <div class="bottom-navigation">
			<a href="<?php echo ($data['webhook']['1'] == "primary-handler" && !isset($data['webhook']['2'])) ? "#app-info-tpl_main" : WWW_PATH_LANG."primary-handler#app-info-tpl_main";?>" class="tab-link">
              <i class="icon ion-ios-home"></i>
              <span class="tabbar-label"><?php echo MultyLanguage::translate($data, "home", "translate");?></span>
            </a>
            <a href="<?php echo ($data['webhook']['1'] == "primary-handler" && !isset($data['webhook']['2'])) ? "#departments-tpl_main" : WWW_PATH_LANG."primary-handler#departments-tpl_main";?>" class="tab-link">
              <i class="icon ion-ios-star"></i>
              <span class="tabbar-label"><?php echo MultyLanguage::translate($data, "departments", "translate");?></span>
            </a>
			<a href="#login-form_main" class="tab-link">
              <i class="icon ion-ios-search"></i>
              <span class="tabbar-label"><?php echo MultyLanguage::translate($data, "my_examinations", "translate");?></span>
            </a>
            <a href="#login-form_main" class="tab-link">
              <i class="icon ion-ios-person"></i>
              <span class="tabbar-label"><?php echo MultyLanguage::translate($data, "profile", "translate");?></span>
            </a>
          </div>
    </div>
	</div>
	<div class="content-page">
      <div id="page-transitions">
      <!-- NAVIGATION LEFT -->
      <div class="sidebars sidebars-light">
         <div class="sidebar sidebar-left">
            <div class="sidebar-header sidebar-header-image">
               <div class="overlay dark-overlay"></div>
               <div class="sidebar-socials">
                  <a class="close-sidebar" href="#"><i class="ion-android-close"></i></a>
                  <div class="clear"></div>
               </div>
            </div>
            <img class="nav-img" src="<?php echo Settings::getImage($data['meta_settings']['keys']['logo_firmy_2']['value']); ?>" alt="" />
            <div class="menu-search">
               <i class="ion-ios-search-strong"></i>
               <input type="text" class="search-field" onclick="window.location.href='#departments-tpl_main'" placeholder="<?php echo MultyLanguage::translate($data, "find_departments", "translate");?>" >
            </div>
            <?php echo app_menu_tpl($data, $user, "");?>
         </div>
		 
		 <!-- USER AREA -->
		<?php 
		if($user->logged()){
			user_menu_tpl($data, $user, "");
		}
		?>
		 
      </div>
	  
      <div class="header header-logo-center header-dark">
         <a href="#" class="header-icon header-icon-1 hamburger-animated open-sidebar-left"></a>
         <!--<a href="index.html" class="header-logo"></a>-->
         <span class="header-logo-text"><?php echo $data['headline']?></span>
		 
		 <?php if($user->logged()){ ?>
         <a href="#" class="header-icon header-icon-4 open-sidebar-right"><i class="login-icon ion-person"></i></a>
		 <?php }else{ ?>
		 <a href="#login-form_main" class="header-icon header-icon-4"><i class="login-icon ion-person"></i></a>
		 <?php } ?>
		 
      </div>