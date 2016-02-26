<?php

//START DB CONNECTION
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION


var_dump($_POST);

	
$newMessage = $conn->execute_sql("insert", array("mu_recipient_id" => $_POST['mro_id'], "mu_sender_id" => $_POST['sender_id'] ), "m_updates", "", "");

}

?>