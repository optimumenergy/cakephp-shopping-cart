$(document).ready(function(){

	$("input:text:visible:first").focus();

	$("#ProductSearch").autocomplete({
		minLength: 2,
		select: function(event, ui) {
			$("#s").val(ui.item.label);
			$("#searchform").submit();
		},
		source: function (request, response) {
			$.ajax({
				url: Shop.basePath + "products/searchjson",
				data: {
					search: request.term,
				},
				dataType: "json",
				success: function(data) {
					response($.map(data, function(el, index) {
						return {
							value: el.Product.name,
							name: el.Product.name,
							image: el.Product.image
						};
					}));
				}
			});
		}
	}).data("autocomplete")._renderItem = function (ul, item) {
		return $("<li />")
			.data("item.autocomplete", item)
			.append("<a><img width='25' src='" + Shop.basePath + "images/" + item.image + "' /> " + item.name + "</a>")
			.appendTo(ul);
	};


});
