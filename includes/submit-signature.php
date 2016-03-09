<?php 

	require("mysqlwrapper_class.php");
	$conn = new mysqlwrapper_class;
	
	$updateDetails = $conn->execute_sql("update", array("ea_signature" => $_POST['sigStore']), "e_accounts", "ea_id=?", array("i" => $_SESSION['CME_USER']['login_id']));
		
	//var_dump($_POST);
	
	$resultMessage = "Signature has been saved.";
	include ("../includes/mro/success.php");
	
?>