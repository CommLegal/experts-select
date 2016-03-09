<?php 

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

//GET CALENDAR CLASS CALL
require('calendar.php');
$calendar = new Calendar();
//END CALENDAR CLASS CALL

//var_dump($_POST);

$radius = $_POST['vbook-radius'] * 0.621371;

$venueLat =  $_POST['latitude'];

$venueLong =  $_POST['vbook-longitude']; 

$newMonth = $_POST['value']; 

$newFormat1 = new DateTime($_POST['date-picker-ven-from']);
$appdateFormat1 = $newFormat1->format('Y-m-d H:i:s');

$newFormat2 = new DateTime($_POST['date-picker-ven-to']);
$appdateFormat2 = $newFormat2->format('Y-m-d 23:59:59');

$result = $conn->execute_sql('select',

array('z.*, 
	(p.distance_unit
	* DEGREES(ACOS(COS(RADIANS(p.latpoint)) 
	* COS(RADIANS(z.eap_v_lat))
	* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
	+ SIN(RADIANS(p.latpoint))
	* SIN(RADIANS(z.eap_v_lat))))) * 0.621371 AS distance_in_km'), 
	'e_appointments AS z
	
	JOIN ( 
	
	SELECT ' . $venueLat . ' AS latpoint, ' . $venueLong . ' AS longpoint,
	' . $radius . ' AS radius, 111.045 AS distance_unit) AS p ON 1=1',
	
	'z.eap_v_lat
	BETWEEN p.latpoint - (p.radius / p.distance_unit)
	AND p.latpoint + (p.radius / p.distance_unit)
	AND z.eap_v_long
	BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
	AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
	AND ((p.distance_unit
	* DEGREES(ACOS(COS(RADIANS(p.latpoint))
	* COS(RADIANS(z.eap_v_lat))
	* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long))
	+ SIN(RADIANS(p.latpoint))
	* SIN(RADIANS(z.eap_v_lat))))) * 0.621371) <= z.wr_radius
	AND eap_booked=? AND eap_date >=? AND eap_date <=?
	ORDER BY distance_in_km', array("i1" => NULL, "s1" => $appdateFormat1, "s2" => $appdateFormat2));

?>

<div id="calendarContainer"> 

	<?php
    
    	echo $calendar->show($appdateFormat1, $appdateFormat2, $venueLat, $venueLong, $radius, $newMonth);
	
	?>
    
</div>
