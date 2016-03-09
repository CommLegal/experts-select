$(document).ready(function() {
	


//BOOK STATS 2



//BOOK STATS
	$('#showExpert').click(function(){
		$(this).html("<b>Expert</b>");
		$('#showPostcode').html("Postcode");
		$('.expert').show();
		$('.postcode').hide();
		$('.error').hide();
		//$('#expert').attr("required");
		$('#postcode').removeAttr("required");
		$("#postcode").val('');

	});
	
	$('#showPostcode').click(function(){
		$(this).html("<b>Postcode</b>");
		$('#showExpert').html("Expert");
		$('.expert').hide();
		$('.postcode').show();
		$('.error').hide();
		//$('#expert').removeAttr("required");
		$('#postcode').attr("required");
		$("#radius").val('');
	});






//REPORT FORM
	$('#seatbelt').change(function(){
		if($(this).val() == 'No') {
			$('#seatbelt1').slideDown();
			$('#seatbelt2').slideDown(); 
		} else {
			$('#seatbelt1').slideUp(); 
			$('#seatbelt2').slideUp(); 
		} 
	});
	
	$('#seatbelt_exempt').change(function(){
		if($(this).val() == 'Yes') {
			$('#seatbelt2').slideDown(); 
			$('.seatbelt_title').html("Describe Exemption:");
		} else {
			$('.seatbelt_title').html("State if the claiments injuries would have been prevented or less severe:");
			//$('#seatbelt2').slideUp(); 
		} 
	});


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
			  window.location.replace("http://192.168.3.215/comparemedicalexperts/index.php");	
			}
		  );
		} 
	});	

//////////////////////////

	$('#request_appointment').click(function(e){
		e.preventDefault();
		
		var data = $("#expert-waiting-room").serializeArray();	
		//alert("!");
		$.post(
		   'includes/find-app-requests.php',
			data,
			function(data){
				
				$("#app-times").html(data);
					
			}
			
		  );
		
		//$("#dateTable").load('thisdoc.php');
	});
	
//////////////////////////////////// SIGN IN MODAL HELP LINK ///////////////////////////
$('.help_btn').click(function(){
	$('.forgot_password').show();
	$('.help_btn').hide();
});

//////////////////////////////////// DROPDOWN AGREEMENTS ///////////////////////////////

//Pending
$('.pending-dd-btn1, .agreed-dd-btn1, .cancelled-dd-btn1, .blocked-dd-btn1, .pending-dd-btn2, .agreed-dd-btn2, .cancelled-dd-btn2, .blocked-dd-btn2').hover(function() {
	$(this).css('cursor','pointer');
});

$('.pending-dd-btn1').click(function(){
	$('.pending-dd-btn1').hide();
	$('.pending-dd-btn2').show();
	$('.pending-box').hide();
	$('.pending-header').css('border-radius', '15px');
	
});
$('.pending-dd-btn2').click(function(){
	$('.pending-dd-btn2').hide();
	$('.pending-dd-btn1').show();
	$('.pending-box').slideDown();
	$('.pending-header').css('border-bottom-left-radius', '0px');
	$('.pending-header').css('border-bottom-right-radius', '0px');
});



//Agreed
$('.agreed-dd-btn1').click(function(){
	$('.agreed-dd-btn1').hide();
	$('.agreed-dd-btn2').show();
	$('.agreed-box').hide();
	$('.agreed-header').css('border-radius', '15px');
	
});
$('.agreed-dd-btn2').click(function(){
	$('.agreed-dd-btn2').hide();
	$('.agreed-dd-btn1').show();
	$('.agreed-box').slideDown();
	$('.agreed-header').css('border-bottom-left-radius', '0px');
	$('.agreed-header').css('border-bottom-right-radius', '0px');
});

//Cancelled
$('.cancelled-dd-btn1').click(function(){
	$('.cancelled-dd-btn1').hide();
	$('.cancelled-dd-btn2').show();
	$('.cancelled-box').hide();
	$('.cancelled-header').css('border-radius', '15px');
	
});
$('.cancelled-dd-btn2').click(function(){
	$('.cancelled-dd-btn2').hide();
	$('.cancelled-dd-btn1').show();
	$('.cancelled-box').slideDown();
	$('.cancelled-header').css('border-bottom-left-radius', '0px');
	$('.cancelled-header').css('border-bottom-right-radius', '0px');
});

