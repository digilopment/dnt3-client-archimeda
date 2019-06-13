 <div class="page-login small-form content">
 <form class="" id="<?php echo $selector; ?>" action="" novalidate="novalidate">
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
	<div class="page-login-input">
	   <i class="login-icon ion-flag"></i>
	   <input type="text" name="country_city" placeholder="Country and City">
	</div>
	<div class="page-login-input">
		<i class="login-icon ion-android-calendar"></i>
		<input name="date" class="set-todays" value="2019-04-23" type="date" style="padding-bottom: 12px;">
	</div>
	<div class="page-login-input">
		<i class="login-icon ion-transgender"></i>
		<select name="gender">
		  <option value="1" selected>Man</option>
		  <option value="2">Woman</option>
		</select>
	</div>
	<div class="page-login-input">
		<i class="login-icon ion-magnet"></i>
		<input name="weight" value="75.4" placeholder="weight" type="number">
	</div>
	<div class="page-login-input">
		<i class="login-icon ion-code-download"></i>
		<input name="weight" value="75.4" placeholder="height" type="number">
	</div>
	
	
	<div class="page-login-input">
		<i class="login-icon ion-images"></i>
		<input type="file" name="user_image"  accept="image/x-png,image/gif,image/jpeg" >
	</div>
	
		<button type="submit" name="sent" class="button button-green button-icon button-full half-top full-bottom"/><i class="ion-log-in"></i>Save</button>
	</form>
 </div>
 
 <style>
 .small-form .page-login-input select,
 .small-form .page-login-input input {
    width: 100%;
    display: flex;
    height: 30px;
    font-size: 12px;
    line-height: 30px;
    font-weight: 400;
    padding-left: 45px;
    margin-top: 10px;
	font-family: Roboto;
	color: #111;
	border-bottom: 2px solid #e5e5e5;
}
.small-form .page-login-input i {
    position: absolute;
    left: 0px;
    height: 30px;
    line-height: 30px;
    width: 30px;
    text-align: center;
}

 </style>