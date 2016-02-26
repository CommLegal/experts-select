<?php

    foreach($findAppEnquiryUpdates as $header => $row) {
		
		$firstName = $findAppEnquiryUpdates[$header]['ma_forename'];

		$lastName = $findAppEnquiryUpdates[$header]['ma_surname'];
		
		$timeSent = substr($findAppEnquiryUpdates[$header]['eu_datesent'], 11, -3);

		$dateSent = substr($findAppEnquiryUpdates[$header]['eu_datesent'], 0 , -9);
		
?>

	<a class="btn btn-danger col-md-12 badgefix mb10 subjectBox" name="<?php echo $findAppEnquiryUpdates[$header]['eu_id']; ?>">
			<p><i class="fa fa-envelope-o"></i><b><?php echo " " . $findAppEnquiryUpdates[$header]['eu_subject']; ?></b></p>
			<p><i class="fa fa-user"></i><?php echo " " . $firstName . " " . $lastName; ?></p>
			<p><i class="fa fa-clock-o"></i><?php echo "<b> " . $dateSent . "</b>" . " at " . "<b>" . $timeSent . "</b>"; ?></p>
	</a>
	
<?php
	
	}
	
?> 
