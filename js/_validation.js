k//Validations
$(document).ready(function() {
	
});


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

	
	$.validator.addMethod("nameVal", function(value, element) {
        return this.optional(element) || /^[a-zA-Z-\s]+$/i.test(value);
    }, "You can only use letters and hyphens.");
	
	$.validator.addMethod("phoneVal", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9\s]+$/i.test(value);
    }, "Letters, numbers and spaces are allowed only.");
		
	$.validator.addMethod("emailVal", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9\s]+$/i.test(value);
    }, "Letters, numbers and spaces are allowed only.");	
		
	$.validator.addMethod("subjectVal", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9\s]+$/i.test(value);
    }, "You can only use letters and numbers.");
	
	$.validator.addMethod("messageVal", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9\s]+$/i.test(value);
    }, "You can only use letters and numbers.");

    $("#contact_form").validate({
        rules: {
            "name": {
                required: true,
                nameVal: true
           		    },
			"phone": {
				 required: true,
				 digits: true,
				 phoneVal: true
			         },
			"email": {
				required: true,
				emailVal: true
					},
			"subject": {
				required: true,
				subjectVal: true 
					},
			"messageBox": {
				required: true,
				messageVal: true
					},
       		 },
        messages: {
            "name": {
                required: "You must enter a name.",
                nameRegExp: "Only letters and the character - are accepted."
            		},
			 "phone": {
                required: "You must enter a phone number.",
                digits: "Only numbers are accepted."
            		},
			 "email": {
                required: "You must enter an email address.",
                email: "You must enter a valid email."
            		},
			 "subject": {
                required: "You must enter a subject.",
                subjectRegExp: "Only letters and numbers are allowed."
            		},
			  "messageBox": {
                required: "You must enter a message.",
                messageRegExp: "Only letters, numbers and the characters !?- are allowed."
            		}
       			 }
    });