
<style>
input[type=text]:focus {
	display:none;
}
</style>
<?php 

//echo $_POST['appID'];

$appInfo = $conn->execute_sql("select", array("*"), "e_appointments JOIN c_clients ON eap_cc_id = cc_id", "eap_id = ?", array("i" => $_POST['appID'])); 

$venueInfo = $conn->execute_sql("select", array("v_id", "v_name", "v_telephone", "v_email", "v_address1", "v_address2", "v_address3", "v_postcode", "v_city", "cc_id", "eap_cc_id"), "venues JOIN e_appointments ON v_id = eap_v_id JOIN c_clients ON cc_id = eap_cc_id", "eap_cc_id=?", array("i" => $appInfo[0]['cc_id']));

$venueMap = $conn->execute_sql("select", array("*"), "venues", "v_id=?", array("i" => $appInfo[0]['eap_v_id']));

echo "</br></br>";

if($appInfo[0]['cc_gender'] == "F") {
	$cc_gender = "Female";	
}
else if($appInfo[0]['cc_gender'] == "M") {
	$cc_gender = "Male";	
}

$appTimeSlot = substr($appInfo[0]['eap_date'], 11, -3);

$appDateSlot = substr($appInfo[0]['eap_date'], 0 , -9);

$venuePost = strtoupper($venueInfo[0]['v_postcode']);

?>
<body onLoad="initialiseMap()">
<div class="container main">
		<h3 class="mb25">Appointment Overview</h3> 
		
	<div class = "row">   <!-- Row -->     
		<div class = "col-md-6">  <!-- Left panel -->    
			<div class="panel panel-default panelheight"><!-- Panel header -->
				<div class="panel-heading">
					<h4>Patient</h4>
				</div>
				<div class="panel-body">
					<div class="col-lg-12"><!-- Panel container -->
						<p>
							<label>Name:</label> 
								<?php echo $appInfo[0]['cc_firstname'] . " " . $appInfo[0]['cc_surname']; ?> <br />
							<label>DOB:</label> 
								<?php echo $appInfo[0]['cc_dob']; ?> <br />
							<label>Mobile:</label> 
								<?php echo $appInfo[0]['cc_mobile']; ?> <br />
							<label>Landline:</label>  
								<?php echo $appInfo[0]['cc_telephone']; ?> <br />
							<label>Email:</label> 
								<?php echo $appInfo[0]['cc_email']; ?> <br />
							<label>Postcode:</label> 
								<?php echo $appInfo[0]['cc_postcode']; ?>  <br />
							<label>Appointment time:</label> 
								<?php echo $appTimeSlot; ?> <br />
							<label>Appointment date:</label> 
								<?php echo $appDateSlot; ?> <br />
                            <label>Appointment Notes:</label> <br />
								<?php echo $appInfo[0]['eap_notes']; ?>  <br />    
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class = "col-md-6">  <!-- Right panel -->  
			<div class="panel panel-default panelheight"><!-- Panel header -->
				<div class="panel-heading">
					<h4>Venue</h4>
				</div>
				<div class="panel-body">
					<div class="col-lg-12"><!-- Panel container -->
						<p>
							<label>Name:</label> 
								<?php echo $venueInfo[0]['v_name']; ?> <br />
							<label>Landline:</label>  
								<?php echo $venueInfo[0]['v_telephone']; ?> <br />
							<label>Email:</label> 
								<?php echo $venueInfo[0]['v_email']; ?> <br />
							<label>Address:</label> <br />
								<?php echo $venueInfo[0]['v_address1']; ?> <br />
								<?php echo $venueInfo[0]['v_address2']; ?> <br />
								<?php echo $venueInfo[0]['v_address3']; ?> <br /> 
                            	<?php echo $venueInfo[0]['v_city']; ?> <br /> 
                                <?php echo $venuePost; ?>
							<!--
                            <label>Postcode:</label>  
								<input type="text" name="v_postcode" id="v_postcode" value="" style="border:none;" autofocus /></br />
                              -->  
							
                            <input type="hidden" id="clientLatitude" name="clientLatitude" value="<?php echo $appInfo[0]['cc_latitude']; ?>" />
                            <input type="hidden" id="clientLongitude" name="clientLongitude" value="<?php echo $appInfo[0]['cc_longitude']; ?>" /> 
                            
							
                            <input type="hidden" id="venueLatitude" name="venueLatitude" value="<?php echo $venueMap[0]['v_latitude']; ?>" />
                            <input type="hidden" id="venueLongitude" name="venueLongitude" value="<?php echo $venueMap[0]['v_longitude']; ?>" /> 

                                <div id = "venner">
                                	<input class = "hidden" disabled value="<?php echo $venuePost; ?>" id = "v_postcode2" />
                                </div>
						</p> 
					</div>
				</div>
			</div>
		</div>
        
        <div class = "col-md-12">  <!-- Map -->  
            <div class="panel panel-default"><!-- Panel header -->
                <div class="panel-heading">
                    <h4>Map</h4>
                </div>
                <div class="panel-body">
                    <div class="col-lg-7"><!-- Panel container -->
						<div id="map" style="width:100%; height:550px;"></div>
                    </div>
                     <div class="col-lg-5 ">
                        <h4>Directions: <button class = "hidden float-right btn btn-default" id="printbutton" onClick="window.print();" > Print </button></h4>
                            <ul class = "scroll mah400" id="instructions">
                            </ul>
                            <form id="cancelAppForm" method="post">
                            
                            	<input type="hidden" name="<?php echo $_POST['appID']; ?>" value="" />
                                <input type="hidden" name="" value="" />
                            	
                            	<a href="#" id="cancelAppointment" class="btn btn-danger mt25" value="<?php echo $_POST['appID']; ?>">Cancel Appointment</a>
                            
                            	<div id="success"></div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
	</div><!-- End row -->
