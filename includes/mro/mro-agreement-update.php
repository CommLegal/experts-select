<?php 

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

	$getCompanyName = $conn->execute_sql("select", array("mo_name"), "m_organisations", "mo_id =?", array("i1" => $_POST['mroCompany']));

	$agreementSubject = "Agreement change from " . $getCompanyName[0]['mo_name'];
	
	$expertAgreementMessage = "Here are the revised details of the proposed agreement: - " . "</br></br>" . "Company : " .  $getCompanyName[0]['mo_name'] . "</br></br>" . "Revised Rate : &#163;" . $_POST['agreedExpertPr'] . "</br></br>" . "Revised Monthly Quota : " .  $_POST['agreedExpertQuota'] . "</br></br>" ;
	
	$mroAgreementMessage = "This message is to confirm the details of your revised agreement: - " . "</br></br>" . "Company : " .  $getCompanyName[0]['mo_name'] . "</br></br>" . "Revised Rate : &#163;" . $_POST['agreedExpertPr'] . "</br></br>" . "Revised Monthly Quota : " .  $_POST['agreedExpertQuota'] . "</br></br>" ;



	$updateAggDetails = $conn->execute_sql("update", array("oa_app_quota" => $_POST['agreedExpertQuota'],
														   "oa_pa_price" => $_POST['agreedExpertPr'],
														   "oa_agreement_rating" => $_POST['agreedExpertRating'],
														   "oa_confirmed" => "2",
														   "oa_agreement_revision" => date("Y-m-d H:i:s")), "organisation_agreements", "oa_id=?", array("i" => $_POST['agreedmentId']));
	
	$updateExAgreement = $conn->execute_sql("insert", array("eu_recipient_id" => $_POST['expertID'], 
														"eu_sender_id" => $_SESSION['CME_USER']['login_id'], 
														"eu_content" => $expertAgreementMessage, 
														"eu_datesent" => date("Y-m-d H:i:s"), 
														"eu_subject" => $agreementSubject,
														"eu_type" => "5",
														"eu_oa_company" => $getCompanyName[0]['mo_name']), "e_updates", "", "");
	
	$updateMROAgreement = $conn->execute_sql("insert", array("mu_recipient_id" => $_SESSION['CME_USER']['login_id'], 
														"mu_sender_id" => $_POST['expertID'], 
														"mu_content" => $mroAgreementMessage, 
														"mu_datesent" => date("Y-m-d H:i:s"), 
														"mu_subject" => $agreementSubject,
														"mu_type" => "5",
														"mu_oa_company" => $getCompanyName[0]['mo_name']), "m_updates", "", "");
	
	//Edit the variable to your success message. It will show in 'success.php'!
	$resultMessage = "Changes confirmed and sent for approval.";
	include ("success.php");
	
	//echo "Success! Your agreement change has been sent to your expert for confirmation.";

//var_dump($_POST);

?>