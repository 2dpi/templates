$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).parent().parent().nextUntil('.toggle_show').toggle();
		//$(this).parent().parent().nextUntil('.toggle_hide').toggle();
		// $(this).nextUntil(".toggle_hide").toggle();
		// $(this).nextUntil(".toggle_show").toggle();
	});
	$(".toggle").click(function () {
		//$(this).parent().parent().nextUntil('.toggle_show').toggle();
		$(this).parent().parent().nextUntil('.toggle_hide').toggle();
		// $(this).nextUntil(".toggle_hide").toggle();
		// $(this).nextUntil(".toggle_show").toggle();
	});
});
