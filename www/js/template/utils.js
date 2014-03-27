$(document).ready(function(){
	var mySwop = $(".toggle"),
	$(".toggle_show").hide();
	mySwop.each(function(){
		$(".toggle").click(function () {
			$(this).siblings.next(".toggle_hide").toggle();
			$(this).siblings.next(".toggle_show").toggle();
		});
	});
});
