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
		  <span class="header-logo-text" style="">Archimeda</span>
		</div>
	</div>
	<div class="menu-options icon-background sidebar-menu">
	   <em class="menu-divider"><?php echo $user->get()->name . " " . $user->get()->surname?></em>
	   <a class="close-sidebar" href="<?php echo WWW_PATH."profile-settings"?>"><i class="icon-bg bg-green-dark ion-android-home"></i><span>profile</span><i class="ion-record"></i></a>
	   <a class="close-sidebar" href="<?php echo WWW_PATH."profile-settings"?>"><i class="icon-bg bg-blue-dark ion-gear-a"></i><span>settings</span><i class="ion-record"></i></a>
	   <a class="close-sidebar" href="#" id="logout-form"><i class="icon-bg bg-red-light ion-log-out"></i><span>logout</span><i class="ion-record"></i></a>
	   <em class="menu-divider">Copyright <u class="copyright-year"></u>. All rights reserved</em>
	</div>
 </div>