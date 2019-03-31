$(function(){

	var tabContainers = $('div.detailsBox > div');
	tabContainers.hide().filter(':first').show();
	
	$('div.detailsBox ul.tabnavigation a').click(function(){
		tabContainers.hide();
		tabContainers.filter(this.hash).show();
		$('div.detailsBox ul.tabnavigation a').removeClass('selected');
		$(this).addClass('selected');
		return false;
	}).filter(':first').click();

});