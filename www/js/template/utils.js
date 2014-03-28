$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).parent().parent().nextUntil('.toggle_show').toggle();
	});
});
