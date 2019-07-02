<?php
function defaultModuleMetaDataConfiguration($postId, $service){
	
	$defaultContent	= "Content";
	
	$insertedData[] = array(
		'`post_id`' 		=> $postId, 
		'`service`' 		=> $service, 
		'`vendor_id`' 		=> Vendor::getId(), 
		'`key`' 			=> "about", 
		'`value`' 			=> $defaultContent, 
		'`content_type`' 	=> "content",
		'`cat_id`' 			=> "3",
		'`description`' 	=> "About Department", 
		'`order`' 			=> 1, 
		'`show`' 			=> 1, 
	);
	
	$insertedData[] = array(
		'`post_id`' 		=> $postId, 
		'`service`' 		=> $service, 
		'`vendor_id`' 		=> Vendor::getId(), 
		'`key`' 			=> "health", 
		'`value`' 			=> $defaultContent, 
		'`content_type`' 	=> "content",
		'`cat_id`' 			=> "3",
		'`description`' 	=> "Health promotion", 
		'`order`' 			=> 1, 
		'`show`' 			=> 1, 
	);
	
	$insertedData[] = array(
		'`post_id`' 		=> $postId, 
		'`service`' 		=> $service, 
		'`vendor_id`' 		=> Vendor::getId(), 
		'`key`' 			=> "medical", 
		'`value`' 			=> $defaultContent, 
		'`content_type`' 	=> "content",
		'`cat_id`' 			=> "3",
		'`description`' 	=> "Medical Procedures", 
		'`order`' 			=> 1, 
		'`show`' 			=> 1, 
	);
	
	$insertedData[] = array(
		'`post_id`' 		=> $postId, 
		'`service`' 		=> $service, 
		'`vendor_id`' 		=> Vendor::getId(), 
		'`key`' 			=> "poll_id", 
		'`value`' 			=> "", 
		'`content_type`' 	=> "text",
		'`cat_id`' 			=> "3",
		'`description`' 	=> "Formulars IDs (separate each forms with a comma)", 
		'`order`' 			=> 1, 
		'`show`' 			=> 1, 
	);
	
	return $insertedData;
	
}