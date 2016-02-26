

<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

//START DB CONNECTION
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

if($_SESSION['CME_USER']['type'] == "mro") { 

	$selectMROUpdate = $conn->execute_sql("select", array("*"), "m_updates JOIN m_accounts ON mu_recipient_id = ma_id JOIN e_accounts ON mu_sender_id = ea_id", "mu_id=?", array("i" => $_POST['data'] ));
	
	$messageId = $selectMROUpdate[0]['mu_id'];
	
	$messageType = $selectMROUpdate[0]['mu_type'];
	
	$timeSent = substr($selectMROUpdate[0]['mu_datesent'], 11, -3);

	$dateSent = substr($selectMROUpdate[0]['mu_datesent'], 0 , -9);
	

if($messageType == 5) {
	
	//var_dump($selectMROUpdate[0]['mu_content']);

	$string = "
		
		<!--<button type=\"button\" class=\"btn btn-default pull-right\" id=\"mroDeleteMessage\" name=\"mroDeleteMessage\">Delete &nbsp;<i class=\"fa fa-sm fa-trash\"></i></button>-->
		<button type=\"button\" class=\"btn btn-default\"  id=\"archiveUpdate\" name=\"archiveUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button>
		
		<div class=\"btn-group btn-group-sm\" role=\"group\">
		  <form id=\"mroArchiveMessage\" name=\"mroArchiveMessage\" >
		  	<input type=\"hidden\" name=\"messageID\" id=\"messageID\" value=" . $messageId . ">
		  	<!--<button id = \"reply-btn\" type=\"button\" class=\"btn btn-default\">Reply &nbsp;<i class=\"fa fa-sm fa-reply\"></i></button>-->
			
			
		  </form>
		</div>
		
		<div id = \"reply-box\" style = \"display:none\">
			<label class=\"control-label\">Reply:</label>
			<textarea class = \"form-control\" rows = \"5\"> </textarea> <br />
			<button id = \"confirm-reply\" type=\"button\" class=\"mt1 btn btn-success \">Send &nbsp;<i class=\"fa fa-check\"></i></button>
			<button id = \"cancel-reply\" type=\"button\" class=\"mt1 btn btn-danger \">Cancel &nbsp;<i class=\"fa fa-times\"></i></button>
		</div>
		
		<hr />
		
		<h4>" . $selectMROUpdate[0]['mu_subject'] . "</h4>
		
		<p>" . $selectMROUpdate[0]['mu_content'] . "</p>
		
		
		<form id=\"confirmAgreementUpdate\" method=\"post\" action=\"\" >
		
			<input type=\"hidden\" name=\"agreementID\" value=\"" . $selectMROUpdate[0]['mu_oa_id'] . "\">
			<input type=\"hidden\" name=\"updateID\" value=\"" . $messageId . "\">
		
			<div id=\"success\"></div>
		
		</form>
		
		<div id = \"agreement-reject-reason\" style=\"display:none\">
			<label class=\"control-label\">Reason for Rejection:</label>
			<textarea class = \"form-control\" rows = \"5\"> </textarea> <br />
			
			<button id = \"confirm-reject\" type=\"button\" class=\"col-md-6 mt10 btn btn-success \">Confirm Rejection &nbsp;<i class=\"fa fa-check\"></i></button>
			<button id = \"cancel-reject\" type=\"button\" class=\"col-md-6 mt10 btn btn-danger \">Cancel Rejection &nbsp;<i class=\"fa fa-times\"></i></button>
		</div>
		
		<hr />
		
		<small>Sent from <b>" . $selectMROUpdate[0]['ea_forename'] . " " . $selectMROUpdate[0]['ea_surname'] . "</b> on " . $dateSent . " at <b>" . $timeSent . " . </b></small> </br> <div id=\"archiveSuccess\"></div>" ;

	}

	elseif($messageType == 6) {

	$string = "
		
	
		<!-- <button type=\"button\" class=\"btn btn-default\" id=\"mroDeleteMessage\" name=\"mroDeleteMessage\">Delete &nbsp;<i class=\"fa fa-sm fa-trash\"></i></button> -->
		
		
		<div class=\"btn-group btn-group-sm\" role=\"group\">
		  <form id=\"mroArchiveMessage\" name=\"mroArchiveMessage\" >
		  	<input type=\"hidden\" name=\"messageID\" id=\"messageID\" value=" . $messageId . ">
		  	<!-- <button type=\"button\" class=\"btn btn-default\"  id=\"mroArchiveUpdate\" name=\"mroArchiveUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button> -->
		  	<!-- <button type=\"button\" class=\"btn btn-default\">Reply &nbsp;<i class=\"fa fa-sm fa-reply\"></i></button> -->
			
		  </form>
		</div>
		
		<hr />
		
		<h4>" . $selectMROUpdate[0]['mu_subject'] . "</h4>
		
		<p>" . $selectMROUpdate[0]['mu_content'] . "</p>
		

		<div class=\"title-divider\"></div>
		<small>Sent from <b>" . $selectMROUpdate[0]['ea_forename'] . " " . $selectMROUpdate[0]['ea_surname'] . "</b> on " . $dateSent . " at <b>" . $timeSent . " . </b></small> </br> <div id=\"archiveSuccess\"></div>" ;

	}
	
	elseif($messageType == 1)
	{
			$string = "
		
		<!-- <div class=\"btn-group btn-group-sm pull-right\" role=\"group\">
		  <button type=\"button\" class=\"btn btn-default\"  id=\"archiveUpdate\" name=\"archiveUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button>
		</div> -->
		
		<div class=\"btn-group btn-group-sm\" role=\"group\">
		  <form id=\"mroArchiveMessage\" name=\"mroArchiveMessage\" >
		  	<input type=\"hidden\" name=\"messageID\" id=\"messageID\" value=" . $messageId . ">
			<button type=\"button\" class=\"btn btn-default\"  id=\"archiveUpdate\" name=\"archiveUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button>
		  	<!-- <button id = \"reply-btn\" type=\"button\" class=\"btn btn-default\">Reply &nbsp;<i class=\"fa fa-sm fa-reply\"></i></button> -->
			
			
		  </form>
		</div>
		
		<div id = \"reply-box\" style = \"display:none\">
			<label class=\"control-label\">Reply:</label>
			<textarea class = \"form-control\" rows = \"5\"> </textarea> <br />
			<button id = \"confirm-reply\" type=\"button\" class=\"mt1 btn btn-success \">Send &nbsp;<i class=\"fa fa-check\"></i></button>
			<button id = \"cancel-reply\" type=\"button\" class=\"mt1 btn btn-danger \">Cancel &nbsp;<i class=\"fa fa-times\"></i></button>
		</div>
		
		<hr />
		
		<h4>" . $selectMROUpdate[0]['mu_subject'] . "</h4>
		
		<p>" . $selectMROUpdate[0]['mu_content'] . "</p>
		
		<div class=\"title-divider\"></div>
		<small>Sent from <b>" . $selectMROUpdate[0]['ea_forename'] . " " . $selectMROUpdate[0]['ea_surname'] . "</b> on " . $dateSent . " at <b>" . $timeSent . " . </b></small> </br> <div id=\"archiveSuccess\"></div>" ;
		
	}
	
	
	else
	{
			$string = "
		
		<!-- <div class=\"btn-group btn-group-sm pull-right\" role=\"group\">
		  <button type=\"button\" class=\"btn btn-default\"  id=\"archiveUpdate\" name=\"archiveUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button>
		</div> -->
		
		<div class=\"btn-group btn-group-sm\" role=\"group\">
		  <form id=\"mroArchiveMessage\" name=\"mroArchiveMessage\" >
		  	<input type=\"hidden\" name=\"messageID\" id=\"messageID\" value=" . $messageId . ">
			<button type=\"button\" class=\"btn btn-default\"  id=\"archiveUpdate\" name=\"archiveUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button>
		  	<!--<button id = \"reply-btn\" type=\"button\" class=\"btn btn-default\">Reply &nbsp;<i class=\"fa fa-sm fa-reply\"></i></button>-->
			
			
		  </form>
		</div>
		
		<div id = \"reply-box\" style = \"display:none\">
			<label class=\"control-label\">Reply:</label>
			<textarea class = \"form-control\" rows = \"5\"> </textarea> <br />
			<button id = \"confirm-reply\" type=\"button\" class=\"mt1 btn btn-success \">Send &nbsp;<i class=\"fa fa-check\"></i></button>
			<button id = \"cancel-reply\" type=\"button\" class=\"mt1 btn btn-danger \">Cancel &nbsp;<i class=\"fa fa-times\"></i></button>
		</div>
		
		<hr />
		
		<h4>" . $selectMROUpdate[0]['mu_subject'] . "</h4>
		
		<p>" . $selectMROUpdate[0]['mu_content'] . "</p>
		
		<div class=\"title-divider\"></div>
		<small>Sent from <b>" . $selectMROUpdate[0]['ea_forename'] . " " . $selectMROUpdate[0]['ea_surname'] . "</b> on " . $dateSent . " at <b>" . $timeSent . " . </b></small> </br> <div id=\"archiveSuccess\"></div>" ;
		
	}
		echo $string;

}









