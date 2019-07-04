<?php
$user = new ArchimedaUser();
?>
<div id="page-transitions">
	<div class="landing-homepage">
	   <div class="landing-page landing-dark">
		  <div class="landing-wrapper">
			 <div class="slide-wrapper">
				<ul>
					<?php $posts = ArticleView::getPosts($sectionId, false, "`order` DESC");
					foreach($posts as $post){ 
					$url = WWW_PATH_LANG."primary-handler/departments/" . $post['id_entity'] . "/".$post['id_entity']."/my-poll/1";
					?>
				   <li>
					  <a <?php if(!$user->logged()){echo 'href="#login-form_main" ';} ?> class="show-departament-forms" id="departamen-form-id-<?php echo $post['id_entity']?>" data-search="<?php echo Dnt::name_url($post['name_url'])?>" data-id="<?php echo $post['id_entity']?>" href="#">
					  <i class="<?php echo $post['id']?>" style="background: <?php echo $post['embed']?>"><?php echo substr($post['name'], 0, 2);?></i>
					  <em><?php echo $post['name']?></em>
					  </a>
				   </li>
				   <?php } ?>				   
				</ul>
			 </div>
			 <div class="clear"></div>
		  </div>
	   </div>
	</div>
	
	<?php 
if($user->logged()){
	foreach($posts as $post){ 
	?>
	<div class="form-area" id="form-area-<?php echo $post['id_entity'];?>">
		<div class="content">
		   <div class="one-half-responsive">
				<div class="toggle">
					<a href="#" class="close-form-area toggle-title"><center style="color: #1a79b2"><?php echo $post['name'];?></center><i class="ion-android-close"></i></a>
				</div>
				<div class="toggle">
				   <a href="#" class="toggle-title departamen-form-id-all-about-<?php echo $post['id_entity'];?>"> <?php echo MultyLanguage::translate($data, "about", "translate");?><i class="ion-android-add"></i></a>
				</div>
				<div class="toggle">
				   <a href="#" class="toggle-title departamen-form-id-all-health-<?php echo $post['id_entity'];?>"> <?php echo MultyLanguage::translate($data, "health_promotion", "translate");?><i class="ion-android-add"></i></a>
				</div>
				<div class="toggle">
				   <a href="#" class="toggle-title departamen-form-id-all-medical-<?php echo $post['id_entity'];?>"> <?php echo MultyLanguage::translate($data, "medical_procedures", "translate");?><i class="ion-android-add"></i></a>
				</div>
			  <?php
				$modul = new primaryHandlerModulController();
				$pollsArr = $modul->getDepartmentPolls($post);
				if(count($pollsArr)>0){
					foreach($pollsArr as $row){
					$url = WWW_PATH_LANG."primary-handler/departments/" . $post['id_entity'] . "/".$row['id_entity']."/my-poll/1";
					?>
					<div class="toggle">
					   <a href="#" class="toggle-title"><?php echo $row['name']; ?><i class="ion-android-add"></i></a>
					   <div class="toggle-content" style="display: none;">
						  <?php echo $row['content']; ?>
							<a href="<?php echo $url; ?>" class="button button-round button-blue profile-page-button-1"><?php echo MultyLanguage::translate($data, "go_to_form", "translate");?></a>
					   </div>
					</div>
					<?php
					}
				}else{
					?>
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
	  <script>
		 $("#departamen-form-id-<?php echo $post['id_entity']?>").on('click', function() {
		  $("#form-area-<?php echo $post['id_entity'];?>").fadeIn();
		});
		 
		 $(".close-form-area").on('click', function() {
		  $("#form-area-<?php echo $post['id_entity'];?>").fadeOut();
		});
		 </script>
	<?php } ?>
	
 <div class="overlay dark-overlay"></div>
 <?php } ?>
 </div>