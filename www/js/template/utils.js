$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).nextSibling(".toggle_hide").toggle();
		$(this).nextSibling(".toggle_show").toggle();
	});
});
