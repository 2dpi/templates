$(document).ready(function(){
	$(".toggle_show").hide();
	$(".toggle").click(function () {
		//$(this).siblings.next(".toggle_hide").toggle();
		//$(this).siblings.next(".toggle_show").toggle();

		var thisIs = $(this).index();
        $('.toggle_hide').eq(thisIs).toggle();
        $('.toggle_show').eq(thisIs).toggle();
	});
});
