<?php

use DntLibrary\Base\ArticleView;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\PostMeta;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;
use DntView\Layout\App\ArchimedaUser;

class profileSettingsModulController extends ArchimedaUser
{

    public $jsonData;
    public $service = "archimeda_examination";
    public $redirect = "primary-handler";

    public function getJsonData()
    {
        $rest = new Rest();
        $postMeta = new PostMeta();
        $postId = $rest->webhook(2);
        $postMetaArr = $postMeta->getPostMeta($postId);
        if (isset($postMetaArr['keys']['data']['value'])) {
            $this->jsonData = $postMetaArr['keys']['data']['value'];
        } else {
            $this->jsonData = false;
        }
    }

    public function run()
    {
        $article = new ArticleView;
        $rest = new Rest;
        $vendor = new Vendor;
        $frontend = new Frontend;
        $settings = new Settings;
        $id = $article->getStaticId();
        $articleName = $article->getPostParam("name", $id);
        $articleImage = $article->getPostImage($id);

        $custom_data = array(
            "title" => $articleName . " | " . $settings->get("title"),
            "headline" => $articleName,
            "patient_data" => json_decode($this->jsonData),
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
        if ($this->jsonData && is_numeric($rest->webhook(2))) {
            include "dnt-view/layouts/" . $vendor->getLayout() . "/tpl_functions.php";
            include "dnt-view/layouts/" . $vendor->getLayout() . "/top.php";
            include "tpl.php";
            include "dnt-view/layouts/" . $vendor->getLayout() . "/bottom.php";
        }
    }

}

$modul = new profileSettingsModulController();
$modul->getJsonData();
$modul->run();
