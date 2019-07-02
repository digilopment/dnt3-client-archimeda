<div id="page-content">
	<div id="page-content-scroll" class="header-clear">
	   <div class="profile-page-2 full-bottom">
		  <div class="profile-page-2-cover">
			 <img class="preload-image responsive-image" src="<?php echo Settings::getImage($data['meta_settings']['keys']['logo_firmy_2']['value']); ?>">
		  </div>
		  <div class="profile-page-2-thumbnail animate-top">
			 <img class="preload-image responsive-image" src="<?php echo Image::getFileImage($user->get()->img, true, Image::THUMB)?>">
		  </div>
		  <div class="content">
			 <div class="profile-page-2-header">
				<h1 class="animate-fade animate-delay-50"><?php echo $user->get()->name." ".$user->get()->surname;?></h1>
				<em class="animate-fade animate-delay-100"><?php echo $user->get()->vyska."cm, ".$user->get()->vaha."kg, ".floor((time() - strtotime($user->get()->datetime_publish)) / 31556926);?></em>
				<strong class="animate-fade animate-delay-150"><i class="ion-ios-location"></i><?php echo $user->get()->krajina." ";?></strong>
				<p class="animate-fade animate-delay-200">
				   <?php echo $user->get()->content.""; ?>
				</p>
				<a href="<?php echo WWW_PATH_LANG."profile-settings"?>" class="button button-round button-blue profile-page-button-1 animate-fade animate-delay-250"><?php echo MultyLanguage::translate($data, "settinigs", "translate");?></a>
			 </div>
		  </div>
	   </div>
	</div>
</div>