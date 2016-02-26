<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

	require_once("includes/expert_class.php");
	$expert = new expert_class;
	
	require("includes/mysqlwrapper_class.php");
	$conn = new mysqlwrapper_class;
	
	$login = new login_class();
	$userDetails = $login->getDetails($_SESSION['CME_USER']['login_id']);

	$todaydate = date('Y-m-d');
			
	$tomorrow = new DateTime('tomorrow');
	$tomorrowdate = $tomorrow->format('Y-m-d');

	$yesterday = new DateTime('yesterday');
	$yesterdaydate = $yesterday->format('Y-m-d');	
	
	echo "<div class=\"col-md-6\">";
	echo "<h4>Available Appointments On: "  . $tomorrowdate . "</h4>";
	echo "</div>";
	

?>
<!--<a href="#" title="Modal Title" class="show-overlay" id="accidentLocation:">Location (click to view)</a>-->

<div id="overlay" >
    <div id="overlay-content" class="ro">
        <div id="close"><button type="button" class="close" ><p>Close ×</p></button></div>
        
        
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

		$appArray = $conn->execute_sql("select", array("eap_id", "eap_date", "eap_timeslot"), "e_appointments", "eap_date >= ? AND eap_date <= ? AND eap_ea_id =? order by eap_date", array("s1" => $tomorrowdate . " 00:00:00", "s2" => $tomorrowdate . " 23:59:59", "i" => $_SESSION['CME_USER']['login_id']));
		
		$app_slot = 5;
		$last_slot = 60 - $app_slot;
		
		for($i=6; $i<=20; $i++) {
			?>
				<div style="clear: both;"></div>
				<div class="columnBorder">
					<div class="col-md-1"><h4 class="app-time"><?php echo (($i < 13) ? $i . " AM" :  (($i > 12) ? $i - 12 : $i - 11) . "PM") ?></h4></div>
					<div style="clear: both;"></div>
					
					<?php 
						for($j=0; $j<=$last_slot; $j+=$app_slot) {
							$avail_slots = 60 / $app_slot;	
							
					?>
					
					<?php 
						$class = $expert->check_appointment(str_pad($i, 2, '0', STR_PAD_LEFT).":".str_pad($j, 2, '0', STR_PAD_LEFT), $appArray, $app_slot);
						$active = explode("-", $class);
						
					?>
					 <!-- DISPLAYS TIMESLOT MODAL ON CLICK FOR ACTIVE TIMESLOTS, ALL INACTIVES WILL SHOW AS TEXT ONLY  -->
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
						<?php if ($active[1] == "active") { ?>
                        
                       
                        	<a href="#" title="Appointment Information" class="show-overlay" id="appointmentView:<?php echo $active[2]; ?>" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php } ?><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?>
                        <?php if ($active[1] == "active") { ?>
                       
                        	</a>
                        <?php } ?>
					</div>
					<!-- DISPLAY MODAL FOR ACTIVES END -->
					
					<?php
						$j+= $app_slot * ($active[0] - 1);
						$count++;
						}
					?>
					
					<div style="clear: both;"></div>
				</div>
			<?php	
			
		}

	?>
    
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
</body>
</html>