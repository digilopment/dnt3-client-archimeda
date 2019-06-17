<div id="page-transitions">
	<div class="landing-homepage">
	   <div class="landing-page landing-dark">
		  <div class="landing-wrapper">
			 <div class="slide-wrapper">
				<ul>
					<?php $posts = ArticleView::getPosts("1266", false, "`order` DESC");
					foreach($posts as $post){ ?>
				   <li>
					  <a href="<?php echo WWW_PATH?>primary-handler/departments/124/my-poll/1">
					  <i class="<?php echo $post['embed']?>"></i>
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
 </div>
 <div class="overlay dark-overlay"></div>