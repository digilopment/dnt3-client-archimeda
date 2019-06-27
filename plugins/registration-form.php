<div class="page-login content">
 <form class="" id="<?php echo $selector; ?>" action="" novalidate="novalidate">
	<a href="#" class="page-login-logo"><img class="preload-image" src="<?php echo Settings::getImage($data['meta_settings']['keys']['logo_firmy']['value']); ?>" alt="img"></a>
	<div id="form-result"></div>
	<div class="page-login-input">
	   <i class="login-icon ion-person"></i>
	   <input name="name" type="text" placeholder="<?php echo MultyLanguage::translate($data, "name", "translate");?>" value="" >
	</div>
	<div class="page-login-input">
	   <i class="login-icon ion-person"></i>
	   <input name="surname" type="text" placeholder="<?php echo MultyLanguage::translate($data, "surname", "translate");?>" value="" >
	</div>
	<div class="page-login-input">
	   <i class="login-icon ion-at"></i>
	   <input type="text" name="email" placeholder="<?php echo MultyLanguage::translate($data, "email_addr", "translate");?>">
	</div>
	<div class="page-login-input full-bottom">
	   <i class="login-icon ion-locked"></i>
	   <input type="password" name="password" placeholder="<?php echo MultyLanguage::translate($data, "password", "translate");?>">
	</div>
	<?php if($data['meta_settings']['keys']['gc_secret_key']['show'] == 1 && $data['meta_settings']['keys']['gc_site_key']['show'] == 1){?>
	<div class="page-login-input" style="margin-top: -10px;">
	   <div class="g-recaptcha" data-sitekey="6LeejJQUAAAAALTt0EovyVZRzxkH-TtqzNEcfS-E"></div>
	</div>
	<?php } ?>
	<button type="submit" name="sent" class="button button-green button-icon button-full half-top full-bottom"/><i class="ion-log-in"></i><?php echo MultyLanguage::translate($data, "create_account", "translate");?></button>
	<div class="pageapp-login-links">
		  <a href="#login-form_main" class="page-login-create "><?php echo MultyLanguage::translate($data, "have_account", "translate");?><i class="ion-person"></i></a>
		   <div class="clear"></div>
		</div>
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
				surname: {
					required: true,
					minlength: 1
				},
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
				name:		"<?php echo MultyLanguage::translate($data, "required_field", "translate");?>",
				surname:	"<?php echo MultyLanguage::translate($data, "required_field", "translate");?>",
				email:		"<?php echo MultyLanguage::translate($data, "required_field", "translate");?>é",
				password:	"<?php echo MultyLanguage::translate($data, "required_field", "translate");?>",
	  
				},
			//submitHandler: function(form) {
			submitHandler: function(form) {
				jQuery(".loader").fadeIn();
				jQuery.ajax({
					type: "POST",
					url: '<?php echo WWW_PATH; ?>rpc/json/registration-form',
					data: jQuery(form).serialize(),
					timeout: 10000,
					dataType: "json",
					success: function(data) {
						console.log(data);
						 if (data.success == 1) {
							jQuery(".loader").fadeOut();
							jQuery( "#<?php echo $selector; ?>_main" ).hide();
						 }
						 else if (data.success == 0) {
							alert("Bat token");
						 }
						 else if (data.success == 2) {
							//alert("Prosím kliknite na Captchu");
						 }
						 else if (data.success == 4) {
							jQuery(".loader").fadeOut();
							jQuery("#form-result").show();
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
		jQuery("#form-result").html("<div class=\"formValidationError bg-red-dark\" id=\"contactNameFieldError\"><p class=\"center-text uppercase small-text color-white\">" + message +"</p></div>");
	  }
	  }); 	
   </script>