<?php function get_top($data){?>
<!doctype html>
<html lang="<?php echo Frontend::getMetaSetting($data, "language"); ?>">
   <head>
            <meta charset="utf-8">
		<title><?php echo $data['title']; ?></title>
		<?php
		foreach ($data['meta'] as $meta) {
			echo $meta;
		}
		?>
		<meta name="robots" content="index,follow" />
		<meta name="author" content="digilopment">
		<meta name="viewport" content="width=device-width" />
		<?php
		$favicon = Settings::getImage($data['meta_settings']['keys']['favicon']['value']);
		?>
		<!-- Favicone Icon -->
		<link rel="" type="img/x-icon" href="<?php echo $favicon; ?>" />
		<link rel="" type="img/png" href="<?php echo $favicon; ?>" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $favicon; ?>" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla%7CMontserrat">
      <link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/bootstrap3.min.css">
      <link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/lightbox.css">
      <link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/bootstrap-responsive.min.css">
      <link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/main.css">
      <link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/custom.css">
      <link rel="stylesheet" href="<?php echo $data['media_path']; ?>css/sl-slide.css">
	  <script src="<?php echo $data['media_path']; ?>js/lightbox-plus-jquery.min.js"></script>
      <script src="<?php echo $data['media_path']; ?>js/jquery-1.11.1.min.js" type="text/javascript"></script>
	  <script src="<?php echo $data['media_path']; ?>js/jquery.validate.js"></script>
	  <script src="<?php echo $data['media_path']; ?>js/additional-methods.min.js"></script>
      <script src="<?php echo $data['media_path']; ?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	  <script src="https://www.google.com/recaptcha/api.js"></script>
   </head>
<?php } ?>
<?php function get_slider($data) {
   $multylanguage = new MultyLanguage;
   $article = new ArticleView;
   $db = new Db;
   $query = "SELECT * FROM dnt_posts WHERE type = 'post' AND cat_id = '" . AdminContent::getCatId("sliders") . "' AND vendor_id = '" . Vendor::getId() . "' AND `show` > 0 LIMIT 1";
   if ($db->num_rows($query) > 0) {
       ?>
	    <section id="slide-show">
         <div id="slider" class="sl-slider-wrapper">
			<?php
      foreach ($db->get_results($query) as $row) {
          if (Dnt::is_external_url($row['name_url'])) {
              $nameUrl = $row['name_url'];
          } else {
              $nameUrl = false;
          }
          $image = $article->getPostImage($row['id_entity']);
		  ?>
            <div class="sl-slider">
               <div id="staticke_pozadie">
                  <a href="<?php echo $nameUrl; ?>">
                  <img class="pull-right" src="<?php echo $image; ?>" alt="" />
                  </a>
                  <!--Slider Item3-->
               </div>
            </div>
			<?php } ?>
			
            <nav id="nav-arrows" class="nav-arrows">
               <span class="nav-arrow-prev"><i class="icon-angle-left"></i></span>
               <span class="nav-arrow-next"><i class="icon-angle-right"></i></span> 
            </nav>
            <!--/Slider Next Prev button-->
         </div>
         <!-- /slider-wrapper -->           
      </section>
	<?php } ?>  
<?php } ?>
<?php function get_nav_menu($data){
$rest = new Rest();
?>
<!--Header-->
 <div class="navbar-inner">
	<div class="container">
	   <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	   <span class="icon-bar"></span>
	   <span class="icon-bar"></span>
	   <span class="icon-bar"></span>
	   </a>
	   
		<?php
		$logo_firmy = Settings::getImage($data['meta_settings']['keys']['logo_firmy']['value']);
		$logo_url = $data['meta_settings']['keys']['logo_url']['value'];
		?>			
	   <a id="logo" class="pull-left" href="<?php echo $logo_url ?>" style="background: url(<?php echo $logo_firmy; ?>) no-repeat 0 50%;"></a>
	   <div class="nav-collapse collapse ">
		  <ul class="nav">
		  <?php
			foreach (Navigation::getParents() as $row) {
				$name_url_1 = Url::getPostUrl($row['name_url']);
				if ($row['name_url'] == $rest->webhook(1)) {
					$cActive = "active";
				}else{
					$cActive = "";
				}
				echo '<li class="'.$cActive.'"><a href="'.$name_url_1.'">'.$row['name'].'</a></li>';
			}?>
	   </div>
	   <!--/.nav-collapse -->
	</div>
 </div>
 <!-- /header -->
<?php } ?>
<?php function texty_na_homepage($data){ ?>
<style>
   .row-fluid .span4 {padding: 0px;margin: 0px;margin-bottom: 20px;}
</style>
<section id="services">
   <div class="container">
      <div class="center gap">
         <h3>Čo ponúkame</h3>
         <p class="lead">Pozrite sa, čo ponúka Župný Pohár</p>
      </div>
      <div class="row-fluid">
         <?php
            $posts = new ArticleView;
            $image = new Image;
            foreach($posts->getPosts(304) as $post){
            $url = $posts->detailUrl("artilce", $post['id_entity'], $post['name_url']);
            ?>
         <div class="span4">
            <div class="media">
               <div class="pull-left">
                  <i class="<?php echo $post['embed']?> icon-medium"></i>
               </div>
               <div class="media-body">
                  <h4 class="media-heading"><?php echo $post['name']?></h4>
                  <p><?php echo $post['perex']?></p>
               </div>
            </div>
         </div>
         <?php
            }
            ?>
      </div>
   </div>
</section>
<?php } ?>
<?php function rand_images($data){ ?>
      <!--/Services-->
      <section id="recent-works">
         <div class="container">
            <div class="center">
               <h3>Náhodné fotografie</h3>
               <p class="lead">Pozrite si niektoré z fotoalbumov</p>
            </div>
            <div class="gap"></div>
            <ul class="gallery col-xs-12">
		  <?php 
		  $i = 1;
		  $galleryUrl = WWW_PATH."a/15018";
		  $idsArr = Gallery::getGalleriesIds();
		  shuffle($idsArr);
		  foreach($idsArr as $key => $id){
				if($i<=8){
					$img = Image::getFileImage($id);
					if($img){
				?>	<li class="col-md-3 col-sm-6 col-xs-12">
					  <div class="preview">
						 <img alt="" src="<?php echo $img;?>" style="max-height:185px">
						 <div class="overlay">
						 </div>
						 <div class="links">
							<a data-lightbox="gallery" href="<?php echo $img; ?>" ><i class="icon-eye-open"></i></a>						
							<a href="<?php echo $galleryUrl;?>"><i class="icon-link"></i></a>                        
						 </div>
					  </div>
					  <div class="desc">
						 <h5>(popis nie je k dispozícii)</h5>
					  </div>
					  <div id="modal-<?php echo $key;?>" class="modal hide fade">
						 <a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
						 <div class="modal-body">
							<img src="<?php echo $img;?>" alt=" " width="100%" style="max-height:400px">
						 </div>
					  </div>
				   </li>							
				<?php
				$i++;
				}
				}
				}
				?>
            </ul>
         </div>
      </section>
<?php } ?>
<?php function partneri($data){ ?>
     <section id="clients" class="main">
         <div class="container">
            <div class="row-fluid">
               <div class="span2">
                  <div class="clearfix">
                     <h4 class="pull-left">PARTNERI</h4>
                     <div class="pull-right">
                        <a class="prev" href="#myCarousel" data-slide="prev"><i class="icon-angle-left icon-large"></i></a> <a class="next" href="#myCarousel" data-slide="next"><i class="icon-angle-right icon-large"></i></a>
                     </div>
                  </div>
                  <p>Všetkým partnerom ďakujeme a veľmi si ich podporu vážime.</p>
               </div>
               <div class="span10">
                  <div id="myCarousel" class="carousel slide clients">
                     <!-- Carousel items -->
                     <div class="carousel-inner">
                        <div class="active item">
                           <div class="row-fluid">
                              <ul class="thumbnails">
							    <?php
									$posts = new ArticleView;
									$image = new Image;
									foreach($posts->getPosts(1045) as $post){
									$url = $posts->detailUrl("artilce", $post['id_entity'], $post['name_url']);
									$img = $image->getFileImage($post['img'], $path = true, $format = Image::SMALL);
									?>
                                 <li class="span3">
                                    <a href='<?php echo $url; ?>' target='_blank'  title='Bratislavský Samosprávny Kraj'>
                                    <img src='<?php echo $img; ?>'
                                       alt="<?php echo $post['name']?>" 
                                       title="<?php echo $post['name']?>"
                                       style='height: auto;' />
                                    </a>    
                                   </li>    
								    <?php
									}
									?>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <!-- /Carousel items -->
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php } ?>
<?php function get_video_embed($data, $videoId = false){ 
if(!$videoId){
	$videoId = $data['post_id'];
}
$getClor = false;
?>
<style>
.resp-container {position: relative;overflow: hidden;padding-top: 56.25%;}
.resp-iframe {position: absolute;top: 0;left: 0;width: 100%;height: 100%;border: 0;}
</style>
<div class="resp-container">
    <iframe class="resp-iframe" src="<?php echo WWW_PATH; ?>embed/video/<?php echo $videoId."?color=".$getClor; ?>" gesture="media"  allow="encrypted-media" allowfullscreen></iframe>
</div>
<?php } ?>