<?php
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$venues = $conn->execute_sql("select", array("*"), "venues", "", "");
var_dump ($venues);

?>