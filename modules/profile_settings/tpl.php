<!--<div id="page-content">
	<div class="content-fullscreen">
	   <div class="animate-fade">
		  <h3 class="center-text thin small-bottom half-top"><?php echo MultyLanguage::translate($data, "settinigs", "translate");?></h3>
		  <?php user_profile_settings($data, $user, "profile-settings-form"); ?>
	   </div>
	</div>
</div>
<style>#page-content{min-height: auto!important};</style>
-->

<div id="page-content">
	<div id="page-content-scroll" class="header-clear">
	   <div class="profile-page-2 full-bottom">
		  <div class="profile-page-2-cover">
			 <img class="preload-image responsive-image" src="<?php echo Settings::getImage($data['meta_settings']['keys']['logo_firmy_2']['value']); ?>">
		  </div>
		  <div class="profile-page-2-thumbnail animate-top">
			 <img class="preload-image responsive-image" src="<?php echo Image::getFileImage($user->get()->img, true, Image::THUMB)?>">
		  </div>
			<?php user_profile_settings($data, $user, "profile-settings-form"); ?>
	   </div>
	   
	</div>
</div>