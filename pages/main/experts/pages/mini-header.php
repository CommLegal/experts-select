<!-- EXPERT -->
<?php 

$countUpdates = $conn->execute_sql("select", array("count(*) as rows"), "e_updates", "eu_recipient_id=? AND eu_type !=?", array("i" => $_SESSION['CME_USER']['login_id'], "i2" => "6"));

?>

<div class="container-fluid subheader-expert">
    <div class="container">
        <div class="row mt10">
            <div class="col-md-3">
                <a href="<?php echo _ROOT ?>/index.php?page=main-expert"><h4 class="midd">
                <span class="glyphicon glyphicon-envelope"></span>
                &nbsp; Updates&nbsp;<span class="badge"><?php echo $countUpdates[0]['rows']; ?></span></h4></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo _ROOT ?>/index.php?page=appointment_book"><h4 class="midd">
                <span class="glyphicon glyphicon-calendar"></span>
                &nbsp; Appointment Book</h4></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo _ROOT ?>/index.php?page=request-analysis-temp"><h4 class="midd">
                <i class="fa fa-line-chart"></i>
                &nbsp; Booking Statistics</h4></a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo _ROOT ?>/index.php?page=waitingroom-expert"><h4 class="midd">
                <i class="fa fa-clock-o"></i>
                &nbsp; Waiting Room</h4></a>
            </div>
        </div>
    </div>
</div>