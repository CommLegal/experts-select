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

	echo "<div class=\"col-md-4\">";
	echo "<h3>Available Appointments: </h3>";
	echo "</div>";

?>


<?php 
	$appArray = $conn->execute_sql("select", array("eap_id", "eap_date"), "e_appointments", "eap_date >= ? AND eap_date <= ? order by eap_date", array("s1" => $todaydate . " 00:00:00", "s2" => $todaydate . " 11:59:59"));
	
	$app_slot = 5;
	$last_slot = 60 - $app_slot;
	
	for($i=9; $i<=18; $i++) {
		?>
			<div style="clear: both;"></div>
			<div class="columnBorder">
				<div class="col-md-1"><h4 class="app-time"><?php echo (($i < 13) ? $i . " AM" :  (($i > 12) ? $i - 12 : $i - 11) . "PM") ?></h4></div>
				<div style="clear: both;"></div>
				
				<?php 
					for($j=0; $j<=$last_slot; $j+=$app_slot) {
						$j+=2;
						$avail_slots = 60 / $app_slot;

				$class = $expert->check_appointment(str_pad($i, 2, '0', STR_PAD_LEFT).":".str_pad($j, 2, '0', STR_PAD_LEFT), $appArray, $app_slot);
				$active = explode("-", $class);
				?>
				
				<div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>-taken midd">
                <a href="#" id="appointment-details" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" data-toggle="modal" data-target="#expert-check-appt" class="<?php echo $class ?>-taken" title="Eg, Egg and Eggy">
				<?php echo str_pad(9, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?>
                </a></div>
				
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

</body>
</html>