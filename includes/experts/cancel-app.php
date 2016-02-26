<?php 

	//START DB CONNECTION
	require("../mysqlwrapper_class.php");
	$conn = new mysqlwrapper_class;
	//END DB CONNECTION

	$selectUserAppointment = $conn->execute_sql("select", array("*"), "e_appointments JOIN e_accounts ON eap_ea_id = ea_id JOIN salutations ON ea_s_id = s_id", "eap_id =?", array("i" => $_POST['value']));
	
	$selectClientDetails = $conn->execute_sql("select", array("*"), "c_clients", "cc_id =?", array("i" => $selectUserAppointment[0]['eap_cc_id']));

	$message = "The Following appointment has been cancelled </br></br><b>Date/Time: -</b> " . $selectUserAppointment[0]['eap_date'] . 
		   		"</br></br><b>Patient: -</b> " . $selectClientDetails[0]['cc_firstname'] . " " . $selectClientDetails[0]['cc_surname'] . 
		   		"</br></br><b>Patient Contact Number: -</b> " . $selectClientDetails[0]['cc_telephone'] . 
		   		"</br></br><b>Appointment Holder: -</b> " . $selectUserAppointment[0]['s_title'] . " " .$selectUserAppointment[0]['ea_surname'];
				
	echo $message;
				
	$subject = "Cancellation Confirmation";
	
	$mroSubject = "Appointment on " . $selectUserAppointment[0]['eap_date'] . " has been cancelled";

	$cancelAppointment = $conn->execute_sql("update", array("eap_cancelled" => "1"), "e_appointments", "eap_id =?", array("i" => $_POST['value']));

	$updateExAgreement = $conn->execute_sql("insert", array("eu_recipient_id" => $_SESSION['CME_USER']['login_id'], 
														"eu_sender_id" => "0", 
														"eu_content" => $message, 
														"eu_datesent" => date("Y-m-d H:i:s"), 
														"eu_subject" => $subject,
														"eu_type" => "4"), "e_updates", "", "");
	
	$updateMROAgreement = $conn->execute_sql("insert", array("mu_recipient_id" => $selectUserAppointment[0]['eap_ml_id'], 
														"mu_sender_id" => "0", 
														"mu_content" => $message, 
														"mu_datesent" => date("Y-m-d H:i:s"), 
														"mu_subject" => $mroSubject,
														"mu_type" => "4"), "m_updates", "", "");

?>