<?php

$findMessageUpdates = $conn->execute_sql("select", array("eu_id", "eu_subject", "ma_forename", "ma_surname", "eu_datesent", "ut_type"), "e_updates JOIN m_accounts ON eu_sender_id = ma_id JOIN u_types ON eu_type = ut_id", "eu_recipient_id=? AND eu_type=1 ORDER BY eu_datesent DESC",  array("i" => $_SESSION['CME_USER']['login_id']));

$findCancellationUpdates = $conn->execute_sql("select", array("eu_id", "eu_subject", "ma_forename", "ma_surname", "eu_datesent", "ut_type"), "e_updates JOIN m_accounts ON eu_sender_id = ma_id JOIN u_types ON eu_type = ut_id", "eu_recipient_id=? AND eu_type=2 ORDER BY eu_datesent DESC", array("i" => $_SESSION['CME_USER']['login_id']));

$findRequestUpdates = $conn->execute_sql("select", array("eu_id", "eu_subject", "ma_forename", "ma_surname", "eu_datesent", "ut_type"), "e_updates JOIN m_accounts ON eu_sender_id = ma_id JOIN u_types ON eu_type = ut_id", "eu_recipient_id=? AND eu_type=3 ORDER BY eu_datesent DESC", array("i" => $_SESSION['CME_USER']['login_id']));

$findAppChangeUpdates = $conn->execute_sql("select", array("eu_id", "eu_subject", "ma_forename", "ma_surname", "eu_datesent", "ut_type"), "e_updates JOIN m_accounts ON eu_sender_id = ma_id JOIN u_types ON eu_type = ut_id", "eu_recipient_id=? AND eu_type=4 ORDER BY eu_datesent DESC", array("i" => $_SESSION['CME_USER']['login_id']));

$findAppEnquiryUpdates = $conn->execute_sql("select", array("eu_id", "eu_subject", "ma_forename", "ma_surname", "eu_datesent", "ut_type"), "e_updates JOIN m_accounts ON eu_sender_id = ma_id JOIN u_types ON eu_type = ut_id", "eu_recipient_id=? AND eu_type=5 ORDER BY eu_datesent DESC", array("i" => $_SESSION['CME_USER']['login_id']));

$findDeletedUpdates = $conn->execute_sql("select", array("eu_id", "eu_subject", "ma_forename", "ma_surname", "eu_datesent", "ut_type"), "e_updates JOIN m_accounts ON eu_sender_id = ma_id JOIN u_types ON eu_type = ut_id", "eu_recipient_id=? AND eu_type=6 ORDER BY eu_datesent DESC", array("i" => $_SESSION['CME_USER']['login_id']));


$messages = count($findMessageUpdates);
$cancellations = count($findCancellationUpdates);
$requests = count($findRequestUpdates);
$appChange = count($findAppChangeUpdates);
$appEnquiry = count($findAppEnquiryUpdates);
$theDeleted = count($findDeletedUpdates);

?>

<div class= "container main"> 

<div class="col-md-12 mb25">              
    <h3 class="textshadow" >Updates</h3><div class="title-divider"></div>
</div>  

<div class = "col-md-3" id = "noto-col"><!-- Panel wrap -->    
    <div class="panel panel-default"><!-- Panel Container -->
        <div class="panel-heading"><h4>Your Notifications</h4></div>
        <div class="panel-body panelheight">
            <div class = "col-md-12">
            
                <button class="btn btn-default maxwid textleft badgefix" id="msg_btn">
                <div class = "row">
                    <div class = "col-md-9">Messages</div> 
                    <div class = "col-md-3" style="background-color:;"><span class = "badge"><?php echo $messages; ?></span></div> 
                </div>
                </button>
                
                
                <hr />
                
                <button class="btn btn-info maxwid textleft badgefix" id ="canc_btn">
                <div class = "row">
                    <div class = "col-md-9">Cancellations</div> 
                    <div class = "col-md-3" style="background-color:;"><span class = "badge"><?php echo $cancellations; ?></span></div> 
                </div>
                </button>
                
                <hr />
                
                <button class="btn btn-primary maxwid textleft badgefix" id ="appreq-btn">
                <div class = "row">
                    <div class = "col-md-9">Waiting Room Appointments</div> 
                    <div class = "col-md-3" style="background-color:;"><span class = "badge"><?php echo $requests; ?></span></div> 
                </div>
                </button>
                
                <hr />
                
                <button class="btn btn-success maxwid textleft badgefix" id ="appup-btn">
                <div class = "row">
                    <div class = "col-md-9">Appointment Updates</div> 
                    <div class = "col-md-3" style="background-color:;"><span class = "badge"><?php echo $appChange; ?></span></div> 
                </div>
                </button>
                
                <hr />
                
                <button class="btn btn-danger maxwid textleft badgefix" id ="agreement-btn">
                <div class = "row">
                    <div class = "col-md-9">Agreement Enquiry</div> 
                    <div class = "col-md-3" style="background-color:;"><span class = "badge"><?php echo $appEnquiry; ?></span></div> 
                </div>
                </button>
                
                <hr />
                
                <button class="btn btn-warning maxwid textleft badgefix" id ="archived-btn">
                <div class = "row">
                    <div class = "col-md-9">Archived</div> 
                    <div class = "col-md-3" style="background-color:;"><span class = "badge"><?php echo $theDeleted; ?></span></div> 
                </div>
                </button>
                
            </div>
        </div>
    </div>
