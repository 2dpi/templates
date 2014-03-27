$(document).ready(function(){
	$(".toggle_show").hide();
	$(this.".toggle").click(function () {
		$(this).siblings.next(".toggle_hide").toggle();
		$(this).siblings.next(".toggle_show").toggle();
	});
});
