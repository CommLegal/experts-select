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

$venueExists = $conn->execute_sql("select", array("v_name", "v_ea_id"), "venues", "v_name=? and v_ea_id=?", array("s" => $_POST[v_name], "i" => $_SESSION['CME_USER']['login_id']));

if($venueExists) 
{
	
}
else 
{
	
$venues = $conn->execute_sql("insert", array("v_name" => $_POST[v_name], "v_address1" => $_POST[v_address1], "v_address2" => $_POST[v_address2], "v_address3" => $_POST[v_address3], "v_city" => $_POST[v_city], "v_county" => $_POST[v_county], "v_country" => $_POST[v_country], "v_postcode" => $_POST[v_postcode], "v_email" => $_POST[v_email], "v_telephone" => $_POST[v_telephone], "v_description" => $_POST[v_description], "v_disabled_access" => $_POST[v_disabled_access], "v_ea_id" => $_SESSION['CME_USER']['login_id'], "v_latitude" => $_POST[v_latitude], "v_longitude" => $_POST[v_longitude]  ), "venues", "", "");

}

?>