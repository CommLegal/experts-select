$(document).ready(function() {
	

	
//Appointment book patient info vin diesel too fat too furry-us
	
	$('#book-btn').click(function(e){
			//alert("!");
			$('#book-fields').slideDown();	
			$('.vindiesel').hide();
			$('#button-bottom').hide();
	});
	
	$('#cancel-book-btn').click(function(e){
			$('#book-fields').slideUp();	
			$('.vindiesel').show();
			$('#button-bottom').show();
	});
	
	
	
	/*
	
		$('#book-btn').click(function(e){
			e.preventDefault();			
			
			var data = $("#book-fields").serializeArray();
			$('#book-btn').hide();
												 
			$.post(
			   'includes/mro/enable-agreement.php',
				data, 
				function(data){
				 alert("true");
				 $("#success").html(data);
				 $('#book-btn').hide();
				 setTimeout(function(){location.reload();}, 2000);
				}
			  );
		});
		
	*/
	

//////




		$("#close").click(function(e) {
			$("#overlay").hide();
		});
		
		$(document).keyup(function(e) {
			 if (e.keyCode == 27) { // escape key maps to keycode `27`
				$("#overlay").hide();
			}
		});
		
		
		$("#closeRefresh").click(function(e) {
				location.reload(); 					   
		});
			
		$('#deleteMROUser').click(function(e){
			e.preventDefault();			
			
			var data = $("#removeMRO").serializeArray();
			
			$.post(
			   'includes/mro/delete-mro.php',
				data,
				function(data){
				 //alert("true");
				 $("#success").html(data);
				 $('#deleteMROUser').hide();
				 setTimeout(function(){location.reload();}, 2000);
				}
			  );
		});
		
		$('#enableAgreement').click(function(e){
			e.preventDefault();			
			
			var data = $("#enableAgreementForm").serializeArray();
			$('#enableAgreement').hide();
				
				
			$.post(
			   'includes/mro/enable-agreement.php',
				data,
				function(data){
				 //alert("true");
				 $("#success").html(data);
				 $('#deleteMROUser').hide();
				 setTimeout(function(){location.reload();}, 2000);
				}
			  );
		});
		
		$('#unblockExpert').click(function(e){
			e.preventDefault();			
			
			var data = $("#unblockAgreementForm").serializeArray();
			$('#unblockExpert').hide();
			
			$.post(
			   'includes/mro/unblock-agreement.php',
				data,
				function(data){
				 //alert("true");
				 $("#success").html(data);
				 $('#deleteMROUser').hide();
				 setTimeout(function(){location.reload();}, 2000);
				}
			  );
		});
		 
		$('#cancelAgreement').click(function(e){
			e.preventDefault();			
			
			var data = $("#cancelAgreementForm").serializeArray();
			
			if( $("#cancelAgreementForm").valid() ) { 
			
			$('#cancelAgreement').hide();
			
			$.post(
			   'includes/mro/cancel-agreement.php',
				data,
				function(data){
				 //alert("true");
				 $("#success").html(data);
				 //$('#cancelAgreementForm').hide();
				 //$("#success").html("<?php include 'includes/success.php' ?>");
				setTimeout(function(){location.reload();}, 2000);
				}
			  );
			}
		});
		
		$('#submitBlock').click(function(e){
			e.preventDefault();			
			
			var data = $("#blockAgreementForm").serializeArray();
			
			if( $("#blockAgreementForm").valid() ) { 
			$('#submitBlock').hide();
			
			
			$.post(
			   'includes/mro/block-agreement.php',
				data,
				function(data){
				 //alert("true");
				 $("#success").html(data);
					$('#submitBlock').hide();
				 setTimeout(function(){location.reload();}, 2000);
				 
				}
			  );
			}
		});
		/*
		$('#submit-book-btn').click(function(e){
			e.preventDefault();			
			
			var data = $("#bookNewPatient").serializeArray();
			//alert("test"); 
			if( $("#bookNewPatient").valid() ) { 
			$.post(
				  
			   'includes/mro/submit-app-book.php',
				data,
				function(data){
				 //alert(data);
				 $("#success").html(data);
				 
					$(document.body).animate({
						'scrollTop':   $('#results-anchor').offset().top
					}, 800);

					//$('#submitBlock').hide();
				 //setTimeout(function(){location.reload();}, 2000); 
				}
			  );
			}
		});
		*/
		$('#bookNewPatient .input-group.date').datepicker({
			todayBtn: "linked",
			format: 'dd-mm-yyyy',
			todayHighlight: true
		});
		
		
		$('#editMroUser').click(function(e){
			e.preventDefault();			
			
			var data = $("#mro-users-notes").serializeArray();
			data.push({name: 'checkForActive', value: $("#checkForActive :selected").attr("name")});
			data.push({name: 'checkUserPermissions', value: $("#checkUserPermissions :selected").attr("value")});
			
			if( $("#mro-users-notes").valid() ) { 
			$.post(
			   'includes/mro/edit-mro-user.php',
				data,
				function(data){
				 //alert("true");
				 $("#success").html(data);
				 $('#editMroUser').hide();
				setTimeout(function(){location.reload();}, 2000);
				}
			  );
			}
		});
		
		$('#submitAgreementChange').click(function(e){
			e.preventDefault();			
			
			var data = $("#mroUpdateAgreement").serializeArray();
			data.push({name: 'agreedExpertRating', value: $("#agreedExpertRating :selected").attr("value")});
			
			if( $("#mroUpdateAgreement").valid() ) { 
			$.post(
			   'includes/mro/mro-agreement-update.php',
				data,
				function(data){
				 //alert("true");
				 $("#success").html(data);
				  $('#submitAgreementChange').hide();
				 //$("#success").html("<?php include './includes/success.php' ?>");
				 setTimeout(function(){location.reload();}, 2000);
				}
			
			  );
			}
		});
		
		$('.cancelThis').click(function(e){
			e.preventDefault();			
			
			var data = $("#removeMRO").serializeArray();
			$(this).hide();
			
			$.post(
			   'includes/mro/cancel-appointment.php',
				data,
				function(data){
					
					 $("#success").html(data);
					 setTimeout(function(){location.reload();}, 2000); 
				}
			  );
		});
		
		$('#addVenueModalFormSubmit').click(function(e){
			e.preventDefault();	
	
	
			var data = $("#addVenueForm").serializeArray();
					 if( $("#addVenueForm").valid() ) { 
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
		
		$('#confirmWaitingRoom').click(function(e){
		e.preventDefault();
		
		var data = $("#bookWaitingroomApp").serializeArray();	
		$.post(
		   'includes/experts/confirm-waitingroom.php',
			data,
			function(data){				
				$("#success").html(data);	
				location.reload();
			}	
		  );
	});
		
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
	
});	