<?php 

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION


$confirmAgreement = $conn->execute_sql("update", array("oa_confirmed" => "3", "oa_date_rejected" => date("Y-m-d H:i:s"), "oa_rejected" => "1", "oa_rejection_note" => $_POST['reasonForReject']), "organisation_agreements", "oa_id=?", array("i" => $_POST['agreementID']));

$archiveAgreement = $conn->execute_sql("update", array("eu_type" => "6"), "e_updates", "eu_id=?", array("i" => $_POST['updateID']));
																																											  
																																											  
if($confirmAgreement) { 

	echo "Your agreement has been rejected.";
	
} else { 

	echo "Something went wrong, please contact a system administrator";
	
}

?>