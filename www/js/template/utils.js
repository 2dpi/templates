$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).next(".toggle_show").next(".toggle_hide").toggle();
		$(this).next(".toggle_show").toggle();
	});
});