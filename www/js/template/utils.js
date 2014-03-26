$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$('div').nextUntil(".toggle_hide").toggle();
		$('div').nextUntil(".toggle_show").toggle();
	});
});
