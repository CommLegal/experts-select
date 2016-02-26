	
$("#addVenueFormSubmit").click(function(e) {
	e.preventDefault();

	
	var data = $("#addVenueForm").serializeArray();
	
	var x = 1;
	
	while(x < 2) {
		
		x++;
		
		$.post(
		   'includes/submit-venue.php',
			data,
			function(data){
			  $("#modal-form-venue-addven").html(data);  
			  alert("Your venue has been added successfully");
			}
		  );
	
		return false;
		
	}
});
