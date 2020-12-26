<?php

use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;
use DntView\Layout\App\ArchimedaUser;

class defaultModulController extends ArchimedaUser
{

	public function __construct(){
		parent::__construct();
	}
    public function run()
    {

        $article = new ArticleView();
        $rest = new Rest();
        $settings = new Settings();
        $vendor = new Vendor();
        $frontend = new Frontend();
        $dnt = new Dnt();
        $id = $article->getStaticId();
        $articleName = $article->getPostParam("name", $id);
        $articleImage = $article->getPostImage($id);

        $custom_data = array(
            "title" => $articleName . " | " . $settings->get("title"),
            "headline" => $settings->get("title"),
            "meta" => array(
                '<meta name="keywords" content="' . $article->getPostParam("tags", $id) . '" />',
                '<meta name="description" content="' . $settings->get("description") . '" />',
                '<meta content="' . $articleName . '" property="og:title" />',
                '<meta content="' . SERVER_NAME . '" property="og:site_name" />',
                '<meta content="article" property="og:type" />',
                '<meta content="' . $articleImage . '" property="og:image" />',
            ),
        );
        $data = $frontend->get($custom_data);

        if (!$this->logged()) {
            include "dnt-view/layouts/" . $vendor->getLayout() . "/tpl_functions.php";
            include "dnt-view/layouts/" . $vendor->getLayout() . "/top.php";
            include "tpl.php";
            include "dnt-view/layouts/" . $vendor->getLayout() . "/bottom.php";
        } else {
            $dnt->redirect(WWW_PATH_LANG . "primary-handler");
        }
    }

}

$modul = new defaultModulController();
$modul->run();
