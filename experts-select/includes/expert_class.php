<?php

class expert_class {
	
	function __CONSTRUCT() {
		//$this->send_email($to, $subject, $body, $attachments);
	}
	
	public function check_appointment($time, $appArray, $app_slot) {
		global $conn;
		
		foreach($appArray as $header => $value) {
			if($time == date("H:i", strtotime($appArray[$header]['eap_date']))) {
				$timeslot = $conn->execute_sql("select", array("eap_timeslot", "eap_id"), "e_appointments", "eap_id=?", array("i" => $appArray[$header]['eap_id']));
				$ts = $timeslot[0]['eap_timeslot'] / $app_slot;
				return $ts . "-active-" . $timeslot[0]['eap_id'] ;	
				//echo $appArray[$header]['eap_date'];
			}
		}
		return "1-inactive";
	}
	
	public function expert_details($postValues) {
		global $conn;
	
		unset($postValues['login_type']);
		$conn->execute_sql("update", $postValues, "e_accounts", "ea_id=?", array("i" => $_SESSION['CME_USER']['login_id']));
	}
	
	public function getDetails($login_id) {
		global $conn;

		return $conn->execute_sql("select", array('*'), "e_accounts", "ea_id=?", array("i" => $login_id));
	}

}
?>