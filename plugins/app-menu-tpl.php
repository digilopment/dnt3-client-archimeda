
<div class="menu-options icon-background no-submenu-numbers sidebar-menu">
   <em class="menu-divider"><?php echo MultyLanguage::translate($data, "navigation", "translate");?></em>
   
   <a class="close-sidebar" href="<?php echo ($data['webhook']['1'] == "primary-handler" && !isset($data['webhook']['2'])) ? "#app-info-tpl_main" : WWW_PATH."primary-handler#app-info-tpl_main";?>"><i class="icon-bg bg-green-dark ion-ios-heart"></i><span><?php echo MultyLanguage::translate($data, "info", "translate");?></span><i class="ion-record"></i></a>
   <a class="close-sidebar" href="<?php echo ($data['webhook']['1'] == "primary-handler" && !isset($data['webhook']['2'])) ? "#departments-tpl_main" : WWW_PATH."primary-handler#departments-tpl_main";?>"><i class="icon-bg bg-green-dark ion-ios-paper-outline"></i><span><?php echo MultyLanguage::translate($data, "departments", "translate");?></span><i class="ion-record"></i></a>
   <a class="close-sidebar" href="#new-examination-tpl_main"><i class="icon-bg bg-red-dark ion-ios-heart"></i><span><?php echo MultyLanguage::translate($data, "new_examination", "translate");?></span><i class="ion-record"></i></a>
   <a class="close-sidebar" href="<?php echo WWW_PATH."my-examinations";?>"><i class="icon-bg bg-night-dark ion-checkmark"></i><span><?php echo MultyLanguage::translate($data, "my_examinations", "translate");?></span><i class="ion-record"></i></a>
   <?php if(!$user->logged()){?>
   <a class="close-sidebar" href="#login-form_main"><i class="icon-bg bg-night-dark ion-log-in"></i><span><?php echo MultyLanguage::translate($data, "login", "translate");?></span><i class="ion-record"></i></a>
   <a class="close-sidebar" href="#registration-form_main"><i class="icon-bg bg-night-dark ion-ios-star"></i><span><?php echo MultyLanguage::translate($data, "registration", "translate");?></span><i class="ion-record"></i></a>
   <?php } ?>
   
   <em class="menu-divider"><?php echo Settings::get("title"); ?> <u class="copyright-year"></u>. <?php echo MultyLanguage::translate($data, "developed_by", "translate");?></em>
</div>