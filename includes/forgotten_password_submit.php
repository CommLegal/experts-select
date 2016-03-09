<?php 

//START DB CONNECTION
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

//$selectOption = $conn->execute_sql("select", array("ma_id", "ma_forename", "ma_surname", "ma_email"), "m_accounts", "ma_id!=?", array("i" => "0"));

?>