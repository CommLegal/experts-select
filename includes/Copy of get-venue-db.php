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

$expertID = $conn->execute_sql("select", array("ea_id"), "e_accounts", "", "");

//START SQL QUERY TO PULL DATABASE COLUMN
$selectOption = $conn->execute_sql("select", array("v_name", "v_id", "v_ea_id", "ea_id"), "venues JOIN e_accounts ON v_ea_id = ea_id", "v_ea_id=?", array("i" => $_SESSION['CME_USER']['login_id']));
//$value = $selectOption[0];
$num_rows = mysql_num_rows($selectOption);
$i = 0;
//END SQL QUERY TO PULL DATABASE COLUMN

//DEFAULT VALUE FOR OPTION FIELD

//echo '<option>' . '' . "Select Venue" . '' . '</option>';
	
//END



//PULLS DB ROWS FROM COLUMN SPECIFIED IN THE ABOVE QUERY AND SEPERATES INTO INDIVIDUAL HTML ELEMENTS
foreach($selectOption as $header => $value)
{	
	//$v_lnames = $selectOption[$i++]["v_name"];
	
	//  ' . $v_lPostcode . '
	
	/*echo  "<option id=\"venueTest\" name=\"" . $selectOption[$header]['v_id'] . "\">" . $selectOption[$header]['v_name'] . "</option>";*/
	
	echo json_encode($selectOption);
	
}

//END

?>