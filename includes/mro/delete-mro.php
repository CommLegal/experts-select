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
    
    $deleteMRO = $conn->execute_sql("update", array("ma_active" => "N"), "m_accounts", "ma_id=?", array("s" => $_POST['mroId']));

	var_dump($deleteMRO);

?>