<div id="page-content-scroll" class="header-clear">
	<div class="coverpage-slider coverpage-classic">
	   <div class="swiper-wrapper">
	   
		<!-- PRIMARY CONTENT -->
		<?php if($user->logged()){?>
		<!--slide departments -->
		<div class="swiper-slide all-departaments" id="departments-tpl_main">
			<?php departments_all_tpl($data, "1267,1268,1269", ""); ?>
		</div>
		
		<div class="swiper-slide" id="departments-tpl_internal">
			<?php departments_tpl($data, "1267", ""); ?>
		</div>
		
		<div class="swiper-slide" id="departments-tpl_surgery">
			<?php departments_tpl($data, "1268", ""); ?>
		</div>
		
		<div class="swiper-slide" id="departments-tpl_independent">
			<?php departments_tpl($data, "1269", ""); ?>
		</div>
		
		<!--app info -->
		<?php 
		$custom_data = array(
			"headline" =>  Settings::get("title"),
		);
		$data = Frontend::get($custom_data, 16227);?>
		<div class="swiper-slide info" id="app-info-tpl_main"> 
			 <?php app_info_tpl($data, ""); ?>
		</div>
		<?php } ?>
		
		 <!-- USER CONTENT AND SETTINGS -->
	   </div>
	   <div class="coverpage-clear full-bottom"></div>
	   
	</div>
	
	
	<span id="integreated-data-reader">
		<a href="#" id="close-reader" class="close-reader"><i class="ion-android-close"></i></a>
		<span id="data-reader"></span>
	</span>
	
 </div>
 
 <?php /* <a href="#" class="back-to-top-badge"><i class="ion-ios-arrow-up"></i></a> */ ?>