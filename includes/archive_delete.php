<?php 

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

//START DB CONNECTION
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

//var_dump($_POST['messageID']);

$addToArchive = $conn->execute_sql("update", array("*"), "e_updates", "eu_id=?", array("i" => $_POST['messageID']));


?>