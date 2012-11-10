$(document).ready(function(){

	$('.numeric').keypress(function(event) {
		if (event.keyCode == 13) {
			return true;
		}
		return /\d/.test(String.fromCharCode(event.keyCode));
	});

	$('.numeric').on('keyup change', function(event) {

//		if(/\d/.test(String.fromCharCode(event.keyCode)) == false) {
//			return false;
//		};

		var id = $(this).attr("data-id");
		var quantity = $(this).val();

		ajaxcart(id, quantity);

	});

	$(".remove").each(function() {
		 $(this).replaceWith('<a class="remove" id="' + $(this).attr('id') + '" href="' + Shop.basePath + 'shop/remove/' + $(this).attr('id') + '" title="Remove item"><img src="' + Shop.basePath + 'img/icon-remove.gif" alt="Remove" /></a>');
	});

	$(".remove").click(function() {
		ajaxcart($(this).attr("id"), 0);
		return false;
	});

	function ajaxcart(id, quantity) {

		if(quantity == 0) {
			$('#row-' + id).fadeOut(1000, function(){ $('#row-' + id).remove(); });
		}

		$.ajax({
			type: "POST",
			url: Shop.basePath + "shop/itemupdate",
			data: {
				id: id,
				quantity: quantity,
			},
			dataType: "json",
			success: function(data) {
				$.each(data.OrderItem, function(key, value) {
					if($('#subtotal-' + key).html() != value.subtotal) {
						$('#ProductQuantity-' + key).val(value.quantity);
						$('#subtotal-' + key).html(value.subtotal).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
					}
				});
				$('#carttotal').html('$' + data.Property.cartTotal).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
				$('#ordertotal').html('$' + data.Property.cartTotal).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
				if(data.Property.cartTotal == 0) {
					window.location.replace(Shop.basePath + "shop/cart");
				}
			},
			error: function() {
				window.location.replace(Shop.basePath + "shop/cart");
			}
		});
	}

});
