$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this).sibling.next(".toggle_hide").toggle();
		$(this).sibling.next(".toggle_show").toggle();
	});
});
