<?php
class rpcModulController extends archimedaUser{
	
	public function run(){
		$rest 		= new Rest;
		$db 		= new Db;
		if($rest->webhook(2) == "json" && $rest->webhook(3) == "registration-form"){
			include "registration-form.php";
		}elseif($rest->webhook(2) == "json" && $rest->webhook(3) == "logout-form"){
			include "logout-form.php";
		}elseif($rest->webhook(2) == "json" && $rest->webhook(3) == "login-form"){
			include "login-form.php";
		}elseif($rest->webhook(2) == "json" && $rest->webhook(3) == "update-profile"){
			include "update-profile.php";
		}elseif($rest->webhook(2) == "json" && $rest->webhook(3) == "save-form-data"){
			include "save-form-data.php";
		}
		elseif($rest->webhook(2) == "xml" && $rest->webhook(3) == "sitemap"){
			include "sitemap.php";
		}else{
			$rest->loadDefault();
		}
	}
	
	
	 protected function validProcessLogin($type, $email, $pass) {
        $db = new Db;
        $query = "SELECT pass FROM dnt_registred_users WHERE type = '$type' AND email = '" . $email . "' AND vendor_id = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $db_pass = $row['pass'];
            }
            if ($db_pass == md5($pass)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

$app = new rpcModulController();
$app->run();

/*
class rpcModulController{
	
	
	protected $run;
	
	protected function sitemap(){
		$rest 		= new Rest;
		if($rest->webhook(2) == "xml" && $rest->webhook(3) == "sitemap"){
			include "sitemap.php";
			$this->run = true;
		}
		$this->run = false;
	}
	
	protected function contactForm(){
		$rest 		= new Rest;
		if($rest->webhook(2) == "json" && $rest->webhook(3) == "contact-form"){
			include "contact-form.php";
			$this->run = true;
		}
		$this->run = false;
	}
	
	public function run(){
		if($this->run){
			$this->run();
		}
	}
}

$rpcModulController = new rpcModulController();
$rpcModulController->run();
*/