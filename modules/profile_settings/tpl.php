<?php

use DntLibrary\Base\Image;
use DntLibrary\Base\Settings;
$settings = new Settings;
$image = new Image;
?><div id="page-content">
    <div id="page-content-scroll" class="header-clear">
        <div class="profile-page-2 full-bottom">
            <div class="profile-page-2-cover">
                <img class="preload-image responsive-image" src="<?php echo $settings->getImage($data['meta_settings']['keys']['logo_firmy_2']['value']); ?>">
            </div>
            <div class="profile-page-2-thumbnail animate-top">
                <img class="preload-image responsive-image" src="<?php echo $image->getFileImage($user->get()->img, true, Image::THUMB) ?>">
            </div>
            <?php user_profile_settings($data, $user, "profile-settings-form"); ?>
        </div>

    </div>
</div>