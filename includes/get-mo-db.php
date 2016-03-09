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

//START SQL QUERY TO PULL DATABASE COLUMN
$selectOrg = $conn->execute_sql("select", array("mo_id", "mo_name"), "m_organisations", "mo_id!=?", array("i" => "7"));
//END SQL QUERY TO PULL DATABASE COLUMN

echo "<option id=\"mo_options\" name=\"mo_options\" value=\"0\" selected>Select Organisation</option>";

//PULLS DB ROWS FROM COLUMN SPECIFIED IN THE ABOVE QUERY AND SEPERATES INTO INDIVIDUAL HTML ELEMENTS
foreach($selectOrg as $header => $value)
{	
	
	echo  "<option id=\"mo-select\" name=\"" . $selectOrg[$header]['mo_id'] . "\" value=\"" . $selectOrg[$header]['mo_id'] . "selected \">" . $selectOrg[$header]['mo_name'] . "</option>";
	
}

//END

?>