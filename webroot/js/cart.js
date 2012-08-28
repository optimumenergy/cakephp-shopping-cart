$(document).ready(function(){

	$('.numeric').keypress(function(event) {
		if (event.keyCode == 13) {
			return true;
		}
		return /\d/.test(String.fromCharCode(event.keyCode));
	});

	$(".remove").each(function() {
		 $(this).replaceWith('<a class="remove" href="' + Shop.basePath + 'shop/remove/' + $(this).attr('id') + '" title="Remove item"><img src="' + Shop.basePath + 'img/icon-remove.gif" alt="Remove" /></a>');
	});

});
