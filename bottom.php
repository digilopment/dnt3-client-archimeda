		</div>
	</div> <!-- end content page -->
	<div class="bottom-navigation-wrap">
          <div class="bottom-navigation">
			 <a href="<?php echo ($data['webhook']['1'] == "primary-handler"  || $data['webhook']['1'] == "app-logouted" && !isset($data['webhook']['2'])) ? "#app-info-tpl_main" : WWW_PATH_LANG."primary-handler#app-info-tpl_main";?>" class="tab-link">
              <i class="icon ion-ios-home"></i>
              <span class="tabbar-label"><?php echo MultyLanguage::translate($data, "home", "translate");?></span>
            </a>
            <a href="<?php echo ($data['webhook']['1'] == "primary-handler" || $data['webhook']['1'] == "app-logouted" && !isset($data['webhook']['2'])) ? "#departments-tpl_main" : WWW_PATH_LANG."primary-handler#departments-tpl_main";?>" class="tab-link">
              <i class="icon ion-ios-star"></i>
              <span class="tabbar-label"><?php echo MultyLanguage::translate($data, "departments", "translate");?></span>
            </a>
			<?php if($user->logged()){?>
            <a href="<?php echo WWW_PATH_LANG."my-examinations";?>" class="tab-link">
              <i class="icon ion-ios-search"></i>
              <span class="tabbar-label"><?php echo MultyLanguage::translate($data, "my_examinations", "translate");?></span>
            </a>
            <a href="<?php echo WWW_PATH_LANG."profile";?>" class="tab-link">
              <i class="icon ion-ios-person"></i>
              <span class="tabbar-label"><?php echo MultyLanguage::translate($data, "profile", "translate");?></span>
            </a>
			<?php } else { ?>
			<a href="#login-form_main" class="tab-link">
              <i class="icon ion-ios-search"></i>
              <span class="tabbar-label"><?php echo MultyLanguage::translate($data, "my_examinations", "translate");?></span>
            </a>
            <a href="#login-form_main" class="tab-link">
              <i class="icon ion-ios-person"></i>
              <span class="tabbar-label"><?php echo MultyLanguage::translate($data, "profile", "translate");?></span>
            </a>
			<?php } ?>
          </div>
    </div>

	
</body>
</html>