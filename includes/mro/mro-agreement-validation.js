$.validator.setDefaults({
	highlight: function(element) {
		$(element).closest('.form-group').addClass('has-error');
	},
	unhighlight: function(element) {
		$(element).closest('.form-group').removeClass('has-error');
	},
	errorElement: 'label',
	errorClass: 'error',
	errorPlacement: function(error, element) {
		if(element.parent('.input-group').length) {
			error.insertAfter(element.parent());
		} else {
			error.insertAfter(element);
		}
	}
});

$.validator.addMethod("agreementMessage", function(value, element) {
	return this.optional(element) || /^[-!?'a-zA-Z0-9\s\'\@\,\.\-]+$/i.test(value);
}, "You can only use standard characters.");

$("#expertSearch").validate({
	  rules: {
		agreementMessage: {
		  required: true,
		  agreementMessage: true
		},
	  },
	  messages: {
		agreementMessage: {
		  required: "Please fill in this box.",
		},
	  }
});
