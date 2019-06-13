<?php
class homepageModulController{
	
	public function run(){
		$article 	= new ArticleView;
		$rest 		= new Rest;
		$id = $article->getStaticId();
		$articleName = $article->getPostParam("name",  $id);
		$articleImage = $article->getPostImage($id);
		/*//$this->init();
		var_dump($this->data->rest->get("test"));
		var_dump($this->data->vendor->getId());
		*/
		
		$custom_data = array(
			"title" =>  $articleName ." | ".Settings::get("title") ,
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
		include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
		include "dnt-view/layouts/".Vendor::getLayout()."/top.php";
		include "tpl.php";
		include "dnt-view/layouts/".Vendor::getLayout()."/bottom.php";
		
	}
}

$modul = new homepageModulController;
$modul->run();