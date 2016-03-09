<?php 

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

$archiveAgreement = $conn->execute_sql("update", array("mu_type" => "7"), "m_updates", "mu_id=?", array("i" => $_POST['messageID']));
																																											  
																																											  
if($archiveAgreement) { 

	echo "<div style = 'clear:both'></div><div class = 'mt25 alert alert-success'>Your update has been deleted. </br></br> If this was action was done in error, please contact an administrator and quote the update ID ref - " . $_POST['messageID'] . ".</div>";
	
} else { 

	echo "<div class = 'mt25 alert alert-danger'> <i class = 'fa fa-lg fa-warning'></i> Something went wrong, please contact a system administrator.</div>";
	
}

?>