//Blocked
$('.blocked-dd-btn1').click(function(){
	$('.blocked-dd-btn1').hide();
	$('.blocked-dd-btn2').show();
	$('.blocked-box').hide();
	$('.blocked-header').css('border-radius', '15px');
	
});
$('.blocked-dd-btn2').click(function(){
	$('.blocked-dd-btn2').hide();
	$('.blocked-dd-btn1').show();
	$('.blocked-box').slideDown();
	$('.blocked-header').css('border-bottom-left-radius', '0px');
	$('.blocked-header').css('border-bottom-right-radius', '0px');
});
//////////////////////////////////////////////////////////////////////////////////////////////////

// VENUE SELECTION FUNCTION START // 

	//$('#venue_id').focus(function(e){
	$(document).ready(function(e){
								  
		 var venue = document.getElementById('#venue_id'); 
			 
			 $("#venue_id").load("includes/get-venue-db.php",function( response, status, xhr ) {
					if ( status == "error" ) {
						var msg = "Sorry, there was an error: ";
						$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
					}
				});
		}
	)




// SUBMIT VENUE MAKER

$('#addVenueFormSubmit').click(function(e){
		e.preventDefault();	


		var data = $("#add-venue").serializeArray();
				 if( $("#add-venue").valid() ) { 
				$(this).hide();
				 $.post(
				   'includes/submit-venue.php',
					data,
					function(data){
						//alert(data);
						$('#success').html('Venue added successfully.');
					}
				  );
				 }
	});
	
// VENUE SELECTION FUNCTION END //

// APP SELECTION FUNCTION START //

	$('.afterdate').change(function(e){
												
		$("#appointmentSelection").show();
		
		 var beforedate = $(".beforedate").val();

		 var data = $("#expert-booking-stats").serializeArray();
			 
			 $.post(
			   'includes/get-appointments.php',
				data,
				function(data){
					//alert(data);
					$('#appointment_id').html(data);
				}
			  );
		}
	)

	$("#get-appointment-details").click(function(e) {
			e.preventDefault();

			
			var data = $("#get-appointment-details").serializeArray();
			data.push({name: 'appointment_id', value: $("#appointment_id :selected").attr("name")});

			$.post(
			   'includes/edit-existing-appointment.php',
				data,
				function(data){
				  $("#appointment-details").html(data);  
				}
			  );
		});
	
	$("#editedAppointmentSubmit").click(function(e) {
			e.preventDefault();

			
			var data = $("#addVenueForm").serializeArray();
			data.push({name: 'eap_newtimehour', value: $("#eap_newtimehour :selected").attr("value")});
			data.push({name: 'eap_newtimeminute', value: $("#eap_newtimeminute :selected").attr("value")});
			data.push({name: 'new-venue_id', value: $("#new-venue_id :selected").attr("name")});

			$.post(
			   'includes/submit-edited-appointment.php',
				data,
				function(data){
					$("#succesful-message").html(data); 
					
				}
			  );
		});
	
// APP SELECTION FUNCTION END //

// EXISTING VENUE SELECTION FUNCTION START //
	
	$(document).ready(function(e){
									
		 var venue = document.getElementById('#e_venue_id');
			 
			 $("#e_venue_id").load("includes/get-all-venue-db.php",function( response, status, xhr ) {
					if ( status == "error" ) {
						var msg = "Sorry but there was an error: ";
						$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
					}
				});
		}
	)
	
	$("#existing-venue-add").click(function(e) {
			e.preventDefault();

			
			var data = $("#existing-venue-add").serializeArray();
			data.push({name: 'e_venue_id', value: $("#e_venue_id :selected").attr("name")});

			$.post(
			   'includes/add-existing-postcode.php',
				data,
				function(data){
				  $("#modal-form-venue-addven").html(data);  
				}
			  );
		});

	
// EXISTING VENUE SELECTION FUNCTION END //

