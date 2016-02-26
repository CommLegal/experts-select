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
$selectMro = $conn->execute_sql("select", array("eap_date"), "e_appointments", "", "");
//END SQL QUERY TO PULL DATABASE COLUMN

//DEFAULT VALUE FOR OPTION FIELD
echo '<option>' . '' . "Select MRO" . '' . '</option>';
//END

//PULLS DB ROWS FROM COLUMN SPECIFIED IN THE ABOVE QUERY AND SEPERATES INTO INDIVIDUAL HTML ELEMENTS
foreach($selectMro as $header => $value)
{	
	
	echo  "<option id=\"venueTest\" name=\"" . $selectMro[$header]['ma_id'] . "\">" . $selectMro[$header]['ma_forename'] . " " . $selectMro[$header]['ma_surname'] . " - " . $selectMro[$header]['ma_name'] . "</option>";
	
}
//END

?>