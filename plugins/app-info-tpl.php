<div class="coverpage-top app-info">
	<img src="<?php echo $data['article']['img']?>" >
	<div class="text-buble">
	   <h3><?php echo $data['article']['perex']?> - <strong class="color-blue-light"><?php echo $data['headline']?></strong></h3>
	   <a href="<?php echo "#departments-tpl_main"?>" class="button button-round button-blue profile-page-button-1"><?php echo MultyLanguage::translate($data, "departments", "translate");?></a>
		
	   <?php echo $data['article']['content']?>
	   <div class="decoration"></div>
	  	 
	</div>
 </div>