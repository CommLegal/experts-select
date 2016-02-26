
<div id="overlay" style = "margin-top:100px" > <!-- USED TO CHANGE MODAL ON ADD_APPOINTMENTS!!! -->
    <div id="overlay-content" class="ro">
        <div id="close" style= "background-color: <?php echo $topcolor ?> !important"><button type="button" class="close" ><p>Close ×</p></button></div>
        
        
            <div id="overlay-title">
            	<p>Booked Appointments</p>
            </div>
            
            <div id="overlay-text">
            	
            </div>
            
            <div style="clear: both;"></div>
    </div>
    <div style="clear: both;"></div>
</div>

<?php
	require("../mysqlwrapper_class.php");
	$conn = new mysqlwrapper_class;
	
	 $venueLat = $_POST["latitude"];
	 $venueLong = $_POST["longitude"];
	 $radius = $_POST["cRadius"];
	 
	 $replaceDefault = substr($_POST["calendarDate"], 0, 11);
	 
	 if(($_POST["timesRangingTo"] == NULL) && ($_POST["timesRangingFrom"] == NULL)) {
		 $filterTimesFrom = $replaceDefault . " 00:00:00";
		 $filterTimesTo = $replaceDefault . " 23:59:59"; 
	 }
	
if(($_POST['sortOrder'] == "Distance") && ($_POST['filterSpecialty'] == "0")) { 

		$result = $conn->execute_sql('select',
		
		array('z.*, 
		(p.distance_unit
		* DEGREES(ACOS(COS(RADIANS(p.latpoint)) 
		* COS(RADIANS(z.eap_v_lat))
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
		+ SIN(RADIANS(p.latpoint))
		* SIN(RADIANS(z.eap_v_lat))))) * 0.621371 AS distance_in_km'), 
		'e_appointments AS z
		
		JOIN ( 
		
		SELECT ' . $venueLat . ' AS latpoint, ' . $venueLong . ' AS longpoint,
		' . $radius . ' AS radius, 111.045 AS distance_unit
		) AS p ON 1=1 JOIN e_accounts ON eap_ea_id = ea_id JOIN e_type ON ea_et_type = et_id',
		
		'z.eap_v_lat
		BETWEEN p.latpoint - (p.radius / p.distance_unit)
		AND p.latpoint + (p.radius / p.distance_unit)
		AND z.eap_v_long
		BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
		AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
		AND ((p.distance_unit
		* DEGREES(ACOS(COS(RADIANS(p.latpoint))
		* COS(RADIANS(z.eap_v_lat))
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
		+ SIN(RADIANS(p.latpoint))
		* SIN(RADIANS(z.eap_v_lat))))) * 0.621371) <= p.radius
		AND eap_booked IS NULL AND eap_date >=? AND eap_date <=? AND eap_cc_id =? ORDER BY distance_in_km', array("s1" => $filterTimesFrom, "s2" => $filterTimesTo, "i" => "0"));
} 
elseif(($_POST['sortOrder'] == "Date") && ($_POST['filterSpecialty'] == "0")) { 
	 
		$result = $conn->execute_sql('select',
		
		array('z.*, 
		(p.distance_unit
		* DEGREES(ACOS(COS(RADIANS(p.latpoint)) 
		* COS(RADIANS(z.eap_v_lat))
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
		+ SIN(RADIANS(p.latpoint))
		* SIN(RADIANS(z.eap_v_lat))))) * 0.621371 AS distance_in_km'), 
		'e_appointments AS z
		
		JOIN ( 
		
		SELECT ' . $venueLat . ' AS latpoint, ' . $venueLong . ' AS longpoint,
		' . $radius . ' AS radius, 111.045 AS distance_unit
		) AS p ON 1=1 JOIN e_accounts ON eap_ea_id = ea_id JOIN e_type ON ea_et_type = et_id',
		
		'z.eap_v_lat
		BETWEEN p.latpoint - (p.radius / p.distance_unit)
		AND p.latpoint + (p.radius / p.distance_unit)
		AND z.eap_v_long
		BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
		AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
		AND ((p.distance_unit
		* DEGREES(ACOS(COS(RADIANS(p.latpoint))
		* COS(RADIANS(z.eap_v_lat))
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
		+ SIN(RADIANS(p.latpoint))
		* SIN(RADIANS(z.eap_v_lat))))) * 0.621371) <= p.radius
		AND eap_booked IS NULL AND eap_date >=? AND eap_date <=? AND eap_cc_id =? ORDER BY eap_date', array("s1" => $filterTimesFrom, "s2" => $filterTimesTo, "i" => "0"));
}
elseif(($_POST['sortOrder'] == "Expert") && ($_POST['filterSpecialty'] == "0")) { 

		$result = $conn->execute_sql('select',
		
		array('z.*, 
		(p.distance_unit
		* DEGREES(ACOS(COS(RADIANS(p.latpoint)) 
		* COS(RADIANS(z.eap_v_lat))
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
		+ SIN(RADIANS(p.latpoint))
		* SIN(RADIANS(z.eap_v_lat))))) * 0.621371 AS distance_in_km'), 
		'e_appointments AS z
		
		JOIN ( 
		
		SELECT ' . $venueLat . ' AS latpoint, ' . $venueLong . ' AS longpoint,
		' . $radius . ' AS radius, 111.045 AS distance_unit
		) AS p ON 1=1 JOIN e_accounts ON eap_ea_id = ea_id JOIN e_type ON ea_et_type = et_id',
		
		'z.eap_v_lat
		BETWEEN p.latpoint - (p.radius / p.distance_unit)
		AND p.latpoint + (p.radius / p.distance_unit)
		AND z.eap_v_long
		BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
		AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
		AND ((p.distance_unit
		* DEGREES(ACOS(COS(RADIANS(p.latpoint))
		* COS(RADIANS(z.eap_v_lat))
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
		+ SIN(RADIANS(p.latpoint))
		* SIN(RADIANS(z.eap_v_lat))))) * 0.621371) <= p.radius
		AND eap_booked IS NULL AND eap_date >=? AND eap_date <=? eap_cc_id=? ORDER BY eap_ea_id DESC', array("s1" => $filterTimesFrom, "s2" => $filterTimesTo, "i" => "0"));
}
elseif($_POST['sortOrder'] == "Distance") { 

		$result = $conn->execute_sql('select',
		
		array('z.*, 
		(p.distance_unit
		* DEGREES(ACOS(COS(RADIANS(p.latpoint)) 
		* COS(RADIANS(z.eap_v_lat))
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
		+ SIN(RADIANS(p.latpoint))
		* SIN(RADIANS(z.eap_v_lat))))) * 0.621371 AS distance_in_km'), 
		'e_appointments AS z
		
		JOIN ( 
		
		SELECT ' . $venueLat . ' AS latpoint, ' . $venueLong . ' AS longpoint,
		' . $radius . ' AS radius, 111.045 AS distance_unit
		) AS p ON 1=1 JOIN e_accounts ON eap_ea_id = ea_id JOIN e_type ON ea_et_type = et_id',
		
		'z.eap_v_lat
		BETWEEN p.latpoint - (p.radius / p.distance_unit)
		AND p.latpoint + (p.radius / p.distance_unit)
		AND z.eap_v_long
		BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
		AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
		AND ((p.distance_unit
		* DEGREES(ACOS(COS(RADIANS(p.latpoint))
		* COS(RADIANS(z.eap_v_lat))
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
		+ SIN(RADIANS(p.latpoint))
		* SIN(RADIANS(z.eap_v_lat))))) * 0.621371) <= p.radius
		AND eap_booked IS NULL AND eap_date >=? AND eap_date <=? AND ea_et_type=? eap_cc_id=? ORDER BY distance_in_km', array("s1" => $filterTimesFrom, "s2" => $filterTimesTo, "i1" => $_POST['filterSpecialty'], "i" => "0"));
} 
elseif($_POST['sortOrder'] == "Date") { 
	 
		$result = $conn->execute_sql('select',
		
		array('z.*, 
		(p.distance_unit
		* DEGREES(ACOS(COS(RADIANS(p.latpoint)) 
		* COS(RADIANS(z.eap_v_lat))
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
		+ SIN(RADIANS(p.latpoint))
		* SIN(RADIANS(z.eap_v_lat))))) * 0.621371 AS distance_in_km'), 
		'e_appointments AS z
		
		JOIN ( 
		
		SELECT ' . $venueLat . ' AS latpoint, ' . $venueLong . ' AS longpoint,
		' . $radius . ' AS radius, 111.045 AS distance_unit
		) AS p ON 1=1 JOIN e_accounts ON eap_ea_id = ea_id JOIN e_type ON ea_et_type = et_id',
		
		'z.eap_v_lat
		BETWEEN p.latpoint - (p.radius / p.distance_unit)
		AND p.latpoint + (p.radius / p.distance_unit)
		AND z.eap_v_long
		BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
		AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
		AND ((p.distance_unit
		* DEGREES(ACOS(COS(RADIANS(p.latpoint))
		* COS(RADIANS(z.eap_v_lat))
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
		+ SIN(RADIANS(p.latpoint))
		* SIN(RADIANS(z.eap_v_lat))))) * 0.621371) <= p.radius
		AND eap_booked IS NULL AND eap_date >=? AND eap_date <=? AND ea_et_type=? eap_cc_id=? ORDER BY eap_date', array("s1" => $filterTimesFrom, "s2" => $filterTimesTo, "i1" => $_POST['filterSpecialty'], "i" => "0"));
}
elseif($_POST['sortOrder'] == "Expert") { 

		$result = $conn->execute_sql('select',
		
		array('z.*, 
		(p.distance_unit
		* DEGREES(ACOS(COS(RADIANS(p.latpoint)) 
		* COS(RADIANS(z.eap_v_lat))
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
		+ SIN(RADIANS(p.latpoint))
		* SIN(RADIANS(z.eap_v_lat))))) * 0.621371 AS distance_in_km'), 
		'e_appointments AS z
		
		JOIN ( 
		
		SELECT ' . $venueLat . ' AS latpoint, ' . $venueLong . ' AS longpoint,
		' . $radius . ' AS radius, 111.045 AS distance_unit
		) AS p ON 1=1 JOIN e_accounts ON eap_ea_id = ea_id JOIN e_type ON ea_et_type = et_id',
		
		'z.eap_v_lat
		BETWEEN p.latpoint - (p.radius / p.distance_unit)
		AND p.latpoint + (p.radius / p.distance_unit)
		AND z.eap_v_long
		BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
		AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
		AND ((p.distance_unit
		* DEGREES(ACOS(COS(RADIANS(p.latpoint))
		* COS(RADIANS(z.eap_v_lat))
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
		+ SIN(RADIANS(p.latpoint))
		* SIN(RADIANS(z.eap_v_lat))))) * 0.621371) <= p.radius
		AND eap_booked IS NULL AND eap_date >=? AND eap_date <=? AND ea_et_type=? eap_cc_id=? ORDER BY eap_ea_id DESC', array("s1" => $filterTimesFrom, "s2" => $filterTimesTo, "i1" => $_POST['filterSpecialty'], "i" => "0"));
}


if (empty($result)) {
	echo "<div style='clear:both;' class = 'alert alert-danger'><i class = 'fa fa-lg fa-warning'></i> &nbsp; No appointments found. Try increasing the radius or select a different venue.</div>";
}
else {
	
?>




<div class = "col-md-12 scroll " style = "max-height:350px;">
<div class = "col-md-12" style=  "background-color:#337AB7; height:5px; border-top-right-radius:10px; border-top-left-radius:10px; margin-bottom:-2px;"></div>
		<table class = "table table-responsive " >  
            <tr class = "appbook-header">
                <td>Expert</td>
                <td>Date/Time</td>
                <td>Slot Duration</td>
                <td>Specialty</td>
                <td>Action</td>
            </tr>

            <?php 
                         
                    foreach($result as $header => $value) { 
					
					$appDate = substr($result[$header]['eap_date'], 0, 11);
                    
                     $getAppointmentInfo = $conn->execute_sql("select", array("*"), "e_appointments JOIN e_accounts ON eap_ea_id = ea_id JOIN salutations ON ea_s_id = s_id JOIN e_type ON ea_et_type = et_id", "eap_id=?", array("i" => $result[$header]['eap_id']));
					 
					 $getTime = substr($result[$header]['eap_date'], 11, 19);
                     
            ?>
                    
    
            <tr>
                <td><?php echo $getAppointmentInfo[0]['s_title'] . " " . $getAppointmentInfo[0]['ea_forename'] . " " . $getAppointmentInfo[0]['ea_surname']; ?></td>
                <td><?php echo $getTime; ?></td>
                <td><?php echo $getAppointmentInfo[0]['eap_timeslot'] . " " . "minutes"; ?></td>
                <td><?php echo $getAppointmentInfo[0]['et_type']; ?></td>
                <td>
                    <button id="mro-booking:<?php echo $getAppointmentInfo[0]['eap_id']; ?>" class = "btn btn-default show-overlay"><i class = "fa fa-lg fa-edit"></i></button>
                </td>
            </tr>




        <?php }} ?>

	</table>
</div>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo _ROOT ?>/js/postcoder.js"></script>
<script src="<?php echo _ROOT ?>/js/validation.js"></script>
<script>
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
			$("#close").click(function(e) {
					$("#overlay").hide();
							   
	});
</script>