// MRO SELECTION FUNCTION START //

	$(document).ready(function(e){						  
		 
		 var maMro = document.getElementById('#mro_id');
		 
			 //CHECK DIRECTORY LOCATION BY REDIRECTING
			 
			 $("#mro_id").load("includes/get-mro-db.php",function( response, status, xhr ) {
					if ( status == "error" ) {
						var msg = "Sorry but there was an error: ";
						$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
					}
				});
		}
	)
	
	$(document).ready(function(e){						  
		 
		 var maMo = document.getElementById('#mo_id');
		 
			 //CHECK DIRECTORY LOCATION BY REDIRECTING
			 
			 $("#mo_id").load("includes/get-mo-db.php",function( response, status, xhr ) {
					if ( status == "error" ) {
						var msg = "Sorry but there was an error: ";
						$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
					}
				});
		}
	)
	
	
	$(document).ready(function(e){						  
		 
		 var maMro = document.getElementById('#contact-list-mro');
		 
			 //CHECK DIRECTORY LOCATION BY REDIRECTING
			 //$(location).attr('href', 'includes/get-venue-db.php');
			 
			 $("#contact-list-mro").load("includes/get-mro-db.php",function( response, status, xhr ) {
					if ( status == "error" ) {
						var msg = "Sorry but there was an error: ";
						$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
					}
				});
		}
	)

// MRO SELECTION FUNCTION END //

// EXPERT SELECTION FUNCTION START //

	$(document).ready(function(e){								 
		 
		 var ea_exp = document.getElementById('#expert_id');
			 
			 $("#expert_id").load("includes/get-expert-db.php",function( response, status, xhr ) {
					if ( status == "error" ) {
						var msg = "Sorry but there was an error: ";
						$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
					}
				});
		}
	)
	
	$(document).ready(function(e){								 
		 
		 var ea_exp = document.getElementById('#contact-list-expert');
			 
			 $("#contact-list-expert").load("includes/get-expert-db.php",function( response, status, xhr ) {
					if ( status == "error" ) {
						var msg = "Sorry but there was an error: ";
						$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
					}
				});
		}
	)

// SEACH FOR VENUE POSTCODE ON SUBMIT

	$("#expert-search-postcode").click(function(e) {
			e.preventDefault();

			var data = $("#v_search_postcode").serializeArray();

			$.post(
			   'includes/search-venue-postcode.php',
				data,
				function(data){
				  $("#postcode-results").html(data);  
				}
			  );
		});

//
	$(".app-form-submit").click(function(e) {
		e.preventDefault();
		
	
		var data = $("#expert-add-app").serializeArray();
		data.push({name: 'venue_id', value: $("#venue_id :selected").attr("name")});
		data.push({name: 'mro_id', value: $("#mro_id :selected").attr("name")});
		
		$.post(
		   'pages/formupload.php',
			data,
			function(data){
			  $("#success-message").html(data);  
			  
			}
		  );
	});
	
	$(".selectVenue").click(function(e) {
		e.preventDefault;
		alert($(this).attr("v_id"));								 
	});
	
	$(".add-venue").click(function(e) {
		$(".add-venue-container").toggle();							   
	});
	
	$('[data-toggle="tooltip"]').tooltip();
	
	$('body').on('hidden.bs.modal', '.modal', function () {

	});
	
	function padLeft (str, max) {
	  str = str.toString();
	  return str.length < max ? padLeft("0" + str, max) : str;
	}
	
	function padRight (str, max) {
	  str = str.toString();
	  return str.length < max ? padRight(str + "0", max) : str;
	}

/* START OF APPOINTMENT SLOT GENERATION ON THE ADD APPOINTMENTS PAGE */
	
	$("#app-slot-generate").click(function(e) {
		$(".select-app-slots").html("");
		e.preventDefault();
		var last_slot = 60 / $("#add-app-freq").val();
		
		var counter = 0;
		
		for(i=$("#add-app-start").val(); i != $("#add-app-last").val(); i++) {
			
			$(".select-app-slots").append('<div class = "col-md-12"><hr />' + i + ":00 <i class = 'fa fa-sm fa-arrow-right'></i><hr /></div>");
			
			for(j= 0; j < last_slot; j++) {	
				//$(".select-app-slots").append(j * $("#add-app-freq").val());
			   $(".select-app-slots").append('<div class = "col-md-1"><input type="checkbox" name="app_slot[]" id="app_slot' + j +
				'" value="' + padLeft(i, 2) + ":" + padRight((j * $("#add-app-freq").val()), 2) +'" /> ' + (j * $("#add-app-freq").val()) + '<br /></div>'); counter++;}//for inner

		}//for outer
	});//app generator
	
	$('#request-btn').click(function(e){
		e.preventDefault();			
		
		var data = $("#mro-request-form").serializeArray();
		
		if( $("#mro-request-form").valid() ) { 
	
		$.post(
		   'includes/mro/waitingroom-action.php',
			data,
			function(data){
	
				$(document.body).animate({
					'scrollTop':   $('#results-anchor').offset().top
				}, 800);				 
	
			 $("#success").html(data);
			 
			}
		  );
		}
	});  

