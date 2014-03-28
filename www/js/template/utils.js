$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).parent().parent().next('.toggle_hide').next('.toggle_show').toggle();
	});
});
