<?php

    foreach($findDeletedUpdates as $header => $row) {
		
		$firstName = $findDeletedUpdates[$header]['ea_forename'];

		$lastName = $findDeletedUpdates[$header]['ea_surname'];
		
		$timeSent = substr($findDeletedUpdates[$header]['mu_datesent'], 11, -3);

		$dateSent = substr($findDeletedUpdates[$header]['mu_datesent'], 0 , -9);
		
?>

	<a class="btn btn-warning col-md-12 badgefix mb10 subjectBox" name="<?php echo $findDeletedUpdates[$header]['mu_id']; ?>">
        <p><i class="fa fa-envelope-o"></i><b><?php echo " " . $findDeletedUpdates[$header]['mu_subject']; ?></b></p>
        <p><i class="fa fa-user"></i><?php echo " " . $firstName . " " . $lastName; ?></p>
        <p><i class="fa fa-clock-o"></i><?php echo "<b> " . $dateSent . "</b>" . " at " . "<b>" . $timeSent . "</b>"; ?></p>
	</a>
	
<?php
	
	}
	
?> 
