<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;
use DntView\Layout\App\ArchimedaUser;

class rpcModulController extends ArchimedaUser
{

    public function run()
    {
        $rest = new Rest;
        $db = new DB;
        if ($rest->webhook(2) == "json" && $rest->webhook(3) == "registration-form") {
            include "registration-form.php";
        } elseif ($rest->webhook(2) == "json" && $rest->webhook(3) == "logout-form") {
            include "logout-form.php";
        } elseif ($rest->webhook(2) == "json" && $rest->webhook(3) == "login-form") {
            include "login-form.php";
        } elseif ($rest->webhook(2) == "json" && $rest->webhook(3) == "update-profile") {
            include "update-profile.php";
        } elseif ($rest->webhook(2) == "json" && $rest->webhook(3) == "save-form-data") {
            include "save-form-data.php";
        } elseif ($rest->webhook(2) == "xml" && $rest->webhook(3) == "sitemap") {
            include "sitemap.php";
        } else {
            $rest->loadDefault();
        }
    }

    protected function validProcessLogin($type, $email, $pass)
    {
        $db = new DB;
        $vendor = new Vendor;
        $query = "SELECT pass FROM dnt_registred_users WHERE type = '$type' AND email = '" . $email . "' AND vendor_id = '" . $vendor->getId() . "'";
        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $db_pass = $row['pass'];
            }
            if ($db_pass == md5($pass)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

$app = new rpcModulController();
$app->run();
