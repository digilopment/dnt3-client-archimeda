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
		<i class="login-icon fa fa-balance-scale"></i>
		<input name="weight" value="75.4" placeholder="weight" type="number">
	</div>
	<div class="page-login-input">
		<i class="login-icon fa fa-arrow-up"></i>
		<input name="weight" value="75.4" placeholder="height" type="number">
	</div>
	
	<div class="page-login-input">
	<label class="filebutton">
	<i class="login-icon ion-images"></i>Browse image!
	<span>		<input type="file" id="myfile" name="myfile" accept="image/x-png,image/gif,image/jpeg" ></span>
	</label>
	</div>
	
		<button type="submit" name="sent" class="button button-green button-icon button-full half-top full-bottom"/><i class="ion-log-in"></i>Save</button>
	</form>
 </div>

 
<style>
label.filebutton {
    width: 150px;
    height: 37px;
    overflow: hidden;
    position: relative;
    background-color: #1a79b2;
    text-align: right;
    padding: 3px;
    padding-right: 9px;
    display: block;
    margin: 10px 0px;
    margin-left: 1px;
    color: #fff;
    border-radius: 3px;
}
label.filebutton i.ion-images  {
    font-size: 24px !important;
	    margin-top: -6px;
		 color: #fff;
}
label span input {
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
    margin-top: 10px;
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
input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #555;
  opacity: 1; /* Firefox */
}

input:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #555;
}

input::-ms-input-placeholder { /* Microsoft Edge */
  color: #555;
}
</style>