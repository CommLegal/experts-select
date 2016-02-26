<?php

    foreach($findCancellationUpdates as $header => $row) {
		
		$firstName = $findCancellationUpdates[$header]['ma_forename'];

		$lastName = $findCancellationUpdates[$header]['ma_surname'];
		
		$timeSent = substr($findCancellationUpdates[$header]['eu_datesent'], 11, -3);

		$dateSent = substr($findCancellationUpdates[$header]['eu_datesent'], 0 , -9);
		
?>

	<a class="btn btn-info col-md-12 badgefix mb10 subjectBox" name="<?php echo $findCancellationUpdates[$header]['eu_id']; ?>">
			<p><i class="fa fa-envelope-o"></i><b><?php echo " " . $findCancellationUpdates[$header]['eu_subject']; ?></b></p>
			<p><i class="fa fa-user"></i><?php echo " " . $firstName . " " . $lastName; ?></p>
			<p><i class="fa fa-clock-o"></i><?php echo "<b> " . $dateSent . "</b>" . " at " . "<b>" . $timeSent . "</b>"; ?></p>
	</a>
	
<?php
	
	}
	
?> 