$(document).ready(function(){

	$('.numeric').keypress(function(event) {
		if (event.keyCode == 13) {
			return true;
		}
		return /\d/.test(String.fromCharCode(event.keyCode));
	});

	$('.numeric').change(function(event) {

		var id = $(this).attr("data-id");
		var quantity = $(this).val();

		$.ajax({
			type: "POST",
			url: Shop.basePath + "shop/itemupdate",
			data: {
				id: id,
				quantity: quantity,
			},
			dataType: "json",
			success: function(data) {

				var subtotalCalc = $('#price-' + id).html() * quantity;
				var subtotalUpdated = subtotalCalc.toFixed(2);

				$('#subtotal-' + id).html(subtotalUpdated);

				$('#carttotal').html('$' + data.Property.cartTotal);
				$('#ordertotal').html('$' + data.Property.cartTotal);


				//$("#cart tr .quantity input[name*=" + orderCode + "]").parent().parent().find("td").animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: startColor }, 800);
				//calcPrice();
			},
			error: function() {
				alert('error');
			}
		});

	});

	$(".remove").each(function() {
		 $(this).replaceWith('<a class="remove" href="' + Shop.basePath + 'shop/remove/' + $(this).attr('id') + '" title="Remove item"><img src="' + Shop.basePath + 'img/icon-remove.gif" alt="Remove" /></a>');
	});

});
