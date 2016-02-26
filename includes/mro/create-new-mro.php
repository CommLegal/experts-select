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

$password = md5(_PWD_SALT . $_POST['Vpassword'] . _PWD_SALT);

$checkDuplicate = $conn->execute_sql("select", array("count(*) as row_count"), "m_accounts", "ma_email=?", array("s" => $_POST['emailAddress']));

//var_dump($_POST);

echo $checkDuplicate[0]['row_count'];

if($checkDuplicate[0]['row_count'] == 0) { 

	$checkOrganisation = $conn->execute_sql("select", array("*"), "m_accounts", "ma_id=?", array("i" => $_SESSION['CME_USER']['login_id']));
 
 	$insertMRO = $conn->execute_sql("insert", array("ma_email" => $_POST['emailAddress'], 
													"ma_permissions" => $_POST['setPermissions'], 
													"ma_active" => $_POST['userActiveStatus'], 
													"ma_forename" => $_POST['Vname'], 
													"ma_surname" => $_POST['Vname2'], 
													"ma_name" => $checkOrganisation[0]['ma_name'], 
													"ma_password" => $password), "m_accounts", "", "");
	
	$resultMessage = "User created!";
	include ("success.php");
	
} else { 

	echo "A user with this email already exists, please contact an administrator if you require further assistance";

}

?>