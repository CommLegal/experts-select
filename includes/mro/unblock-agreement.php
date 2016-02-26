<?php 

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

	$getCompanyName = $conn->execute_sql("select", array("mo_name"), "m_organisations", "mo_id =?", array("i1" => $_POST['mroCompany']));
	
	$getExpertName = $conn->execute_sql("select", array("*"), "e_accounts", "ea_id =?", array("i" => $_POST['expertID']));
	
	$updateAggDetails = $conn->execute_sql("update", array("oa_confirmed" => "5"), "organisation_agreements", "oa_id=?", array("i" => $_POST['agreedmentId']));
	
	//var_dump($_POST);
	
	//Edit the variable to your success message. It will show in 'success.php'!
	$resultMessage = "Success! - The expert has been un-blocked.";
	include ("success.php");
	
	//echo "Success! - Your expert has been re-enabled.";
	
	
?>