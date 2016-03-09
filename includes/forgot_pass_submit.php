<?php 

//START DB CONNECTION
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

$recipient = $_POST['email'];

$checkExperts = $conn->execute_sql("select", array("*"), "e_accounts", "ea_email=?", array("s" => $_POST['email']));

$checkMRO = $conn->execute_sql("select", array("*"), "m_accounts", "ma_email=?", array("s" => $_POST['email']));

$randomID = rand(100, 100000);

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$message = "A password reminder has been created for the account associated with this email on Expert Select.
		    <br /><br />Please click the link below to redirect to the homepage where you can sign in using this code: \"" . $randomID . "\"
			<br /><br /><b>Website Link: </b> <a href='http://192.168.3.215/comparemedicalexperts/index.php' target='_blank' title='Reset'>Reset Your Pass</a>
			<br /><br />Once you sign in, navigate to your profile page where you can then update your account password.";


$randomID = md5(_PWD_SALT . $randomID . _PWD_SALT);

if($checkExperts) {
	echo "Expert Exists";

	$recoverExpert = $conn->execute_sql("update", array("ea_recovery_code" => $randomID), "e_accounts", "ea_email=?", array("s" => $_POST['email']));
	
	mail($recipient,"Expert Select Password Retrieval",$message,$headers,parameters);
	
} elseif($checkMRO) {
	echo "MRO Exists";
	
	$recoverMRO = $conn->execute_sql("update", array("ma_recovery_code" => $randomID), "m_accounts", "ma_email=?", array("s" => $_POST['email']));
	
	mail($recipient,"Expert Select Password Retrieval",$message,$headers,parameters);
	
} else {
	echo "No account could be found associated with that email";
}

?>