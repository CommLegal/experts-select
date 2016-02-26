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
$selectExpert = $conn->execute_sql("select", array("ea_id", "ea_forename", "ea_surname", "ea_email"), "e_accounts", "", "");
//END SQL QUERY TO PULL DATABASE COLUMN

//DEFAULT VALUE FOR OPTION FIELD
echo '<option>' . '' . "Select The Expert" . '' . '</option>';
//END

//PULLS DB ROWS FROM COLUMN SPECIFIED IN THE ABOVE QUERY AND SEPERATES INTO INDIVIDUAL HTML ELEMENTS
foreach($selectExpert as $header => $value)
{	
	
	echo  "<option id=\"expert-select\" name=\"" . $selectExpert[$header]['ea_id'] . "\">" . $selectExpert[$header]['ea_forename'] . " " . $selectExpert[$header]['ea_surname'] . "</option>";
	
}
//END

?>