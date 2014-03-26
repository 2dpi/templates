$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		$(this.target).closest(".toggle_hide").toggle();
		$(this.target).closest(".toggle_show").toggle();
	});
});
