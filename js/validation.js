//Fix
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

//REGULAR EXPRESSIONS
//Use 'name' for regular text and 'messageboxes' for textareas, 'phone' for numbers etc
	$.validator.addMethod("Vname", function(value, element) {
        return this.optional(element) || /^[a-zA-Zs\-]+$/i.test(value);
    }, "You can only use letters and hyphens.<br />");
	
	$.validator.addMethod("Vname2", function(value, element) {
        return this.optional(element) || /^[a-zA-Zs\-]+$/i.test(value);
    }, "You can only use letters and hyphens.<br />");

	$.validator.addMethod("Vphone", function(value, element) {
        return this.optional(element) || /^[0-9\s]+$/i.test(value);
    }, "You can only use numbers.<br />");

	$.validator.addMethod("Vmessageboxes", function(value, element) {
        return this.optional(element) || /^[-!?'a-zA-Z0-9\s\'\@\,\.\-]+$/i.test(value);
    }, "You can only use standard characters.<br />");
	
	$.validator.addMethod("Vpassword", function(value, element) {
        return this.optional(element) || /^[-!?'a-zA-Z0-9\s\'\@\,\.\-]+$/i.test(value);
    }, "You can only use standard characters.<br />");
	
	$.validator.addMethod("Vpostcode", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]+$/i.test(value);
    }, "You can only use standard characters.<br />");

	$.validator.addMethod("pwcheck", function(value) {
	   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
		   && /[a-z]/.test(value) // has a lowercase letter
		   && /\d/.test(value) // has a digit
	}, "Passwords must contain a combination of letters and numbers.");

	$.validator.addMethod("Vselect", function(value, element, arg){
	  return arg != value;
	 }, "Value must not equal arg.");
	
	$.validator.addMethod("Vtime", function(value, element) { 
		if (!/^\d{2}:\d{2}:\d{2}$/.test(value)) return false;
		var parts = value.split(':');
		if (parts[0] > 23 || parts[1] > 59 || parts[2] > 59) return false;
		return true;
	}, "Time must be HH:MM:SS format (such as 11:15:00).");
	
	

