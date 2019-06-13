<?php

class ArchimedaUser extends Database{
	
	public $init;
	public $data;


	protected function model(){
		
		$rest = new Rest;
		$session = new Sessions;
		
		$type	= "archimeda-patient";
		$email 	= $session->get("archimeda-patient_id");
		
		$query = "SELECT * FROM `dnt_registred_users` WHERE type = '" . $type . "' AND email = '" . $email . "' AND vendor_id = '" . Vendor::getId() . "' ";
		if ($this->num_rows($query) > 0) {
			$this->data = $this->get_results($query, true);
		}
		$this->init = true;
		
	}
	
	public function logged(){
		$session = new Sessions;
		if($session->get("archimeda-patient_logged")){
			return true;
		}else{
			return false;
		}
	}
	public function get(){
		if($this->init){
			return $this->data[0];
		}else{
			$this->model();
			return $this->data[0];
		}
	}
	
}