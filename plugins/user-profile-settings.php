 <div class="page-login small-form content">
 
 <div class="profile">
		  <img src="<?php echo Image::getFileImage($user->get()->img, true, Image::THUMB)?>" >
	   </div>
	   
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
		  <option value="1" selected><?php echo MultyLanguage::translate($data, "man", "translate");?></option>
		  <option value="2"><?php echo MultyLanguage::translate($data, "woman", "translate");?></option>
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
		<label class="filebutton">
		<i class="login-icon ion-images"></i><?php echo MultyLanguage::translate($data, "select_image", "translate");?>
			<span><input type="file" id="form_user_image_1" name="form_user_image_1" accept="image/x-png,image/gif,image/jpeg" ></span>
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
 
 
 
 
     <!--<link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" >-->


<script>
	/*$("input.dnt-input").click(function(){
		$this = $(this);
		var oldValue =  $(this).val(); 
		$(this).val("");
		if($(this).val() == ""){
			setTimeout(function(){$this.val(oldValue)}, 500);			
		}
	});*/
	
	/*$("input.dnt-input").focus(function(){
	$this = $(this);
	var oldValue =  $(this).val(); 
	$(this).val("");
	if($(this).val() == ""){
		$("input.dnt-input").focusout(function(){
			if($(this).val() == "" || $(this).val() == 0){
				$this.val(oldValue)
			}else{
				$this.val($(this).val())
			}
		});			
	}
});
*/
</script>
 
<style>
.page-login.small-form input::placeholder {
  font-size: 13px;
  color: #6c6c6c !important;
}
.page-login.small-form label.filebutton {
    width: 143px;
    height: 37px;
    overflow: hidden;
    position: relative;
    background-color: transparent;
    text-align: right;
    padding: 3px;
    padding-right: 9px;
    display: block;
    margin: 10px 0px;
    margin-left: 1px;
    color: #fff;
    color: #111;
    font-size: 14px;
	cursor:pointer;
    /* border-radius: 3px; */
}
.page-login.small-form label.filebutton i.ion-images  {
	font-size: 15px !important;
    margin-top: -6px;
    color: #111;
}
.page-login.small-form label span input {
    z-index: 999;
    line-height: 0;
    font-size: 50px;
    position: absolute;
    top: -2px;
    left: -700px;
    opacity: 0;
    filter: alpha(opacity = 0);
    -ms-filter: "alpha(opacity=0)";
    cursor: pointer;
    _cursor: hand;
    margin: 0;
    padding:0;
}
.small-form .page-login-input select,
.small-form .page-login-input input {
    width: 100%;
    display: flex;
    height: 30px;
    font-size: 12px;
    line-height: 30px;
    font-weight: 400;
    padding-left: 45px;
	margin-top: 5px;
    padding-bottom: 5px;
	font-family: Roboto;
	color: #111;
	border-bottom: 2px solid #e5e5e5;
	background-color: transparent;
}
.small-form .page-login-input i {
    position: absolute;
    left: 0px;
    height: 30px;
    line-height: 30px;
    width: 30px;
    text-align: center;
	    z-index: 2;
}

/*** new one **/
.small-form .page-login-input select, .small-form .page-login-input input {
    width: 100%;
    display: flex;
    height: 40px;
    font-size: 12px;
    font-weight: 400;
    padding-left: 45px;
    margin-top: 10px;
    font-family: Roboto;
    color: #111;
    border-bottom: 1px solid #e5e5e5;
    background-color: transparent;
}
.small-form .page-login-input i {
    position: absolute;
    left: 0px;
    height: 40px;
    line-height: 40px;
    width: 40px;
    text-align: center;
}
.small-form input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #555;
  opacity: 1; /* Firefox */
}

.small-form input:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #555;
}

.small-form input::-ms-input-placeholder { /* Microsoft Edge */
  color: #555;
}
</style>