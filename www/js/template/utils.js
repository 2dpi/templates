$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).closest(".toggle_hide").toggle();
		$(this).closest(".toggle_show").toggle();
	});
});
