$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).nextAll(".toggle_hide").first().toggle();
		$(this).nextAll(".toggle_show").first().toggle();
	});
});