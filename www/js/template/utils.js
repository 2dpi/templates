$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$.nextSibling(".toggle_hide").toggle();
		$.nextSibling(".toggle_show").toggle();
	});
});
