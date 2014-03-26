$(document).ready(function(){
	$(".toggle_show").hide();
	// $(".toggle").click(function () {
	// 	$(this).nextUntil(".toggle_hide").toggle();
	// 	$(this).nextUntil(".toggle_show").toggle();
	// });


	$(document).bind("click", function (e) {
	  $(e.target).closest(".toggle_hide").toggle();
	  $(e.target).closest(".toggle_show").toggle();
	});
});
