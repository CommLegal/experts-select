<?php 

require("../includes/config.php");

//START DB CONNECTION
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

$selectAppDetails = $conn->execute_sql("select", array("*"), "waiting_room", "wr_id=?", array("i" =>  $_POST['callValues'])); 

$selectPatientDetails = $conn->execute_sql("select", array("*"), "c_clients", "cc_firstname=? AND cc_surname=? AND cc_postcode=?", array("s1" =>  $selectAppDetails[0]['wr_clientFName'], "s2" =>  $selectAppDetails[0]['wr_clientSName'], "s3" =>  $selectAppDetails[0]['wr_postcode'])); 


$timesFrom = substr($selectAppDetails[0]['wr_timeFrom'], 11, 19);

$timesTo =  substr($selectAppDetails[0]['wr_timeTo'], 11, 19);

$dateOfApp = substr($selectAppDetails[0]['wr_timeTo'], 0, 11);



?>

<div class = "col-md-3"></div>
<div class = "col-md-6">
<form id="bookWaitingroomApp" method="post" action="#">
	
    <label class="controls">Patient requires appointments ranging from times between:</label>
    
    <?php echo $timesFrom . "<b> And </b>" . $timesTo; ?>

	<div class="title-divider"></div>

	<input type="hidden" name="patient_lat" value="<?php echo $selectAppDetails[0]['wr_latitude']; ?>" />
    <input type="hidden" name="patient_long" value="<?php echo $selectAppDetails[0]['wr_longitude']; ?>" />
    <input type="hidden" name="patient_booker" value="<?php echo $selectAppDetails[0]['wr_mroUser']; ?>" />
    <input type="hidden" name="patient_id" value="<?php echo $selectPatientDetails[0]['cc_id']; ?>" />
    <input type="hidden" name="waitingroom_id" value="<?php echo $_POST['callValues']; ?>" />
    <input type="hidden" name="app_date" value="<?php echo $dateOfApp; ?>" />
    
    <label class = "controls">Venue:</label>
    <select name="venue_id" id="venue_id" class="venue-box">
      <option id="v_options" name="v_options" value="0">Select Venue</option>
    </select>

    <label class = "controls">Hour:</label>
    <select class = "form-control" name="appointmentHour">
         <?php
			  for($i = 6; $i <= 20; $i++) {
				  if($i <= 9) {
					  echo "<option value=\"" . "0" . $i . ":" . "\">" . str_pad($i, 2, '0', STR_PAD_LEFT) . ":00</option>";
				  } else {
				  	  echo "<option value=\"" . $i . ":" . "\">" . str_pad($i, 2, '0', STR_PAD_LEFT) . ":00</option>";
				  }
			  }
		  ?>
    </select>
    
    <label class = "controls">Minutes:</label>
    <select class = "form-control" name="appointmentMinute">
        <?php
			  for($i = 0; $i <= 59; $i++) {
				  if($i <= 9) {
					  echo "<option value=\"" . "0" . $i . ":00" . "\">" . $i . " Minutes</option>";
				  } else { 
				  echo "<option value=\"" . $i . ":00" . "\">" . $i . " Minutes</option>";
				  }
			  }
		  ?>
    </select>
    
        
    <label class = "controls">Appointment Duration:</label>
    <select class = "form-control" name="appointmentDuration">
    	<?php
			  for($i = 5; $i <= 45; $i++) {
				  echo "<option value=\"" . $i . "\">" . $i . " Minute Duration</option>";
			  }
		  ?>
    </select>
    

</div>
<div class = "col-md-3 mb25"></div>
    <div class = "col-md-12 mt25 mb25"><div class = "mb25" id="success"></div><input type="submit" id="confirmWaitingRoom" class = "col-md-12 btn btn-success btn-lg" value="Save" /></div>
    
    <div id="success"></div>
    
</form>

    
<script src="<?php echo _ROOT ?>/js/modal.js"></script>

    
    <!-- Validation -->
    <script src="<?php echo _ROOT ?>/js/jquery.validate.js"></script>
    <script src="<?php echo _ROOT ?>/js/additional-methods.js"></script>
    <script src="<?php echo _ROOT ?>/js/validation.js"></script>
    <script src="<?php echo _ROOT ?>/js/mro-agreement-validation.js"></script>