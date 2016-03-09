<?php
//START - TURN ERRORS ON
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//END - TURN ERRORS ON

//START DB CONNECTION
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

//START SQL QUERY TO PULL DATABASE COLUMN
$selectApp = $conn->execute_sql("select", array("*"), "e_appointments JOIN venues ON eap_v_id = v_id", "eap_ea_id=? AND eap_date >= ? AND eap_date <= ? AND eap_cc_id = ?", array("i" => $_SESSION['CME_USER']['login_id'], "s1" => date("Y-m-d", strtotime($_POST['e_appointments--eap_date_before'])), "s2" => date("Y-m-d", strtotime($_POST['e_appointments--eap_date_after'])), "i" = "0"));

//$value = $selectOption[0];
$num_rows = mysql_num_rows($selectApp);
$i = 0;
//END SQL QUERY TO PULL DATABASE COLUMN

//DEFAULT VALUE FOR OPTION FIELD
	
//END

//PULLS DB ROWS FROM COLUMN SPECIFIED IN THE ABOVE QUERY AND SEPERATES INTO INDIVIDUAL HTML ELEMENTS
/*foreach($selectApp as $header => $value)
{	
	//$v_lnames = $selectOption[$i++]["v_name"];
	
	//  ' . $v_lPostcode . '
	$datestamp = $selectApp[$header]['eap_date']
	
	$date = substr($datestamp, 0, 10);
	$time = substr($datestamp, 11);
	
	echo  "
	
	<div id = \"appbox\" class = \"col-md-3 green quickradius textwhite\">
		<div class=\"midd\">
			<h3>" .  $selectApp[$header]['v_name'] . "</h3>
		<b>" . $date . "</b> at <b>" . $time . "</b><br /><br />
			<p>"
				.  $selectApp[$header]['v_county'] . "<br /> ".  $selectApp[$header]['v_city'] . "-" .  $selectApp[$header]['v_postcode'] ."<br /> <br />" .  $selectApp[$header]['v_telephone'] . "<br /> 
				<a href=" .  $selectApp[$header]['v_email'] . "?Subject=Hello%20again\" target=\"_top\">" .  $selectApp[$header]['v_email'] . "</a>
				<span class = \"mt25 btn btn-primary col-md-12\"><i class=\"fa fa-calendar\"></i> Book</span>	
			</p>
		</div>
	</div>
	
	";
	
}*/

var_dump($selectApp);

//END

?>