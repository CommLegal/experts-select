<?php 

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION


if($_POST['mroPermissions'] < "3" ) { 

	$updateDetails = $conn->execute_sql("update", array("ma_s_id" => $_POST['ma_s_id'],
														   "ma_forename" => $_POST['ma_forename'],
														   "ma_surname" => $_POST['ma_surname'],
														   "ma_telephone" => $_POST['ma_telephone'],
														   "ma_mobile" => $_POST['ma_mobile'],
														   "ma_email" => $_POST['ma_email']), "m_accounts", "ma_id=?", array("i" => $_POST['usersId']));
	
} else { 

	$getCompanyNo = $conn->execute_sql("select", array("ma_name"), "m_accounts", "ma_id=?", array("i" => $_SESSION['CME_USER']['login_id']));

	$updateDetails = $conn->execute_sql("update", array("ma_s_id" => $_POST['ma_s_id'],
														   "ma_forename" => $_POST['ma_forename'],
														   "ma_surname" => $_POST['ma_surname'],
														   "ma_telephone" => $_POST['ma_telephone'],
														   "ma_mobile" => $_POST['ma_mobile'],
														   "ma_email" => $_POST['ma_email']), "m_accounts", "ma_id=?", array("i" => $_POST['usersId']));
	
	$updateOrgDetails = $conn->execute_sql("update", array("mo_address_1" => $_POST['ma_address1'],
														   "mo_address_2" => $_POST['ma_address2'],
														   "mo_address_3" => $_POST['ma_address3'],
														   "mo_city" => $_POST['ma_city'],
														   "mo_postcode" => $_POST['ma_postcode']), "m_organisations", "mo_id=?", array("i" => $getCompanyNo[0]['ma_name']));


}
	
	//var_dump($_POST);
	$resultMessage = "Changes made successfully.";
	include ("success.php");
	
	