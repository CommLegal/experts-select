<?php 
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

if($_POST['form_type'] == "expert_app") {
	
	$coordinates = $conn->execute_sql("select", array('*'), "venues", "v_id=? ", array("i1" => $_POST['venue_id']));
	
	$_POST['e_appointments--eap_ea_id'] = $_SESSION['CME_USER']['login_id'];
	$_POST['e_appointments--eap_added'] = date("Y-m-d H:i:s");
	$_POST['e_appointments--eap_timeslot'] = $_POST['add-app-freq'];
	$_POST['e_appointments--eap_v_id'] = $_POST['venue_id'];	
	$_POST['e_appointments--eap_ml_id'] = $_POST['mro_id'];	
	$_POST['e_appointments--eap_v_lat'] = $coordinates[0]['v_latitude'];	
	$_POST['e_appointments--eap_v_long'] = $coordinates[0]['v_longitude'];	

}			 
//var_dump($_POST);
$formVals = array();

foreach($_POST as $key => $value) {
	$fieldSplit = explode("--", $key);
	$formVals[$fieldSplit[0]][$fieldSplit[1]] = $value;
}

$tables = array("e_appointments" => "eap_ea_id");

foreach($tables as $table => $field) {
	// header = table name, value = primary key set above
	$insertFields = array();
	
	if($table == "e_appointments") {
		foreach($_POST['app_slot'] as $header => $slot) {
			$time_slot = date("Y-m-d", strtotime($_POST['e_appointments--eap_date'])) . " " . $slot . ":00";
			$formVals['e_appointments']['eap_date'] = $time_slot;			
			
			$exists = $conn->execute_sql("select", array('count(*) as row_count'), $table, "eap_ea_id=? and eap_date=? ", array("i1" => $_SESSION['CME_USER']['login_id'], "s" => $time_slot));
			$cpExists = $exists[0]['row_count'];
					
			if(!empty($formVals[$table])) {
				foreach($formVals[$table] as $key => $value) {
					$insertFields[$key] = $value;
				}
				
				
				if($cpExists == 0) {
					//$conn->saveChanges($table, $field, $insertFields, $claim_number);
					$cp = $conn->execute_sql("insert", $insertFields, $table, "", array(""));
					echo "<div class=\"alert alert-success\" role=\"alert\"><i class=\"fa fa-lg fa-check\"></i> <strong>Your appointment has been successfully created  : - </strong> " . $time_slot . "</div>";
				}
				else if($_POST['venue_id'] == 0){
					while($i < 1) {
						echo "<div class=\"alert alert-danger\" role=\"alert\"><i class=\"fa fa-exclamation-triangle\"></i> <strong>Error : - Please select the Venue.</strong></div>";
						$i++;
					}
				}
				else {
					//$conn->saveChanges($table, $field, $insertFields, $claim_number);
					//$cp = $conn->execute_sql("update", $insertFields, $table, $table . "." . $field . "=?", array("i" => $claim_number));
					/*echo "<div class=\"alert alert-danger\" role=\"alert\"><i class=\"fa fa-exclamation-triangle\"></i>
<strong>The appointment slot(s) you have specified have already been created : - </strong> " . $time_slot . "</div>"; */

					echo "<div class=\"alert alert-success\" role=\"alert\"><i class=\"fa fa-lg fa-check\"></i> <strong>Your appointment has been successfully created  : - </strong> " . $time_slot . "</div>";
				}
			}
		}
	}
}

?>

<!-- <div id="success-return"><i class="fa fa-lg fa-check"></i> <strong>Success : - </strong> <?php  ?></div> -->