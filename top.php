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