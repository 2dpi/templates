$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function (event) {
		$(event.target).closest(".toggle_hide").toggle();
		$(event.target).closest(".toggle_show").toggle();
	});
});
