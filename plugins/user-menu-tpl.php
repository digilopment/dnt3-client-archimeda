 <div class="sidebar sidebar-right">
	<div class="sidebar-header sidebar-header-classic">
	   <div class="sidebar-socials">
		  <a class="close-sidebar" href="#"><i class="ion-android-close"></i></a>
		  <div class="clear"></div>
	   </div>
	   <div class="profile">
		  <img src="https://scontent-vie1-1.xx.fbcdn.net/v/t1.0-1/p160x160/49024008_2300667943277803_6661093671611400192_n.jpg?_nc_cat=102&_nc_ht=scontent-vie1-1.xx&oh=4e57dc5334bc077e5cd1920a234a8f2d&oe=5D80FD44" >
	   </div>
	   <?php 
		  /* <a href="index.html" class="sidebar-logo">
		  <strong>The Ultimate Mobile Solution</strong>
		  </a>
		  */ ?>
	</div>
	<div class="menu-options icon-background sidebar-menu">
	   <em class="menu-divider"><?php echo $user->get()->name . " " . $user->get()->surname?></em>
	   <a class="close-sidebar" href="#profile-settings-form_main"><i class="icon-bg bg-green-dark ion-android-home"></i><span>profile</span><i class="ion-record"></i></a>
	   <a class="close-sidebar" href="#profile-settings-form_main"><i class="icon-bg bg-blue-dark ion-gear-a"></i><span>settings</span><i class="ion-record"></i></a>
	   <a class="close-sidebar" href="#" id="logout-form"><i class="icon-bg bg-red-light ion-log-out"></i><span>logout</span><i class="ion-record"></i></a>
	   <em class="menu-divider">Copyright <u class="copyright-year"></u>. All rights reserved</em>
	</div>
 </div>