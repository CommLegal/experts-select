<?php 

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

	$getCompanyName = $conn->execute_sql("select", array("mo_name"), "m_organisations", "mo_id =?", array("i1" => $_POST['mroCompany']));
	
	$getExpertName = $conn->execute_sql("select", array("*"), "e_accounts", "ea_id =?", array("i" => $_POST['expertID']));

	$agreementSubject = "Agreement cancellation with " . $getExpertName[0]['ea_forename'] . " " . $getExpertName[0]['ea_surname'];
	
	$expertAgreementMessage = "This message is to confirm the cancellation of your agreement: - " . "</br></br>" . "Company : " .  $getCompanyName[0]['mo_name'] . "</br></br>" . "Reason for Cancellation :" . "</br></br>" . $_POST['cancellationReason'] . "</br></br>";
	
	$mroAgreementMessage = "This message is to confirm the cancellation of your agreement: - " . "</br></br>" . "Company : " .  $getCompanyName[0]['mo_name'] . "</br></br>" . "Reason for Cancellation :" . "</br></br>" . $_POST['cancellationReason'] . "</br></br>";
	
	$updateAggDetails = $conn->execute_sql("update", array("oa_cancellation_reason" => $_POST['cancellationReason'],
														   "oa_confirmed" => "5",
														   "oa_agreement_cancellation" => date("Y-m-d H:i:s")), "organisation_agreements", "oa_id=?", array("i" => $_POST['agreedmentId']));

	
	$updateExAgreement = $conn->execute_sql("insert", array("eu_recipient_id" => $_POST['expertID'], 
														"eu_sender_id" => $_SESSION['CME_USER']['login_id'], 
														"eu_content" => $expertAgreementMessage, 
														"eu_datesent" => date("Y-m-d H:i:s"), 
														"eu_subject" => $agreementSubject,
														"eu_type" => "5",
														"eu_able_confirm" => "1",
														"eu_oa_company" => $getCompanyName[0]['mo_name']), "e_updates", "", "");
	
	$updateMROAgreement = $conn->execute_sql("insert", array("mu_recipient_id" => $_SESSION['CME_USER']['login_id'], 
														"mu_sender_id" => $_POST['expertID'], 
														"mu_content" => $mroAgreementMessage, 
														"mu_datesent" => date("Y-m-d H:i:s"), 
														"mu_subject" => $agreementSubject,
														"mu_type" => "5",
														"mu_oa_company" => $getCompanyName[0]['mo_name']), "m_updates", "", "");
	
	$resultMessage = "You have cancelled the agreement.";
	include ("success.php");

?>