if($_SESSION['CME_USER']['type'] == "expert") { 

	$selectExpertUpdate = $conn->execute_sql("select", array("*"), "e_updates JOIN e_accounts ON eu_recipient_id = ea_id JOIN m_accounts ON eu_sender_id = ma_id", "eu_id=?", array("i" => $_POST['data'] ));
	
	$messageId = $selectExpertUpdate[0]['eu_id'];
	
	$messageType = $selectExpertUpdate[0]['eu_type'];

	$timeSent = substr($selectExpertUpdate[0]['eu_datesent'], 11, -3);

	$dateSent = substr($selectExpertUpdate[0]['eu_datesent'], 0 , -9);

if($messageType == 5) {
	
	if($selectExpertUpdate[0]['eu_able_confirm'] == 1) { 
	
	$string = "
		
		<!--<button type=\"button\" class=\"btn btn-default pull-right\" id=\"mroDeleteMessage\" name=\"mroDeleteMessage\">Delete &nbsp;<i class=\"fa fa-sm fa-trash\"></i></button>
		<button type=\"button\" class=\"btn btn-default\"  id=\"archiveUpdate\" name=\"archiveUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button>-->
		
		<div class=\"btn-group btn-group-sm\" role=\"group\">
		  <form id=\"expertArchiveMessage\" name=\"expertArchiveMessage\" >
		  	<input type=\"hidden\" name=\"messageID\" id=\"messageID\" value=" . $messageId . ">
			<button type=\"button\" class=\"btn btn-default\"  id=\"archiveExpertUpdate\" name=\"archiveExpertUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button>
		  	<!--<button id = \"reply-btn\" type=\"button\" class=\"btn btn-default\">Reply&nbsp;<i class=\"fa fa-sm fa-reply\"></i></button>-->
			
		  </form>
		</div>
		
		<hr />
		
		
		<div id = \"reply-box\" style = \"display:none\">
			<label class=\"control-label\">Reply:</label>
			<textarea name =\"reasonForReject\" class = \"form-control\" rows = \"5\"> </textarea> <br />
			<button id = \"confirm-reply\" type=\"button\" class=\"mt1 btn btn-success \">Send &nbsp;<i class=\"fa fa-check\"></i></button>
			<button id = \"cancel-reply\" type=\"button\" class=\"mt1 btn btn-danger \">Cancel &nbsp;<i class=\"fa fa-times\"></i></button>
		</div>
		
		<h4>" . $selectExpertUpdate[0]['eu_subject'] . "</h4>
		
		<p>" . $selectExpertUpdate[0]['eu_content'] . "</p>
		
		<form id=\"confirmAgreementUpdate\" method=\"post\" action=\"\" >
		
			<input type=\"hidden\" name=\"agreementID\" value=\"" . $selectExpertUpdate[0]['eu_oa_id'] . "\">
			<input type=\"hidden\" name=\"updateID\" value=\"" . $messageId . "\">
			
			<div id=\"success\"></div>
		
		</form>
		
		<div class=\"title-divider\"></div>
		<small>Sent from <b>" . $selectExpertUpdate[0]['ma_forename'] . " " . $selectExpertUpdate[0]['ma_surname'] . "</b> on " . $dateSent . " at <b>" . $timeSent . " . </b></small> </br> <div id=\"archiveSuccess\"></div>" ; } else { 

	$string = "
		
		<!--<button type=\"button\" class=\"btn btn-default pull-right\" id=\"mroDeleteMessage\" name=\"mroDeleteMessage\">Delete &nbsp;<i class=\"fa fa-sm fa-trash\"></i></button>
		<button type=\"button\" class=\"btn btn-default\"  id=\"archiveUpdate\" name=\"archiveUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button>-->
		
		<div class=\"btn-group btn-group-sm\" role=\"group\">
		  <form id=\"expertArchiveMessage\" name=\"expertArchiveMessage\" >
		  	<input type=\"hidden\" name=\"messageID\" id=\"messageID\" value=" . $messageId . ">
			<button type=\"button\" class=\"btn btn-default\"  id=\"archiveExpertUpdate\" name=\"archiveExpertUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button>
		  	<!--<button id = \"reply-btn\" type=\"button\" class=\"btn btn-default\">Reply&nbsp;<i class=\"fa fa-sm fa-reply\"></i></button>-->
			
		  </form>
		</div>
		
		<hr />
		
		
		<div id = \"reply-box\" style = \"display:none\">
			<label class=\"control-label\">Reply:</label>
			<textarea name =\"reasonForReject\" class = \"form-control\" rows = \"5\"> </textarea> <br />
			<button id = \"confirm-reply\" type=\"button\" class=\"mt1 btn btn-success \">Send &nbsp;<i class=\"fa fa-check\"></i></button>
			<button id = \"cancel-reply\" type=\"button\" class=\"mt1 btn btn-danger \">Cancel &nbsp;<i class=\"fa fa-times\"></i></button>
		</div>
		
		<h4>" . $selectExpertUpdate[0]['eu_subject'] . "</h4>
		
		<p>" . $selectExpertUpdate[0]['eu_content'] . "</p>
		
		<form id=\"confirmAgreementUpdate\" method=\"post\" action=\"\" >
		
			<input type=\"hidden\" name=\"agreementID\" value=\"" . $selectExpertUpdate[0]['eu_oa_id'] . "\">
			<input type=\"hidden\" name=\"updateID\" value=\"" . $messageId . "\">
		
			<div id = \"confirmations\" class = \"\">
				<button id=\"submitConfirmation\" type=\"button\" class=\"btn btn-success btn-sm\">Accept &nbsp;<i class=\"fa fa-sm fa-check\"></i></button>
				<button id=\"rejection\" type=\"button\" class=\"btn btn-danger btn-sm\">Reject &nbsp;<i class=\"fa fa-sm fa-times\"></i></button>
			</div>
			
			<div id=\"success\"></div>
		
		
		
			<div id = \"agreement-reject-reason\" style=\"display:none\">
				<label class=\"control-label\">Reason for Rejection:</label>
				<textarea name =\"reasonForReject\" class =\"form-control\" rows = \"5\"> </textarea> <br />
				
				<button id = \"confirm-reject\" type=\"button\" class=\"col-md-6 mt10 btn btn-success \">Confirm Rejection &nbsp;<i class=\"fa fa-check\"></i></button>
				<button id = \"cancel-reject\" type=\"button\" class=\"col-md-6 mt10 btn btn-danger \">Cancel Rejection &nbsp;<i class=\"fa fa-times\"></i></button>
			</div>
		
		</form>
		
		<div class=\"title-divider\"></div>
		<small>Sent from <b>" . $selectExpertUpdate[0]['ma_forename'] . " " . $selectExpertUpdate[0]['ma_surname'] . "</b> on " . $dateSent . " at <b>" . $timeSent . " . </b></small> </br> <div id=\"archiveSuccess\"></div>" ;

	} }

	elseif($messageType == 6) {

	$string = "
		
		<!-- <div class=\"btn-group btn-group-sm pull-right\" role=\"group\">
		  <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-sm fa-arrow-left\"></i>&nbsp; Previous</button>
		  <button type=\"button\" class=\"btn btn-default\">Next &nbsp;<i class=\"fa fa-sm fa-arrow-right\"></i></button>
		</div> 
		
		<button type=\"button\" class=\"btn btn-default\" id=\"deleteMessage\" name=\"deleteMessage\">Delete &nbsp;<i class=\"fa fa-sm fa-trash\"></i></button> -->

		<div class=\"btn-group btn-group-sm\" role=\"group\">
		  <form id=\"expertArchiveMessage\" name=\"expertArchiveMessage\" >
		  	<input type=\"hidden\" name=\"messageID\" id=\"messageID\" value=" . $messageId . ">
		  	<!--<button type=\"button\" class=\"btn btn-default\"  id=\"archiveExpertUpdate\" name=\"archiveExpertUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button>
		  	<button type=\"button\" class=\"btn btn-default\">Reply &nbsp;<i class=\"fa fa-sm fa-reply\"></i></button>-->
			
		  </form>
		</div>
		
		
		
		<hr />
		
		<h4>" . $selectExpertUpdate[0]['eu_subject'] . "</h4>
		
		<p>" . $selectExpertUpdate[0]['eu_content'] . "</p>
		
		<div class=\"title-divider\"></div>
		<small>Sent from <b>" . $selectExpertUpdate[0]['ma_forename'] . " " . $selectExpertUpdate[0]['ma_surname'] . "</b> on " . $dateSent . " at <b>" . $timeSent . " . </b></small> </br> <div id=\"archiveSuccess\"></div>" ;
		
	}
	elseif($messageType == 1)
	{
			$string = "
		
		<!-- <div class=\"btn-group btn-group-sm pull-right\" role=\"group\">
		  <button type=\"button\" class=\"btn btn-default\"  id=\"archiveUpdate\" name=\"archiveUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button>
		</div> -->
		
		<div class=\"btn-group btn-group-sm\" role=\"group\">
		  <form id=\"expertArchiveMessage\" name=\"expertArchiveMessage\" >
		  	<input type=\"hidden\" name=\"messageID\" id=\"messageID\" value=" . $messageId . ">
			<button type=\"button\" class=\"btn btn-default\"  id=\"archiveExpertUpdate\" name=\"archiveExpertUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button>
		  	<!-- <button id = \"reply-btn\" type=\"button\" class=\"btn btn-default\">Reply &nbsp;<i class=\"fa fa-sm fa-reply\"></i></button> -->
			
			
		  </form>
		</div>
		
		<div id = \"reply-box\" style = \"display:none\">
			<label class=\"control-label\">Reply:</label>
			<textarea class = \"form-control\" rows = \"5\"> </textarea> <br />
			<button id = \"confirm-reply\" type=\"button\" class=\"mt1 btn btn-success \">Send &nbsp;<i class=\"fa fa-check\"></i></button>
			<button id = \"cancel-reply\" type=\"button\" class=\"mt1 btn btn-danger \">Cancel &nbsp;<i class=\"fa fa-times\"></i></button>
		</div>
		
		<hr />
		
		<h4>" . $selectExpertUpdate[0]['eu_subject'] . "</h4>
		
		<p>" . $selectExpertUpdate[0]['eu_content'] . "</p>
		
		<div class=\"title-divider\"></div>
		<small>Sent from <b>" . $selectExpertUpdate[0]['ma_forename'] . " " . $selectExpertUpdate[0]['ma_surname'] . "</b> on " . $dateSent . " at <b>" . $timeSent . " . </b></small> </br> <div id=\"archiveSuccess\"></div>" ;
		
	}
	else {
		$string = "
		
		<!-- <div class=\"btn-group btn-group-sm pull-right\" role=\"group\">
		  <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-sm fa-arrow-left\"></i>&nbsp; Previous</button>
		  <button type=\"button\" class=\"btn btn-default\">Next &nbsp;<i class=\"fa fa-sm fa-arrow-right\"></i></button>
		</div> -->

		<div class=\"btn-group btn-group-sm\" role=\"group\">
		  <form id=\"expertArchiveMessage\" name=\"expertArchiveMessage\" >
		  	<input type=\"hidden\" name=\"messageID\" id=\"messageID\" value=" . $messageId . ">
		  	<button type=\"button\" class=\"btn btn-default\"  id=\"archiveExpertUpdate\" name=\"archiveExpertUpdate\">Archive &nbsp;<i class=\"fa fa-sm fa-archive\"></i></button>
		  	<!--<button id = \"reply-btn\" type=\"button\" class=\"btn btn-default\">Reply &nbsp;<i class=\"fa fa-sm fa-reply\"></i></button>-->
			
		  </form>
		</div>
		
		<hr />
		
		<div id = \"reply-box\" style = \"display:none\">
			<label class=\"control-label\">Reply:</label>
			<textarea class = \"form-control\" rows = \"5\"> </textarea> <br />
			<button id = \"confirm-reply\" type=\"button\" class=\"mt1 btn btn-success \">Send &nbsp;<i class=\"fa fa-check\"></i></button>
			<button id = \"cancel-reply\" type=\"button\" class=\"mt1 btn btn-danger \">Cancel &nbsp;<i class=\"fa fa-times\"></i></button>
		</div>
		
		<h4>" . $selectExpertUpdate[0]['eu_subject'] . "</h4>
		
		<p>" . $selectExpertUpdate[0]['eu_content'] . "</p>

		<div class=\"title-divider\"></div>
		<small>Sent from <b>" . $selectExpertUpdate[0]['ma_forename'] . " " . $selectExpertUpdate[0]['ma_surname'] . "</b> on " . $dateSent . " at <b>" . $timeSent . " . </b></small> </br> <div id=\"archiveSuccess\"></div>" ;
	}

	echo $string;
}

