
<div class="menu-options icon-background no-submenu-numbers sidebar-menu">
   <em class="menu-divider"><?php echo MultyLanguage::translate($data, "navigation", "translate");?></em>
   
   <a class="close-sidebar" href="<?php echo ($data['webhook']['1'] == "primary-handler" || $data['webhook']['1'] == "app-logouted" && !isset($data['webhook']['2'])) ? "#app-info-tpl_main" : WWW_PATH_LANG."primary-handler#app-info-tpl_main";?>"><i class="icon-bg bg-blue-dark fa fa-info"></i><span><?php echo MultyLanguage::translate($data, "info", "translate");?></span><i class="ion-record"></i></a>
   
   <a class="close-sidebar" href="<?php echo ($data['webhook']['1'] == "primary-handler" || $data['webhook']['1'] == "app-logouted"  && !isset($data['webhook']['2'])) ? "#departments-tpl_internal" : WWW_PATH_LANG."primary-handler#departments-tpl_main";?>"><i class="icon-bg bg-red-light fa fa-heartbeat"></i><span><?php echo MultyLanguage::translate($data, "internal_medicine", "translate");?></span><i class="ion-record"></i></a>
   
   <a class="close-sidebar" href="<?php echo ($data['webhook']['1'] == "primary-handler" || $data['webhook']['1'] == "app-logouted"  && !isset($data['webhook']['2'])) ? "#departments-tpl_surgery" : WWW_PATH_LANG."primary-handler#departments-tpl_main";?>"><i class="icon-bg bg-blue-light fa fa-gavel"></i><span><?php echo MultyLanguage::translate($data, "surgery", "translate");?></span><i class="ion-record"></i></a>
   
   <a class="close-sidebar" href="<?php echo ($data['webhook']['1'] == "primary-handler" || $data['webhook']['1'] == "app-logouted"  && !isset($data['webhook']['2'])) ? "#departments-tpl_independent" : WWW_PATH_LANG."primary-handler#departments-tpl_main";?>"><i class="icon-bg bg-night-dark fa fa-flag" style="background-color: #7d7b7b!important"></i><span><?php echo MultyLanguage::translate($data, "independent", "translate");?></span><i class="ion-record"></i></a>
   
   <?php if(!$user->logged()){?>
   <a class="close-sidebar" href="#login-form_main"><i class="icon-bg bg-night-dark ion-log-in"></i><span><?php echo MultyLanguage::translate($data, "login", "translate");?></span><i class="ion-record"></i></a>
   <a class="close-sidebar" href="#registration-form_main"><i class="icon-bg bg-night-dark ion-ios-star"></i><span><?php echo MultyLanguage::translate($data, "registration", "translate");?></span><i class="ion-record"></i></a>
   <?php } ?>
   
   <span class="languages">
		<?php
		$lngArr = MultyLanguage::activeVendorLangs();
		if (count($lngArr) > 1) {
			foreach (MultyLanguage::activeVendorLangs() as $lg) {
				$urlLg = WWW_PATH . "" . $lg . "/a/" . $data['post_id'];
				?>
					<a href="<?php echo $urlLg; ?>" >
						<img src="<?php echo $data['media_path']."img/flags/flag_" . $lg . ".png"; ?>" alt="<?php echo $lg; ?>">
					</a>
				<?php
			}
		}
		?>
	</span>
   
   <em class="menu-divider bottom"><?php echo Settings::get("title"); ?> <u class="copyright-year"></u>. <?php echo MultyLanguage::translate($data, "developed_by", "translate");?></em>
</div>

<style>
.menu-options span.languages{
	display: block;
    margin: 0px;
    padding: 0px;
    height: initial;
	    border-bottom: 1px solid #ebebeb;
}
.languages a{
	    float: left;
		    border-bottom: 0px solid #ebebeb;
}
.languages img{
	margin: 16px;
    height: 25px;
    margin-left: 20px;
    border-radius: 10px;
	
}
.menu-divider.bottom{
	margin-bottom: 100px;
}
</style>