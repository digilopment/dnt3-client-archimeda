<?php

use DntLibrary\Base\ArticleView;
use DntLibrary\Base\DB;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;
use DntView\Layout\App\ArchimedaUser;

class profileSettingsModulController extends ArchimedaUser
{

    public $listData;
    public $detailData;
    public $service = "archimeda_examination";

    public function getMyExaminationList()
    {
        $db = new DB();
        $rest = new Rest();
        $vendor = new Vendor();
        $service = $this->service;

        $query = "SELECT * FROM dnt_posts_meta WHERE service = '" . $service . "' AND vendor_id = '" . $vendor->getId() . "' order by id_entity desc";
        if ($this->num_rows($query) > 0) {
            foreach ($this->get_results($query, true) as $post) {
                if (isset(json_decode($post->value)->user->email) && isset($this->get()->email) && json_decode($post->value)->user->email == $this->get()->email) {
                    $this->listData[] = $post;
                }
            }
            //$this->listData = $this->get_results($query, true);
        }
    }

    public function getMyExaminationDetail()
    {
        $db = new DB();
        $rest = new Rest();
		 $vendor = new Vendor();
        $id_entity = $rest->webhook(2);

        if (is_numeric($id_entity)) {
            $query = "SELECT * FROM dnt_posts_meta WHERE id_entity = $id_entity AND vendor_id = '" . $vendor->getId() . "' order by id_entity desc ";
            if ($this->num_rows($query) > 0) {
                $this->detailData = $this->get_results($query, true);
            }
        }
    }

    public function run()
    {

        $article = new ArticleView;
        $rest = new Rest;
		$vendor = new Vendor();
		$settings = new Settings();
		$frontend = new Frontend();
        $id = $article->getStaticId();
        $articleName = $article->getPostParam("name", $id);
        $articleImage = $article->getPostImage($id);

        $custom_data = array(
            "title" => $articleName . " | " . $settings->get("title"),
            "headline" => $articleName,
            "examinations_list" => $this->listData,
            "examinations_detail" => $this->detailData,
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

        if ($this->logged()) {
            include "dnt-view/layouts/" . $vendor->getLayout() . "/tpl_functions.php";
            include "dnt-view/layouts/" . $vendor->getLayout() . "/top.php";
            include "tpl.php";
            include "dnt-view/layouts/" . $vendor->getLayout() . "/bottom.php";
        }
    }

}

$modul = new profileSettingsModulController();
$modul->getMyExaminationList();
$modul->getMyExaminationDetail();
$modul->run();
