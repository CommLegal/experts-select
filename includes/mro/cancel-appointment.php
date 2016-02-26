<?php 

//START - TURN ERRORS ON
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//END - TURN ERRORS ON

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

$resultMessage = "The appointment has been cancelled.";
include('success.php');

$getCompanyRequests = $conn->execute_sql("update", array("wr_appCancelled" => "1"), "waiting_room", "wr_id=?", array("i" => $_POST['mroId']));


																																			 