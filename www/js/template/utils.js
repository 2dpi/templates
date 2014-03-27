$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).nextNode(".toggle_hide").toggle();
		$(this).nextNode(".toggle_show").toggle();
	});
});
