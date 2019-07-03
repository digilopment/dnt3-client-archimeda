<div id="page-content-scroll" class="header-clear">
	<div class="coverpage-slider coverpage-classic">
	   <div class="swiper-wrapper">
	   
		<!-- PRIMARY CONTENT -->
		<?php if(!$user->logged()){?>
		<!--app info -->
		<div class="swiper-slide info" id="app-info-tpl_main">
			 <?php app_info_tpl($data, ""); ?>
		</div>
		
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