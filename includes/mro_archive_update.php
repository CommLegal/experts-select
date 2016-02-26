<?php  

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

//START DB CONNECTION
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

//var_dump($_POST);

$addToArchive = $conn->execute_sql("update", array("mu_type" => "6"), "m_updates", "mu_recipient_id=? AND mu_id=?", array("i1" => $_SESSION['CME_USER']['login_id'], "i2" => $_POST['messageID']));


?>