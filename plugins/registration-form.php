
 <div class="page-login content">
 <form class="" id="<?php echo $selector; ?>" action="" novalidate="novalidate">
	<a href="#" class="page-login-logo"><img class="preload-image" data-original="<?php echo $data['media_path']; ?>img/logo.png" alt="img"></a>
	<div class="page-login-input">
	   <i class="login-icon ion-person"></i>
	   <input name="name" type="text" placeholder="Name" value="" >
	</div>
	<div class="page-login-input">
	   <i class="login-icon ion-person"></i>
	   <input name="surname" type="text" placeholder="Surname" value="" >
	</div>
	<div class="page-login-input">
	   <i class="login-icon ion-at"></i>
	   <input type="text" name="email" placeholder="Email Address">
	</div>
	<div class="page-login-input full-bottom">
	   <i class="login-icon ion-locked"></i>
	   <input type="password" name="password" placeholder="****">
	</div>
	<div class="page-login-input">
	   <div class="g-recaptcha" data-sitekey="6LeejJQUAAAAALTt0EovyVZRzxkH-TtqzNEcfS-E"></div>
	</div>
		<button type="submit" name="sent" class="button button-green button-icon button-full half-top full-bottom"/><i class="ion-log-in"></i>Create Account</button>
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
				name:		"Toto pole je povinné",
				surname:	"Toto pole je povinné",
				email:		"Toto pole je povinné",
				password:	"Toto pole je povinné",
	  
				},
			//submitHandler: function(form) {
			submitHandler: function(form) {
				jQuery.ajax({
					type: "POST",
					url: '<?php echo WWW_PATH; ?>rpc/json/registration-form',
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