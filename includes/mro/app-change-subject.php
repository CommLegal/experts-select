<?php 

//$findAppChangeUpdates = $conn->execute_sql("select", array("mu_id", "mu_subject", "ea_forename", "ea_surname", "mu_datesent", "ut_type"), "m_updates JOIN e_accounts ON mu_sender_id = ea_id JOIN u_types ON mu_type = ut_id", "mu_recipient_id=? AND mu_type=4 ORDER BY mu_datesent DESC", array("i" => $_SESSION['CME_USER']['login_id']));
																																																																											
	foreach($findAppChangeUpdates as $header => $row) {
		
		$firstName = $findAppChangeUpdates[$header]['ea_forename'];

		$lastName = $findAppChangeUpdates[$header]['ea_surname'];
		
		$timeSent = substr($findAppChangeUpdates[$header]['mu_datesent'], 11, -3);

		$dateSent = substr($findAppChangeUpdates[$header]['mu_datesent'], 0 , -9);
		
?>

	<a class="btn btn-success col-md-12 badgefix mb10 subjectBox" name="<?php echo $findAppChangeUpdates[$header]['mu_id']; ?>">
			<p><i class="fa fa-envelope-o"></i><b><?php echo " " . $findAppChangeUpdates[$header]['mu_subject']; ?></b></p>
			<p><i class="fa fa-user"></i><?php echo " " . $firstName . " " . $lastName; ?></p>
			<p><i class="fa fa-clock-o"></i><?php echo "<b> " . $dateSent . "</b>" . " at " . "<b>" . $timeSent . "</b>"; ?></p>
	</a>
	
<?php
	
	}
	
?> 

