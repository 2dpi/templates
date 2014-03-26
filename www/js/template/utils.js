var toggleHide = $( ".toggle_hide" );
var toggleShow = $( ".toggle_show" );
$( document ).on( "click", function( event ) {
	$( event.target ).closest( toggleHide ).toggle();
	$( event.target ).closest( toggleShow ).toggle();

});
$(document).ready(function(){
	$(".toggle_show").hide();
	// $(".toggle_show").hide();
	// $(".toggle").click(function () {
	// 	$.closest(".toggle_hide").toggle();
	// 	$.closest(".toggle_show").toggle();
	// });
});
