$(document).ready(function(){
	$(".toggle_show").hide();
});
var toggleHide = $( ".toggle_hide" );
var toggleShow = $( ".toggle_show" );
$( document ).on( "click", function( event ) {
	$(".toggle").click(function () {
		$( event.target ).closest( toggleHide ).toggle();
		$( event.target ).closest( toggleShow ).toggle();
	});
});
