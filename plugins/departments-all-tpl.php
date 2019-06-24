<?php
/*
function linear_color($from, $to, $ratio) {
	// normalize ralio
	$ratio = $ratio<0?0:($ratio>1?1:$ratio);
	// unsure colors are numeric values
	if(!is_numeric($from))$from=hexdec($from);
	if(!is_numeric($to))$to=hexdec($to);

	$rf = 0xFF & ($from >> 0x10);
	$gf = 0xFF & ($from >> 0x8);
	$bf = 0xFF & $from;
	$rt = 0xFF & ($to >> 0x10);
	$gt = 0xFF & ($to >> 0x8);
	$bt = 0xFF & $to;
	return str_pad( dechex(($bf + (($bt-$bf)*$ratio)) + ($gf + (($gt-$gf)*$ratio) << 0x8) + ($rf + (($rt-$rf)*$ratio) << 0x10)), 6,'0',STR_PAD_LEFT);
}
$color_from = hexdec('7d7b7b');
$color_to = hexdec('5b5b5b');
for($i=-0.2; $i<=1.3; $i+=0.10){
        echo '<div style="background-color: #';
        echo linear_color($color_from, $color_to, $i);
        echo '">';
        echo 'Result color when n = <strong>'.$i.'</strong>';
        echo '</div>';
    }

exit;
*/
?>

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
					  <i class="<?php echo $post['id']?>" style="background: <?php echo $post['embed']?>"><?php echo substr($post['name'], 0, 2);?></i>
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
		float:right;
		width: 100% !important;
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
	
	
		<div class="content" style="margin-bottom: 0px;">
		
			<div class="one-half-responsive">
		   
			  <div class="toggle" style="border: 0px;">
				 <a href="#" class="close-form-area toggle-title"><center style="color: #1a79b2"><?php echo $post['name'];?></center><i class="ion-android-close"></i></a>
			  </div>
			</div>
		</div>
		
		<div class="content" style="margin-bottom: 0px;">
		   <ul class="tabs">
			  <li class="tab-link current" data-tab="tabs-1-all-<?php echo $post['id_entity'];?>">About</li>
			  <li class="tab-link" data-tab="tabs-2-all-<?php echo $post['id_entity'];?>">Health promotion</li>
			  <li class="tab-link" data-tab="tabs-3-all-<?php echo $post['id_entity'];?>" style="float:right;">Medical Procedures</li>
		   </ul>
		   <div id="tabs-1-all-<?php echo $post['id_entity'];?>" class="tab-content current">
			  <div class="tab-elements">
			  <img src="https://www.skinmedical.co.uk/wp-content/uploads/2013/02/laser-hair-removal-manchester-150x150.jpg" style="float: left;border-radius: 93px;">
				 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				 incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
				 nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			  </div>
		   </div>
		   <div id="tabs-2-all-<?php echo $post['id_entity'];?>" class="tab-content">
			  <div class="tab-elements">
				 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				 incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
				 nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			  </div>
		   </div>
		   <div id="tabs-3-all-<?php echo $post['id_entity'];?>" class="tab-content">
			  <div class="tab-elements">
				 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
				 incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
				 nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			  </div>
		   </div>
		</div>

		<div class="content">
		   <div class="one-half-responsive">
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
 ul.tabs li {
    color: #222;
    font-size: 12px;
}
 .close-form-area.toggle-title center{
	color: #1a79b2;
    font-size: 18px;
    font-weight: bold;
 }
 ul.tabs li.current,
 .tab-content {
    background: #1a79b2;
    color: #fff;
}
 </style>