$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$('div').next(".toggle_show").next(".toggle_hide").toggle();
		$('div').next(".toggle_show").toggle();
	});
});