<?php 


$getCompanyRequests = $conn->execute_sql("select", array("*"), "waiting_room", "wr_appCancelled=?", array("i" => "0"));

foreach($getCompanyRequests as $header => $value) { 

$getAppDate = substr($getCompanyRequests[$header]['wr_timeFrom'], 0, 10);
$getAppStartTime = substr($getCompanyRequests[$header]['wr_timeFrom'], 11, 17);
$getAppEndTime = substr($getCompanyRequests[$header]['wr_timeTo'], 11, 17);

 $getCompanyRequests[$header]['wr_id'];

?> 

	<div id = "appbox" class = "col-md-3 green quickradius textwhite">
		<div class="midd">
			<h3><?php echo $getCompanyRequests[$header]['wr_clientFName'] . " " . $getCompanyRequests[$header]['wr_clientSName'] ?></h3>
			<p>
				<?php echo $getCompanyRequests[$header]['wr_postcode'] ?><br /> <?php echo $getCompanyRequests[$header]['wr_clientTel'] ?><br /><br />
				<?php echo $getAppDate . "<br /><br />" . "<b>Starting from - </b>" . $getAppStartTime . "</br><b>Ending at - </b>" . $getAppEndTime; ?>
            </p>
            <a class = "expert-book-btn mt25 btn btn-primary col-md-12"><i class="fa fa-calendar"></i> Book</a>
            
            <div class = "confirm-box mt25 col-md-12" style = "display:none">
                <a class = "btn btn-success col-md-6 show-overlay" id="acceptRequest" requestID="<?php echo $getCompanyRequests[$header]['wr_id'];?>">Confirm</a>ahaha
                <a class = "expert-book-cancel btn btn-danger col-md-6">Deny</a>
            </div>
		</div>
	</div>


<?php } ?>

 