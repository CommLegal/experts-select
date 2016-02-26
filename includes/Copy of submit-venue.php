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

echo("success");

//Assigns the database connection class to a variable and executes the following INSERT query.
$venues = $conn->execute_sql("insert", array("v_name" => $_POST[v_name], "v_address1" => $_POST[v_address1], "v_address2" => $_POST[v_address2], "address" => $_POST[v_address3], "v_city" => $_POST[v_city], "v_county" => $_POST[v_county], "v_country" => $_POST[v_country], "v_postcode" => $_POST[v_postcode], "v_email" => $_POST[v_email], "v_telephone" => $_POST[v_telephone], "v_description" => $_POST[v_description], "v_latitude" => $_POST[v_latitude], "v_longitude" => $_POST[v_longitude] ), "venues", "", "");
// END of query

$selectOption = $conn->execute_sql("select", array("v_name"), "venues", "", "");
$value = $selectOption[0];
$num_rows = mysql_num_rows($selectOption);
$i = 0;
echo $row_cnt;

foreach($selectOption as $header => $value)
{
	$v_lnames = $selectOption[$i++]["v_name"] ; 
	echo $v_lnames;
}

//REDIRECTS PAGE ONCE SCRIPT EXECUTION ENDS
if ($venues) 
{
	header('Location:  ../index.php?page=appointments&action=add');
}

?>