?>


<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

<script src="/js/jquery.validate.js"></script>
<script src="<?php echo _ROOT ?>/js/custom.js"></script>-->



<script>
		$('#rejection').click(function(){
			$('#confirmations').slideUp();
		})
		
		$('#rejection').click(function(){
			$('#agreement-reject-reason').slideDown();
		});
		
		
		
	$("#archiveUpdate").click(function() {
											
		var data = $('#mroArchiveMessage').serialize();
	
		$.post("includes/mro_archive_update.php",
			data,
			function(data){
			  $("#archiveSuccess").html(data);  
			  location.reload();
			 //setTimeout(function(){location.reload();}, 2000);
			})
		});
	
	$("#archiveExpertUpdate").click(function() {
										  	
		var data = $('#expertArchiveMessage').serialize();
	
		$.post("includes/archive_update.php",
			data,
			function(data){
			  $("#archiveSuccess").html(data);  
			  location.reload();
			 //setTimeout(function(){location.reload();}, 2000);
			})
		});


	$('#submitConfirmation').click(function(e){
		e.preventDefault();			
		
		var data = $("#confirmAgreementUpdate").serializeArray();

		$.post(
		   'includes/experts/confirm-agreement-request.php',
			data,
			function(data){
			 $("#success").html(data);
			}
		  );
		});
</script>


