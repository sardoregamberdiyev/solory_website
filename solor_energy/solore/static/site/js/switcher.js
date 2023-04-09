/*-----------------------------------------------------------------------------------
/* Styles Switcher
-----------------------------------------------------------------------------------*/

window.console = window.console || (function(){
	var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
	return c;
})();


jQuery(document).ready(function($) {
	
		// Color Changer
		$("#style-switcher .default" ).click(function(){
			$("#colors" ).attr("href", "#" );
			return false;
		});
	
		$("#style-switcher .aqua" ).click(function(){
			$("#colors" ).attr("href", "css/color-aqua.css" );
			return false;
		});
	
		$("#style-switcher .green_switcher" ).click(function(){
			$("#colors" ).attr("href", "css/color-green.css" );
			return false;
		});
		
		$("#style-switcher .orange" ).click(function(){
			$("#colors" ).attr("href", "css/color-orange.css" );
			return false;
		});
		
		$("#style-switcher .blue" ).click(function(){
			$("#colors" ).attr("href", "css/color-blue.css" );
			return false;
		});

		$("#style-switcher h6 a").click(function(e){
			e.preventDefault();
			var div = $("#style-switcher");
			console.log(div.css("left"));
			if (div.css("left") === "-205px") {
				$("#style-switcher").animate({
					left: "0px"
				}); 
			} else {
				$("#style-switcher").animate({
					left: "-205px"
				});
			}
		});

		$(".colors li a").click(function(e){
			e.preventDefault();
			$(this).parent().parent().find("a").removeClass("active");
			$(this).addClass("active");
		});
			

	});