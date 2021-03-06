<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../includes/expert_class.php");
$expert = new expert_class;

require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$appInfo = $conn->execute_sql("select", array("eap_date", "eap_v_id", "eap_timeslot", "eap_injury", "ma_id", "ma_forename", "ma_surname", "ma_telephone", "ma_email"), "e_appointments JOIN m_accounts ON eap_ml_id = ma_id", "eap_id = ?", array("i" => $_POST['callValues'])); 

$venueInfo = $conn->execute_sql("select", array("v_id", "v_name", "v_telephone", "v_email", "v_address1", "v_address2", "v_address3", "v_postcode", "v_city", "eap_cc_id", "eap_timeslot", "eap_injury", "eap_date"), "venues JOIN e_appointments ON v_id = eap_v_id", "eap_id = ?", array("i" =>  $_POST['callValues']));

$bookingInfo = $conn->execute_sql("select", array("eap_date", "eap_timeslot", "eap_injury", "ma_name", "ma_forename", "ma_surname", "ma_telephone", "ma_email", "v_name"), "e_appointments JOIN m_accounts ON eap_ml_id = ma_id JOIN venues ON v_id = eap_v_id", "eap_id = ?", array("i" => $_POST['callValues'])); 

$class = $expert->check_appointment(str_pad($i, 2, '0', STR_PAD_LEFT).":".str_pad($j, 2, '0', STR_PAD_LEFT), $appArray, $app_slot);
$active = explode("-", $class);

$appTimeSlot = substr($venueInfo[0]['eap_date'], 11, -3);

$appDateSlot = substr($venueInfo[0]['eap_date'], 0 , -9);

?>

<?php if(!$appBooked) { ?>

<label for"cf-name">MRO Name: -</label><?php echo " " . $appInfo[0]['ma_forename'] . " " . $appInfo[0]['ma_surname']; ?>
</br></br>
<label for"c-number">Telephone Number: -</label><?php echo " " . $appInfo[0]['ma_telephone']; ?>
</br></br>
<label for"c-email">Email Address: -</label><?php echo " " . $appInfo[0]['ma_email']; ?>
</br></br>
<label for"c-venue">Venue: -</label><?php echo " " . $venueInfo[0]['v_name']; ?>
</br></br>
<label for"c-ts">Appointment Time: -</label><?php echo " " . $appTimeSlot; ?> 
</br></br>
<label for"c-ts">Appointment Date: -</label><?php echo " " . $appDateSlot; ?> 
</br></br>
<label for"c-ad">Appointment Duration: -</label><?php echo " " . $bookingInfo[0]['eap_timeslot'] . " Minutes"; ?>
</br></br>
<?php if($venueInfo[0]['eap_notes'] !== NULL) { ?>
	<label for"c-injury">Client Symptoms: -</label><?php echo " " .  $venueInfo[0]['eap_notes'] ?>
<?php } ?>
<div class="title-divider"></div>
</br>

<form action="<?php echo _ROOT ?>/index.php?page=appinfo" method="post" enctype="multipart/form-data">  

    	<input type="hidden" name="test1" value="<?php echo $appInfo[0]['ma_forename']; ?>" />  
        <input type="hidden" name="test2" value="<?php echo $appInfo[0]['ma_surname']; ?>" /> 
        <input type="hidden" name="test3" value="<?php echo $appInfo[0]['ma_telephone']; ?>" /> 
        <input type="hidden" name="test4" value="<?php echo $venueInfo[0]['v_name']; ?>" /> 
        <input type="hidden" name="test5" value="<?php echo $venueInfo[0]['v_id']; ?>" />
        <input type="hidden" name="appID" value="<?php echo $_POST['callValues']; ?>" />
        <button type = "submit" class="btn btn-success" href="<?php echo _ROOT ?>/index.php?page=appinfo" title="App Overview"><span class="glyphicon glyphicon-calendar"></span>Appointment Overview</button>

</form>

<?php } ?>

</br></br>