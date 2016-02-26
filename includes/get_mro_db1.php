<?php
//START - TURN ERRORS ON
/*ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);*/
//END - TURN ERRORS ON

include_once("config.php");

//START DB CONNECTION
function connect() {
	mysql_connect (_CME_HOSTNAME, _CME_USERNAME, _CME_PASSWORD) or die('Could not connect to the database' . mysql_error());
	mysql_select_db (_CME_DATABASE);
}

function close() {
	mysql_close();
}

//START SQL QUERY TO PULL DATABASE COLUMN
function query() {
	$sql= mysql_query ("SELECT ma_id, ma_forename, ma_surname FROM m_accounts");
	while($mrodb = mysql_fetch_array($sql)){
		echo '<option value ="' . $mrodb['ma_id'] . $mrodb['ma_forname'] . $mrodb['ma_surname'] . '">' . $mrodb['ma_forename'] . ' ' . $mrodb['ma_surname'] . '</option>'; 
	}
}
//END SQL QUERY TO PULL DATABASE COLUMN

//END DB CONNECTION

?>