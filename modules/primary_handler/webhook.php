<?php

use DntLibrary\Base\ArticleView;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\Polls;
use DntLibrary\Base\PollsFrontend;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Settings;
use DntLibrary\Base\Vendor;
use DntView\Layout\App\ArchimedaUser;

class primaryHandlerModulController extends ArchimedaUser
{

    public $route_app = "primary-handler";
    public $route_logout = "app-logouted";
    public $route_departments = "departments";
    public $route_result = "result";
    public $route_departments_id = true;
    public $polls;

	public function __construct(){
		parent::__construct();
		$this->db = new DB();
		$this->vendor = new Vendor();
		$this->settings = new Settings();
		$this->frontend = new Frontend();
		$this->polls = new Polls();
		$this->dnt = new Dnt();
		$this->articleView = new ArticleView();
	}
	
    protected function useLayoutComposer($data, $template)
    {
        include "dnt-view/layouts/" . $this->vendor->getLayout() . "/tpl_functions.php";
        include "dnt-view/layouts/" . $this->vendor->getLayout() . "/top.php";
        include $template . ".php";
        include "dnt-view/layouts/" . $this->vendor->getLayout() . "/bottom.php";
    }

    protected function defaultPage($rest)
    {
        $id = $this->articleView->getStaticId();
        $articleName = $this->articleView->getPostParam("name", $id);
        $articleImage = $this->articleView->getPostImage($id);
        $custom_data = array(
            "title" => $articleName . " | " . $this->settings->get("title"),
            "headline" => $this->settings->get("title"),
            "meta" => array(
                '<meta name="keywords" content="' . $this->articleView->getPostParam("tags", $id) . '" />',
                '<meta name="description" content="' . $this->settings->get("description") . '" />',
                '<meta content="' . $articleName . '" property="og:title" />',
                '<meta content="' . SERVER_NAME . '" property="og:site_name" />',
                '<meta content="article" property="og:type" />',
                '<meta content="' . $articleImage . '" property="og:image" />',
            ),
        );
        $data = $this->frontend->get($custom_data);
        $this->useLayoutComposer($data, "tpl");
    }

    protected function departamentDetail($rest, $poll_id, $question_id, $poll_input_name, $prevQuestion, $nextQuestion, $progress)
    {
        $id = $this->articleView->getStaticId();
        $articleName = $this->articleView->getPostParam("name", $id);
        $articleImage = $this->articleView->getPostImage($id);

        $custom_data = array(
            "title" => $articleName . " | " . $this->settings->get("title"),
            "headline" => $this->settings->get("title"),
            "meta" => array(
                '<meta name="keywords" content="' . $this->articleView->getPostParam("tags", $id) . '" />',
                '<meta name="description" content="' . $this->settings->get("description") . '" />',
                '<meta content="' . $articleName . '" property="og:title" />',
                '<meta content="' . SERVER_NAME . '" property="og:site_name" />',
                '<meta content="article" property="og:type" />',
                '<meta content="' . $articleImage . '" property="og:image" />',
            ),
        );
        $data = $this->frontend->get($custom_data);
        include "dnt-view/layouts/" . $this->vendor->getLayout() . "/tpl_functions.php";
        include "dnt-view/layouts/" . $this->vendor->getLayout() . "/top.php";
        include "departament.php";
        include "dnt-view/layouts/" . $this->vendor->getLayout() . "/bottom.php";
    }

