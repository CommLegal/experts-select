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

var_dump($_POST);

//$previousAgreement = $conn->execute_sql("select", array("count(*) as preexisting"), "e_appointments", "eap_cc_id=? AND eap_id=?", array("i1" => "0", "i2" => $_POST['appointmentID']));


/*if($previousAgreement[0]['preexisting'] == 0) {
	
	$proposeAgreement = $conn->execute_sql("insert", array("oa_mo_name" => $_POST['mroCompany'], 
													       "oa_ma_name" => $_SESSION['CME_USER']['login_id'], 
													       "oa_ea_name" => $_POST['expertID'], 
													       "oa_app_quota" => $_POST['proposedQuota'], 
													       "oa_pa_price" => $_POST['proposedRate'], 
													       "oa_message" => $_POST['agreementMessage'], 
													       "oa_date_requested" => date("Y-m-d H:i:s"), 
													       "oa_confirmed" => "2"), "organisation_agreements", "", "");
}

?>*/