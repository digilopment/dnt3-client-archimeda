<?php get_top($data); ?>
<?php 
$user = new ArchimedaUser();
?>
   <body>
	<div class="loader"></div>
	<div class="content-page">
      <div id="page-transitions">
      <!-- NAVIGATION LEFT -->
      <div class="sidebars sidebars-light">
         <div class="sidebar sidebar-left">
            <div class="sidebar-header sidebar-header-image bg-2">
               <div class="overlay dark-overlay"></div>
               <div class="sidebar-socials">
                  <a class="close-sidebar" href="#"><i class="ion-android-close"></i></a>
                  <div class="clear"></div>
               </div>
            </div>
            <img class="nav-img" src="<?php echo $data['media_path']; ?>img/healthcare-revolves-around-you.png" alt="" />
            <div class="menu-search">
               <i class="ion-ios-search-strong"></i>
               <input type="text" class="search-field" onclick="window.location.href='#departments-tpl_main'" placeholder="find departments" >
            </div>
            <div class="menu-options icon-background no-submenu-numbers sidebar-menu">
               <em class="menu-divider">Navigation</em>
               <a class="close-sidebar" href="#departments-tpl_main"><i class="icon-bg bg-green-dark ion-ios-paper-outline"></i><span>departments</span><i class="ion-record"></i></a>
               <a class="close-sidebar" href="#new-examination-tpl_main"><i class="icon-bg bg-red-dark ion-ios-heart"></i><span>new examination</span><i class="ion-record"></i></a>
               <a class="close-sidebar" href="#my-examinations-tpl_main"><i class="icon-bg bg-night-dark ion-checkmark"></i><span>my examinations</span><i class="ion-record"></i></a>
               <a class="close-sidebar" href="#login-form_main"><i class="icon-bg bg-night-dark ion-log-in"></i><span>login</span><i class="ion-record"></i></a>
               <a class="close-sidebar" href="#registration-form_main"><i class="icon-bg bg-night-dark ion-ios-star"></i><span>registration</span><i class="ion-record"></i></a>
               <em class="menu-divider">Archimeda <u class="copyright-year"></u>. developed by Digilopment</em>
            </div>
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
         <span class="header-logo-text">Archimeda</span>
		 
		 <?php if($user->logged()){ ?>
         <a href="#" class="header-icon header-icon-4 open-sidebar-right"><i class="login-icon ion-person"></i></a>
		 <?php }else{ ?>
		 <a href="#login-form_main" class="header-icon header-icon-4"><i class="login-icon ion-person"></i></a>
		 <?php } ?>
		 
      </div>
      <div id="page-content" class="page-content">
         <div id="page-content-scroll" class="header-clear">
            <div class="coverpage-slider coverpage-classic">
               <div class="swiper-wrapper">
			   
				<!-- PRIMARY CONTENT -->
				
				<?php if($user->logged()){?>
				<!--slide departments -->
				<div class="swiper-slide" id="departments-tpl_main">
					<?php departments_tpl($data, ""); ?>
				</div>
				
				<!-- profile settings -->
				<div class="swiper-slide" id="profile-settings-form_main">
					<?php user_profile_settings($data, $user, "profile-settings-form"); ?>
				</div>
				
				<!--app info -->
				<div class="swiper-slide" id="app-info-tpl_main" style="background: url(<?php echo $data['media_path']; ?>img/cover.jpg?v2) 0% 0% / cover;background-position: unset;background-position: 0px 55px;">
                     <?php app_info_tpl($data, ""); ?>
                </div>
				<?php } ?>
				
				
				<?php if(!$user->logged()){?>
				<!--app info -->
				<div class="swiper-slide" id="app-info-tpl_main" style="background: url(<?php echo $data['media_path']; ?>img/cover.jpg?v2) 0% 0% / cover;background-position: unset;background-position: 0px 55px;">
                     <?php app_info_tpl($data, ""); ?>
                </div>
				
				<!--slide departments -->
                <div class="swiper-slide" id="departments-tpl_main">
                    <?php departments_tpl($data, ""); ?>
                </div>
				
				<!-- registration -->
				<div class="swiper-slide" id="registration-form_main">
				<?php registration_form($data, "registration-form"); ?>
				</div>
                 
				 <!-- login -->
				 <div class="swiper-slide" id="login-form_main">
				  <?php login_form($data, "login-form"); ?>
				 </div>
				<?php } ?>
				
				
				 
				 
				 <!-- USER CONTENT AND SETTINGS -->
				 
               </div>
               <div class="coverpage-clear full-bottom"></div>
            </div>
         </div>
         <a href="#" class="back-to-top-badge"><i class="ion-ios-arrow-up"></i></a>
      </div>
	  </div>
	  

   </body>