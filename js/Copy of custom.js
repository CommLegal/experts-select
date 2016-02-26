$( document ).ready(function() {
	$(".modal-content form button[type=submit]").click(function(e) {
		e.preventDefault();	
										
		var form = $(this).closest('form');
		var formName = form.attr("name");
			
		if(formName == "loginForm") {
			
			var data = $(formName).serializeArray();
			data.push({name: 'email', value: $('#inputEmail').val()});
			data.push({name: 'password', value: $('#inputPassword').val()});
			if($('#login_expert').is(':checked')) { data.push({name: 'table', value: 'e_accounts'}); }
			if($('#login_mro').is(':checked')) { data.push({name: 'table', value: 'm_accounts'}); }
			
			$.post(
		   'pages/calls/login.php',
			data,
			function(data){
			  $(".modal-message").html(data);
			  //window.location.replace("http://192.168.3.210/foebis/");	
			}
		  );
		
		} 
	});	
	
// VENUE SELECTION FUNCTION START //
	
	$('#e_appointments--eap_v_id').focus(function(e){
		 
		 var venue = document.getElementById('#e_appointments--eap_v_id');
		 
			 //CHECK DIRECTORY LOCATION BY REDIRECTING
			 //$(location).attr('href', 'includes/get-venue-db.php');
			 
			 $("#e_appointments--eap_v_id").load("includes/get-venue-db.php",function( response, status, xhr ) {
					if ( status == "error" ) {
						var msg = "Sorry but there was an error: ";
						$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
					}
				});

		}
	)
	
// VENUE SELECTION FUNCTION END //
		
	$(".app-form-submit").click(function(e) {
		e.preventDefault();
		alert("Appointment Confirmed");
	
		var data = $("#expert-add-app").serializeArray();
			
		//alert($("#claimForm").serialize());
		$.post(
		   'pages/formupload.php',
			data,
			function(data){
			  $(".messages").html(data);  
			}
		  );
		// CODE STOPS FORM FROM POSTING TO DB .delay($(location).attr('href', 'index.php?page=appointments&action=add'););
	});
	
	
	
	$(".add-venue").click(function(e) {
		$(".add-venue-container").toggle();							   
	});
	
	$('[data-toggle="tooltip"]').tooltip();
	
	$('body').on('hidden.bs.modal', '.modal', function () {
	   //document.location.reload();
	   //window.location.replace("http://192.168.3.210/comparemedicalexperts/");
	});
	
	$("#add-app-start").change(function(e) {
		/*for(i=9; i < 17; i++) {
			$("#add-app-last option[value='" + i + "']").append();
		}
		
		for(i=9; i < $("#add-app-start").val(); i++) {
			$("#add-app-last option[value='" + i + "']").remove();
		}*/
	});
	
	function padLeft (str, max) {
	  str = str.toString();
	  return str.length < max ? padLeft("0" + str, max) : str;
	}
	
	function padRight (str, max) {
	  str = str.toString();
	  return str.length < max ? padRight(str + "0", max) : str;
	}
	
	$("#app-slot-generate").click(function(e) {
		e.preventDefault();
		var last_slot = 60 / $("#add-app-freq").val();
		
		$(".select-app-slots").html("");
		
		var counter = 0;
		
		for(i=$("#add-app-start").val(); i<=$("#add-app-last").val(); i++) {
			$(".select-app-slots").append("<br />" + i + "<br />");
			for(j= 0; j < last_slot; j++) {	
				//$(".select-app-slots").append(j * $("#add-app-freq").val());
			   $(".select-app-slots").append('<input type="checkbox" name="app_slot[]" id="app_slot' + j + '" value="' + padLeft(i, 2) + ":" + padRight((j * $("#add-app-freq").val()), 2) +'" /> ' + (j * $("#add-app-freq").val()) + '<br />');
			   counter++;
			}
		}
	});
	
	
	$("#show-expert-apps").hide();
	
	$('#expert-add-app .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
	
	$('#expert-account .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
	
	$("#hide-expert-apps").click(function(e) {
   		$(".inactive").css({"background-color":"transparent","color":"white", "border":"none"});		
		$(this).hide();
		$("#show-expert-apps").show();
	});
	
	$("#show-expert-apps").click(function(e) {
   		$(".inactive").removeAttr( 'style' );		
		$(this).hide();
		$("#hide-expert-apps").show();
	});
});