$(document).ready(function(){

	$('form').submit(function(){
		$(':submit', this).click(function() {
			return false;
		});
	});

	$("input:text:visible:first").focus();

	var cache = {},	lastXhr;

	$("#ProductSearch").autocomplete({
		delay: 400,
		minLength: 2,
		source: function( request, response ) {
			var term = request.term;
			if ( term in cache ) {
				response( cache[ term ] );
				return;
			}

			lastXhr = $.getJSON(Shop.basePath + "products/searchjson.json", request, function( data, status, xhr ) {
				cache[ term ] = data;
				if ( xhr === lastXhr ) {
					response( data );
				}
			});
		}
	});

	var timeout;
	var delay = 500;

	function reloadSearch() {

		var name = $("#ProductSearch").val();

		timeout = setTimeout(function() {
			$('#all').load(Shop.basePath + "products/search", {name: name}, function() {
			});
			setTimeout(function() {}, 500);
		}, delay);

	}

	$("#ProductSearch").keyup(function() {

		var name = $("#ProductSearch").val();

		if (name.length > 3 && name.length < 40) {
			if (timeout) {
				clearTimeout(timeout);
			}
			reloadSearch();
		}

	});

});
