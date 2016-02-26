<?php
require("../../includes/config.php");

require("../../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

require("../../includes/login_class.php");

session_start();

$login = new login_class;

$userLogin = $login->login_user($_POST['email'], $_POST['password'], $_POST['table']);

if($userLogin) {
	echo "<h2>You have successfully logged in!</h2>";
	//$invalidLogin = $_SESSION['valid'] = true; 
	//var_dump($login);
}

else {
	echo "False!";
	//$invalidLogin = $_SESSION['valid'] = false; 
}

?>