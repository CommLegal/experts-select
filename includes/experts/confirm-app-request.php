<?php 

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

var_dump($_POST);

 $newFormat1 = new DateTime($_POST["e_appointments--eap_date_after"]);
 $appdateFormat = $newFormat1->format('Y-m-d');
 
 echo $appdateFormat;
 
 /*$newFormat1 = new DateTime($_POST["date-picker-ven1"]);
 $appdateFormat = $newFormat1->format('Y-m-d');*/

?>