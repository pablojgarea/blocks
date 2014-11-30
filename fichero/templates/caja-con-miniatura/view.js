$(document).ready(function () {
	$('.miniatura > img').hover(function () {
	    $(this).parent().find(".preview").show();
	},
	function () {
	    $(this).parent().find(".preview").hide();
	});
});