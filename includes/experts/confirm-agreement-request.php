<?php 

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

$confirmAgreement = $conn->execute_sql("update", array("oa_confirmed" => "1", "oa_date_agreed" => date("Y-m-d H:i:s")), "organisation_agreements", "oa_id=?", array("i" => $_POST['agreementID']));

$archiveAgreement = $conn->execute_sql("update", array("eu_type" => "6"), "e_updates", "eu_id=?", array("i" => $_POST['updateID']));
																																											  
																																											  
if($confirmAgreement) { 

	echo "Your agreement has been confirmed.";
	
} else { 

	echo "Something went wrong, please contact a system administrator.";
	
}

?>