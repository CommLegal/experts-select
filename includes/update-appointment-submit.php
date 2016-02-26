<?php
//START - TURN ERRORS ON
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//END - TURN ERRORS ON

//START DB CONNECTION
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$queriedApp = $conn->execute_sql("select", array("*"), "e_appointments JOIN venues ON eap_v_id = v_id ", "v_id=?", array("i" => $_POST['appointment_id']));

?>