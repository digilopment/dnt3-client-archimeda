<?php
include "app/archimedaUser.php";
include "app/color.php";
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
		//logouted
		"app_logouted" => array_merge(
			array(), $webhook->getSitemapModules("app_logouted")
		),
		//logged
		"primary_handler" => array_merge(
			array(), $webhook->getSitemapModules("primary_handler")
		),
		//logged/profile-settings
		"profile_settings" => array_merge(
			array(), $webhook->getSitemapModules("profile_settings")
		),
		//logged/profile-settings
		"data_reader" => array_merge(
			array(), $webhook->getSitemapModules("data_reader")
		),
		"my_examinations" => array_merge(
			array(), $webhook->getSitemapModules("my_examinations")
		),
		"profile" => array_merge(
			array(), $webhook->getSitemapModules("profile")
		),
		"article_view_meta" => array_merge(
			array(), $webhook->getSitemapModules("article_view_meta")
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
		"app_logouted" => array(
			"service_name" => "App Logouted",
			"sql" => ""
		),
		"primary_handler" => array(
			"service_name" => "Primary Handler",
			"sql" => ""
		),
		"profile_settings" => array(
			"service_name" => "Profile Settings",
			"sql" => ""
		),
		"data_reader" => array(
			"service_name" => "Data Reader",
			"sql" => ""
		),
		"my_examinations" => array(
			"service_name" => "My examinations",
			"sql" => ""
		),
		"profile" => array(
			"service_name" => "Profile",
			"sql" => ""
		),
		"singl_page" => array(
			"service_name" => "Singl Page",
			"sql" => ""
		),
		"article_view_meta" => array(
			"service_name" => "Article View Meta",
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