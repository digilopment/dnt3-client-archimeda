 <div class="page-login small-form content">
 <form class="" id="<?php echo $selector; ?>" action="" novalidate="novalidate" enctype="multipart/form-data">
	<div class="page-login-input">
	   <i class="login-icon ion-person"></i>
	   <input class="dnt-input" name="name" type="text" placeholder="<?php echo MultyLanguage::translate($data, "name", "translate");?>" value="<?php echo $user->get()->name ?>" >
	</div>
	<div class="page-login-input">
	   <i class="login-icon ion-person"></i>
	   <input class="dnt-input" name="surname" type="text" placeholder="<?php echo MultyLanguage::translate($data, "surname", "translate");?>" value="<?php echo $user->get()->surname ?>" >
	</div>
	<div class="page-login-input">
	   <i class="login-icon ion-at"></i>
	   <input class="dnt-input" type="text" name="email" value="<?php echo $user->get()->email ?>" placeholder="<?php echo MultyLanguage::translate($data, "email_addr", "translate");?>">
	</div>
	<div class="page-login-input">
	   <i class="login-icon ion-flag"></i>
	   <input class="dnt-input" type="text" name="krajina" value="<?php echo $user->get()->krajina ?>" placeholder="<?php echo MultyLanguage::translate($data, "country_and_city", "translate");?>">
	</div>
	<div class="page-login-input">
		<i class="login-icon ion-android-calendar"></i>
		<?php  $date = new DateTime($user->get()->datetime_publish);?>
		<input class="dnt-input" name="datetime_publish" class="set-todays" value="<?php echo $date->format("Y-m-d");?>" type="date" style="padding-bottom: 1px;">
	</div>
	<div class="page-login-input">
		<i class="login-icon ion-transgender"></i>
		<select name="sex" style="padding-bottom: 4px;">
		  <option value="1" <?php if($user->get()->sex == "1") echo "selected";?>><?php echo MultyLanguage::translate($data, "man", "translate");?></option>
		  <option value="2" <?php if($user->get()->sex == "2") echo "selected";?>><?php echo MultyLanguage::translate($data, "woman", "translate");?></option>
		</select>
	</div>
	<div class="page-login-input">
		<i class="login-icon fa fa-balance-scale"></i>
		<input class="dnt-input" name="vaha" value="<?php echo ($user->get()->vaha == 0) ? "" : $user->get()->vaha ?>" placeholder="<?php echo MultyLanguage::translate($data, "weight", "translate");?> (kg)" type="number">
	</div>
	<div class="page-login-input">
		<i class="login-icon fa fa-arrow-up"></i>
		<input class="dnt-input" name="vyska" value="<?php echo ($user->get()->vyska == 0) ? "" : $user->get()->vyska ?>" placeholder="<?php echo MultyLanguage::translate($data, "height", "translate");?> (cm)" type="number">
	</div>
	
	<div class="page-login-input">
		<i class="login-icon fa fa-info-circle"></i>
		<textarea class="dnt-input" rows="4" cols="50" name="content"><?php echo $user->get()->content; ?></textarea>
	</div>
	
	<div class="page-login-input">
		<label class="filebutton">
		<i class="login-icon ion-images"></i><?php echo MultyLanguage::translate($data, "select_image", "translate");?>
			<span><input type="file" id="form_user_image_1" name="form_user_image_1" accept="" ></span>
		</label>
	</div>
		<button type="submit" name="sent" class="button button-green button-icon button-full half-top full-bottom"><i class="ion-log-in"></i><?php echo MultyLanguage::translate($data, "save", "translate");?></button>
	</form>
 </div>
 
 
 <script type="text/javascript">
	  jQuery(document).ready(function() {
		   jQuery("#<?php echo $selector; ?>").validate({
			rules: {
				name: {
					required: true,
					minlength: 1
				},
				email: {
					required: true,
					minlength: 1
				},
			},
			messages: { 
				name:		"<?php echo MultyLanguage::translate($data, "required_field", "translate");?>",
				email:		"<?php echo MultyLanguage::translate($data, "required_field", "translate");?>",
			},
			//submitHandler: function(form) {
			submitHandler: function(form) {
				
				jQuery(".loader").fadeIn();
				
				jQuery.ajax({
					url: '<?php echo WWW_PATH; ?>rpc/json/update-profile',
					type: 'POST',

					// Form data
					data: new FormData(jQuery('#<?php echo $selector; ?>')[0]),

					// Tell jQuery not to process data or worry about content-type
					// You *must* include these options!
					cache: false,
					contentType: false,
					processData: false,

					// Custom XMLHttpRequest
					xhr: function() {
						var myXhr = jQuery.ajaxSettings.xhr();
						if (myXhr.upload) {
							// For handling the progress of the upload
							myXhr.upload.addEventListener('progress', function(e) {
								if (e.lengthComputable) {
									jQuery('progress').attr({
										value: e.loaded,
										max: e.total,
									});
								}
							}, false);
						}
						return myXhr;
					},
					success: function(data) {
						console.log(data);
						 if (data.success == 1) {
							window.location.href = data.url;
						 }
						 else if (data.success == 0) {
							jQuery(".loader").fadeOut();
							alert("Bat token");
						 }
						 else if (data.success == 2) {
							jQuery(".loader").fadeOut();
							alert("Prosím kliknite na Captchu");
						 }
						 else{
							writeError(data.message); 
						 }
					},
					error: function() {
						alert("Momentálne sme zaneprázdnený.");
					}
				});
				return false;
			}
		   });	
	  
	  function writeError(message)  {
		jQuery("#form-result").html("<div class=\"alert alert-error\">" + message + "</div>");
	  }
	  }); 	
   </script>