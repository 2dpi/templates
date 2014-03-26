$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		//$(this).nextAll(".toggle_hide").first().toggle();
		//$(this).nextAll(".toggle_show").first().toggle();
		$('.toggle_hide').nextAll('matchSelector:first').toggle();
		$('.toggle_show').nextAll('matchSelector:first').toggle();
	});
});
