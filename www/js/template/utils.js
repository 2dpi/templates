function swopToggle() {
	$(this).parent().parent().next('.toggle_hide').toggle();
	$(this).parent().parent().next('.toggle_hide').next('.toggle_show').toggle();
};
$(document).ready(function(){
	$(".toggle_show").hide();
});
