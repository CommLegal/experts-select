<?php

    foreach($findRequestUpdates as $header => $row) {
		
		$firstName = $findRequestUpdates[$header]['ma_forename'];

		$lastName = $findRequestUpdates[$header]['ma_surname'];
		
		$timeSent = substr($findRequestUpdates[$header]['eu_datesent'], 11, -3);

		$dateSent = substr($findRequestUpdates[$header]['eu_datesent'], 0 , -9);
		
?>

	<a class="btn btn-primary col-md-12 badgefix mb10 subjectBox" name="<?php echo $findRequestUpdates[$header]['eu_id']; ?>">
			<p><i class="fa fa-envelope-o"></i><b><?php echo " " . $findRequestUpdates[$header]['eu_subject']; ?></b></p>
			<p><i class="fa fa-user"></i><?php echo " " . $firstName . " " . $lastName; ?></p>
			<p><i class="fa fa-clock-o"></i><?php echo "<b> " . $dateSent . "</b>" . " at " . "<b>" . $timeSent . "</b>"; ?></p>
	</a>
	
<?php
	
	}
	
?> 
