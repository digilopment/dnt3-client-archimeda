<?php function get_top($data){?>
<!doctype html>
<html lang="<?php echo Frontend::getMetaSetting($data, "language"); ?>">
<head>
   <meta charset="utf-8">
   <title><?php echo $data['title']; ?></title>
   <?php
      foreach ($data['meta'] as $meta) {
      	echo $meta;
      }
      ?>
   <meta name="robots" content="index,follow" />
   <meta name="author" content="digilopment">
   <meta name="viewport" content="width=device-width" />
   <?php
      $favicon = Settings::getImage($data['meta_settings']['keys']['favicon']['value']);
      ?>
   <!-- Favicone Icon -->
   <link rel="" type="img/x-icon" href="<?php echo $favicon; ?>" />
   <link rel="" type="img/png" href="<?php echo $favicon; ?>" />
   <link rel="stylesheet" type="text/css" href="<?php echo $data['media_path']; ?>css/style.css">
   <link rel="stylesheet" type="text/css" href="<?php echo $data['media_path']; ?>css/skin.css">
   <link rel="stylesheet" type="text/css" href="<?php echo $data['media_path']; ?>css/framework.css">
   <link rel="stylesheet" type="text/css" href="<?php echo $data['media_path']; ?>css/ionicons.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo $data['media_path']; ?>css/archimeda.css">
   <!-- Font Awesome v4.7.0 -->
   <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <script type="text/javascript" src="<?php echo $data['media_path']; ?>js/jquery.js"></script>
   <script type="text/javascript" src="<?php echo $data['media_path']; ?>js/plugins.js"></script>
   <script type="text/javascript" src="<?php echo $data['media_path']; ?>js/custom.js"></script>
   <script type="text/javascript" src="<?php echo $data['media_path']; ?>js/archimeda.js"></script>
   <script src="<?php echo $data['media_path']; ?>js/jquery.validate.js"></script>
   <script src="<?php echo $data['media_path']; ?>js/additional-methods.min.js"></script>
   <script>
      var WWW_PATH = "<?php echo WWW_PATH;?>";
       
   </script>
   <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<?php } ?>
<?php 
function registration_form($data, $selector) {
	include "plugins/registration-form.php";
}
function login_form($data, $selector) {
	include "plugins/login-form.php";
}
function departments_tpl($data, $sectionId, $selector) {
	include "plugins/departments-tpl.php";
}
function departments_all_tpl($data, $sectionId, $selector) {
	include "plugins/departments-all-tpl.php";
}
function app_info_tpl($data, $selector) {
	include "plugins/app-info-tpl.php";
}
function user_menu_tpl($data, $user, $selector) {
	include "plugins/user-menu-tpl.php";
}
function app_menu_tpl($data, $user, $selector) {
	include "plugins/app-menu-tpl.php";
}
function user_profile_settings($data, $user, $selector) {
	include "plugins/user-profile-settings.php";
}