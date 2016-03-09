<?php

class login_class {
	
	function __CONSTRUCT() {
		//$this->send_email($to, $subject, $body, $attachments);
	}
	
	public function create_user($expertSalutation, $organisation, $email, $password, $fName, $sName, $login_type) {
		global $conn;
		global $emailer;
		
		//echo $organisation . " " . $email . " " . $password . " " . $fName . " " . $sName . " " . $login_type;
		
		if($login_type == "expert-registration") {
			
			$loginCount = $conn->execute_sql("select", array('count(*) as loginCount'), "e_accounts", "ea_email=?", array("s" => $email));
			if($loginCount[0]['loginCount'] > 0) {
				return false;	
			}

			$activation_code = rand(1000, 9999);
			
			$login_id = $conn->execute_sql("insert", array('ea_s_id' => $expertSalutation, 'ea_email' => $email, 'ea_password' => md5(_PWD_SALT . $password . _PWD_SALT), "ea_activation_code" => $activation_code, "ea_forename" => $fName, "ea_surname" => $sName, "ea_active" => "Y"), "e_accounts", "", "");
			
		}
		
		elseif($login_type == "mro-registration") {
			
			
			$loginCount = $conn->execute_sql("select", array('count(*) as loginCount'), "m_accounts", "ma_email=?", array("s" => $email));
			if($loginCount[0]['loginCount'] > 0) {
				return false;	
			}
			$activation_code = rand(1000, 9999);
			$checkOrg = $conn->execute_sql("select", array("mo_name"), "m_organisations", "mo_name=?", array("s" => $organisation));
			
			if(!$checkOrg) { $newOrg = $conn->execute_sql("insert", array("mo_name" => $organisation), "m_organisations", "", ""); } 
			
			$login_id = $conn->execute_sql("insert", array('ma_email' => $email, 'ma_password' => md5(_PWD_SALT . $password . _PWD_SALT), "ma_activation_code" => $activation_code, "ma_forename" => $fName, "ma_surname" => $sName, "ma_permissions" => "3", "ma_active" => "Y", "ma_name" => $newOrg), "m_accounts", "", "");
		}
			
		if($login_id) {
			/*require("includes/email_class.php");
			$emailer = new email_class($email, "Registration Successful", "Please visit <a href='" . _ROOT . "/?displayPage=account-activate&login=" . $login_id . "&login_type=" . $login_type . "'>here</a> and enter the code " . $activation_code, "");*/
		}
	
		return true;
	}
	
	public function activate_user($login_id, $activation_code, $login_type) {
		global $conn;	
		
		if($login_type == "expert-registration") {
			$loginCount = $conn->execute_sql("select", array('count(*) as loginCount'), "e_accounts", "ea_id=? and ea_activation_code=?", array("i1" => $login_id, "i2" => $activation_code));
			if($loginCount[0]['loginCount'] == 0) {
				return false;	
			}
			$login_id = $conn->execute_sql("update", array('ea_active' => "Y", 'ea_activation_code' => ""), "e_accounts", "ea_id=?", array("i" => $login_id));
		}
		else if($login_type == "mro-registration") {
			$loginCount = $conn->execute_sql("select", array('count(*) as loginCount'), "m_accounts", "ma_id=? and ma_activation_code=?", array("i1" => $login_id, "i2" => $activation_code));
			if($loginCount[0]['loginCount'] == 0) {
				return false;	
			}
			$login_id = $conn->execute_sql("update", array('ma_active' => "Y", 'ma_activation_code' => ""), "m_accounts", "ma_id=?", array("i" => $login_id));
		}
		return true;
		
	}
	
