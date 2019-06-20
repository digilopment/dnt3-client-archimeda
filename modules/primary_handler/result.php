<?php $selector = "attachment"; ?>
<?php $progress = "100"; ?>
<link href="http://ankety.markiza.sk/css/polls.css" media="screen" rel="stylesheet" type="text/css">
<div id="page-content">
   <div class="content-fullscreens">
      <div class="animate-fade">
         <div class="page-polls content">
            <div class="progress-bar">
               <div class="progress-bar-size p25" style="width:<?php echo $progress?>%"></div>
               <em><?php echo $progress?>%</em>
            </div>
            <a href="#" class="page-login-logo">
				<img class="preload-image" src="<?php echo Settings::getImage($data['meta_settings']['keys']['logo_firmy']['value']); ?>" alt="img">
            </a>
            <div class="polls_cont">
               <div class="input-wrap">
                  <h3 id="text-on-finish">You finish the basic formular. If you want, you can upload your immages here:</h3>
               </div>
			   
			   		<div class="input-wrap">
			<form class="" id="<?php echo $selector; ?>" action="" novalidate="novalidate" enctype="multipart/form-data">
				<input type="hidden" id="id" name="id" value="<?php echo $data['webhook'][4]?>" multiple >
				 <div class="page-login small-form">
					<div class="page-login-input">
						<label class="filebutton">
						<i class="login-icon ion-images"></i><?php echo MultyLanguage::translate($data, "select_image", "translate");?>
							<span><input type="file" id="form_user_image_1" name="form_images[]" multiple ></span>
						</label>
					</div>
				</div>
				
				<button type="submit" name="sent" class="button button-green button-icon button-full half-top full-bottom"><i class="ion-log-in"></i><?php echo MultyLanguage::translate($data, "save", "translate");?> and generate QR</button>
			</form>
			<div id="form-result"></div>
		</div>
			   
            </div>
         </div>
		 
	
      </div>
	  
	  
   </div>
   <div class="poll-steps">
		<a id="back-to-home" class="float-right" href="<?php echo WWW_PATH; ?>primary-handler" style="display:none;">
			&nbsp;<i class="ion ion-ios-arrow-forward"></i>
		</a>
	</div>
</div>

<style>
.page-polls h3 {
    padding: 0px 10px;
	text-align: center;
}
.page-login {
    margin-left: 0px;
    margin-top: 0px;
}
.input-wrap{
	padding: 15px;
}
.page-login.small-form label.filebutton i.ion-images {
    font-size: 40px !important;
}
.qr-wrapper img{
	margin:0px auto;
}
.page-polls h3 {
    padding: 20px 10px;
}
.polls_cont .input-wrap {
    float: none;
}
@media screen and (max-width: 500px){
	.polls_cont .input-wrap {
		margin-left: 0px;
	}
}
</style>

<style>
/*.page-login.small-form label.filebutton i.ion-images {
    font-size: 40px !important;
}*/
</style>
<script type="text/javascript">
	jQuery(document).ready(function() {
	   jQuery("#<?php echo $selector; ?>").validate({
			rules: {
				
			},
			messages: {
				
			},
		//submitHandler: function(form) {
		submitHandler: function(form) {
			
			jQuery(".loader").fadeIn();

			jQuery.ajax({
				url: '<?php echo WWW_PATH; ?>rpc/json/save-form-data',
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
						$(".loader").fadeOut();
						$("#back-to-home").fadeIn();
						$("#<?php echo $selector; ?>").hide();
						$("#text-on-finish").html("Your QR is ready to scan. Your data has been save to your history and we send your QR to mail.");
						writeQr(data.qr_image); 
						//window.location.href = data.url;
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
	  function writeQr(image)  {
		jQuery("#form-result").html("<div class=\"qr-wrapper\"><img src='" + image + "'></div>");
	  }
  }); 	
</script>