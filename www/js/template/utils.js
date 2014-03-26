$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$("div").closest(".toggle_hide").toggle();
		$("div").closest(".toggle_show").toggle();
	});
});
