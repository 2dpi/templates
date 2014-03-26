$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$.closest(".toggle_hide").toggle();
		$.closest(".toggle_show").toggle();
	});
});
