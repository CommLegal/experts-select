<?php
//START - TURN ERRORS ON
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//END - TURN ERRORS ON

//START DB CONNECTION
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$dateReformat = date("Y-m-d", strtotime($_POST['edited-date']));
$timeReformat = $_POST['eap_newtimehour'] . $_POST['eap_newtimeminute'];
$datefield = $dateReformat . " " . $timeReformat;

echo "Appointment Edited Successfully"; 

//$queriedApp = $conn->execute_sql("select", array("*"), "e_appointments JOIN venues ON eap_v_id = v_id ", "eap_id=?", array("i" => $_POST['appointment_id']));

$updateApp = $conn->execute_sql("update", array("eap_v_id" => $_POST['new-venue_id'], "eap_date" => $datefield, "eap_timeslot" => $_POST['appointment-duration'], "eap_notes" => $_POST['eap_notes']), "e_appointments", "eap_id=?", array("i" => $_POST['eap_id']));

?>
