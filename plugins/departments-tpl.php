<div id="page-transitions">
	<div class="landing-homepage">
	   <div class="landing-page landing-dark">
		  <div class="landing-wrapper">
			 <div class="slide-wrapper">
				<ul>
					<?php $posts = ArticleView::getPosts("1266", false, "`order` DESC");
					foreach($posts as $post){ 
					$url = WWW_PATH."primary-handler/departments/" . $post['id_entity'] . "/124/my-poll/1";
					?>
				   <li>
					  <a class="show-departament-forms" data-search="<?php echo Dnt::name_url($post['name_url'])?>" data-id="<?php echo $post['id_entity']?>" href="#">
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
	
	<div class="form-area">
		<div class="content">
   <div class="one-half-responsive">
   
	  <div class="toggle">
         <a href="#" class="close-form-area toggle-title"><center style="color: #1a79b2">close</center><i class="ion-android-close"></i></a>
      </div>
	  
	   <?php 
	   $db = new Db();
	   $rest = new Rest();
	   $query = Polls::getPolls();
	   if($db->num_rows($query)>0){
			foreach($db->get_results($query) as $row){
				$url = WWW_PATH."primary-handler/departments/" . $post['id_entity'] . "/124/my-poll/1";
		?>
		
		  <div class="toggle">
			 <a href="#" class="toggle-title"><?php echo $row['name']; ?><i class="ion-android-add"></i></a>
			 <div class="toggle-content" style="display: none;">
				<?php echo $row['content']; ?>
				<div class="buttons"><a href="<?php echo $url; ?>" class="icon-go-to-form"><i class="ion ion-ios-arrow-forward"></i></a></div>
			 </div>
		  </div>
	  <?php 
			}
	   }
	?>
	  
      <div class="toggle">
         <a href="#" class="toggle-title">Custom Form 1<i class="ion-android-add"></i></a>
         <div class="toggle-content" style="display: none;">
            <p>
               Ad nihil populo evertitur sea. Facer delectus id cum, cu stet blandit quo. Pertinax interpretaris no vim, vide malorum ea mel. Expetendis honestatis ex vel, verterem democritum liberavisse cum ea. Ei noster scaevola necessitatibus sit, ei pro probo habemus.
            </p>
			<p><a href="#" class="button button-blue button-round button-bold button-xs">GET A QUOTE</a></p>
         </div>
      </div>
      <div class="toggle">
         <a href="#" class="toggle-title">Custom Form 2<i class="ion-android-add"></i></a>
         <div class="toggle-content">
            <p>
               Lorem ipsum dolor sit amet, eos et nostro dicunt, vitae quaestio nec an. Ea quo iisque vivendum singulis. Malis labore pro ei. Eum et nibh delectus, et eum hinc utamur fabulas.
            </p>
         </div>
      </div>
      <div class="toggle">
         <a href="#" class="toggle-title">Custom Form 3<i class="ion-android-add"></i></a>
         <div class="toggle-content">
            <p>
              Ad nihil populo evertitur sea. Facer delectus id cum, cu stet blandit quo. Pertinax interpretaris no vim, vide malorum ea mel. Expetendis honestatis ex vel, verterem democritum liberavisse cum ea. Ei noster scaevola necessitatibus sit, ei pro probo habemus.
            </p>
         </div>
      </div>
   </div>
   <div class="clear"></div>
</div>
 </div>
 <div class="overlay dark-overlay"></div>
 </div>
 <script>
 $(".show-departament-forms").on('click', function() {
  //  ret = DetailsView.GetProject($(this).attr("#data-id"), OnComplete, OnTimeOut, OnError);
  //alert($(this).attr("data-id"));
  $(".form-area").fadeIn();
});
 
 $(".close-form-area").on('click', function() {
  $(".form-area").fadeOut();
});
 </script>
 
 <style>
 .buttons{
	 text-align:center;
 }
 a.icon-go-to-form{
    display: inline-block;
    width: 40px;
    height: 40px;
    background-color: #1a79b2;
    border-radius: 24px;
    text-align: right;
    position: relative;
 }
 a.icon-go-to-form i{
    position: relative;
    height: initial;
    width: initial;
    line-height: inherit;
    top: initial;
    color: #fff;
	font-size: 30px !important;
    padding: 5px 13px;
 }
 .form-area{
	display: none;
    position: absolute;
    background-color: rgba(255,255,255,0.95);
    width: 100%;
    min-height: 1000px;
    z-index: 9999;
    top: 60px;
    left: 0px;
 }
 </style>