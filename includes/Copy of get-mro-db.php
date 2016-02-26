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
$selectMro = $conn->execute_sql("select", array("ma_id", "ma_forename", "ma_surname", "ma_email"), "m_accounts", "", "");
//END SQL QUERY TO PULL DATABASE COLUMN



//PULLS DB ROWS FROM COLUMN SPECIFIED IN THE ABOVE QUERY AND SEPERATES INTO INDIVIDUAL HTML ELEMENTS
function echoMRO($selectMro) {
foreach($selectMro as $header => $value)
{	
	
	echo  "<option id=\"mro-select\" name=\"" . $selectMro[$header]['ma_id'] . "\">" . $selectMro[$header]['ma_forename'] . " " . $selectMro[$header]['ma_surname'] . "</option>";
	
}
}
//END

?>