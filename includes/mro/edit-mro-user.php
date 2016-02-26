<?php 

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

if($_POST['changePass'] == NULL ){

	$updateDetails = $conn->execute_sql("update", array("ma_active" => $_POST['checkForActive'],
													    "ma_forename" => $_POST['Vname'],
													    "ma_surname" => $_POST['Vname2'],
													    "ma_permissions" => $_POST['checkUserPermissions'],
													    "ma_email" => $_POST['Vemail']), "m_accounts", "ma_id=?", array("i" => $_POST['mroId']));
} else {
	
	$password = md5(_PWD_SALT . $_POST['changePass'] . _PWD_SALT); 
	
	$updateDetails = $conn->execute_sql("update", array("ma_active" => $_POST['checkForActive'],
													    "ma_forename" => $_POST['Vname'],
													    "ma_surname" => $_POST['Vname2'],
														"ma_password" => $password, 
													    "ma_permissions" => $_POST['checkUserPermissions'],
													    "ma_email" => $_POST['Vemail']), "m_accounts", "ma_id=?", array("i" => $_POST['mroId']));
	
}
	
	//var_dump($_POST);
	//Edit the variable to your success message. It will show in 'success.php'!
	$resultMessage = "Success! User details updated.";
	include ("success.php");
	
	//echo "User details have been successfully updated.";
	