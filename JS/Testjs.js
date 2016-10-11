$(document).ready(function(){
	
	
	/*---------------------------------------------------parallaxe--------------------------------------------------------------*/
	
	
	$(window).scroll(function(){
		
		var top = $(window).scrollTop();
		console.log(top);
		
		if (top >=285){
			
			$("header form").clearQueue().animate({opacity:"0"},400);
			//alert("ok");	
			$("header nav:last-of-type").addClass("on");
		}
		else
		$("header nav:last-of-type").removeClass("on");

	});
	

	





	
});

