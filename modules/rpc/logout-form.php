<?php

use DntLibrary\Base\Cookie;
use DntLibrary\Base\Sessions;

class logoutModulController
{

    public function run()
    {

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $session = new Sessions;
        $cookie = new Cookie;
        $session->set("archimeda-patient_logged", "0");
        $session->set("archimeda-patient_id", "");

        $cookie->Delete("archimeda-patient_logged");
        $cookie->Delete("archimeda-patient_id");

        $url = WWW_PATH_LANG . "app-logouted";
        $RESPONSE = "1";
        echo '
		{
		  "success": "' . $RESPONSE . '",
		  "request": "GET",
		  "response": "' . $RESPONSE . '",
		  "url": "' . $url . '",
		  "protokol": "REST",
		  "generator": "Designdnt 3",
		  "service": "c_dnt-ajax-universal",
		  "message": "Silence is golden, speech is gift :)"
		}';
    }

}

$modul = new logoutModulController;
$modul->run();
