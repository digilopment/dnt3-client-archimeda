<?php

namespace DntView\Layout\App;

use DntLibrary\App\Database;
use DntLibrary\Base\Cookie;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Sessions;
use DntLibrary\Base\Vendor;

class ArchimedaUser extends Database
{

    public $init;
    public $data;

	public function __construct(){
		parent::__construct();
		$this->cookie = new Cookie;
		$this->vendor = new Vendor;
	}
	
    protected function model()
    {

        $rest = new Rest;
        $session = new Sessions;

        $type = "archimeda-patient";
        $email = $session->get("archimeda-patient_id");
        if (empty($email)) {
            $email = $this->cookie->Get("archimeda-patient_id");
        }
        $query = "SELECT * FROM `dnt_registred_users` WHERE type = '" . $type . "' AND email = '" . $email . "' AND vendor_id = '" . $this->vendor->getId() . "' ";
        if ($this->num_rows($query) > 0) {
            $this->data = $this->get_results($query, true);
        }
        $this->init = true;
    }

    public function logged()
    {
        $session = new Sessions;
        if ($session->get("archimeda-patient_logged") || ($this->cookie->Get("archimeda-patient_logged") == 1 && $this->cookie->Get("archimeda-patient_id") != "")) {
            return true;
        } else {
            return false;
        }
    }

    public function loadHtmlTemplate($userData, $tpl)
    {
        include "dnt-view/layouts/" . $this->vendor->getLayout() . "/plugins/" . $tpl . ".php";
        return $data;
    }

    public function get()
    {
        if ($this->init) {
            return $this->data[0];
        } else {
            $this->model();
            return $this->data[0];
        }
    }

}
