<?php
class defaultModulController extends ArchimedaUser{
	
	public function run(){
		
		$article 	= new ArticleView;
		$rest 		= new Rest;
		$id = $article->getStaticId();
		$articleName = $article->getPostParam("name",  $id);
		$articleImage = $article->getPostImage($id);
		
		$custom_data = array(
			"title" =>  $articleName ." | ".Settings::get("title") ,
			"headline" =>  Settings::get("title") ,
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
		
		if(!$this->logged()){
			include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
			include "dnt-view/layouts/".Vendor::getLayout()."/top.php";
			include "tpl.php";
			include "dnt-view/layouts/".Vendor::getLayout()."/bottom.php";
		}else{
			Dnt::redirect(WWW_PATH_LANG."primary-handler");
		}
		
	}
}

$modul = new defaultModulController();
$modul->run();