	public function login_user($username, $password) {
		global $conn;
		
		// session_start();
		
		$password = md5(_PWD_SALT . $password . _PWD_SALT);
				
		/*$loginCount = $conn->execute_sql("select", array('count(*) as loginCount'), "e_accounts", "ea_email=? and ea_password=? and ea_active = \"Y\"", array("s1" => $username, "s2" => $password));
		if($loginCount[0]['loginCount'] > 0) {
			$loginCount = $conn->execute_sql("select", array('ea_id', 'ea_login_no'), $table, "ea_email=? and ea_password=? and ea_active = \"Y\"", array("s1" => $username, "s2" => $password));
			$conn->execute_sql("update", array('ea_login_no' => ($loginCount[0]['ea_login_no'] + 1), 'ea_last_login' => date('Y-m-d H:i:s')), $table, "ea_id=?", array("i" => $loginCount[0]['ea_id']));
			$_SESSION['CME_USER'] = array("type" => "expert", "login_id" => $loginCount[0]['ea_id']);*/
			
		$loginCount = $conn->execute_sql("select", array('count(*) as loginCount', "ea_id"), "e_accounts", "ea_email=? and ea_password=? and ea_active = \"Y\"", array("s1" => $username, "s2" => $password));
		
		$resetCount = $conn->execute_sql("select", array('count(*) as resetCount', "ea_id"), "e_accounts", "ea_email=? and ea_recovery_code=? and ea_active = \"Y\"", array("s1" => $username, "s2" => $password));
		
		if($loginCount[0]['loginCount'] > 0) {
			
			$loginCount = $conn->execute_sql("select", array("ea_id", "ea_login_no"), "e_accounts", "ea_email=? and ea_password=? and ea_active = \"Y\"", array("s1" => $username, "s2" => $password));
			
			$conn->execute_sql("update", array('ea_login_no' => ($loginCount[0]['ea_login_no'] + 1), 'ea_last_login' => date('Y-m-d H:i:s')), "e_accounts", "ea_id=?", array("i" => $loginCount[0]['ea_id']));
			$_SESSION['CME_USER'] = array("type" => "expert", "login_id" => $loginCount[0]['ea_id']);
			return true;
		}
		
		if($resetCount[0]['resetCount'] > 0) {
			
			$loginCount = $conn->execute_sql("select", array("ea_id", "ea_login_no"), "e_accounts", "ea_email=? and ea_recovery_code=? and ea_active = \"Y\"", array("s1" => $username, "s2" => $password));
			
			$conn->execute_sql("update", array('ea_login_no' => ($loginCount[0]['ea_login_no'] + 1), 'ea_last_login' => date('Y-m-d H:i:s')), "e_accounts", "ea_id=?", array("i" => $loginCount[0]['ea_id']));
			$_SESSION['CME_USER'] = array("type" => "expert", "login_id" => $loginCount[0]['ea_id']);
			return true;
		}
		
		//$loginCount = $conn->execute_sql("select", array('count(*) as loginCount', "m_id"), "m_accounts", "ma_id=? and ma_password=? and ma_active = \"Y\"", array("s1" => $username, "s2" => $password));
		$loginCount = $conn->execute_sql("select", array('count(*) as loginCount', "ma_id"), "m_accounts", "ma_email=? and ma_password=? and ma_active = \"Y\"", array("s1" => $username, "s2" => $password));
		
		$resetCount = $conn->execute_sql("select", array('count(*) as resetCount', "ma_id"), "m_accounts", "ma_email=? and ma_recovery_code=? and ma_active = \"Y\"", array("s1" => $username, "s2" => $password));
		
		if($loginCount[0]['loginCount'] > 0) {
			
			//$loginCount = $conn->execute_sql("select", array('ma_id'), $table, "ma_id=? and ma_activation_code=? and ma_active = \"Y\"", array("s1" => $username, "s2" => $password));
			$loginCount = $conn->execute_sql("select", array("ma_id", "ma_login_no"), "m_accounts", "ma_email=? and ma_password=? and ma_active = \"Y\"", array("s1" => $username, "s2" => $password));
			$conn->execute_sql("update", array('ma_login_no' => ($loginCount[0]['ma_login_no'] + 1), 'ma_last_login' => date('Y-m-d H:i:s')), "m_accounts", "ma_id=?", array("i" => $loginCount[0]['ma_id']));
			$_SESSION['CME_USER'] =  array("type" => "mro", "login_id" => $loginCount[0]['ma_id']);
			return true;
		}
		
		if($resetCount[0]['resetCount'] > 0) {
			
			$loginCount = $conn->execute_sql("select", array("ma_id", "ma_login_no"), "m_accounts", "ma_email=? and ma_recovery_code=? and ma_active = \"Y\"", array("s1" => $username, "s2" => $password));
			
			$conn->execute_sql("update", array('ma_login_no' => ($loginCount[0]['ma_login_no'] + 1), 'ma_last_login' => date('Y-m-d H:i:s')), "m_accounts", "ma_id=?", array("i" => $loginCount[0]['ma_id']));
			$_SESSION['CME_USER'] =  array("type" => "mro", "login_id" => $loginCount[0]['ma_id']);
			return true;
		}
		
		$loginCount = $conn->execute_sql("select", array('count(*) as loginCount'), "m_logins", "ml_id=? and ml_password=? and ml_active = \"Y\"", array("s1" => $username, "s2" => $password));
		
		if($loginCount[0]['loginCount'] > 0) {
			
			$loginCount = $conn->execute_sql("select", array('ml_id'), $table, "ml_id=? and ml_activation_code=? and ml_active = \"Y\"", array("s1" => $username, "s2" => $password));
			$conn->execute_sql("update", array('ml_login_no' => ($loginCount[0]['ml_login_no'] + 1), 'ml_last_login' => date('Y-m-d H:i:s')), $table, "ml_id=?", array("i" => $loginCount[0]['ml_id']));
			$_SESSION['CME_USER'] =  array("type" => "mro_user", "login_id" => $loginCount[0]['ml_id']);
			return true;
		}
		
		return false;
		
	}
	
	public function getDetails($login_id) {
		global $conn;
		
		if($_SESSION['CME_USER']['type'] == "expert") {
			$loginCount = $conn->execute_sql("select", array('*'), "e_accounts", "ea_id=?", array("i" => $login_id));
		}
		elseif($_SESSION['CME_USER']['type'] == "mro") {
			$loginCount = $conn->execute_sql("select", array('*'), "m_accounts", "ma_id=?", array("i" => $login_id));
		}
		return $loginCount[0];
	}
	
	public function login_leftbar() {
		
	}

}
?>