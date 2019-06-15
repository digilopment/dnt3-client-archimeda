 <div class="page-login small-form content">
 <form class="" id="<?php echo $selector; ?>" action="" novalidate="novalidate">
	<div class="page-login-input">
	   <i class="login-icon ion-person"></i>
	   <input class="dnt-input" name="name" type="text" placeholder="Name" value="<?php echo $user->get()->name ?>" >
	</div>
	<div class="page-login-input">
	   <i class="login-icon ion-person"></i>
	   <input class="dnt-input" name="surname" type="text" placeholder="Surname" value="<?php echo $user->get()->surname ?>" >
	</div>
	<div class="page-login-input">
	   <i class="login-icon ion-at"></i>
	   <input class="dnt-input" type="text" name="email" value="<?php echo $user->get()->email ?>" placeholder="Email Address">
	</div>
	<div class="page-login-input">
	   <i class="login-icon ion-flag"></i>
	   <input class="dnt-input" type="text" name="country_city" value="<?php echo $user->get()->krajina ?>" placeholder="Country and City">
	</div>
	<div class="page-login-input">
		<i class="login-icon ion-android-calendar"></i>
		<?php  $date = new DateTime($user->get()->datetime_publish);?>
		<input class="dnt-input" name="date" class="set-todays" value="<?php echo $date->format("Y-m-d");?>" type="date" style="padding-bottom: 1px;">
	</div>
	<div class="page-login-input">
		<i class="login-icon ion-transgender"></i>
		<select name="gender" style="padding-bottom: 4px;">
		  <option value="1" selected>Man</option>
		  <option value="2">Woman</option>
		</select>
	</div>
	<div class="page-login-input">
		<i class="login-icon fa fa-balance-scale"></i>
		<input class="dnt-input" name="weight" value="<?php echo $user->get()->vaha ?>" placeholder="weight (kg)" type="number">
	</div>
	<div class="page-login-input">
		<i class="login-icon fa fa-arrow-up"></i>
		<input class="dnt-input" name="weight" value="<?php echo $user->get()->vyska ?>" placeholder="height (cm)" type="number">
	</div>
	
	<div class="page-login-input">
	<label class="filebutton">
	<i class="login-icon ion-images"></i>Browse image!
	<span><input type="file" id="myfile" name="myfile" accept="image/x-png,image/gif,image/jpeg" ></span>
	</label>
	</div>
	
		<button type="submit" name="sent" class="button button-green button-icon button-full half-top full-bottom"/><i class="ion-log-in"></i>Save</button>
	</form>
 </div>

<script>
	$("input.dnt-input").click(function(){
		$this = $(this);
		var oldValue =  $(this).val(); 
		$(this).val("");
		if($(this).val() == ""){
			setTimeout(function(){$this.val(oldValue)}, 500);			
		}
	});
	
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