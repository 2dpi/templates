$(document).ready(function(){
	$(".toggle_show").hide();
	// $(".toggle").click(function () {
	// 	$(this).nextUntil(".toggle_hide").toggle();
	// 	$(this).nextUntil(".toggle_show").toggle();
	// });


	$(document).bind("click", function (".toggle") {
	  $(".toggle".target).closest(".toggle_hide").toggle();
	  $(".toggle".target).closest(".toggle_show").toggle();
	});
});
