$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).siblings(".toggle_hide").toggle();
		$(this).siblings(".toggle_show").toggle();
	});
});
