<?php
class profileSettingsModulController extends ArchimedaUser{
	
	public $jsonData;
	public $service	 = "archimeda_examination";
	public $redirect = "primary-handler";
	
	public function getJsonData(){
		$rest = new Rest();
		$postMeta = new PostMeta();
		$postId = $rest->webhook(2);
		$postMetaArr = $postMeta->getPostMeta($postId);
		if(isset($postMetaArr['keys']['data']['value'])){
			$this->jsonData = $postMetaArr['keys']['data']['value'];
		}else{
			$this->jsonData = false;
		}
		
			
	}
	
	
	public function run(){
		
		$article 	= new ArticleView;
		$rest 		= new Rest;
		$id = $article->getStaticId();
		$articleName = $article->getPostParam("name",  $id);
		$articleImage = $article->getPostImage($id);
		
		$custom_data = array(
			"title" =>  $articleName ." | ".Settings::get("title") ,
			"headline" =>  $articleName ,
			"patient_data" =>  json_decode($this->jsonData),
			"meta" => array(
				 '<meta name="keywords" content="'.$article->getPostParam("tags",  $id).'" />',
				 '<meta name="description" content="'.Settings::get("description").'" />',
				 '<meta content="'.$articleName.'" property="og:title" />',
				 '<meta content="'.SERVER_NAME.'" property="og:site_name" />',
				 '<meta content="article" property="og:type" />',
				 '<meta content="'.$articleImage.'" property="og:image" />',
			),
		);
		
		$data = Frontend::get($custom_data);
		
		if($this->jsonData && is_numeric($rest->webhook(2))){
			include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
			include "dnt-view/layouts/".Vendor::getLayout()."/top.php";
			include "tpl.php";
			include "dnt-view/layouts/".Vendor::getLayout()."/bottom.php";
		}
		
	}
}

$modul = new profileSettingsModulController();
$modul->getJsonData();
$modul->run();