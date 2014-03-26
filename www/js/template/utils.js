$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).parent().nextUntil(".toggle_hide").toggle();
		$(this).parent().nextUntil(".toggle_show").toggle();
	});
});
