<?php

$selectApp = $conn->execute_sql("select", array("*"), "e_appointments JOIN venues ON eap_v_id = v_id", "eap_ea_id=? AND eap_date >= ? AND eap_date <= ?", array("i" => $_SESSION['CME_USER']['login_id'], "s1" => date("Y-m-d", strtotime($_POST['e_appointments--eap_date_before'])), "s2" => date("Y-m-d", strtotime($_POST['e_appointments--eap_date_after']))));

?>