<?php
//header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$rest = new Rest;
$session = new Sessions;
$data 				= Frontend::get(false);

$siteKey 			= $data['meta_settings']['keys']['gc_site_key']['value']; 
$secretKey 			= $data['meta_settings']['keys']['gc_secret_key']['value'];
$gc 				= new GoogleCaptcha($siteKey, $secretKey);


$type 	= "archimeda-patient";
$email 	= $rest->post("email");
$pass 	= $rest->post("pass");


if($data['meta_settings']['keys']['gc_secret_key']['show'] == 1 && $data['meta_settings']['keys']['gc_site_key']['show'] == 1){
	$NO_CAPTCHA = 0;
	if(isset($_POST['g-recaptcha-response'])){
		$gcResponse = $_POST['g-recaptcha-response'];
	}else{
		$gcResponse = false;
	}
	$gc->setCheckedOptions($gcResponse);
}else{
	$NO_CAPTCHA = 1;
}
$url = false;
$message 	= false;
if(isset($_POST['email'])){
	if($gc->getResult() || $NO_CAPTCHA){
		if($this->validProcessLogin($type, $email, $pass)){
			$session->set("archimeda-patient_logged", "1");
			$session->set("archimeda-patient_id", $email);
			
			Cookie::Set("archimeda-patient_logged", "1");
			Cookie::Set("archimeda-patient_id", $email);
			$RESPONSE 	= 1;
			$ATTACHMENT = 0;
			$url	    = WWW_PATH_LANG."primary-handler";
		}else{
			$RESPONSE 	= 3;
			$ATTACHMENT = 3;	
			$message	= "Invalid user name or password.";
		}
	}else{
		$RESPONSE 	= 2; //no captcha
		$ATTACHMENT = 0;	
	}
}else{
	$RESPONSE 	= 0; //no post
	$ATTACHMENT = 0;	
}

echo '
{
  "success": "'.$RESPONSE.'",
  "request": "POST",
  "response": "'.$RESPONSE.'",
  "custom": "'.$ATTACHMENT.'",
  "imagex": "",
  "protokol": "REST",
  "url": "'.$url.'",
  "lang": "",
  "generator": "Designdnt 3",
  "service": "c_dnt-ajax-universal",
  "message": "'.$message.'"
}';