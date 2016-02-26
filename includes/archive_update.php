<?php 

//START DB CONNECTION
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

var_dump($_POST);

$addToArchive = $conn->execute_sql("update", array("eu_type" => "6"), "e_updates", "eu_recipient_id=? AND eu_id=?", array("i1" => $_SESSION['CME_USER']['login_id'], "i2" => $_POST['messageID']));


?>