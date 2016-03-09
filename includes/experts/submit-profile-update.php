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


$newPassword = $_POST['ea_password'];

$newPassword = md5(_PWD_SALT . $newPassword . _PWD_SALT);

if($_POST['ea_password'] == NULL) { 

	$updateDetails = $conn->execute_sql("update", array("ea_s_id" => $_POST['ea_s_id'],
														   "ea_forename" => $_POST['ea_forename'],
														   "ea_surname" => $_POST['ea_surname'],
														   "ea_telephone" => $_POST['ea_telephone'],
														   "ea_mobile" => $_POST['ea_mobile'],
														   "ea_email" => $_POST['ea_email'],
														   "ea_address1" => $_POST['ea_address1'],
														   "ea_address2" => $_POST['ea_address2'],
														   "ea_address3" => $_POST['ea_address3'],
														   "ea_city" => $_POST['ea_city'],
														   "ea_postcode" => $_POST['ea_postcode'],
														   "ea_county" => $_POST['ea_county'],
														   "ea_country" => $_POST['ea_country'],
														   "ea_et_type" => $_POST['expertSpecialty'],
														   "ea_gmc_reg" => $_POST['ea_gmc_reg']), "e_accounts", "ea_id=?", array("i" => $_SESSION['CME_USER']['login_id']));
	
} else {

	$updateDetails = $conn->execute_sql("update", array("ea_s_id" => $_POST['ea_s_id'],
														   "ea_forename" => $_POST['ea_forename'],
														   "ea_surname" => $_POST['ea_surname'],
														   "ea_telephone" => $_POST['ea_telephone'],
														   "ea_mobile" => $_POST['ea_mobile'],
														   "ea_email" => $_POST['ea_email'],
														   "ea_address1" => $_POST['ea_address1'],
														   "ea_address2" => $_POST['ea_address2'],
														   "ea_address3" => $_POST['ea_address3'],
														   "ea_city" => $_POST['ea_city'],
														   "ea_postcode" => $_POST['ea_postcode'],
														   "ea_county" => $_POST['ea_county'],
														   "ea_country" => $_POST['ea_country'],
														   "ea_password" => $newPassword,
														   "ea_et_type" => $_POST['expertSpecialty'],
														   "ea_gmc_reg" => $_POST['ea_gmc_reg']), "e_accounts", "ea_id=?", array("i" => $_SESSION['CME_USER']['login_id']));

}
	
	//var_dump($updateDetails);
	
	$resultMessage = "Changes made successfully.";
	include ("../mro/success.php");
	
?>