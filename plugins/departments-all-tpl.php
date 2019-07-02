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
$modul = new primaryHandlerModulController();
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
   
   
   <?php 
   foreach($allPosts as $post){?>
   <div class="form-area" id="form-area-all-<?php echo $post['id_entity'];?>">
      <div class="content" style="margin-bottom: 0px;">
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
         </div>
         <div class="clear"></div>
      </div>
      <div class="content">
         <div class="one-half-responsive">
            <?php 
			$i = 0;
			if(count($modul->getPolls())>0){
				foreach($modul->getPolls() as $row){
					$i++;
					if(in_array($row['id_entity'],$modul->departmentPolls($post))){
					$url = WWW_PATH."primary-handler/departments/" . $post['id_entity'] . "/".$row['id_entity']."/my-poll/1";
					   ?>
						<div class="toggle">
						   <a href="#" class="toggle-title"><?php echo $row['name']; ?><i class="ion-android-add"></i></a>
						   <div class="toggle-content" style="display: none;">
							  <?php echo $row['content']; ?>
							  <?php /*<div class="buttons"><a href="<?php echo $url; ?>" class="icon-go-to-form"><i class="ion ion-ios-arrow-forward"></i></a></div> */?>
							  <a href="<?php echo $url; ?>" class="button button-round button-blue profile-page-button-1"><?php echo MultyLanguage::translate($data, "go_to_form", "translate");?></a>
						   </div>
						</div>
					<?php 
					}else{ 
						if($i<=1){
						?>
							<div class="toggle">
							   <a href="#" class="close-form-area toggle-title" style="line-height: initial;padding: 9px;"><?php echo MultyLanguage::translate($data, "no_forms", "translate");?></a>
							</div><?php
						}
					}
				}
            }
		?>
         </div>
         <div class="clear"></div>
      </div>
   </div>
   <script>
      $(document).ready(function(){
       
      function dataReaderTpl<?php echo $post['id_entity'];?>(title, text){
      var showData = "";
      	showData +='<div class="content-fullscreen content">';
      	   showData +='<div class="animate-fadse">';
      		  showData +='<img class="nav-img" src="<?php echo Settings::getImage($data['meta_settings']['keys']['logo_firmy_2']['value']); ?>" alt="">';
      		  showData +='<div class="content">';
      			 showData +='<h3><b>'+title+'</b><br/></h3>';
      			 //showData +='<p>';
      				showData += text;            
      			 //showData +='</p>';
      		  showData +='</div>';
      	   showData +='</div>';
      	showData +='</div>';
      return showData;
      }
      
	  <?php
		$textAbout = false;
		$textHealth = false;
		$textMedical = false;
		if($post['service']){
			$metas = ArticleView::getPostsMeta($post['id_entity'], "article_view_meta");
			foreach($metas as $meta){
				if($meta['key'] == "about"){
					$textAbout =  html_entity_decode(trim(preg_replace('/\s\s+/', ' ', $meta['value'])));
				}
				if($meta['key'] == "health"){
					$textHealth =  html_entity_decode(trim(preg_replace('/\s\s+/', ' ', $meta['value'])));
				}
				if($meta['key'] == "medical"){
					$textMedical =  html_entity_decode(trim(preg_replace('/\s\s+/', ' ', $meta['value'])));
				}
			}
		}?>
	
      $(".departamen-form-id-all-about-<?php echo $post['id_entity'];?>").on('click', function() {
		  $(".coverpage-slider").fadeOut();
		  $("#data-reader").html("");
		  var text = '<?php echo $textAbout;?>';
		  $("#data-reader").html(dataReaderTpl<?php echo $post['id_entity'];?>("About", text));
      });
      
      $(".departamen-form-id-all-health-<?php echo $post['id_entity'];?>").on('click', function() {
		  $(".coverpage-slider").fadeOut();
		  $("#data-reader").html("");
		  var text = '<?php echo $textMedical;?>';
		  $("#data-reader").html(dataReaderTpl<?php echo $post['id_entity'];?>("Health promotion", text));
      });
      
      $(".departamen-form-id-all-medical-<?php echo $post['id_entity'];?>").on('click', function() {
		  $(".coverpage-slider").fadeOut();
		  $("#data-reader").html("");
		  var text = '<?php echo $textMedical;?>';
		  $("#data-reader").html(dataReaderTpl<?php echo $post['id_entity'];?>("Medical Procedures", text));
      });
      
      
      $("#departamen-form-id-all-<?php echo $post['id_entity']?>").on('click', function() {
       $("#form-area-all-<?php echo $post['id_entity'];?>").fadeIn();
      });
	  
	  $(".close-form-area").on('click', function() {
		  $("#form-area-all-<?php echo $post['id_entity'];?>").fadeOut();
	   });
      
      
      
      });
   </script>
   <?php } ?>
   <script>
      $(document).ready(function(){
		  $("#close-reader").click(function() {
			  $("#data-reader").html("");
			  $(".coverpage-slider").fadeIn();
		  });
      });
   </script>
   
   <div class="overlay dark-overlay"></div>
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
	
 ul.tabs li {
    color: #222;
    font-size: 12px;
}
 .close-form-area.toggle-title center{
	color: #1a79b2;
    font-size: 16px;
	text-transform: uppercase;
    font-weight: bold;
 }
 ul.tabs li.current,
 .tab-content {
    background: #1a79b2;
    color: #fff;
}
.toggle .toggle-title {
    padding: 9px;
}

/*
.integreated-data-reader{
	position: absolute;
    top: 0px;
    width: 100%;
    height: auto;
    padding: 8px;
    background-color: #fff;
    z-index: 99;
}
*/
#integreated-data-reader .close-reader i {
	line-height: 1px;
	height: 10px;
    color: #333;
    font-size: 17px;
    margin-left: 8px;
}
#integreated-data-reader a.close-reader {
    border: 1px solid #333;
    border-radius: 49px;
    height: 29px;
    width: 29px;
	margin-left: 20px;
	display: block;
    min-height: auto;
}
 </style>