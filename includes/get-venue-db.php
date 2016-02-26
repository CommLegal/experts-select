<?php
//START - TURN ERRORS ON
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//END - TURN ERRORS ON

//START DB CONNECTION
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

//$expertID = $conn->execute_sql("select", array("ea_id"), "e_accounts", "", "");

//START SQL QUERY TO PULL DATABASE COLUMN
$selectOption = $conn->execute_sql("select", array("v_name", "v_id", "v_ea_id", "ea_id"), "venues JOIN e_accounts ON v_ea_id = ea_id", "v_ea_id=?", array("i" => $_SESSION['CME_USER']['login_id']));

//PULLS DB ROWS FROM COLUMN SPECIFIED IN THE ABOVE QUERY AND SEPERATES INTO INDIVIDUAL HTML ELEMENTS
foreach($selectOption as $header => $value)
{	
	
	echo  "<option id=\"" . $selectOption[$header]['v_id'] . "\" name=\"" . $selectOption[$header]['v_id'] . "\" value =\"" . $selectOption[$header]['v_id'] . "\" \">" . $selectOption[$header]['v_name'] . "</option>";
	
}
//END

?>