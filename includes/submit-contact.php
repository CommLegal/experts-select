<?php 

//START DB CONNECTION
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

//var_dump($_POST);


 
 
 if($_SESSION['CME_USER']['type'] == "expert") { 
 	$getExpertName = $conn->execute_sql("select", array("*"), "e_accounts", "ea_id =?", array("i1" => $_SESSION['CME_USER']['login_id']));
	
	$senderName = $getExpertName[0]['ea_forename'] . " " . $getExpertName[0]['ea_surname'];
	
 } elseif($_SESSION['CME_USER']['type'] == "mro") { 
 	 $getMroName = $conn->execute_sql("select", array("*"), "m_accounts", "ma_id =?", array("i1" => $_SESSION['CME_USER']['login_id']));
	 
	 $senderName = $getMroName[0]['ma_forename'] . " " . $getMroName[0]['ma_surname'];
	 
 }
 
 $message = "</br> <b>Message : </b></br>" . $_POST["Vmessage"];
 
 $messageEmail = "Message : " . $_POST["Vmessage"] . "\n\n" . "Telephone :" . $_POST['Vphone'] . "\n" . "Email : mailto:" . $_POST['Vemail'];
 
 $subject = "You have recieved a message from " . $senderName;


if($_POST['contact-type'] == 3) {

 $updateMro = $conn->execute_sql("insert", array("mu_recipient_id" => $_POST['contact-list-mro'], 
												 "mu_sender_id" => $_SESSION['CME_USER']['login_id'], 
												 "mu_content" => $message, 
												 "mu_datesent" => date("Y-m-d H:i:s"), 
												 "mu_subject" => $subject,
												 "mu_type" => "1"), "m_updates", "", "");
 
 echo "WORK " . $_POST['contact-list-mro'];

} elseif($_POST['contact-type'] == 4) { 
 
 $updateExpert = $conn->execute_sql("insert", array("eu_recipient_id" => $_POST['contact-list-expert'], 
													"eu_sender_id" => $_SESSION['CME_USER']['login_id'], 
													"eu_content" => $message, 
													"eu_datesent" => date("Y-m-d H:i:s"), 
													"eu_subject" => $subject,
													"eu_type" => "1"), "e_updates", "", "");
 
 } else {
	 
	mail("samuel.wright@commercial-legal.co.uk",$subject,$messageEmail,"Message recieved from Expert Select");
	 
 }
