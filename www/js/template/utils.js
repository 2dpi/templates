$(document).ready(function(){
var toggleHide = $( ".toggle_hide" );
var toggleShow = $( ".toggle_show" );
	$(".toggle_show").hide();
	$(".toggle").click(function (event) {
		$( event.target ).closest( toggleHide ).toggle();
		$( event.target ).closest( toggleShow ).toggle();
	// 	$.closest(".toggle_hide").toggle();
	// 	$.closest(".toggle_show").toggle();
	});
});
