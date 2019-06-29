<div id="page-content">
	<div class="content-fullscreen">
	   <div class="animate-fade">
		  <h3 class="center-text thin small-bottom half-top"><?php echo MultyLanguage::translate($data, "settinigs", "translate");?></h3>
		  <div class="content" style="background-color: rgba(255,255,255,0.95);">
		   <div class="one-half-responsive">			  
			   <?php 
			   if(count($data['examinations_list'])>0){
				    foreach($data['examinations_list'] as $post){
						$url = WWW_PATH."data-reader/".$post->id_entity;
						$date = new DateTime(json_decode($post->value)->datetime);
						?>
						  <div class="toggle">
							 <a href="#" class="toggle-title">
							
							
							 <span class="title"><?php echo $date->format('d.m.Y'); ?> <?php echo json_decode($post->value)->form->form_name; ?><i class="ion-android-add"></i></span></a>
							 <div class="toggle-content" style="display: none;">
							 <?php if(isset(json_decode($post->value)->departament_id)){?>
								<h3><b><?php echo MultyLanguage::translate($data, "department", "translate");?>:</b> <?php echo ArticleView::getPostParam("name",  json_decode($post->value)->departament_id); ?><br/></h3>
							 <?php } ?>
								<?php echo json_decode($post->value)->form->form_content; ?>
								<div class="buttons"><a href="<?php echo $url; ?>" class="icon-go-to-form"><i class="ion ion-ios-arrow-forward"></i></a></div>
							 </div>
						  </div>
					<?php
					}
				}else{ ?>
					<div class="toggle">
						 <a href="#" class="close-form-area toggle-title" style="line-height: initial;padding: 9px;"><?php echo MultyLanguage::translate($data, "no_forms", "translate");?></a>
					</div>
					<?php
				}
				?>
		   </div>
		   <div class="clear"></div>
		</div>
	   </div>
	</div>
</div>
<style>#page-content{min-height: auto!important};</style>