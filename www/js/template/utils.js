$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(".toggle").closest(".toggle_hide").toggle();
		$(".toggle").closest(".toggle_show").toggle();
	});
});
