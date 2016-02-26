<?php 

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION
	
	$appDate = $_POST["app_date"] . $_POST["appointmentHour"] . $_POST["appointmentMinute"];
	
	$getCompanyName = $conn->execute_sql("select", array("ma_name"), "m_accounts", "ma_id =?", array("i1" => $_POST["patient_booker"]));
	
	$checkDuplicate = $conn->execute_sql("select", array("count(*) as rowCount"), "e_appointments", "eap_date=? AND eap_id=?", array("s" => $appDate, "i" => $_SESSION['CME_USER']['login_id']));
	
	$selectClientDetails = $conn->execute_sql("select", array("cc_firstname", "cc_surname"), "c_clients", "cc_id=?", array("i" => $_POST["patient_id"]));
	
	$confirmAppointment= $conn->execute_sql("update", array("wr_appConfirmed" => "1"), "waiting_room", "wr_id=?", array("i" => $_POST["waitingroom_id"]));

	$waitingRoomSubject = "Appointment for " . $selectClientDetails[0]['cc_firstname'] . " " . $selectClientDetails[0]['cc_surname'] .  " Confirmed";
	
	$waitingRoomtMessage = "You have confirmed a booking for " . $selectClientDetails[0]['cc_firstname'] . " " . $selectClientDetails[0]['cc_surname'] . "</br></br><b>Date: -</b> " . $_POST["app_date"] . "</br></br><b>Time: -</b> " . $_POST["appointmentHour"] . $_POST["appointmentMinute"] . "</br></br><b>Duration: -</b> " . $_POST["appointmentDuration"] . " Minutes.";
	
	$waitingMRORoomtMessage = "Your appointment request for " . $selectClientDetails[0]['cc_firstname'] . " " . $selectClientDetails[0]['cc_surname'] . " has been confirmed and booked for the following date and time. " . "</br></br><b>Date: -</b> " . $_POST["app_date"] . " </br></br><b>Time: -</b> " . $_POST["appointmentHour"] . $_POST["appointmentMinute"] . " </br></br><b>Duration: -</b> " . $_POST["appointmentDuration"] . " Minutes.";
	
	if($checkDuplicate[0]['rowCount'] == 0) { 
		$bookAsApp = $conn->execute_sql("insert", array("eap_ea_id" => $_SESSION['CME_USER']['login_id'], 
														"eap_cc_id" => $_POST["patient_id"], 
														"eap_ml_id" => $_POST["patient_booker"], 
														"eap_timeslot" => $_POST["appointmentDuration"], 
														"eap_date" => $appDate, 
														"eap_added" => date("Y-m-d H:i:s"),
														"eap_v_id" => $_POST['venue_id'],
														"eap_v_lat" => $_POST["patient_lat"], 
														"eap_v_long" => $_POST["patient_long"]), "e_appointments", "", "");
	
		$updateExAgreement = $conn->execute_sql("insert", array("eu_recipient_id" => $_SESSION['CME_USER']['login_id'], 
															"eu_sender_id" => "0", 
															"eu_content" => $waitingRoomtMessage, 
															"eu_datesent" => date("Y-m-d H:i:s"), 
															"eu_subject" => $waitingRoomSubject,
															"eu_type" => "3"), "e_updates", "", "");
		
		$updateMROAgreement = $conn->execute_sql("insert", array("mu_recipient_id" => $_POST["patient_booker"], 
															"mu_sender_id" => "0", 
															"mu_content" => $waitingMRORoomtMessage, 
															"mu_datesent" => date("Y-m-d H:i:s"), 
															"mu_subject" => $waitingRoomSubject,
															"mu_type" => "3"), "m_updates", "", "");
	
		echo "<div class = 'mt25 alert alert-success'>Appointment Confirmed.</div><script>setTimeout(function(){location.reload();}, 2000); $('#request-btn').hide();</script>";
	
	} else { 
	
		echo "<div class = 'mt25 alert alert-danger'><i class = 'fa fa-lg fa-warning'></i>  An appointment slot matching this time and date have already been arranged. Please try again with another time within the time range specified by the MRO.</div>";
	
	}

																																											  

?>