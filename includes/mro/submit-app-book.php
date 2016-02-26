<?php 

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

//var_dump($_POST);


 $newFormat1 = new DateTime($_POST['clientBirthdate']);
 $bookAppFormat = $newFormat1->format('Y-m-d');
 
 $getCompanyID = $conn->execute_sql("select", array("ma_name"), "m_accounts", "ma_id =?", array("i1" => $_SESSION['CME_USER']['login_id']));
 
 $checkID = $getCompanyID[0]['ma_name'];
 
 $getCompanyName = $conn->execute_sql("select", array("mo_name"), "m_organisations", "mo_id =?", array("i1" => $checkID));
 
 $getAppTime = $conn->execute_sql("select", array("eap_date"), "e_appointments", "eap_id=?", array("i" => $_POST['appointmentID']));
 
 $bookingMessage = "Your appointment: " . $getAppTime[0]['eap_date'] . " has been booked for the following patient: 
 					</br></br> <b>Patient Name : </b>" . $_POST['clientFName'] . " " . $_POST['clientSName']  . 
					"</br></br> <b>Contact Number : </b>" . $_POST["clientTelephone"] . 
					"</br></br> <b>Address : </b>" . $_POST["clientAddress1"] . "</br>" . $_POST["clientAddress2"] . "</br>" . $_POST["clientAddress3"] . "</br>" . $_POST["clientCity"] . 
					"</br></br> <b>Date of Birth : </b>" . $bookAppFormat ;
 
 $bookingSubject = "An appointment has been booked by " . $getCompanyName[0]['mo_name'];
 
 $selectExpertToUpdate = $conn->execute_sql("select", array("eap_ea_id"), "e_appointments", "eap_id=?", array("i" => $_POST['appointmentID']));
		
 $expertID = $selectExpertToUpdate[0]['eap_ea_id'];

 

 $updateExAgreement = $conn->execute_sql("insert", array("eu_recipient_id" => $expertID, 
														"eu_sender_id" => $_SESSION['CME_USER']['login_id'], 
														"eu_content" => $bookingMessage, 
														"eu_datesent" => date("Y-m-d H:i:s"), 
														"eu_subject" => $bookingSubject,
														"eu_type" => "4",
														"eu_oa_company" => $getCompanyName[0]['mo_name']), "e_updates", "", "");
 


	$checkExistingClient = $conn->execute_sql("select", array("count(*) as rows"), "c_clients", "cc_firstname=? AND cc_surname=? AND cc_postcode=?", array("s1" => $_POST['clientFName'], "s2" => $_POST['clientSName'], "s3" => $_POST['clientPostcode']));
	
	if($checkExistingClient[0]['rows'] > 0) {
		
		$getClientID = $conn->execute_sql("select", array("cc_id"), "c_clients", "cc_firstname=? AND cc_surname=? AND cc_postcode=?", array("s1" => $_POST['clientFName'], "s2" => $_POST['clientSName'], "s3" => $_POST['clientPostcode']));
		
		
		$updateClientDetails = $conn->execute_sql("update", array("cc_address1" => $_POST["clientAddress1"],
																  "cc_address2" => $_POST["clientAddress2"],
																  "cc_address3" => $_POST["clientAddress3"],
																  "cc_latitude" => $_POST["cc_latitude"], 
																  "cc_longitude" => $_POST["cc_longitude"],
																  "cc_city" => $_POST["clientCity"],
																  "cc_dob" => $bookAppFormat, 
																  "cc_telephone" => $_POST["clientTelephone"]), "c_clients", "cc_id=?", array("i" => $getClientID[0]['cc_id']));
		
		$updateAppointmentDetails = $conn->execute_sql("update", array("eap_ml_id" => $_SESSION['CME_USER']['login_id'], 
																	   "eap_cc_id" => $getClientID[0]['cc_id'], 
																	   "eap_booked" => "1", "eap_notes" => $_POST["notesbox"]), "e_appointments", "eap_id=?", array("i" => $_POST['appointmentID']));
		
		echo "This appointment has been booked.";
		
	} else { 
	
		$insertClientDetails = $conn->execute_sql("insert", array("cc_firstname" => $_POST["clientFName"], 
																  "cc_surname" => $_POST["clientSName"], 
																  "cc_postcode" => $_POST["clientPostcode"],
																  "cc_address1" => $_POST["clientAddress1"], 
																  "cc_address2" => $_POST["clientAddress2"], 
																  "cc_address3" => $_POST["clientAddress3"], 
																  "cc_latitude" => $_POST["cc_latitude"], 
																  "cc_longitude" => $_POST["cc_longitude"],
																  "cc_city" => $_POST["clientCity"],
																  "cc_dob" => $bookAppFormat,
																  "cc_telephone" => $_POST["clientTelephone"]), "c_clients", "", "");
		
		$updateAppointmentDetails = $conn->execute_sql("update", array("eap_ml_id" => $_SESSION['CME_USER']['login_id'], "eap_cc_id" => $insertClientDetails, "eap_booked" => "1", "eap_notes" => $_POST["notesbox"]), "e_appointments", "eap_id=?", array("i" => $_POST['appointmentID']));
		
		
		$resultMessage = "Appointment successfully booked!";
		include('success.php');
		//echo "This appointment has been booked.";
	
	}
	
	

	
	
?>