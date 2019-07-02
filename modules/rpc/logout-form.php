<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
class logoutModulController{
	
	public function run(){
		
		$session 	= new Sessions;
		$session->set("archimeda-patient_logged", "0");
		$session->set("archimeda-patient_id", "");
		
		Cookie::Delete("archimeda-patient_logged");
		Cookie::Delete("archimeda-patient_id");
		
		$url = WWW_PATH_LANG."app-logouted";
		$RESPONSE = "1";
		echo '
		{
		  "success": "'.$RESPONSE.'",
		  "request": "GET",
		  "response": "'.$RESPONSE.'",
		  "url": "'.$url.'",
		  "protokol": "REST",
		  "generator": "Designdnt 3",
		  "service": "c_dnt-ajax-universal",
		  "message": "Silence is golden, speech is gift :)"
		}';
		
	}
}

$modul = new logoutModulController;
$modul->run();
