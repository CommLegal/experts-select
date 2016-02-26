//Lowercase to uppercase, whitespace, getoutmiface
$("#clientPostcode, #vbook-postcode, #line1, #ma_postcode, #postcode_search, #ea_postcode, #v_postcode").bind('keyup', function (e) {
	if (e.which >= 97 && e.which <= 122) {
		var newKey = e.which - 32;
		e.keyCode = newKey;
		e.charCode = newKey;
	}
	$(this).val(($(this).val()).toUpperCase());
	$(this).val($(this).val().replace(/\s+/g, ''));
});