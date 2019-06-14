$(document).ready(function($) {  
	$(window).load(function(){
		$('.loader').fadeOut();
	});
	
	function getPreloader(){
		$('.loader').fadeIn();
	}
	
	$( "#logout-form" ).click(function() {
		getPreloader();
		$.getJSON( WWW_PATH + "rpc/json/logout-form", function( data ) {
			window.location.href = data.url;
		});
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