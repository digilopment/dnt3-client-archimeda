<?php
class primaryHandlerModulController extends ArchimedaUser{
	
	
	public $route_app 				= "primary-handler";
	public $route_logout 			= "app-logouted";
	public $route_departments 		= "departments";
	public $route_result 			= "result";
	public $route_departments_id	= true;
	public $polls;
	
	protected function useLayoutComposer($data, $template){
		include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
		include "dnt-view/layouts/".Vendor::getLayout()."/top.php";
		include $template.".php";
		include "dnt-view/layouts/".Vendor::getLayout()."/bottom.php";
	}
	
	protected function defaultPage($rest){	
		$article 	= new ArticleView;
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
		$this->useLayoutComposer($data, "tpl");
	}
	
	protected function departamentDetail($rest, $poll_id, $question_id, $poll_input_name, $prevQuestion, $nextQuestion, $progress){	
		$article 	= new ArticleView;
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
		include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
		include "dnt-view/layouts/".Vendor::getLayout()."/top.php";
		include "departament.php";
		include "dnt-view/layouts/".Vendor::getLayout()."/bottom.php";
	}
	
	protected function pollUrl($index, $poll_id, $question_id) {
        $db = new Db;
        $rest = new Rest;

        $result_url = "result";
        $next_question = false;
        $prev_question = false;

        //first question 
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . Vendor::getId() . " AND
		`key`       = 'question' AND
		poll_id 	= '" . $poll_id . "' LIMIT 1";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $first_question = $row['question_id'];
            }
        } else {
            $first_question = false;
        }

        //next question
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . Vendor::getId() . " AND
		`key`       = 'question' AND
		`question_id` > '" . $question_id . "' AND
		poll_id 	= '" . $poll_id . "' LIMIT 1";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $next_question = $row['question_id'];
            }
        } else {
            $next_question = $result_url;
        }

        //prev question
        $query = "SELECT `question_id` FROM dnt_polls_composer WHERE
		vendor_id 	= " . Vendor::getId() . " AND
		`key`       = 'question' AND
		`question_id` < '" . $question_id . "' AND
		poll_id 	= '" . $poll_id . "' order by id desc LIMIT 1";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
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
	
	public function getPolls(){
		if($this->polls){
			return $this->polls;
		}else{
			$db = new Db();
			$rest = new Rest();
			$pollsArr = array();
			$query = Polls::getPolls();
			if($db->num_rows($query)>0){
				foreach($db->get_results($query) as $row){
					$pollsArr[] = $row; 
				}
			}
			$this->polls = $pollsArr;
			return $this->polls;
		}
	}
	
	public function departmentPolls($post){
		if($post['service'])
			$metas = ArticleView::getPostsMeta($post['id_entity'], "article_view_meta");
		else
			$metas = array();

		$poll_id = false;
		foreach($metas as $meta){
			if($meta['key'] == "poll_id"){
				$poll_id =  $meta['value'];
			}
		}
		$poll_id_arr = explode(",", $poll_id);
		return $poll_id_arr;
	}
	
	
	public function getDepartmentPolls($post){
		$pollsArr = array();
		foreach($this->getPolls() as $key => $row){
			if(in_array($row['id_entity'],$this->departmentPolls($post))){
				$pollsArr[$key] = $row;
			}
			
		}
		return $pollsArr;
	}
	
	public function run(){
		
		$rest 			 = new Rest();
		if(
			$rest->webhook(1) == $this->route_app && 
			$rest->webhook(2) == $this->route_departments && 
			is_numeric($rest->webhook(3)) &&
			is_numeric($rest->webhook(4)) &&
			$rest->webhook(5) &&
			is_numeric($rest->webhook(6)) &&
			$this->logged())
		{
			$poll_id 		 = $rest->webhook(4);
			$question_id	 = $rest->webhook(6);
			$poll_input_name = "poll_".$poll_id."_".$question_id;
			
			$prevQuestion = $this->pollUrl("prev", $poll_id, $question_id);
			$nextQuestion = $this->pollUrl("next", $poll_id, $question_id);
			$progress	  = round(PollsFrontend::getProgressPercent($poll_id, $question_id), 0);
			$this->departamentDetail($rest, $poll_id, $question_id, $poll_input_name, $prevQuestion, $nextQuestion, $progress);
		}elseif(
			$rest->webhook(1) == $this->route_app && 
			$rest->webhook(2) == $this->route_departments && 
			is_numeric($rest->webhook(3)) &&
			is_numeric($rest->webhook(4)) &&
			$rest->webhook(5) &&
			$rest->webhook(6) == $this->route_result &&
			$this->logged())
		{
			$custom_data = array(
				"headline" =>  Settings::get("title") ,
			);
		
			$data = Frontend::get($custom_data);
			//var_dump($_COOKIE);exit;
			include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
			include "dnt-view/layouts/".Vendor::getLayout()."/top.php";
			include "result.php";
			include "dnt-view/layouts/".Vendor::getLayout()."/bottom.php";
			
		}
		elseif(
			$rest->webhook(1) == $this->route_app && 
			$rest->webhook(2) == $this->route_departments && 
			is_numeric($rest->webhook(3)) &&
			$this->logged())
		{
			echo "form for departament";
		}
		elseif($rest->webhook(1) == $this->route_app && $this->logged())
		{
			$this->defaultPage($rest);
		}
		else
		{
			Dnt::redirect(WWW_PATH_LANG."app-logouted#login-form_main");
		}

	}
}

$modul = new primaryHandlerModulController();
$modul->run();