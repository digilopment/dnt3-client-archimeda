<div id="page-transitions">
	<div class="landing-homepage">
	   <div class="landing-page landing-dark">
		  <div class="landing-wrapper">
			 <div class="slide-wrapper">
				<ul>
					<?php $posts = ArticleView::getPosts($sectionId, false, "`order` DESC");
					foreach($posts as $post){ 
					$url = WWW_PATH."primary-handler/departments/" . $post['id_entity'] . "/124/my-poll/1";
					?>
				   <li>
					  <a class="show-departament-forms" id="departamen-form-id-<?php echo $post['id_entity']?>" data-search="<?php echo Dnt::name_url($post['name_url'])?>" data-id="<?php echo $post['id_entity']?>" href="#">
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
	
	<?php foreach($posts as $post){ 
	?>
	<div class="form-area" id="form-area-<?php echo $post['id_entity'];?>">
		<div class="content">
		   <div class="one-half-responsive">
		   
				  <div class="toggle">
					 <a href="#" class="close-form-area toggle-title"><center style="color: #1a79b2"><?php echo $post['name'];?></center><i class="ion-android-close"></i></a>
				  </div>
				  <div class="toggle">
				   <a href="#" class="toggle-title departamen-form-id-all-about-<?php echo $post['id_entity'];?>"> About<i class="ion-android-add"></i></a>
				</div>
				<div class="toggle">
				   <a href="#" class="toggle-title departamen-form-id-all-health-<?php echo $post['id_entity'];?>"> Health promotion<i class="ion-android-add"></i></a>
				</div>
				<div class="toggle">
				   <a href="#" class="toggle-title departamen-form-id-all-medical-<?php echo $post['id_entity'];?>"> Medical Procedures<i class="ion-android-add"></i></a>
				</div>
			   <?php 
			   $db = new Db();
			   $rest = new Rest();
			   $query = Polls::getPolls();
			   if($db->num_rows($query)>0){
					foreach($db->get_results($query) as $row){
						if($row['parent_id'] == $post['id_entity']){
						$url = WWW_PATH."primary-handler/departments/" . $post['id_entity'] . "/".$row['id_entity']."/my-poll/1";
						?>
						  <div class="toggle">
							 <a href="#" class="toggle-title"><?php echo $row['name']; ?><i class="ion-android-add"></i></a>
							 <div class="toggle-content" style="display: none;">
								<?php echo $row['content']; ?>
								<div class="buttons"><a href="<?php echo $url; ?>" class="icon-go-to-form"><i class="ion ion-ios-arrow-forward"></i></a></div>
							 </div>
						  </div>
						<?php 
						}else{
							?>
							<div class="toggle">
								 <a href="#" class="close-form-area toggle-title" style="line-height: initial;padding: 9px;">We are sorry, but for this departament we don`t have eny forms. Please try the other departament.</a>
							</div>
							<?php
						}
					}
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
 </div>
 
 <style>
 </style>