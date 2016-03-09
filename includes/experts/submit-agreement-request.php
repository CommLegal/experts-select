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

$getCompanyName = $conn->execute_sql("select", array("*"), "m_accounts JOIN m_organisations ON ma_name = mo_id", "ma_id =?", array("i1" => $_POST['mroID']));

$getExpertName = $conn->execute_sql("select", array("*"), "e_accounts JOIN salutations on ea_s_id = s_id", "ea_id =?", array("i1" => $_SESSION['CME_USER']['login_id']));

$previousAgreement = $conn->execute_sql("select", array("count(*) as preexisting"), "organisation_agreements", "oa_mo_name =? AND oa_ea_name =? AND oa_confirmed >?", array("i1" => $getCompanyName[0]['mo_id'], "i2" => $_SESSION['CME_USER']['login_id'], "i3" => "0"));

//$getCompanyName = $conn->execute_sql("select", array("mo_name"), "m_organisations", "mo_id =?", array("i1" => $_POST['mroCompany']));

$agreementExpertSubject = "Agreement request confirmation from " . $getCompanyName[0]['mo_name'];

$agreementMROSubject = "Agreement request with " . $getExpertName[0]['s_title'] . " " . $getExpertName[0]['ea_forename'] . " " . $getExpertName[0]['ea_surname'];

$agreementMessage = $_POST['message1'] . "</br></br> Here are the details of the proposed agreement: - " . "</br></br>" . "Company : " .  $getCompanyName[0]['mo_name'] . "</br></br>" . "Proposed Rate : &#163;" . $_POST['app-quota'] . "</br></br>" . "Proposed Monthly Quota : " .  $_POST['app-quota'] . "</br></br>" ;

if(($previousAgreement[0]['preexisting'] == 0) && ($_POST['selectExpert'] !== "0")) {
	
	$proposeAgreement = $conn->execute_sql("insert", array("oa_mo_name" => $getCompanyName[0]['mo_id'], 
													    "oa_ma_name" => $_POST['mroID'], 
													    "oa_ea_name" => $_SESSION['CME_USER']['login_id'], 
													    "oa_app_quota" => $_POST['app-quota'], 
													    "oa_pa_price" => $_POST['app-rate'], 
													    "oa_message" => $_POST['message1'], 
													    "oa_date_requested" => date("Y-m-d H:i:s"), 
													    "oa_confirmed" => "2"), "organisation_agreements", "", "");

	$updateExAgreement = $conn->execute_sql("insert", array("eu_recipient_id" => $_SESSION['CME_USER']['login_id'], 
														"eu_sender_id" => "0", 
														"eu_content" => $agreementMessage, 
														"eu_datesent" => date("Y-m-d H:i:s"), 
														"eu_subject" => $agreementExpertSubject,
														"eu_type" => "5",
														"eu_oa_company" => $getCompanyName[0]['mo_id'],
														"eu_oa_id" => $proposeAgreement,
														"eu_able_confirm" => "1"), "e_updates", "", "");
	
	$updateMROAgreement = $conn->execute_sql("insert", array("mu_recipient_id" => $_POST['mroID'], 
														"mu_sender_id" =>  $_SESSION['CME_USER']['login_id'], 
														"mu_content" => $agreementMessage, 
														"mu_datesent" => date("Y-m-d H:i:s"), 
														"mu_subject" => $agreementMROSubject,
														"mu_type" => "5",
														"mu_oa_company" => $getCompanyName[0]['mo_id'],
														"mu_oa_id" => $proposeAgreement, 
														"mu_able_confirm" => "0"), "m_updates", "", "");
	
	echo "Your appointment request has been submitted.";
	
} else {

	echo "Agreement enquiry has failed as one already exists between your organisation and this expert.";
	
}

?>
