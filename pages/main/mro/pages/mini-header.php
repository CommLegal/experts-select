<!-- MRO -->
<?php 

 $countUpdates = $conn->execute_sql("select", array("count(*) as rows"), "m_updates", "mu_recipient_id=? AND mu_type < ?", array("i" => $_SESSION['CME_USER']['login_id'], "i2" => "6"));

 $getCompanyNo = $conn->execute_sql("select", array("ma_name"), "m_accounts", "ma_id=?", array("i" => $_SESSION['CME_USER']['login_id']));

 $checkExistingRequest = $conn->execute_sql("select", array("count(*) as rows"), "waiting_room", "wr_mroCompany=? AND wr_appCancelled=?", array("s1" => $getCompanyNo[0]['ma_name'], "s2" => "0"));

?>

<div class="container-fluid subheader-mro">
    <div class="container">
        <div class="row mt10">
            <div class="col-md-3">
                <a href="<?php echo _ROOT ?>/index.php?page=main-mro"><h4 class="midd">
                <span class="glyphicon glyphicon-envelope"></span>
                &nbsp; Updates&nbsp;<span class="badge"><?php echo $countUpdates[0]['rows']; ?></span></h4></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo _ROOT ?>/index.php?page=appointment-book"><h4 class="midd">
                <span class="glyphicon glyphicon-calendar"></span>
                &nbsp; Appointment Book</h4></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo _ROOT ?>/index.php?page=request-analysis-temp"><h4 class="midd">
                <i class="fa fa-line-chart"></i>
                &nbsp; Booking Statistics</h4></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo _ROOT ?>/index.php?page=waitingroom-mro"><h4 class="midd">
                <i class="fa fa-clock-o"></i>
                &nbsp; Waiting Room&nbsp;<span class="badge"><?php echo $checkExistingRequest[0]['rows']; ?></span></h4></a>
            </div>
        </div>
    </div>
</div>