/* END OF APPOINTMENT SLOT GENERATION ON THE ADD APPOINTMENTS PAGE */
	
	$("#show-expert-apps").hide();
	
	$('#bookNewPatient .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
	
	$('#mro-booking-stats .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
	

	$('.reportbuilder .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
	
	$('#form-app-book .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
	
	
	$('#expert-add-app .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
	
	$('#expert-add-app .input-group.date-book').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
		
	$('#expert-account .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
	
	$('#expert-waiting-room .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
	
	$('#mro-waiting-room .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true 
	});
	
	$('#mro-request-form .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true 
	});
	
	$('#expert-booking-stats .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
	
	$('#addVenueForm .input-group.date').datepicker({
		todayBtn: "linked",
		format: 'dd-mm-yyyy',
		todayHighlight: true
	});
	
	$("#hide-expert-apps").click(function(e) {
   		$(".inactive").css({"background-color":"transparent","color":"white", "border":"none"});		
		$(this).hide();
		$("#show-expert-apps").show();
	});
	
	$("#hide-expert-apps").click(function(e) {
   		$(".1-inactive").css({"background-color":"transparent","color":"white", "border":"none"});		
		$(this).hide();
		$("#show-expert-apps").show();
	});
		
	$("#hide-expert-apps").click(function(e) {
   		$(".active-taken").css({"background-color":"transparent","color":"white", "border":"none"});		
		$(this).hide();
		$("#show-expert-apps").show();
	});
	
	$("#hide-expert-apps").click(function(e) {
   		$(".1-active-taken").css({"background-color":"transparent","color":"white", "border":"none"});		
		$(this).hide();
		$("#show-expert-apps").show();
	});
	
	$("#hide-expert-apps").click(function(e) {
   		$(".2-active-taken").css({"background-color":"transparent","color":"white", "border":"none"});		
		$(this).hide();
		$("#show-expert-apps").show();
	});
	
	$("#hide-expert-apps").click(function(e) {
   		$(".3-active-taken").css({"background-color":"transparent","color":"white", "border":"none"});		
		$(this).hide();
		$("#show-expert-apps").show();
	});
	
	$("#hide-expert-apps").click(function(e) {
   		$(".4-active-taken").css({"background-color":"transparent","color":"white", "border":"none"});		
		$(this).hide();
		$("#show-expert-apps").show();
	});
	
	$("#show-expert-apps").click(function(e) {
   		$(".inactive").removeAttr( 'style' );		
		$(this).hide();
		$("#hide-expert-apps").show();
	});
	
	$("#show-expert-apps").click(function(e) {
   		$(".1-inactive").removeAttr( 'style' );		
		$(this).hide();
		$("#hide-expert-apps").show();
	});
	
	$("#show-expert-apps").click(function(e) {
   		$(".active-taken").removeAttr( 'style' );		
		$(this).hide();
		$("#hide-expert-apps").show();
	});
	
	$("#show-expert-apps").click(function(e) {
   		$(".1-active-taken").removeAttr( 'style' );		
		$(this).hide();
		$("#hide-expert-apps").show();
	});
	
	$("#show-expert-apps").click(function(e) {
   		$(".2-active-taken").removeAttr( 'style' );		
		$(this).hide();
		$("#hide-expert-apps").show();
	});
	
	$("#show-expert-apps").click(function(e) {
   		$(".3-active-taken").removeAttr( 'style' );		
		$(this).hide();
		$("#hide-expert-apps").show();
	});
	
	$("#show-expert-apps").click(function(e) {
   		$(".4-active-taken").removeAttr( 'style' );		
		$(this).hide();
		$("#hide-expert-apps").show();
	});
	
	// DATA WINDOW = 1 > Imports all html data into from thisdoc.php into the div #dateTable // 

	$('#submit-data').click(function(e){
		e.preventDefault();
		
		var data = $("#expert-add-app").serializeArray();	
			
		$.post(
		   //'pages/main/experts/pages/expert-book-app.php',
		   'thisdoc.php',
			data,
			function(data){
			  $("#dateTable").html(data);  
			}
		  );
		
		//$("#dateTable").load('thisdoc.php');
	});
	
	$('#mro-submit-data').click(function(e){
		e.preventDefault();
		
		var data = $("#expert-add-app").serializeArray();
		data.push({name: 'expert_id', value: $("#expert_id :selected").attr("name")});
			
		$.post(
		   'mro-book-app.php',
			data,
			function(data){
			  $("#dateTable").html(data);  
			}
		  );
		
		//$("#dateTable").load('thisdoc.php');
	});
	
	// DATA WINDOW = 2 > Imports all html data into from thisdoc.php into the div #dateTable // 
	
	$('#yesterdayApps').click(function(e){
		e.preventDefault();

		$("#dateTable").load('yesterdays-app.php');
	});
	
	// DATA WINDOW = 3 > Imports all html data into from thisdoc.php into the div #dateTable // 
	
	$('#tomorrowApps').click(function(e){
		e.preventDefault();
		
		$("#dateTable").load('tomorrows-app.php');
	});
	
	$('#todaysApps').click(function(e){
		e.preventDefault();
		//alert("This Works");
		$("#dateTable").load('todays-apps.php');
	});
	
	$('#this').click(function(e){
		e.preventDefault();

		$("#time-slots").load('thisdoc.php');
	});
	
	// TIME MODAL OVERLAY START //
	
	$(".show-overlay").click(function(e) {
									$("#overlay").show();
									$("#overlay #overlay-content #overlay-title").text($(this).attr("title"));
									var pageValues = $(this).attr("id").split(":");
									
									var callPage = pageValues[0];
									var callValues = pageValues[1];
									
									$.post( "pages/popup-call.php", { 
													callPage: callPage,   
													callValues: callValues
													
									})
									.done(function( data ) {
													$("#overlay #overlay-content #overlay-text").html(data);
									});
					});
	

	
							//$("#overlay").hide();
		
	// TIME MODAL OVERLAY END //

	});

	$(".pass-this-venue").click(function(e) {
		e.preventDefault();
		alert("Appointment Confirmed");
	
		var data = $("#expert-add-app").serializeArray();
		data.push({name: 'venue_id', value: $("#venue_id :selected").attr("name")});
		data.push({name: 'mro_id', value: $("#mro_id :selected").attr("name")});
		//var venueID = $("#venue_id :selected").attr("name");
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


// HELP OVERLAY FOR POSTCODE SEARCHY THING // 
		$(document).ready(function(){
			$("#existing-venue").mouseenter(function(){
				$(".helpbox").replaceWith( "Help info!" );
			});
			$("#existing-venue").mouseleave(function(){
				$(".helpbox").replaceWith( "WHY" );
			});
		});


		$("#msg_btn").click(function(){
			$("#messages-subject").show();		//
			$("#app-change-subject").hide();
			$("#app-request-subject").hide();
			$("#cancel-subject").hide();
			$("#agreement-subject").hide();
			$("#archived-subject").hide();
		});
		$("#appup-btn").click(function(){
			$("#messages-subject").hide();
			$("#app-change-subject").show();	//
			$("#app-request-subject").hide();
			$("#cancel-subject").hide();
			$("#agreement-subject").hide();
			$("#archived-subject").hide();
		});
		$("#appreq-btn").click(function(){
			$("#messages-subject").hide();
			$("#app-change-subject").hide();
			$("#app-request-subject").show();	//
			$("#cancel-subject").hide();
			$("#agreement-subject").hide();
			$("#archived-subject").hide();
		});
		$("#canc_btn").click(function(){
			$("#messages-subject").hide();
			$("#app-change-subject").hide();
			$("#app-request-subject").hide();
			$("#cancel-subject").show();		//
			$("#agreement-subject").hide();
			$("#archived-subject").hide();
		});
		$("#agreement-btn").click(function(){
			$("#messages-subject").hide();
			$("#app-change-subject").hide();
			$("#app-request-subject").hide();
			$("#cancel-subject").hide();
			$("#agreement-subject").show();	
			$("#archived-subject").hide();		//
		});
		$("#archived-btn").click(function(){
			$("#messages-subject").hide();
			$("#app-change-subject").hide();
			$("#app-request-subject").hide();
			$("#cancel-subject").hide();
			$("#agreement-subject").hide();	
			$("#archived-subject").show();		//
		});

		
		$(".subjectBox").click(function() {
		
			var data = $(this).attr("name");
			
			$("#content-block").val(""); 
	
			$.post("includes/get_message_content.php", {
				data:data
				})
				.done(function(data){
				  $("#content-block").html(data);  
				})
			});
		
		
		$("#messageUpdate").click(function() {
										  	
		var data = $('#archiveMessage').serialize();
	
		$.post("includes/archive_update.php",
			data,
			function(data){
			  $("#archiveSuccess").html(data);  
			   setTimeout(function(){location.reload();}, 2000);
			})
		});
		
		$("#archivedelete").click(function() {
										  	
		var data = $('#archiveMessage').serialize();
	
		$.post("includes/archive_delete.php",
			data,
			function(data){
			  $("#archiveSuccess").html(data);  
			   setTimeout(function(){location.reload();}, 2000);
			})
		});
		
		$("#archiveUpdate").click(function() {
										  	
		var data = $('#mroArchiveMessage').serialize();
	
		$.post("includes/mro_archive_update.php",
			data,
			function(data){
			  $("#archiveSuccess").html(data);  
			  location.reload();
			 //setTimeout(function(){location.reload();}, 2000);
			})
		});
		
		$("#expertArchiveUpdate").click(function() {
										  	
		var data = $('#expertArchiveMessage').serialize();
	
		$.post("includes/mro_archive_update.php",
			data,
			function(data){
			  $("#archiveSuccess").html(data);  
			 //setTimeout(function(){location.reload();}, 2000);
			})
		});
		
		$("#mroMessageDelete").click(function() {
										  	
		var data = $('#mroArchiveMessage').serialize();
	
		$.post("includes/mro_archive_delete.php",
			data,
			function(data){
			  $("#archiveSuccess").html(data);  
			 setTimeout(function(){location.reload();}, 2000);
			})
		});
		
		
		//$('#new-venue_id').focus(function(e){
		$(document).ready(function(e){								  
		 
			 var venue = document.getElementById('#new-venue_id');
				 
				 $("#new-venue_id").load("includes/get-venue-db.php",function( response, status, xhr ) {
						if ( status == "error" ) {
							var msg = "Sorry but there was an error: ";
							$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
						}
					});
			}
		)
		
		// SEND MESSAGE //
		
		$("#submit-expert-message").click(function(e) {
			e.preventDefault();

			var data = $("#submit-expert-message-form").serializeArray();
			data.push({name: 'mro_id', value: $("#mro_id :selected").attr("name")});

			//alert("Appointment Confirmed");
			
			$.post(
			   'includes/submit-expert-message.php',
				data,
				function(data){
				  $("#success-message").html(data);  
				}
			  );
			$("#msg-sent").show();
		});
		
		
		
		$("#submit-mro-message").click(function(e) {
			e.preventDefault();

			var data = $("#submit-mro-message-form").serializeArray();
			data.push({name: 'ea_id', value: $("#ea_id :selected").attr("name")});

			//alert("Appointment Confirmed");
			
			$.post(
			   'includes/submit-mro-message.php',
				data,
				function(data){
				  $("#success-message").html(data);  
				}
			  );
			$("#msg-sent").show();
		});
		
		
		
		$("#add-app-start").change(function(e) {
			e.preventDefault();						
			
			var dropdown = $("#expert-add-app").serializeArray();
			dropdown.push({name: 'add-app-start', value: $("#add-app-start :selected").attr("value")});
			
			$.post(
			  'pages/main/experts/pages/end-time-dropdown.php',
				dropdown,
				function(dropdown){
				  $("#end-time").html(dropdown);  
					$("#app-slot-generate").show();	 
				}
			  );
			 
		});
		
		$('#add-agreement').click(function(a){
			a.preventDefault();			
			$('.agreement-box').show();
			
			var data = $("#searchExpert").serializeArray();

			if( $("#searchExpert").valid() ) { 

				$.post(
				   'includes/mro/request-agreement.php',
					data,
					function(data){
					  $(".agreement-box").html(data);
					}
				  );
				
				
				
				}
		});
		
		
		
		$('#selectExpert').change(function(e){
			e.preventDefault();			
			
			var data = $("#selectExpert").serializeArray();
			data.push({name: 'selectExpert', value: $("#selectExpert :selected").attr("value")});	
			
			$.post(
			   'includes/mro/get-expert-information.php',
				data,
				function(data){
				  //alert(data);
				  $('#expertInformation').empty();
				  $("#expertInformation").html(data);
				  //$("#successBlock").show();
				}
				
				
				
			  );
		});
		
		$('#mro_id').change(function(e){
			e.preventDefault();			
			
			var data = $("#mro_id").serializeArray();
			data.push({name: 'mro_id', value: $("#mro_id :selected").attr("value")});	
			
			$.post(
			   'includes/experts/get-mro-information.php',
				data,
				function(data){
				  //alert(data);
				  $('#mro-information').empty();
				  $("#mro-information").html(data);
				  //$("#successBlock").show();
				}
				
				
				
			  );
		});
		
		$('#mo_id').change(function(e){
			e.preventDefault();			
			
			var data = $("#mo_id").serializeArray();
			data.push({name: 'mo_id', value: $("#mo_id :selected").attr("value")});	
			
			$.post(
			   'includes/filter-mro-by-mo.php',
				data,
				function(data){
				  $(".user-selection").show();
				  $('#mro_id').empty();
				  $("#mro_id").html(data);
				}
				
				
				
			  );
		});
		
		
		$('#agreementSubmit').click(function(e){
			e.preventDefault();			
			
			var data = $("#expertSearch").serializeArray();
			data.push({name: 'proposedQuota', value: $("#proposedQuota :selected").attr("name")});
			data.push({name: 'proposedRate', value: $("#proposedRate :selected").attr("name")});
			
			if( $("#expertSearch").valid() ) { 
			$.post(
			   'includes/mro/submit-agreement-request.php',
				data,
				function(data){
				 //alert("true");
				 $("#returnMessage").html(data);
				}
			  );
			}
		});
		
		$('#agreementExpertSubmit').click(function(e){
			e.preventDefault();			
			
			var data = $("#expert-agreement-request").serializeArray();
			
			$.post(
			   'includes/experts/submit-agreement-request.php',
				data,
				function(data){
				 //alert("true");
				 $("#returnMessage").html(data);
				}
			  );
		});
		
		$('.accordion-main .accordion:first-child').addClass('current').children('.accordion-content').css('display', 'block');
    $('.accordion-title').click(function () {
        var parent_accordion = $(this).closest('.accordion');
        if (parent_accordion.hasClass('current')) {
            parent_accordion.removeClass('current').children('.accordion-content').slideUp(300);
        } else {
            parent_accordion.addClass('current').children('.accordion-content').slideDown(300);
        }
        parent_accordion.siblings('.accordion').removeClass('current').children('.accordion-content').slideUp(300);
    });




		//// Create users
		
		$('#add-user').click(function(){
			$('.add-user-form').slideDown();
		});
		
		// Cancel agreement box
		
		$('#rejection').click(function(){
			$('#confirmations').slideUp();
		})
		
		$('#rejection').click(function(){
			$('#agreement-reject-reason').slideDown();
		});
		
		$('#cancel-reject').click(function(){
			$('#confirmations').slideDown();
			$('#agreement-reject-reason').slideUp();
		})
		
		
		//// MSG reply
		
		$('#reply-btn').click(function(){
			$('#reply-box').slideDown();
		});
		
		$('#cancel-reply').click(function(){
			$('#reply-box').slideUp();
		})
		
		
		


		//EXPERT ACCOUNT UPDATE
		$('#updateExpertInfo').click(function(e){
			e.preventDefault();			
			
			var data = $("#expert-account").serializeArray();
			data.push({name: 'ea_s_id', value: $("#ea_s_id :selected").attr("name")});
			data.push({name: 'expertSpecialty', value: $("#expertSpecialty :selected").attr("name")});
			
			if( $("#expert-account").valid() ) { 
				$.post(
				   'includes/experts/submit-profile-update.php',
					data,
					function(data){
					 //alert("true");
					 $("#success").html(data);
					}
				  );
			}
			
		});
		
		//MRO ACCOUNT UPDATE
		$('#updateMroInfo').click(function(e){
			e.preventDefault();			
			
			var data = $("#MRO-account").serializeArray();
			data.push({name: 'ma_s_id', value: $("#ma_s_id :selected").attr("name")});
			
			//alert("true");
			if( $("#MRO-account").valid() ) { 
			$.post(
			   'includes/mro/submit-profile-update.php',
				data,
				function(data){
				 //alert("true");
				 $("#success").html(data);
				 setTimeout(function(){location.reload();}, 2000);
				}
			  );
			}
			
		});
		
		

		
		$('#createUser').click(function(e){
			e.preventDefault();			
			
			var data = $("#createNewMro").serializeArray();
			data.push({name: 'setPermissions', value: $("#setPermissions :selected").attr("name")});
			data.push({name: 'userActiveStatus', value: $("#userActiveStatus :selected").attr("name")});
			
			if( $("#createNewMro").valid() ) { 
				$(this).hide();
				setTimeout(function(){location.reload();}, 2000);
			$.post(
			   'includes/mro/create-new-mro.php',
				data,
				function(data){
				 //location.reload();
				 $("#success").html(data);
				}
			  );
			}
		});




	//CONTACT
	$(function(){
	
		 $("#contact-type").change(function(){
		
		 if($(this).val() =="expertVal")
		  {
			$('#contact-list-expert').show();
			$('#contact-list-mro').hide();
			$('#contact-list-admin').hide();
			$('#Vemail').hide();
			$('#emailLabel').hide();
			$('#Vname').hide();
			$('#nameLabel').hide();
			$('#Vphone').hide();
			$('#phoneLabel').hide();
		  }
		  else if($(this).val() =="mroVal")
		  {
			$('#contact-list-mro').show();
			$('#contact-list-expert').hide();
			$('#contact-list-admin').hide();
			$('#Vemail').hide();
			$('#emailLabel').hide();
			$('#Vname').hide();
			$('#nameLabel').hide();
			$('#Vphone').hide();
			$('#phoneLabel').hide();
		  }
		  else if($(this).val() =="adminVal")
		  {
			$('#contact-list-admin').show();
			$('#contact-list-expert').hide();
			$('#contact-list-mro').hide();
			$('#Vemail').show();
			$('#emailLabel').show();
			$('#Vname').show();
			$('#nameLabel').show();
			$('#Vphone').show();
			$('#phoneLabel').show();
		  }
		  else {
			$('#contact-list-admin').hide();
			$('#contact-list-expert').hide();
			$('#contact-list-mro').hide();
			$('#Vemail').show();
			$('#emailLabel').show();
			$('#Vname').show();
			$('#nameLabel').show();
			$('#Vphone').show();
			$('#phoneLabel').show();
		  }
		});

	$('#submitConfirmation').click(function(e){
			e.preventDefault();			
			
			var data = $("#confirmAgreementUpdate").serializeArray();

			$.post(
			   'includes/experts/confirm-agreement-request.php',
				data,
				function(data){
				 $("#success").html(data);
				}
			  );
		});
	
	$('#confirm-reject').click(function(e){
			e.preventDefault();			
			
			var data = $("#confirmAgreementUpdate").serializeArray();

			$.post(
			   'includes/experts/reject-agreement-request.php',
				data,
				function(data){
				 $("#success").html(data);
				}
			  );
		});

	// CONTACT FORM //
	
	$("#contactSubmit").click(function(e) {
		e.preventDefault();
			if( $("#contact_form").valid() ) { 
			
				var data = $("#contact_form").serializeArray();
				data.push({name: 'contact-type', value: $("#contact-type :selected").attr("name")});
				data.push({name: 'contact-list-mro', value: $("#contact-list-mro :selected").attr("name")});
				data.push({name: 'contact-list-expert', value: $("#contact-list-expert :selected").attr("name")});
			
				$.post(
				   'includes/submit-contact.php',
					data,
					function(data){
					  $("#success").html(data);  
					}
				  );
			}
	});
	
	
	
	$('#confirmWaitingRoom').click(function(e){
		e.preventDefault();
		
		var data = $("#bookWaitingroomApp").serializeArray();	
		$.post(
		   'includes/experts/confirm-waitingroom.php',
			data,
			function(data){				
				$("#success").html(data);				
			}	
		  );
	});

});
	
	$('.next').click(function(e){
		e.preventDefault();
		
		var data = $("#expert-waiting-room").serializeArray();	
		$.post(
		   'includes/find-app-requests.php',
			data,
			function(data){				
				$("#app-times").html(data);				
			}	
		  );
	});
	
	$('#submitPassChange').click(function(e){
		e.preventDefault();
		
		var data = $("#forgotPassForm").serializeArray();	
		$.post(
		   'includes/forgot_pass_submit.php',
			data,
			function(data){				
				$("#success").html(data);				
			}	
		  );
	});