    protected function pollUrl($index, $poll_id, $question_id)
    {
        $rest = new Rest;

        $result_url = "result";
        $next_question = false;
        $prev_question = false;

        //first question 
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		`key`       = 'question' AND
		poll_id 	= '" . $poll_id . "' LIMIT 1";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $first_question = $row['question_id'];
            }
        } else {
            $first_question = false;
        }

        //next question
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		`key`       = 'question' AND
		`question_id` > '" . $question_id . "' AND
		poll_id 	= '" . $poll_id . "' LIMIT 1";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $next_question = $row['question_id'];
            }
        } else {
            $next_question = $result_url;
        }

        //prev question
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . $this->vendor->getId() . " AND
		`key`       = 'question' AND
		`question_id` < '" . $question_id . "' AND
		poll_id 	= '" . $poll_id . "' order by id desc LIMIT 1";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $prev_question = $row['question_id'];
            }
        } else {
            $prev_question = 1;
        }

        if ($index == "next")
            return WWW_PATH_LANG . "" . $rest->webhook(1) . "/" . $rest->webhook(2) . "/" . $rest->webhook(3) . "/" . $poll_id . "/" . $rest->webhook(5) . "/" . $next_question;
        elseif ($index == "prev") {
            return WWW_PATH_LANG . "" . $rest->webhook(1) . "/" . $rest->webhook(2) . "/" . $rest->webhook(3) . "/" . $poll_id . "/" . $rest->webhook(5) . "/" . $prev_question;
        } elseif ($index == "first") {
            return WWW_PATH_LANG . "" . $rest->webhook(1) . "/" . $rest->webhook(2) . "/" . $rest->webhook(3) . "/" . $poll_id . "/" . $rest->webhook(5) . "/" . $first_question;
        }
    }

    public function getPolls()
    {
		$rest = new Rest();
		$pollsArr = array();
		$query = $this->polls->getPolls();
		if ($this->db->num_rows($query) > 0) {
			foreach ($this->db->get_results($query) as $row) {
				$pollsArr[] = $row;
			}
		}
		return $pollsArr;
    }

    public function departmentPolls($post)
    {
        if ($post['service'])
            $metas = $this->articleView->getPostsMeta($post['id_entity'], "article_view_meta");
        else
            $metas = array();

        $poll_id = false;
        foreach ($metas as $meta) {
            if ($meta['key'] == "poll_id") {
                $poll_id = $meta['value'];
            }
        }
        $poll_id_arr = explode(",", $poll_id);
		if(count($poll_id_arr)>0){
			return $poll_id_arr;
		}else{
			return [];
		}
    }

    public function getDepartmentPolls($post)
    {
        $pollsArr = array();
		$polls = $this->departmentPolls($post);
        foreach ($this->getPolls() as $key => $row) {
            if (in_array($row['id_entity'], $polls)) {
                $pollsArr[$key] = $row;
            }
        }
        return $pollsArr;
    }

    public function run()
    {

        $rest = new Rest();
        if (
                $rest->webhook(1) == $this->route_app &&
                $rest->webhook(2) == $this->route_departments &&
                is_numeric($rest->webhook(3)) &&
                is_numeric($rest->webhook(4)) &&
                $rest->webhook(5) &&
                is_numeric($rest->webhook(6)) &&
                $this->logged()) {
            $poll_id = $rest->webhook(4);
            $question_id = $rest->webhook(6);
            $poll_input_name = "poll_" . $poll_id . "_" . $question_id;

            $prevQuestion = $this->pollUrl("prev", $poll_id, $question_id);
            $nextQuestion = $this->pollUrl("next", $poll_id, $question_id);
            $progress = round($this->frontend->getProgressPercent($poll_id, $question_id), 0);
            $this->departamentDetail($rest, $poll_id, $question_id, $poll_input_name, $prevQuestion, $nextQuestion, $progress);
        } elseif (
                $rest->webhook(1) == $this->route_app &&
                $rest->webhook(2) == $this->route_departments &&
                is_numeric($rest->webhook(3)) &&
                is_numeric($rest->webhook(4)) &&
                $rest->webhook(5) &&
                $rest->webhook(6) == $this->route_result &&
                $this->logged()) {
            $custom_data = array(
                "headline" => $this->settings->get("title"),
            );

            $data = $this->frontend->get($custom_data);
            //var_dump($_COOKIE);exit;
            include "dnt-view/layouts/" . $this->vendor->getLayout() . "/tpl_functions.php";
            include "dnt-view/layouts/" . $this->vendor->getLayout() . "/top.php";
            include "result.php";
            include "dnt-view/layouts/" . $this->vendor->getLayout() . "/bottom.php";
        } elseif (
                $rest->webhook(1) == $this->route_app &&
                $rest->webhook(2) == $this->route_departments &&
                is_numeric($rest->webhook(3)) &&
                $this->logged()) {
            echo "form for departament";
        } elseif ($rest->webhook(1) == $this->route_app && $this->logged()) {
            $this->defaultPage($rest);
        } else {
            $this->dnt->redirect(WWW_PATH_LANG . "app-logouted#login-form_main");
        }
    }

}

$modul = new primaryHandlerModulController();
$modul->run();
