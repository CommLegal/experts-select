<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Don't close this damn page
</title>

    <!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <!-- Bootstrap core CSS -->
    <link href="<?php echo _ROOT ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo _ROOT ?>/css/cme-main.css" rel="stylesheet">
    <link href="<?php echo _ROOT ?>/css/bootstrap-datepicker.min.css" rel="stylesheet">

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
<!--<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:">Location (click to view)</a>-->

<div id="overlay" >
    <div id="overlay-content" class="ro">
        <div id="close"><button type="button" class="close" ><p>Close ×</p></button></div>
        
        
            <div id="overlay-title">
            	<p>Modal Working</p>
            </div>
            
            <div id="overlay-text">
            	<label for"cf-name">First Name: </label>
					<?php 
						$appInfo = $conn->execute_sql("select", array("eap_date", "eap_v_id", "eap_timeslot"), "e_appointments", "eap_date = ?", array("s1" => "$tomorrowdate 09:15:00")); 
						
						$appDuration = $conn->execute_sql("select", array("eap_timeslot"), "e_appointments", "eap_date = ?", array("s" => "$tomorrowdate 09:15:00"));
						
						$_POST['accidentLocation'];
					?>
                    </br></br>
                    <label for"cl-name">Last Name: </label> <?php $_POST['accidentLocation']; ?>
                    </br></br>
                    <label for"c-number">Contact Number: </label>
                    </br></br>
                    <label for"c-email">Email Address: </label>
                    </br></br>
                    <label for"c-venue">Venue: </label>
                    </br></br>
                    <label for"c-ts">Time Slot: </label><?php echo $appInfo[0]['eap_date']; ?>
                    </br></br>
                    <label for"c-ad">Appointment Duration: </label> <?php echo $appDuration[0]['eap_timeslot']; ?>
                    </br></br>
            </div>
            
            <div style="clear: both;"></div>
    </div>
    <div style="clear: both;"></div>
</div>



<?php 

		$appArray = $conn->execute_sql("select", array("eap_id", "eap_date"), "e_appointments", "eap_date >= ? AND eap_date <= ? order by eap_date", array("s1" => $tomorrowdate . " 00:00:00", "s2" => $tomorrowdate . " 11:59:59"));
		
		$app_slot = 5;
		$last_slot = 60 - $app_slot;
		
		for($i=6; $i<=6; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:This is a test" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
    <?php
		
		for($i=7; $i<=7; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
    <?php
		
		for($i=8; $i<=8; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
    <?php
		
		for($i=9; $i<=9; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
    <?php
		
		for($i=10; $i<=10; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
    <?php
		
		for($i=11; $i<=11; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
     <?php
		
		for($i=12; $i<=12; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
     <?php
		
		for($i=13; $i<=13; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
     <?php
		
		for($i=14; $i<=14; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
     <?php
		
		for($i=15; $i<=15; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
     <?php
		
		for($i=16; $i<=16; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
     <?php
		
		for($i=17; $i<=17; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
     <?php
		
		for($i=18; $i<=18; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
     <?php
		
		for($i=19; $i<=19; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
     <?php
		
		for($i=20; $i<=20; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
     <?php
		
		for($i=21; $i<=21; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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
    
     <?php
		
		for($i=22; $i<=22; $i++) {
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
					
					<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>">
<a href="#" title="Appointment Time" class="show-overlay" id="accidentLocation:" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" title="Eg, Egg and Eggy"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
					
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