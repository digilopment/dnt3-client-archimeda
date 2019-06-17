<div class="menu-options icon-background no-submenu-numbers sidebar-menu">
   <em class="menu-divider">Navigation</em>
   
   <a class="close-sidebar" href="<?php echo WWW_PATH?>primary-handler#app-info-tpl_main"><i class="icon-bg bg-green-dark ion-ios-heart"></i><span>info</span><i class="ion-record"></i></a>
   <a class="close-sidebar" href="<?php echo WWW_PATH?>/primary-handler"><i class="icon-bg bg-green-dark ion-ios-paper-outline"></i><span>departments</span><i class="ion-record"></i></a>
   <a class="close-sidebar" href="#new-examination-tpl_main"><i class="icon-bg bg-red-dark ion-ios-heart"></i><span>new examination</span><i class="ion-record"></i></a>
   <a class="close-sidebar" href="#my-examinations-tpl_main"><i class="icon-bg bg-night-dark ion-checkmark"></i><span>my examinations</span><i class="ion-record"></i></a>
   <?php if(!$user->logged()){?>
   <a class="close-sidebar" href="#login-form_main"><i class="icon-bg bg-night-dark ion-log-in"></i><span>login</span><i class="ion-record"></i></a>
   <a class="close-sidebar" href="#registration-form_main"><i class="icon-bg bg-night-dark ion-ios-star"></i><span>registration</span><i class="ion-record"></i></a>
   <?php } ?>
   
   <em class="menu-divider">Archimeda <u class="copyright-year"></u>. developed by Digilopment</em>
</div>