</div><!-- End container -->
</body>
<script type="text/javascript" src="<?php echo _ROOT ?>/js/gmaps.js"></script>

<script>
	//CREATE MAP
function initialiseMap() {
	var map = new GMaps({
	  div: '#map',
	  lat: <?php echo $appInfo[0]['cc_latitude']; ?>,
	  lng: <?php echo $appInfo[0]['cc_longitude']; ?>
	});
	
	//PATIENT
	map.addMarker({
	  lat: <?php echo $appInfo[0]['cc_latitude']; ?>,
	  lng: <?php echo $appInfo[0]['cc_longitude']; ?>,
	  title: 'Lima',
	  click: function(e) {
		 alert('<?php echo $appInfo[0]['cc_address1'] . " " . $appInfo[0]['cc_address2'] . " " . $appInfo[0]['cc_address3'] . " " . $appInfo[0]['cc_city']; ?> ');
	  }
	});
	map.drawOverlay({
	  lat: <?php echo $appInfo[0]['cc_latitude']; ?>,
	  lng: <?php echo $appInfo[0]['cc_longitude']; ?>,
	  content: '<div class="map-header"><p>Patient</p></div>'
	});
	
	//VENUE
	map.addMarker({
	  lat: <?php echo $venueMap[0]['v_latitude']; ?>,
	  lng: <?php echo $venueMap[0]['v_longitude']; ?>,
	  title: 'Lima',
	  click: function(e) {
		alert('<?php echo $venueInfo[0]['v_address1'] . " " . $venueInfo[0]['v_address2'] . " " . $venueInfo[0]['v_address3'] . " " . $venueInfo[0]['v_city']; ?> ');
	  }
	});
	map.drawOverlay({
	  lat: <?php echo $venueMap[0]['v_latitude']; ?>,
	  lng: <?php echo $venueMap[0]['v_longitude']; ?>,
	  content: '<div class="map-header"><p>Venue</p></div>'
	});
	
	//ROUTE
	map.drawRoute({
		origin: [<?php echo $appInfo[0]['cc_latitude'] . " , " .$appInfo[0]['cc_longitude']; ?>],
		destination: [<?php echo $venueMap[0]['v_latitude'] . " , " . $venueMap[0]['v_longitude']; ?>],
	  travelMode: 'driving',
	  strokeColor: '#5CB85C',
	  strokeOpacity: 0.6,
	  strokeWeight: 6
	});

	map.travelRoute({
	  origin: [<?php echo $venueMap[0]['v_latitude'] . " , " . $venueMap[0]['v_longitude']; ?>],
	  destination: [<?php echo $appInfo[0]['cc_latitude'] . " , " .$appInfo[0]['cc_longitude']; ?>],
	  travelMode: 'driving',
	  step: function(e) {
		$('#instructions').append('<li>'+e.instructions+'</li>');
		$('#instructions li:eq(' + e.step_number + ')').delay(450 * e.step_number).fadeIn(200, function() {
		  map.drawPolyline({
			path: e.path,
			strokeColor: '',
			strokeOpacity: 0.1,
			strokeWeight: 1
		  });
		});
	  }
	});
	
}

</script>