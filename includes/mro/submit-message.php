<?php

//START DB CONNECTION
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION


//var_dump($_POST);

	
$newMessage = $conn->execute_sql("insert", array("mu_recipient_id" => $_POST['mro_id'], "mu_sender_id" => $_POST['sender_id'], "mu_content" => $_POST['message_content'], "mu_datesent" => $_POST['date_sent'], "mu_subject" => $_POST['message_subject'], "mu_type" => "1" ), "m_updates", "", "");

echo "Message Successfully Submitted. <i class = \"fa fa-check\"></i>";
?>