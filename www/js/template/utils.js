$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).parent().parent().nextUntil('.toggle_hide').toggle();
		$(this).parent().parent().nextUntil('.toggle_hide').next('.toggle_show').toggle();
	});
});
