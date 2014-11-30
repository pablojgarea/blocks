$(document).ready(function(){
    var pgwSlider = $('.pgwSlider').pgwSlider();
    
    pgwSlider.reload({
    	adaptiveHeight : true,
	    maxHeight : 350,
	    intervalDuration : 4000,
	    autoSlide: false
	});
});