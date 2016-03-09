<?php 

//START - TURN ERRORS ON
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//END - TURN ERRORS ON

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

$previousAgreement = $conn->execute_sql("select", array("count(*) as preexisting"), "organisation_agreements", "oa_mo_name =? AND oa_ea_name =? AND oa_confirmed >?", array("i1" => $_POST['mroCompany'], "i2" => $_POST['expertID'], "i3" => "0"));

$getCompanyName = $conn->execute_sql("select", array("mo_name"), "m_organisations", "mo_id =?", array("i1" => $_POST['mroCompany']));

$getExpertDetails = $cconn->execute_sql("select", array("*"), "e_accounts JOIN salutations ON ea_s_id = s_id", "ea_id=?", array("i" => $_POST['expertID']));

$agreementExpertSubject = "Agreement request from " . $getCompanyName[0]['mo_name'];

$agreementMROSubject = "Agreement request confirmation with " . $getExpertDetails[0]['s_title'] . " " . $getExpertDetails[0]['ea_forename'] . " " . $getExpertDetails[0]['ea_surname'];

$agreementMessage = $_POST['agreementMessage'] . "</br></br> Here are the details of the proposed agreement: - " . "</br></br>" . "Company : " .  $getCompanyName[0]['mo_name'] . "</br></br>" . "Proposed Rate : &#163;" . $_POST['proposedRate'] . "</br></br>" . "Proposed Monthly Quota : " .  $_POST['proposedQuota'] . "</br></br>" ;

if(($previousAgreement[0]['preexisting'] == 0) && ($_POST['selectExpert'] !== "0")) {
	
	$proposeAgreement = $conn->execute_sql("insert", array("oa_mo_name" => $_POST['mroCompany'], 
													    "oa_ma_name" => $_SESSION['CME_USER']['login_id'], 
													    "oa_ea_name" => $_POST['expertID'], 
													    "oa_app_quota" => $_POST['proposedQuota'], 
													    "oa_pa_price" => $_POST['proposedRate'], 
													    "oa_message" => $_POST['agreementMessage'], 
													    "oa_date_requested" => date("Y-m-d H:i:s"), 
													    "oa_confirmed" => "2"), "organisation_agreements", "", "");

	$updateExAgreement = $conn->execute_sql("insert", array("eu_recipient_id" => $_POST['expertID'], 
														"eu_sender_id" => $_SESSION['CME_USER']['login_id'], 
														"eu_content" => $agreementMessage, 
														"eu_datesent" => date("Y-m-d H:i:s"), 
														"eu_subject" => $agreementExpertSubject,
														"eu_type" => "5",
														"eu_oa_company" => $getCompanyName[0]['mo_name'],
														"eu_oa_id" => $proposeAgreement,
														"eu_able_confirm" => "0"), "e_updates", "", "");
	
	$updateMROAgreement = $conn->execute_sql("insert", array("mu_recipient_id" => $_SESSION['CME_USER']['login_id'], 
														"mu_sender_id" => "0", 
														"mu_content" => $agreementMessage, 
														"mu_datesent" => date("Y-m-d H:i:s"), 
														"mu_subject" => $agreementMROSubject,
														"mu_type" => "5",
														"mu_oa_company" => $getCompanyName[0]['mo_name'],
														"mu_oa_id" => $proposeAgreement, 
														"mu_able_confirm" => "1"), "m_updates", "", "");
	
	echo "Your appointment request has been submitted.";
	
} else {

	echo "Agreement enquiry has failed as one already exists between your organisation and this expert.";
	
}

?>
