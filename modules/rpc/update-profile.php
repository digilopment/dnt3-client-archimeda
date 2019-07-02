<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$rest 				= new Rest;
$db					= new Db;
$dntMailer			= new Mailer;
$user = new ArchimedaUser();
$post_id = $user->get()->id_entity;

if(isset($_POST['sent'])){
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
		
		$table	= "dnt_registred_users";
		
		$api = new Api();
		$query = "SELECT * FROM dnt_registred_users";
		foreach($api->getColumns($query) as $key => $value){
			if(
				$value != "id" &&  
				$value != "type" &&  
				$value != "pass" &&  
				$value != "id_entity" && 
				$value != "vendor_id" && 
				$value != "ip_adresa" && 
				$value != "parent_id" && 
				$value != "datetime_creat" && 
				$value != "datetime_update" && 
				$value != "login" && 
				$value != "img"
			){
				$setData["".$value.""] 	= $rest->post($value);
				$setData["status"] 		= 1;
			}
		}
		
		$dntUpload = new DntUpload;
		$dntUpload->addDefaultImage(
			"form_user_image_1",					//input type file
			$table, 								//update table
			"img",	 								//update table column
			"`id_entity`", 							//where column
			$post_id, 								//where value
			"dnt-view/data/uploads" 				//path
		);
		
		$db->update(
		$table,	//table
		$setData, //set 
		array( 	//where
			'id_entity' 	=> $post_id, 
			'`vendor_id`' 	=> Vendor::getId(),
			)
		);
	
	
		$RESPONSE 		= 1;
		$CUSTOM 		= "done";
		$ATTACHMENT 	= $attachment;
		//$CUSTOM = "done";

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
      "url": "'.WWW_PATH_LANG."profile-settings".'",
      "lang": "",
      "generator": "Designdnt 3",
      "service": "c_dnt-ajax-universal",
      "message": "Silence is golden, speech is gift :)"
    }';