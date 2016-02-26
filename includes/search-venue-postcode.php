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


$submitPostcode = $_POST['v_search_postcode'];

//START SQL QUERY TO PULL DATABASE COLUMN
$selectOption = $conn->execute_sql("select distinct", array("v_name", "v_id"), "venues", "v_postcode=?", array("s" => $submitPostcode));
//$venueID = $conn->execute_sql("select", array("v_id"), "venues", "v_postcode=?", array("s" => $submitPostcode));
//$value = $selectOption[0];
$num_rows = mysql_num_rows($selectOption);
$i = 0;
$iT = 0;
//END SQL QUERY TO PULL DATABASE COLUMN

if(!$selectOption){
	echo "That postcode could not be found.";
	echo ("<br /><br />");
	echo "Check the postcode or create a new venue using the form below.";	
}
else {
	//PULLS DB ROWS FROM COLUMN SPECIFIED IN THE ABOVE QUERY AND SEPERATES INTO INDIVIDUAL HTML ELEMENTS
	foreach($selectOption as $header => $value)
	{	
		//echo $selectOption[$header]['v_id'] . " - " . $selectOption[$header]['v_name'];
		//$v_lnames = $selectOption[$i++]["v_name", "v_id"];
		//$v_lid = $venueID[$iT++]["v_id"];
		
		echo  "<a href=\"\" class=\"selectVenue\" v_id=\"" . $selectOption[$header]['v_id'] . "\">" . '<li>' . '' . $selectOption[$header]['v_name'] . '' . '</li>' . '</a>';
		
	}
	//END
}
?>