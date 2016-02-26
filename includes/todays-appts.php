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

$appointmentSelect = $conn->execute_sql("select", array("eap_date"), "e_appointments", "eap_date >= ? AND eap_date <= ? order by eap_date", array("s1" => date('Y-m-d') . " 00:00:00", "s2" => date('Y-m-d') . " 11:59:59"));
$value = $appointmentSelect[0];
$num_rows = mysql_num_rows($appointmentSelect);
$i = 0;
echo $row_cnt;



foreach($appointmentSelect as $header => $value)
{
	echo date("H:i", strtotime($appointmentSelect[$header]["eap_date"])). "</br>";
	$apptTimes = substr($e_appointmentTimes, -8, -3);
	$apptDate = substr($e_appointmentTimes, 0, -9);
	
	$e_appointmentTimes = $appointmentSelect[$i++]["eap_date"] ; 
	
	
}

?>