</div>
<!-- End panel -->   
    
<div class = "col-md-3" id = "subject-col"><!-- Panel wrap -->    
    <div class="panel panel-default"><!-- Panel Container -->
        <div class="panel-heading"><h4>Subject</h4></div>
        <div class="panel-body panelheight scroll">
        	<div class = "col-md-12">
            
                <div id = "app-request-subject" style="display:none;">		<?php include('includes/experts/app-request-subject.php'); ?>		</div>
				<div id = "app-change-subject" style="display:none;">		<?php include('includes/experts/app-change-subject.php'); ?>		</div>
                <div id = "cancel-subject" style="display:none;">			<?php include('includes/experts/cancel-subject.php'); ?>			</div>
				<div id = "messages-subject" style="display:none;">			<?php include('includes/experts/messages-subject.php'); ?>			</div>
                <div id = "agreement-subject" style="display:none;">		<?php include('includes/experts/agreement-subject.php'); ?>			</div>
                <div id = "archived-subject" style="display:none;">			<?php include('includes/experts/archived-subject.php'); ?>			</div>

            </div>
        </div>
    </div>
</div>
<!-- End panel -->    

<div class = "col-md-6" id = "content-col"><!-- Panel wrap -->    
    <div class="panel panel-default"><!-- Panel Container -->
        <div class="panel-heading"><h4>Content</h4></div>
        <div class="panel-body panelheight scroll" id="rightbox">
            <div id="content-block" class = "col-md-12 mb10"> 
                
                <div id = "app-request-content" style="display:none;">		<?php include('includes/experts/app-request-content.php'); ?>		</div>
                <div id = "app-change-content" style="display:none;">		<?php include('includes/experts/app-change-content.php'); ?>		</div>
                <div id = "cancel-content" style="display:none;">			<?php include('includes/experts/cancel-content.php'); ?>			</div>
                <div id = "messages-content" style="display:none;">			<?php include('includes/experts/messages-content.php'); ?>			</div>
                <div id = "agreement-content" style="display:none;">		<?php include('includes/experts/agreement-content.php'); ?>			</div>
                <div id = "archived-content" style="display:none;">			<?php include('includes/experts/archived-content.php'); ?>			</div>
                
                <div id = "deleteSuccess"></div>
                
            </div>
        </div>
    </div>
</div>
<!-- End panel -->    

</div><!-- End container -->

<head>

<script>

//Left Buttons
$(document).ready(function(){
	$("#msg_btn").click(function(){
		$("#messages-subject").show();		//
		$("#app-change-subject").hide();
		$("#app-request-subject").hide();
		$("#cancel-subject").hide();
		$("#agreement-subject").hide();
	});
	$("#appup-btn").click(function(){
		$("#messages-subject").hide();
		$("#app-change-subject").show();	//
		$("#app-request-subject").hide();
		$("#cancel-subject").hide();
		$("#agreement-subject").hide();
	});
	$("#appreq-btn").click(function(){
		$("#messages-subject").hide();
		$("#app-change-subject").hide();
		$("#app-request-subject").show();	//
		$("#cancel-subject").hide();
		$("#agreement-subject").hide();
	});
	$("#canc_btn").click(function(){
		$("#messages-subject").hide();
		$("#app-change-subject").hide();
		$("#app-request-subject").hide();
		$("#cancel-subject").show();		//
		$("#agreement-subject").hide();
	});
	$("#agreement-btn").click(function(){
		$("#messages-subject").hide();
		$("#app-change-subject").hide();
		$("#app-request-subject").hide();
		$("#cancel-subject").hide();
		$("#agreement-subject").show();		//
	});

});

	
</script>
</head>