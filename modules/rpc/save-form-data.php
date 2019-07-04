<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

class SaveFormData extends ArchimedaUser{
	
	public $response;
	public $qrImage;
	public $jsonResponse;
	
	protected function formater($data){
		$data = Dnt::not_html($data);
		$data = str_replace(array("\n", "\r"), '', $data);
		return $data;
		//return json_encode($data);
	}
	
	protected function getFormData($attachments, $qrImage, $qrHash){
		$pollArr = array();
		$mainArray = array();
		$rest = new Rest();
		
		$poll_id		= $rest->post("id");
		$departament_id	= $rest->post("departament_id");
		
		foreach($_COOKIE as $key=>$value){
			if(Dnt::in_string("poll_", $key)){
				$question_id = explode("_", $key)[2];
				$ans = is_numeric($value) ? PollsFrontend::getValueByInputId("value", $value) : "'".$this->formater($value)."'";
				$pollArr[$question_id] = array(
									"question" 	=> $this->formater(PollsFrontend::getCurrentQuestions($poll_id, $question_id)), 
									"ans" 		=> is_numeric($value) ? $this->formater(PollsFrontend::getValueByInputId("value", $value)) : $this->formater($value),
									"input_id" 	=> is_numeric($value) ? $value : 0,
								);
			}
		}
		
		ksort($pollArr);
		
		$mainArray['id'] 			= $poll_id;
		$mainArray['departament_id']= $departament_id;
		$mainArray['attachments'] 	= $attachments;
		$mainArray['data'] 			= array($pollArr);
		$mainArray['form'] 			= array("form_name"=> $this->formater(Polls::getParam("name", $poll_id)), "form_content"=> $this->formater(Polls::getParam("content", $poll_id)));
		$mainArray['qr_image'] 		= $qrImage;
		$mainArray['qr_hash'] 		= $qrHash;
		$mainArray['datetime'] 		= Dnt::datetime();
		$mainArray['user'] 			= $this->get();
		return $mainArray;
		
	}
	
	public function saveData(){
		
		$dntUpload 	= new DntUpload();
		$dntMailer	= new Mailer();
		$attachment = array();
		$data 		= array();
		$path 		= "dnt-view/data/external-uploads/";
		$data 		= $dntUpload->multypleUpload($_FILES['form_images'], $path, false, false);
		
		
				
		if(isset($_POST['sent'])){
			
			$this->response = 1;
			
			foreach($data as $image){
				$attachment[] = $image['name'];
			}
			
			$insertedData = array(
				'vendor_id' 		=> Vendor::getId(), 
				'service' 			=> "archimeda_examination", 
			);

			$this->dbTransaction();				
			$this->insert('dnt_posts_meta', $insertedData);
			$this->dbcommit();	
			
			$lastId = Dnt::getLastId('dnt_posts_meta');
			
			$qrHash 	= $lastId;
			
			
			$data 					= WWW_PATH_LANG."data-reader/".$qrHash;
			$qrImageName 			= md5($data);
			$qrImage 				= $path.$qrImageName.'.png';
			$errorCorrectionLevel 	= 'H';
			$matrixPointSize 		= 4;
			$this->qrImage			= WWW_PATH.$path.$qrImageName.".png";
			QRcode::png($data, $qrImage, $errorCorrectionLevel, $matrixPointSize, 2);
			
			$jsonToInsert = $this->getFormData($attachment, $qrImageName.".png", $qrHash);
			$this->jsonResponse = $jsonToInsert;
			
			$this->update(
				"dnt_posts_meta",	//table
				array(	//set
					'vendor_id' 		=> Vendor::getId(), 
					'post_id' 			=> $this->get()->id_entity,  	//user ID
					'cat_id' 			=> $jsonToInsert['id'], 		//cat ID
					'service' 			=> "archimeda_examination", 
					'content_type' 		=> "json", 
					'key' 				=> "data", 
					'value' 			=> json_encode($jsonToInsert, JSON_UNESCAPED_UNICODE), 
					'show' 				=> '1' 
					), 
				array( 	//where
					'id_entity' 	=> $lastId, 
					'service' 		=> "archimeda_examination",
					'`vendor_id`' 	=> Vendor::getId())
			);
			
			
			$userData['app_name'] = $this->get()->name. " here's your examination data";
			$userData['name'] = "Please scan your QR code bellow to continue";
			$userData['img'] = Image::getFileImage($this->get()->img, true, Image::THUMB);
			$userData['img_qr'] = $this->qrImage;
			$userData['message_1'] = "Your data are ready to view, you can use QR code bellow or you can go to Archimeda app and go to Examinations.";
			$userData['message_2'] = "Thank you for using <b>Archimeda</b> App";
			
			$messageTitle 	= $userData['app_name'];
			$senderEmail 	= "info@archimeda.sk";
			$msg 			= $this->loadHtmlTemplate($userData, "save-email-tpl");
			$dntMailer->set_recipient(array($this->get()->email));
			$dntMailer->set_msg($msg);
			$dntMailer->set_subject($messageTitle);
			$dntMailer->set_sender_name($senderEmail);
			$dntMailer->set_sender_email($senderEmail);
			$dntMailer->sent_email();	

		}else{
			$this->response = 0;
		}
		
	}
	
	public function getResponse(){
		return '
			{
				  "success": "'.$this->response.'",
				  "request": "POST",
				  "response": "'.$this->response.'",
				  "custom": "",
				  "qr_image": "'.$this->qrImage.'",
				  "imagex": "",
				  "protokol": "REST",
				  "lang": "",
				  "generator": "Designdnt 3",
				  "service": "c_dnt-ajax-universal",
				  "message": "Silence is golden, speech is gift :)"
			}
		';
	}

}


$saveData = new SaveFormData();
$saveData->saveData();
echo $saveData->getResponse();

/*

echo '
    {
      "success": "'.$RESPONSE.'",
      "request": "POST",
      "response": "'.$RESPONSE.'",
      "custom": "'.$ATTACHMENT.'",
      "imagex": "",
      "protokol": "REST",
      "url": "'.WWW_PATH."profile-settings".'",
      "lang": "",
      "generator": "Designdnt 3",
      "service": "c_dnt-ajax-universal",
      "message": "Silence is golden, speech is gift :)"
    }';
	
	*/