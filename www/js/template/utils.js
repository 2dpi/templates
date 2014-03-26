$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).nextUntil(".toggle_hide").first().toggle();
		$(this).nextUntil(".toggle_show").first().toggle();
	});
});
