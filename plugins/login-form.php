
 <div class="page-login content">
	<form class="" id="<?php echo $selector; ?>" action="" novalidate="novalidate">
		<a href="#" class="page-login-logo"><img class="preload-image" data-original="<?php echo $data['media_path']; ?>img/logo.png" alt="img"></a>
		<div class="page-login-input">
		   <i class="login-icon ion-at"></i>
		   <input type="text" name="email" placeholder="Email Address">
		</div>
		<div class="page-login-input">
		   <i class="login-icon ion-locked"></i>
		   <input type="password" name="pass" value="" placeholder="*****">
		</div>
		<div class="pageapp-login-links">
		   <a href="#" class="page-login-forgot "><i class="ion-eye"></i>Forgot Credentials</a>
		   <a href="#" class="page-login-create ">Create Account<i class="ion-person"></i></a>
		   <div class="clear"></div>
		</div>
		<div class="page-login-input">
		   <div class="g-recaptcha" data-sitekey="6LeejJQUAAAAALTt0EovyVZRzxkH-TtqzNEcfS-E"></div>
		</div>
			<button type="submit" name="login" class="button button-green button-icon button-full half-top full-bottom"/><i class="ion-log-in"></i>Create Account</button>
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
				email:		"Toto pole je povinné",
				password:	"Toto pole je povinné",
	  
				},
			submitHandler: function(form) {
				jQuery.ajax({
					type: "POST",
					url: '<?php echo WWW_PATH; ?>rpc/json/login-form',
					data: jQuery(form).serialize(),
					timeout: 10000,
					dataType: "json",
					success: function(data) {
						console.log(data);
						 if (data.success == 1) {
							jQuery( "#<?php echo $selector; ?>_main" ).hide();
						 }
						 else if (data.success == 0) {
							alert("Bat token");
						 }
						 else if (data.success == 2) {
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
