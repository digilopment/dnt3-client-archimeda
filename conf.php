<?php
include "app/archimedaUser.php";
function custom_modules($webhook = false){
	//$webhook = new Modul();
	//$webhook->getSitemap(New Client());
	if(!$webhook){
		$webhook = new Webhook;
	}
	/*
	custom modul listeners
	*/
	$custom_modules = array(
		"default" => array_merge(
			array(), $webhook->getSitemapModules("default")
		),
		"primary_hendler" => array_merge(
			array(), $webhook->getSitemapModules("primary_hendler")
		),
		
		
		//DETAIL
		"article_view" => array_merge(
			array(), array("{eny}/detail/{digit}/{eny}")
		),
		//AUTOREDIRECT
		"auto_redirect" => array_merge(
			array(), array("a/{digit}")
		),			
		//RPC
		"rpc" => array_merge(
			array(), array("rpc/json/{alphabet}")
		),
	);
	return $custom_modules;
}

function modulesConfig(){
		return array(
		"default" => array(
			"service_name" => "Error 404",
			"sql" => ""
		),
		"primary_hendler" => array(
			"service_name" => "Primary Hendler",
			"sql" => ""
		),
		
		
		"singl_page" => array(
			"service_name" => "Singl Page",
			"sql" => ""
		),
		
	);
}
function websettings(){
	$insertedData[] = array(
		'`type`' 			=> "keys", 
		'`key`' 			=> "automatic_voucher", 
		'`value`' 			=> "", 
		'`content_type`' 	=> "text", 
		'`description`' 	=> "Automatické odosielanie voucherov", 
		'`vendor_id`' 		=> Vendor::getId(), 
		'`show`' 			=> '0',
		'`order`' 			=> '10',
	);
	
	return $insertedData;
}