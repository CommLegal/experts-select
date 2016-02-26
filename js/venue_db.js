	$(document).ready(function () {

// VENUE SELECTION FUNCTION START //
	 
	$('#venue_id').focus(function(e){
		 
		 var venue = document.getElementById('#venue_id');
		 
			 //CHECK DIRECTORY LOCATION BY REDIRECTING
			 //$(location).attr('href', 'includes/get-venue-db.php');
			 
			 $("#venue_id").load("includes/get-venue-db.php",function( response, status, xhr ) {
					if ( status == "error" ) {
						var msg = "Sorry but there was an error: ";
						$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
					}
				});
		}
	)
});