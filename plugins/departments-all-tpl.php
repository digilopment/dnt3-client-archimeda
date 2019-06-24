<div id="page-transitions">
	<div class="landing-homepage">
	   <div class="landing-page landing-dark">
		  <div class="landing-wrapper">
			 <div class="slide-wrapper">
			 
				<?php
				$catArr = array(1267=>"Internal Medicine", 1268=>"Surgery", 1269=>"Independent");
				foreach($catArr as $catId => $catName){
				?>
				<ul>
					<span class="title"><?php echo $catName; ?></span>
					<?php $posts = ArticleView::getPosts($catId, false, "`order` DESC");
					foreach($posts as $key=>$post){ 
					$url = WWW_PATH."primary-handler/departments/" . $post['id_entity'] . "/124/my-poll/1";
					$allPosts[] = $post;
					?>
				   <li>
					  <a class="show-departament-forms" id="departamen-form-id-all-<?php echo $post['id_entity']?>" data-search="<?php echo Dnt::name_url($post['name_url'])?>" data-id="<?php echo $post['id_entity']?>" href="#">
					  <i class="<?php echo $post['id']?>" style="background: #<?php echo Color::randColor()?>"><?php echo substr($post['name'], 0, 1);?></i>
					  <em><?php echo $post['name']?></em>
					  </a>
				   </li>
				   <?php } ?>				   
				</ul>
				<?php } ?>	
			 </div>
			 <div class="clear"></div>
		  </div>
	   </div>
	</div>
	
	<style>
	
	.all-departaments .slide-wrapper{
		float: left;
		padding: 5px;
		background-color: #efefef;
	}

	.all-departaments .slide-wrapper ul{
		position: relative;
		float: right;
		background-color: #fff;
		padding: 0px;
		border-radius: 5px;
		margin-top: 0px;
		margin-bottom: 10px;
	}

	.all-departaments .slide-wrapper .title{
		display: block;
		margin-left: 25px;
		color: #1a79b2;
		font-weight: bold;
		font-size: 14px;
		text-transform: uppercase;
		margin-top: 10px;
	}
	
	.landing-homepage ul li a i {
		font-style: normal;
	}

	</style>
	
	<?php foreach($allPosts as $post){  ?>
	<div class="form-area" id="form-area-all-<?php echo $post['id_entity'];?>">
		<div class="content">
		   <div class="one-half-responsive">
		   
			  <div class="toggle">
				 <a href="#" class="close-form-area toggle-title"><center style="color: #1a79b2"><?php echo $post['name'];?></center><i class="ion-android-close"></i></a>
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
		 $("#departamen-form-id-all-<?php echo $post['id_entity']?>").on('click', function() {
		  $("#form-area-all-<?php echo $post['id_entity'];?>").fadeIn();
		});
		 
		 $(".close-form-area").on('click', function() {
		  $("#form-area-all-<?php echo $post['id_entity'];?>").fadeOut();
		});
		 </script>
	<?php } ?>
 
 
 
 <div class="overlay dark-overlay"></div>
 </div>
 
 <style>
 </style>