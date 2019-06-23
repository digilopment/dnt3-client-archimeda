		</div>
	</div> <!-- end content page -->
	<div class="bottom-navigation-wrap">
          <div class="bottom-navigation">
			 <a href="<?php echo ($data['webhook']['1'] == "primary-handler" && !isset($data['webhook']['2'])) ? "#app-info-tpl_main" : WWW_PATH."primary-handler#app-info-tpl_main";?>" class="tab-link">
              <i class="icon ion-ios-home"></i>
              <span class="tabbar-label">Home</span>
            </a>
            <a href="<?php echo ($data['webhook']['1'] == "primary-handler" && !isset($data['webhook']['2'])) ? "#departments-tpl_main" : WWW_PATH."primary-handler#departments-tpl_main";?>" class="tab-link">
              <i class="icon ion-ios-star"></i>
              <span class="tabbar-label">Departaments</span>
            </a>
            <a href="<?php echo WWW_PATH."my-examinations";?>" class="tab-link">
              <i class="icon ion-ios-search"></i>
              <span class="tabbar-label">History</span>
            </a>
            <a href="<?php echo WWW_PATH."profile-settings";?>" class="tab-link">
              <i class="icon ion-ios-person"></i>
              <span class="tabbar-label">Profile</span>
            </a>
          </div>
    </div>

	
</body>
</html>