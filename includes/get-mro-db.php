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
$selectOption = $conn->execute_sql("select", array("ma_id", "ma_forename", "ma_surname", "ma_email"), "m_accounts", "ma_id!=?", array("i" => "0"));
//END SQL QUERY TO PULL DATABASE COLUMN

echo "<option id=\"ma_options\" name=\"ma_options\" value=\"0\" selected>Select MRO</option>";

//PULLS DB ROWS FROM COLUMN SPECIFIED IN THE ABOVE QUERY AND SEPERATES INTO INDIVIDUAL HTML ELEMENTS
foreach($selectOption as $header => $value)
{	
	
	echo  "<option id=\"mro-select\" name=\"" . $selectOption[$header]['ma_id'] . "\" value=\"" . $selectOption[$header]['ma_id'] . "\">" . $selectOption[$header]['ma_forename'] . " " . $selectOption[$header]['ma_surname'] . "</option>";
	
}

//END

?>