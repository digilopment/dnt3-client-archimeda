<div id="page-content-scroll" class="header-clear">
	<div class="coverpage-slider coverpage-classic">
	   <div class="swiper-wrapper">
	   
		<!-- PRIMARY CONTENT -->
		
		<?php if($user->logged()){?>
		<!--slide departments -->
		<div class="swiper-slide" id="departments-tpl_main">
			<?php departments_tpl($data, ""); ?>
		</div>
		
		<!--app info -->
		<?php 
		$custom_data = array(
			"headline" =>  Settings::get("title"),
		);
		$data = Frontend::get($custom_data, 16227);?>
		<div class="swiper-slide" id="app-info-tpl_main" style="background: url(<?php echo $data['article']['img']?>) 0px 55px;background-position: right;background-size: contain;">
			 <?php app_info_tpl($data, false); ?>
		</div>
		<?php } ?>
		
		 <!-- USER CONTENT AND SETTINGS -->
	   </div>
	   <div class="coverpage-clear full-bottom"></div>
	</div>
 </div>
 
 <?php /* <a href="#" class="back-to-top-badge"><i class="ion-ios-arrow-up"></i></a> */ ?>