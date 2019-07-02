 <div class="sidebar sidebar-right">
	<div class="sidebar-header sidebar-header-classic">
	   <div class="sidebar-socials">
		  <a class="close-sidebar" href="#"><i class="ion-android-close"></i></a>
		  <div class="clear"></div>
	   </div>
	   <div class="profile">
		  <img src="<?php echo Image::getFileImage($user->get()->img, true, Image::THUMB)?>" >
	   </div>

		<div class="mini-logo">
		  <span class="header-logo-text" style=""><?php echo Settings::get("title"); ?></span>
		</div>
	</div>
	<div class="menu-options icon-background sidebar-menu">
	   <em class="menu-divider"><?php echo $user->get()->name . " " . $user->get()->surname?></em>
	   <a class="close-sidebar" href="<?php echo WWW_PATH_LANG."profile"?>"><i class="icon-bg bg-green-dark ion-android-home"></i><span><?php echo MultyLanguage::translate($data, "profile", "translate");?></span><i class="ion-record"></i></a>
	   <a class="click-show-preload close-sidebar" href="<?php echo WWW_PATH_LANG."profile-settings"?>"><i class=" icon-bg bg-blue-dark ion-gear-a"></i><span><?php echo MultyLanguage::translate($data, "settings", "translate");?></span><i class="ion-record"></i></a>
	   <a class="close-sidebar" href="#" id="logout-form"><i class="icon-bg bg-red-light ion-log-out"></i><span><?php echo MultyLanguage::translate($data, "logout", "translate");?></span><i class="ion-record"></i></a>
	      <a class="close-sidebar" href="<?php echo WWW_PATH_LANG."my-examinations";?>"><i class="icon-bg bg-night-dark icon ion-ios-search"></i><span><?php echo MultyLanguage::translate($data, "my_examinations", "translate");?></span><i class="ion-record"></i></a>
	   <em class="menu-divider">Copyright <u class="copyright-year"></u>. <?php echo MultyLanguage::translate($data, "copy", "translate");?></em>
	   
	</div>
 </div>