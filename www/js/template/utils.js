$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$.next(".toggle_show").next(".toggle_hide").toggle();
		$.next(".toggle_show").toggle();
	});
});