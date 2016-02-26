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
$selectOption = $conn->execute_sql("select", array("ea_id", "ea_forename", "ea_surname", "ea_email", "s_title"), "e_accounts JOIN salutations ON ea_s_id = s_id", "ea_id!=?", array("i" => "0"));
//END SQL QUERY TO PULL DATABASE COLUMN

//DEFAULT VALUE FOR OPTION FIELD
echo '<option>' . '' . "Select The Expert" . '' . '</option>';
//END

//PULLS DB ROWS FROM COLUMN SPECIFIED IN THE ABOVE QUERY AND SEPERATES INTO INDIVIDUAL HTML ELEMENTS
foreach($selectOption as $header => $value)
{	
	
	echo  "<option id=\"expert-select\" name=\"" . $selectOption[$header]['ea_id'] . "\" value=\"" . $selectOption[$header]['ea_id'] . "\">" . $selectOption[$header]['s_title'] . " " .$selectOption[$header]['ea_forename'] . " " . $selectOption[$header]['ea_surname'] . "</option>";
	
}
//END

?>