$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(target).closest(".toggle_hide").toggle();
		$(target ).closest(".toggle_show").toggle();
	});
});
