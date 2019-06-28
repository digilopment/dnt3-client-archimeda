<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

class rpcRegistrationUser extends ArchimedaUser{
	
	
	protected $table 	= "dnt_registred_users";
	protected $type 	= "archimeda-patient";
	
	public function userExists($email) {
        $db = new Db;
        $query = "SELECT email FROM ".$this->table." WHERE email = '" . $email . "' AND type = '".$this->type."' AND vendor_id = '" . Vendor::getId() . "'";
        if ($db->num_rows($query) > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	public function run(){
		$rest 				= new Rest;
		$db					= new Db;
		$dntMailer			= new Mailer;
		
		$data 				= Frontend::get(false);
		$siteKey 			= $data['meta_settings']['keys']['gc_site_key']['value']; 
		$secretKey 			= $data['meta_settings']['keys']['gc_secret_key']['value'];
		$gc 				= new GoogleCaptcha($siteKey, $secretKey);
		
		$message 			=	false;


		$form_base_name 	= $rest->post("name");
		$form_base_surname 	= $rest->post("surname");
		$form_base_email 	= $rest->post("email");
		$form_base_tel_c 	= $rest->post("form_base_tel_c");
		$form_base_pass 	= $rest->post("password");
		$form_base_custom_1 = ""; //json meta data

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

		if(isset($_POST['sent'])){
			if($gc->getResult() || $NO_CAPTCHA){
				
				
				if(!$this->userExists($form_base_email)){
					$attachment = "";
					
					$filePath = "dnt-view/data/external-uploads/";
					if(isset($_FILES['form_user_image_1']) ){  
						$dntUpload = new Upload($_FILES['form_user_image_1']); 
						if ($dntUpload->uploaded) {
						   // save uploaded image with no changes
						   $dntUpload->image_resize = true;
						   $dntUpload->image_convert = 'jpg';
						   $dntUpload->image_x = 800;
						   //$dntUpload->image_max_width = 800;   
						   $dntUpload->image_ratio_y = true;
						   $dntUpload->Process($filePath);
						   if ($dntUpload->processed) {
							 $CUSTOM = json_encode(var_export($_FILES['form_user_image_1'], true));
							 $attachment =  "".WWW_PATH."".$filePath."".$dntUpload->file_dst_name."";
						   } else {
							 $attachment = "";
						   }
						}
					}
					
					$table								= $this->table;
					
					$insertedData["`type`"] 			= "archimeda-patient";
					$insertedData["`vendor_id`"] 		= Vendor::getId();
					$insertedData["`datetime_creat`"] 	= Dnt::datetime();
					
					
					$insertedData["`name`"] 			= $form_base_name;
					$insertedData["`surname`"] 			= $form_base_surname;
					$insertedData["`pass`"] 			= md5($form_base_pass);
					
					$insertedData["`session_id`"] 		= uniqid();
					
					$insertedData["`email`"] 			= $form_base_email;
					$insertedData["`custom_1`"] 		= $form_base_custom_1;
					$insertedData["`podmienky`"] 		= 1;
					$insertedData["`status`"] 			= 1;
					
					$insertedData["`ip_adresa`"] 	= Dnt::get_ip();
					$insertedData["`img`"] 			= $attachment;
					
					$db->dbTransaction();
						$db->insert($table, $insertedData);
						$userId = Dnt::getLastId($table);
					$db->dbcommit();
					
					
					
					$userData = array(
						"name" 				=> $form_base_name,
						"surname" 			=> $form_base_surname,
						"message_1" 		=> "Thank you for joining to Archimeda and our global community to performe health care.",
						"message_2" 		=> "Are you ready to discover what Archimeda can do for your health?",
						"app_name" 			=> "Archimeda",
						"email" 			=> "info@archimeda.sk",
						"google_play_url" 	=> "https://wwww.google.sk/",
						"app_troe_url" 		=> "https://wwww.google.sk/",
						"faqs" 				=> "https://wwww.google.sk/",
						"unsubscribe" 		=> "https://wwww.google.sk/",
						"facebook_url" 		=> "https://wwww.google.sk/",
						"insta_url" 		=> "https://wwww.google.sk/",
						"twitter_url" 		=> "https://wwww.google.sk/",
						"linked_url" 		=> "https://wwww.google.sk/",
						"youtube_url" 		=> "https://wwww.google.sk/",
						"img_path" 			=> $data['media_path']."img/email/",
						"img" 				=> Settings::getImage($data['meta_settings']['keys']['logo_firmy']['value']),
					);
					
					$messageTitle 	= $userData['app_name'];
					$senderEmail 	= "info@archimeda.sk";
					$msg 			= $this->loadHtmlTemplate($userData, "reg-email-tpl");
					$dntMailer->set_recipient(array($form_base_email));
					$dntMailer->set_msg($msg);
					$dntMailer->set_subject($messageTitle);
					$dntMailer->set_sender_name($senderEmail);
					$dntMailer->set_sender_email($senderEmail);
					$dntMailer->sent_email();	
						
						
					
					/***
					 *KONFIGURACIA ODOSLANEHO EMAILU 
					 *
					 *
					*/
					$msg = Multylanguage::translate($data, "dakujeme_za_registraciu", "translate"); 
					
					$senderEmail 	= $form_base_email;
					$messageTitle 	= "Archimeda - Thank you for registration";
					
					$dntMailer->set_recipient(array($form_base_email));
					$dntMailer->set_msg($msg);
					$dntMailer->set_subject($messageTitle);
					$dntMailer->set_sender_name($senderEmail);
					$dntMailer->set_sender_email($senderEmail);
					$dntMailer->sent_email();
				
				
					$RESPONSE 		= 1;
					$CUSTOM 		= "done";
					$ATTACHMENT 	= $attachment;
					//$CUSTOM = "done";
					
				}else{
					$RESPONSE 	= 4;
					$CUSTOM 	= "User exists";
					$ATTACHMENT = false;
					$message 	= "This user already exists. Please go to loggin proces or change your registration email.";
				}
			}else{
				$RESPONSE 	= 2;
				$CUSTOM 	= "no captcha";
				$ATTACHMENT = false;
			}
		}else{
			$RESPONSE 	= 0;
			$CUSTOM 	= "no post";
			$ATTACHMENT = false;
		}

		echo '
			{
			  "success": "'.$RESPONSE.'",
			  "request": "POST",
			  "response": "'.$RESPONSE.'",
			  "custom": "'.$ATTACHMENT.'",
			  "imagex": "",
			  "protokol": "REST",
			  "lang": "",
			  "generator": "Designdnt 3",
			  "service": "c_dnt-ajax-universal",
			  "message": "'.$message.'"
			}';
	}
}

$modul = new rpcRegistrationUser();
$modul->run();