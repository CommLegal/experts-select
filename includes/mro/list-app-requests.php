<?php 

$getCompanyNo = $conn->execute_sql("select", array("ma_name"), "m_accounts", "ma_id=?", array("i" => $_SESSION['CME_USER']['login_id']));

$getCompanyRequests = $conn->execute_sql("select", array("*"), "waiting_room", "wr_mroCompany=? AND wr_appCancelled=?", array("i" => $getCompanyNo[0]['ma_name'], "i2" => "0"));

foreach($getCompanyRequests as $header => $value) { 

$getAppDate = substr($getCompanyRequests[$header]['wr_timeFrom'], 0, 10);
$getAppStartTime = substr($getCompanyRequests[$header]['wr_timeFrom'], 11, 17);
$getAppEndTime = substr($getCompanyRequests[$header]['wr_timeTo'], 11, 17);

?> 

	<div title = "Cancel Appointment"  class = "col-md-3 appbox green quickradius textwhite midd">
        <form id = "deleteMROForm" method="POST">
            <h3><?php echo $getCompanyRequests[$header]['wr_clientFName'] . " " . $getCompanyRequests[$header]['wr_clientSName'] ?></h3>
                <?php echo $getCompanyRequests[$header]['wr_postcode'] ?>
                <br />
                <?php echo $getCompanyRequests[$header]['wr_clientTel'] ?>
                <br /><br />
                <?php echo $getAppDate . "<br /><br />" . "<b>Starting from - </b>" . $getAppStartTime . "</br><b>Ending at - </b>" . $getAppEndTime; ?>
            <div class="col-md-12">
                <a class = "show-overlay mt25 btn btn-danger col-md-12 submitCancellation" 
                id = "waitingroom-cancel:<?php echo $getCompanyRequests[$header]['wr_id'];?>" 
                requestID="<?php echo $getCompanyRequests[$header]['wr_id']; ?>" />Cancel Appointment</a>
            </div>
        	<input type="hidden" name="appToDelete" value = "<?php echo $getCompanyRequests[$header]['wr_id'] ?>" />
		</form>
	</div>



<?php } ?>

<script src="<?php echo _ROOT ?>/js/modal.js"></script>

<script src="<?php echo _ROOT ?>/js/jquery.validate.js"></script>
<script src="<?php echo _ROOT ?>/js/additional-methods.js"></script>
<script src="<?php echo _ROOT ?>/js/validation.js"></script>
