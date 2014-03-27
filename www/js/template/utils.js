$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).parent().next('.toggle_hide').slideDown('slow');
		$(this).parent().next('.toggle_show').slideDown('slow');
		// $(this).nextUntil(".toggle_hide").toggle();
		// $(this).nextUntil(".toggle_show").toggle();
	});
});
