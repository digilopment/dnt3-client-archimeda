function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

	function getPreloader(){
		//$('.loader').show();
		$('.loader').fadeIn("slow");
		/*$( ".loader" ).fadeTo( "slow" , 1, function() {
		 });*/
	}
	
$(document).ready(function($) {  
	$(window).load(function(){
		$('.loader').fadeOut();
	});
	

	
	$( "#logout-form" ).click(function() {
		getPreloader();
		$.getJSON( WWW_PATH + "rpc/json/logout-form", function( data ) {
			window.location.href = data.url;
		});
	});
	
	$( "a" ).click(function() {
		var url = $(this).attr("href");
		if (url.indexOf("://") >= 0){
			getPreloader();
			event.preventDefault(this);
			$( location ).attr("href", $(this).attr("href"));
		}
	});
	
	
	
		/*new Swiper('.swiper-wrapper', {
		  // other parameters
		  on: {
			init: function () {
			  console.log("OK");
			},
		  }
		});*/
		
		
});