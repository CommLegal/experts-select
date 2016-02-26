<?php

    foreach($findMessageUpdates as $header => $row) {
		
		$firstName = $findMessageUpdates[$header]['ma_forename'];

		$lastName = $findMessageUpdates[$header]['ma_surname'];
		
		$timeSent = substr($findMessageUpdates[$header]['eu_datesent'], 11, -3);

		$dateSent = substr($findMessageUpdates[$header]['eu_datesent'], 0 , -9);
		
?>

	<a class="btn btn-default col-md-12 badgefix mb10 subjectBox" name="<?php echo $findMessageUpdates[$header]['eu_id']; ?>">
			<p><i class="fa fa-envelope-o"></i><b><?php echo " " . $findMessageUpdates[$header]['eu_subject']; ?></b></p>
			<p><i class="fa fa-user"></i><?php echo " " . $firstName . " " . $lastName; ?></p>
			<p><i class="fa fa-clock-o"></i><?php echo "<b> " . $dateSent . "</b>" . " at " . "<b>" . $timeSent . "</b>"; ?></p>
	</a>
	
<?php
	
	}
	
?> 
