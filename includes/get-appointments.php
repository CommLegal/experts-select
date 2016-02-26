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

$selectApp = $conn->execute_sql("select", array("*"), "e_appointments JOIN venues ON eap_v_id = v_id", "eap_ea_id=? AND eap_date >= ? AND eap_date <= ?", array("i" => $_SESSION['CME_USER']['login_id'], "s1" => date("Y-m-d", strtotime($_POST['e_appointments--eap_date_before'])), "s2" => date("Y-m-d", strtotime($_POST['e_appointments--eap_date_after']))));

//$selectApp = $conn->execute_sql("select", array("*"), "e_appointments JOIN venues ON eap_v_id = v_id", "eap_ea_id=? AND eap_date >= ? AND eap_date <= ?", array("i" => $_SESSION['CME_USER']['login_id'], "s" => $_POST['e_appointments--eap_date_before'], "s2" => $_POST['e_appointments--eap_date_after']));

//END SQL QUERY TO PULL DATABASE COLUMN

//DEFAULT VALUE FOR OPTION FIELD
echo '<option>' . '' . "Select Appointment" . '' . '</option>';
//END

//PULLS DB ROWS FROM COLUMN SPECIFIED IN THE ABOVE QUERY AND SEPERATES INTO INDIVIDUAL HTML ELEMENTS
foreach($selectApp as $header => $value)
{	
	
	echo  "<option id=\"appointment_option\" name=\"" . $selectApp[$header]['eap_id'] . "\">" . $selectApp[$header]['eap_date'] . " - " . $selectApp[$header]['eap_timeslot'] . " Minute Appointment " . " - " . $selectApp[$header]['v_name'] . "</option>";
	
}
//END

?>


				 