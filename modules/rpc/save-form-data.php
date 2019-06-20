<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

class SaveFormData extends ArchimedaUser{
	
	public $response;
	public $qrImage;
	
	protected function getFormData($attachments, $qrImage, $qrHash){
		//header('Content-Type: application/json');
		$pollArr = array();
		$mainArray = array();
		$rest = new Rest();
		
		foreach($_COOKIE as $key=>$value){
			if(Dnt::in_string("poll_", $key)){
				$pollArr[$key] = $value;
			}
		}
		
		$mainArray['id'] 			= $rest->post("id");
		$mainArray['attachments'] 	= $attachments;
		$mainArray['data'] 			= array($pollArr);
		$mainArray['qr_image'] 		= $qrImage;
		$mainArray['qr_hash'] 		= $qrHash;
		return $mainArray;
		
	}
	
	public function saveData(){
		
		$dntUpload 	= new DntUpload();
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
			
			$qrImage 	= "http://www.google.sk/";
			$qrHash 	= $lastId;
			
			
			$data 					= WWW_PATH."a/qr/".$qrHash;
			$qrImageName 			= md5($data);
			$qrImage 				= $path.$qrImageName.'.png';
			$errorCorrectionLevel 	= 'H';
			$matrixPointSize 		= 4;
			$this->qrImage			= WWW_PATH.$path.$qrImageName.".png";
			QRcode::png($data, $qrImage, $errorCorrectionLevel, $matrixPointSize, 2);
			
			$jsonToInsert = $this->getFormData($attachment, $qrImage, $qrHash);
			
			$this->update(
				"dnt_posts_meta",	//table
				array(	//set
					'vendor_id' 		=> Vendor::getId(), 
					'post_id' 			=> $this->get()->id_entity,  	//user ID
					'cat_id' 			=> $jsonToInsert['id'], 		//cat ID
					'service' 			=> "archimeda_examination", 
					'content_type' 		=> "json", 
					'key' 				=> "data", 
					'value' 			=> json_encode($jsonToInsert), 
					'show' 				=> '1' 
					), 
				array( 	//where
					'id_entity' 	=> $lastId, 
					'service' 		=> "archimeda_examination",
					'`vendor_id`' 	=> Vendor::getId())
			);
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