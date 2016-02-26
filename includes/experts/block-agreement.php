<?php 

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

	$getCompanyName = $conn->execute_sql("select", array("mo_name"), "m_organisations", "mo_id =?", array("i1" => $_POST['mroCompany']));
	
	$getExpertName = $conn->execute_sql("select", array("*"), "e_accounts", "ea_id =?", array("i" => $_POST['expertID']));

	$agreementSubject = "Agreement has been blocked from " . $getExpertName[0]['ea_forename'] . " " . $getExpertName[0]['ea_surname'];
	
	$mroAgreementMessage = "This message is to confirm the action to block your agreement: - " . "</br></br>" . "Company : " .  $getCompanyName[0]['mo_name'] . "</br></br>" . "Reason for Cancellation :" . $_POST['blockReason'] . "</br></br>";
	
	if($_SESSION['CME_USER']['type'] == "expert") { 
	
	
	$updateAggDetails = $conn->execute_sql("update", array("oa_blocked_note" => $_POST['blockReason'],
														   "oa_confirmed" => "4",
														   "oa_expert_agreement_blocked" => date("Y-m-d H:i:s")), "organisation_agreements", "oa_id=?", array("i" => $_POST['agreedmentId']));
	
	} elseif($_SESSION['CME_USER']['type'] == "mro") { 
		
	$updateAggDetails = $conn->execute_sql("update", array("oa_blocked_note" => $_POST['blockReason'],
													   "oa_confirmed" => "4",
													   "oa_mro_agreement_blocked" => date("Y-m-d H:i:s")), "organisation_agreements", "oa_id=?", array("i" => $_POST['agreedmentId']));
		
	}
	
	$updateMROAgreement = $conn->execute_sql("insert", array("mu_recipient_id" => $_SESSION['CME_USER']['login_id'], 
														"mu_sender_id" => $_POST['expertID'], 
														"mu_content" => $mroAgreementMessage, 
														"mu_datesent" => date("Y-m-d H:i:s"), 
														"mu_subject" => $agreementSubject,
														"mu_type" => "5",
														"mu_oa_company" => $getCompanyName[0]['mo_name']), "m_updates", "", "");
	
	
	//Edit the variable to your success message. It will show in 'success.php'!
	$resultMessage = "Success! Your agreement change has been sent to your expert for confirmation.";
	include ("success.php");



?>  