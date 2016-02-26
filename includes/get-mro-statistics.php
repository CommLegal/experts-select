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

//var_dump($_POST);

$newFormat1 = new DateTime($_POST['date-picker-ven-after']);
$appdateFormat1 = $newFormat1->format('Y-m-d H:i:s');

$newFormat2 = new DateTime($_POST['date-picker-ven-before']);
$appdateFormat2 = $newFormat2->format('Y-m-d 23:59:59');

if($_POST["postcode"] != NULL) { 

$selectMRO = $conn->execute_sql("select", array("*"), "m_accounts", "ma_id=?", array("i" => $_SESSION['CME_USER']['login_id']));

$venueLat = $_POST["lat"];

$venueLong = $_POST["long"];

$radius = $_POST["radius"];

$result = $conn->execute_sql('select',

	array('z.*, 
	(p.distance_unit
	* DEGREES(ACOS(COS(RADIANS(p.latpoint)) 
	* COS(RADIANS(z.eap_v_latitude))
	* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_longitude))
	+ SIN(RADIANS(p.latpoint))
	* SIN(RADIANS(z.eap_v_latitude))))) * 0.621371 AS distance_in_km'), 
	'e_appointments AS z
	
	JOIN ( 
	
	SELECT ' . $venueLat . ' AS latpoint, ' . $venueLong . ' AS longpoint,
	' . $radius . ' AS radius, 111.045 AS distance_unit
	) AS p ON 1=1',
	
	'z.eap_v_latitude
	BETWEEN p.latpoint - (p.radius / p.distance_unit)
	AND p.latpoint + (p.radius / p.distance_unit)
	AND z.eap_v_longitude
	BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
	AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
	AND ((p.distance_unit
	* DEGREES(ACOS(COS(RADIANS(p.latpoint))
	* COS(RADIANS(z.eap_v_latitude))
	* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_longitude))
	+ SIN(RADIANS(p.latpoint))
	* SIN(RADIANS(z.eap_v_latitude))))) * 0.621371) <= p.radius
	AND eap_ea_id=? AND eap_ma_id=? AND eap_date >=? AND eap_date <=?
	ORDER BY distance_in_km', array("i1" => $_POST["expert"], "i2" => $selectMRO[0]['ma_name'], "s1" => $appdateFormat1, "s2" => $appdateFormat2));

	//var_dump($result);

} else {

$findExpertStatistics = $conn->execute_sql("select", array("*"), "e_appointments", "eap_date >=? AND eap_date <=? AND eap_ea_id=?", array("s1" => $appdateFormat1, "s2" => $appdateFormat2, "i" => $_POST['expert']));

//var_dump($findExpertStatistics);
	
}

?>