<div class="page-login content">
	<form class="" id="<?php echo $selector; ?>" action="" novalidate="novalidate">
		<a href="#" class="page-login-logo"><img class="preload-image" src="<?php echo Settings::getImage($data['meta_settings']['keys']['logo_firmy']['value']); ?>" alt="img"></a>
		<div id="form-result-login"></div>
		<div class="page-login-input">
		   <i class="login-icon ion-at"></i>
		   <input type="text" name="email" placeholder="<?php echo MultyLanguage::translate($data, "email_addr", "translate");?>">
		</div>
		<div class="page-login-input full-bottom">
		   <i class="login-icon ion-locked"></i>
		   <input type="password" name="pass" value="" placeholder="<?php echo MultyLanguage::translate($data, "password", "translate");?>">
		</div>
		<?php if($data['meta_settings']['keys']['gc_secret_key']['show'] == 1 && $data['meta_settings']['keys']['gc_site_key']['show'] == 1){?>
		<div class="page-login-input" style="margin-top: -10px;">
		   <div class="g-recaptcha" data-sitekey="6LeejJQUAAAAALTt0EovyVZRzxkH-TtqzNEcfS-E"></div>
		</div>
		<?php } ?>
			<button type="submit" name="login" class="button button-green button-icon button-full half-top full-bottom"/><i class="ion-log-in"></i><?php echo MultyLanguage::translate($data, "login_to_account", "translate");?></button>
			
			<div class="pageapp-login-links">
		   <a href="#" class="page-login-forgot "><i class="ion-eye"></i><?php echo MultyLanguage::translate($data, "forgot_credentials", "translate");?></a>
		   <a href="#registration-form_main" class="page-login-create "><?php echo MultyLanguage::translate($data, "create_account", "translate");?><i class="ion-person"></i></a>
		   <div class="clear"></div>
		</div>
	</form>
 </div>
 <script type="text/javascript">
	  jQuery(document).ready(function() {
		   jQuery("#<?php echo $selector; ?>").validate({
			rules: {
				email: {
					required: true,
					minlength: 1
				},
				password: {
					required: true,
					minlength: 1
				},
			},
			messages: { 
				email:		"<?php echo MultyLanguage::translate($data, "required_field", "translate");?>",
				password:	"<?php echo MultyLanguage::translate($data, "required_field", "translate");?>",
	  
				},
			submitHandler: function(form) {
				jQuery(".loader").fadeIn();
				jQuery("#form-result-login").hide();
				jQuery.ajax({
					type: "POST",
					url: '<?php echo WWW_PATH; ?>rpc/json/login-form',
					data: jQuery(form).serialize(),
					timeout: 10000,
					dataType: "json",
					success: function(data) {
						console.log(data);
						 if (data.success == 1) {
							window.location.href = data.url;
						 }
						 else if (data.success == 0) {
							alert("Bat token");
						 }
						 else if (data.success == 2) {
							jQuery(".loader").fadeOut();
							alert("Prosím kliknite na Captchu");
						 }
						 else if (data.success == 3) {
							jQuery(".loader").fadeOut();
							jQuery("#form-result-login").show();
							writeError(data.message); 
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
		jQuery("#form-result-login").html("<div class=\"formValidationError bg-red-dark\" id=\"contactNameFieldError\"><p class=\"center-text uppercase small-text color-white\">" + message +"</p></div>");
	  }
	  }); 	
   </script>