//EXPERT REQUEST AGREEMENT
$("#expert-agreement-request").validate({
  rules: {
		"app-quota": {
		  required: true,
		  digits: true,
		},
		"app-rate": {
		  required: true,
		  digits: true,
		},
		"message1": {
		  required: true,
		  Vmessageboxes: true,
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
	}
});
	

	
//MEDICAL REPORT FORM
$("#contact_form").validate({
  rules: {
		"Vname": {
		  required: true,
		  Vname: true
		},
		"Vphone": {
		  required: true,
		  Vphone: true
		},
		"Vemail": {
		  required: true,
		  email: true
		},
		"Vmessageboxes": {
		  required: true,
		  Vmessageboxes: true
		},
		"Vmessageboxes": {
		  required: true,
		  Vmessageboxes: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
	}
});
	
	
	
	
	
	
	
//MEDICAL REPORT FORM
$("#report-form1").validate({
  rules: {
		"firstName": {
		  required: true,
		  Vname: true
		},
		"lastName": {
		  required: true,
		  Vname: true
		},
		"emailAddress": {
		  required: true,
		  email: true
		},
		"phoneNo": {
		  required: true,
		  Vphone: true
		},
		"notes": {
		  required: true,
		  Vmessageboxes: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
	}
});

//EXPERT BOOKING STATISTICS TOP BIT
$("#expert-booking-stats").validate({
  rules: {
		"postcode_search": {
		  required: true,
		  Vpostcode: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
	}
});

//MRO BOOKING STATISTICS TOP BIT
$("#mro-booking-stats").validate({
  rules: {

		"postcode": {
		  required: true,
		  Vpostcode: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
	}
});


//EXPERT BOOKING STATS TIMES /1d
$("#filterTimes123").validate({
						   
  rules: {
		"timesRangingFrom": {
		  required: true,
		  digits: true,
		},
		"timesRangingTo": {
		  required: true,
		  digits: true
		},
	},
  messages: {
		Vtime: {
		   required: "Time must be HH:MM:SS format (such as 11:15:00).",
		},
	}
});


//BOOK APPOINTMENT MRO
$("#form-app-book").validate({
  rules: {
		"vbook-postcode": {
		  required: true,
		  Vpostcode: true
		},
		"vbook-radius": {
		  required: true,
		  digits: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
	}
});

//SEARCH EXPERT FOR AGREEMENT
$("#expertSearch").validate({
  rules: {
		agreementMessage: {
		  required: true,
		  Vname: true
		},
		Vname2: {
		  required: true,
		  Vname2: true
		},
		Vemail: {
		  required: true,
		  email: true
		},
		selectExpert: {
		  required: true,
		  Vselect: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
		Vname2: {
		  required: "Please fill in this box.<br />",
		},
		Vemail: {
		  required: "Please fill in this box.<br />",
		}
	}
});

$("#searchExpert").validate({
  rules: {
	  
		expertSurname: {
		  required: true,
		  Vname: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
	}
});

//MRO APP INTO
$("#bookNewPatient").validate({
  rules: {
		clientAddress1: {
		  required: true,
		  Vmessageboxes: true
		},
		clientFName: {
		  required: true,
		  Vname: true
		},
		clientSName: {
		  required: true,
		  Vname: true
		},
		address1: {
		  required: true,
		  Vmessageboxes: true
		},
		clientPostcode: {
		  required: true,
		  Vpostcode: true
		},
		clientCity: {
		  required: true,
		  Vname: true
		},
		clientTelephone: {
		  required: true,
		  Vphone: true
		},
		v_postcode: {
		  required: true,
		  Vpostcode: true
		},
	},
  messages: {
		Vmessageboxes: {
		  required: "Please fill in this box.<br />",	
		},
		Vname: {
		  required: "Please fill in this box.<br />",
		},
	}
});




//ADD VENUE EXPERT
$("#add-venue").validate({
  rules: {
		v_name: {
		  required: true,
		  Vmessageboxes: true
		},
		v_phone: {
		  required: true,
		  digits: true
		},
		v_email: {
		  required: true,
		  email: true
		},
		v_address1: {
		  required: true,
		  Vmessageboxes: true
		},
		v_city: {
		  required: true,
		  Vmessageboxes: true
		},
		v_country: {
		  required: true,
		  Vmessageboxes: true
		},
		v_postcode: {
		  required: true,
		  Vpostcode: true
		},
	},
  messages: {
		Vmessageboxes: {
		  required: "Please fill in this box.<br />",
		},
		Vname: {
		  required: "Please fill in this box.<br />",
		},
	}
});


//WAITINGROOM MRO
$("#mro-request-form").validate({
  rules: {
		pForename: {
		  required: true,
		  Vname: true
		},
		pSurname: {
		  required: true,
		  Vname: true
		},
		pContact: {
		  required: true,
		  digits: true
		},
		houseNo: {
		  required: true,
		  Vpostcode: true
		},
		line1: {
		  required: true,
		  Vpostcode: true
		},

	},
  messages: {
		Vmessageboxes: {
		  required: "Please fill in this box.<br />",
		},
		Vname: {
		  required: "Please fill in this box.<br />",
		},
	}
});


//EXPERT REGISTRATION
$("#expert-registration").validate({
  rules: {
		email: {
		  required: true,
		  email: true
		},
		password: {
		  required: true,
		  pwcheck: true,
		  minlength:6
		},
		passwordconfirm: {
		  required: true,
		  pwcheck: true,
		  minlength:6
		},
	},
  messages: {
		Vmessageboxes: {
		  required: "Please fill in this box.<br />",
		},
	}
});


//MRO REGISTRATION
$("#mro-registration").validate({
  rules: {
		email: {
		  required: true,
		  email: true
		},
		password: {
		  required: true,
		  pwcheck: true,
		  minlength:6
		},
		passwordconfirm: {
		  required: true,
		  pwcheck: true,
		  minlength:6
		},
	},
  messages: {
		Vmessageboxes: {
		  required: "Please fill in this box.<br />",
		},
	}
});





//WAITINGROOM MRO
/*
$("#request-form").validate({
  rules: {
		line1: {
		  required: true,
		  Vmessageboxes: true
		},
		line2: {
		  required: true,
		  Vmessageboxes: true
		},
	},
  messages: {
		Vmessageboxes: {
		  required: "Please fill in this box.<br />",
		},
	}
});
*/


//MRO BLOCK EXPERT
$("#blockAgreementForm").validate({
  rules: {
		blockReason: {
		  required: true,
		  Vmessageboxes: true
		},
	},
  messages: {
		Vmessageboxes: {
		  required: "Please fill in this box.<br />",
		},
	}
});

//MRO BLOCK EXPERT
$("#blockAgreementForm").validate({
  rules: {
		blockReason: {
		  required: true,
		  Vmessageboxes: true
		},
	},
  messages: {
		Vmessageboxes: {
		  required: "Please fill in this box.<br />",
		},
	}
});

//MRO CANCEL AGREEMENT
$("#cancelAgreementForm").validate({
  rules: {
		cancellationReason: {
		  required: true,
		  Vmessageboxes: true
		},
	},
  messages: {
		Vmessageboxes: {
		  required: "Please fill in this box.<br />",
		},
	}
});

//MRO VIEW/EDIT AGREEMENT MODAL

$("#mroUpdateAgreement").validate({
  rules: {
		agreedExpertQuota: {
			digits: true,
			required:true
		},
		agreedExpertPr: {
			digits: true,
			required:true
		},
	},
  messages: {
		digits: {
		  required: "Please fill in this box.<br />",
		},
	}
});

//EXPERT ACCOUNT UPDATE INFO
$("#expert-account").validate({
  rules: {
		ea_forename: {
		  required: true,
		  Vname: true
		},
		ea_surname: {
		  required: true,
		  Vname2: true
		},
		ea_telephone: {
		  required: true,
		  Vphone: true,
		  maxlength: 12
		},
		ea_email: {
		  required: true,
		  email: true,
		},
		ea_address1: {
		  required: true,
		  Vmessageboxes: true
		},
		ea_city: {
		  required: true,
		  Vmessageboxes: true
		},
		ea_county: {
		  required: true,
		  Vmessageboxes: true
		},
		ea_country: {
		  required: true,
		  Vmessageboxes: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
		Vname2: {
		  required: "Please fill in this box.<br />",
		},
		Vphone: {
		  required: "Please fill in this box.<br />",
		}
	}
});
	
//MRO ACCOUNT UPDATE INFO
$("#MRO-account").validate({
  rules: {
		ma_forename: {
		  required: true,
		  Vname: true
		},
		ma_surname: {
		  required: true,
		  Vname2: true
		},
		ma_telephone: {
		  required: true,
		  Vphone: true,
		  maxlength: 12
		},
		ma_email: {
		  required: true,
		  email: true,
		},
		ma_address1: {
		  required: true,
		  Vmessageboxes: true
		},
		ma_city: {
		  required: true,
		  Vmessageboxes: true
		},
		ma_county: {
		  required: true,
		  Vmessageboxes: true
		},
		ma_country: {
		  required: true,
		  Vmessageboxes: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
		Vname2: {
		  required: "Please fill in this box.<br />",
		},
		Vphone: {
		  required: "Please fill in this box.<br />",
		}
	}
});
	
	
	
	

//Mro View/Edit notes MODAL
$("#mro-users-notes").validate({
  rules: {
		Vname: {
		  required: true,
		  Vname: true,
		},
		Vname2: {
		  required: true,
		  Vname2: true,
		},
		Vemail: {
		  required: true,
		  email: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
		Vname2: {
		  required: "Please fill in this box.<br />",
		},
		Vemail: {
		  required: "Please fill in this box.<br />",
		}
	}
});


//MRO ACCOUNT
$("#MRO-ACCOUNT").validate({
  rules: {
		ma_forename: {
		  required: true,
		  Vname: true,
		},
		ma_surname: {
		  required: true,
		  Vname2: true,
		},
		ma_telephone: {
		  required: true,
		  Vphone: true
		},
		ma_mobile: {
		  required: true,
		  Vphone: true
		},
		ma_email: {
		  required: true,
		  email: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
		Vname2: {
		  required: "Please fill in this box.<br />",
		},
		Vphone: {
		  required: "Please fill in this box.<br />",
		},
	}
});








//CREATE USER FORM

$("#createNewMro").validate({
	  rules: {
		Vname: {
		  required: true,
		  Vname: true
		},
		Vname2: {
		  required: true,
		  Vname2: true,
		},
		Vphone: {
		  required: true,
		  Vphone: true,
		  digits: true,
		},
		emailAddress: {
		  required: true,
		  email: true,
		},
		Vsubject: {
		  required: true,
		  Vmessageboxes: true,
		},
		Vpassword: {
		  required: true,
		  pwcheck: true,
		  minlength: 6,
		},
	  },
	  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
		Vname2: {
		  required: "Please fill in this box.<br />",
		},
		Vphone: {
		  required: "Please fill in this box.<br />",
		},
		Vemail: {
		  required: "Please fill in this box.<br />",
		},
		Vpassword: {
		  required: "Please fill in this box.<br />",
		},
	  }
});



//CONTACT FORM VAL

$("#contact_form").validate({
	  rules: {
		Vname: {
		  required: true,
		  Vname: true
		},
		Vphone: {
		  required: true,
		  Vphone: true,
		  digits: true,
		},
		Vemail: {
		  required: true,
		  email: true
		},
		Vsubject: {
		  required: true,
		  Vmessageboxes: true,
		},
		Vmessage: {
		  required: true,
		  Vmessageboxes: true,
		},
	  },
	  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
		Vphone: {
		  required: "Please fill in this box.<br />",
		},
		Vemail: {
		  required: "Please fill in this box.<br />",
		},
	  }
});

//USER NOTES VAL

$("#mro-users-notes").validate({
  rules: {
		Vname: {
		  required: true,
		  Vname: true
		},
		Vname2: {
		  required: true,
		  Vname2: true
		},
		Vemail: {
		  required: true,
		  email: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
		Vname2: {
		  required: "Please fill in this box.<br />",
		},
		Vemail: {
		  required: "Please fill in this box.<br />",
		}
	}
});


//AGREEMENT EDIT

$("#2").validate({
  rules: {
		Vname: {
		  required: true,
		  Vname: true
		},
		Vname2: {
		  required: true,
		  Vname2: true
		},
		Vemail: {
		  required: true,
		  email: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
		Vname2: {
		  required: "Please fill in this box.<br />",
		},
		Vemail: {
		  required: "Please fill in this box.<br />",
		}
	}
});


//AGREEMENT CANCEL

$("#3").validate({
  rules: {
		Vname: {
		  required: true,
		  Vname: true
		},
		Vname2: {
		  required: true,
		  Vname2: true
		},
		Vemail: {
		  required: true,
		  email: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
		Vname2: {
		  required: "Please fill in this box.<br />",
		},
		Vemail: {
		  required: "Please fill in this box.<br />",
		}
	}
});

//BLOCK

$("#4").validate({
  rules: {
		Vname: {
		  required: true,
		  Vname: true
		},
		Vname2: {
		  required: true,
		  Vname2: true
		},
		Vemail: {
		  required: true,
		  email: true
		},
	},
  messages: {
		Vname: {
		  required: "Please fill in this box.<br />",
		},
		Vname2: {
		  required: "Please fill in this box.<br />",
		},
		Vemail: {
		  required: "Please fill in this box.<br />",
		}
	}
});
