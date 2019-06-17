$(document).ready(function($) {  
	$(window).load(function(){
		$('.loader').fadeOut();
	});
	
	function getPreloader(){
		//$('.loader').show();
		$('.loader').fadeIn("slow");
		/*$( ".loader" ).fadeTo( "slow" , 1, function() {
		 });*/
	}
	
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