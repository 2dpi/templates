$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$.nextUntil(".toggle_hide").first().toggle();
		$.nextUntil(".toggle_show").first().toggle();
	});
});
