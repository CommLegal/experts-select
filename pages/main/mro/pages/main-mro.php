<?php	

$findMessageUpdates = $conn->execute_sql("select", array("mu_id", "mu_subject", "ea_forename", "ea_surname", "mu_datesent", "ut_type"), "m_updates JOIN e_accounts ON mu_sender_id = ea_id JOIN u_types ON mu_type = ut_id", "mu_recipient_id=? AND mu_type=1 ORDER BY mu_datesent DESC",  array("i" => $_SESSION['CME_USER']['login_id']));

$findCancellationUpdates = $conn->execute_sql("select", array("mu_id", "mu_subject", "ea_forename", "ea_surname", "mu_datesent", "ut_type"), "m_updates JOIN e_accounts ON mu_sender_id = ea_id JOIN u_types ON mu_type = ut_id", "mu_recipient_id=? AND mu_type=2 ORDER BY mu_datesent DESC", array("i" => $_SESSION['CME_USER']['login_id']));

$findRequestUpdates = $conn->execute_sql("select", array("mu_id", "mu_subject", "ea_forename", "ea_surname", "mu_datesent", "ut_type"), "m_updates JOIN e_accounts ON mu_sender_id = ea_id JOIN u_types ON mu_type = ut_id", "mu_recipient_id=? AND mu_type=3 ORDER BY mu_datesent DESC", array("i" => $_SESSION['CME_USER']['login_id']));

$findAppChangeUpdates = $conn->execute_sql("select", array("mu_id", "mu_subject", "ea_forename", "ea_surname", "mu_datesent", "ut_type"), "m_updates JOIN e_accounts ON mu_sender_id = ea_id JOIN u_types ON mu_type = ut_id", "mu_recipient_id=? AND mu_type=4 ORDER BY mu_datesent DESC", array("i" => $_SESSION['CME_USER']['login_id']));

$findAppEnquiryUpdates = $conn->execute_sql("select", array("mu_id", "mu_subject", "ea_forename", "ea_surname", "mu_datesent", "ut_type"), "m_updates JOIN e_accounts ON mu_sender_id = ea_id JOIN u_types ON mu_type = ut_id", "mu_recipient_id=? AND mu_type=5 ORDER BY mu_datesent DESC", array("i" => $_SESSION['CME_USER']['login_id']));

$findDeletedUpdates = $conn->execute_sql("select", array("mu_id", "mu_subject", "ea_forename", "ea_surname", "mu_datesent", "ut_type"), "m_updates JOIN e_accounts ON mu_sender_id = ea_id JOIN u_types ON mu_type = ut_id", "mu_recipient_id=? AND mu_type=6 ORDER BY mu_datesent DESC", array("i" => $_SESSION['CME_USER']['login_id']));

$messages = count($findMessageUpdates);
$cancellations = count($findCancellationUpdates);
$requests = count($findRequestUpdates);
$appChange = count($findAppChangeUpdates);
$appEnquiry = count($findAppEnquiryUpdates);
$theDeleted = count($findDeletedUpdates);


?>

<div class= "container">   
    <div class="col-md-12 mb25">              
        <h3 class="textshadow">Updates</h3><div class="title-divider"></div>
    </div> 
    
    
    
    <div class = "col-md-3"><!-- Panel wrap -->    
        <div class="panel panel-default"><!-- Panel Container -->
            <div class="panel-heading"><h4>Your Notifications</h4></div>
            <div class="panel-body panelheight">
        
                <div class = "col-md-12">
                
                    <button class="btn btn-default maxwid textleft badgefix" id="msg_btn">
                        Messages <span class = "badge pull-right"><?php echo $messages; ?></span> 
                    </button>
                    <hr />
                    <button class="btn btn-info maxwid textleft badgefix" id ="canc_btn">
                       Cancellations <span class = "badge pull-right"><?php echo $cancellations; ?></span> 
                    </button>
                    <hr />
                    <button class="btn btn-primary maxwid textleft badgefix" id ="appreq-btn">
                        <span class = "badge pull-right"><?php echo $requests; ?></span> Appointment <br/>Requests 
                    </button>
                    <hr />
                    <button class="btn btn-success maxwid textleft badgefix" id ="appup-btn">
                        <span class = "badge pull-right"><?php echo $appChange; ?></span> Appointment <br />Updates 
                    </button>
                    <hr />
                    <button class="btn btn-danger maxwid textleft badgefix" id ="agreement-btn">
                        <span class = "badge pull-right"><?php echo $appEnquiry; ?></span> Agreement <br />Enquiries 
                    </button>
                    <hr />
                    <button class="btn btn-warning maxwid textleft badgefix" id ="archived-btn">
                    	Archived <span class = "badge pull-right"><?php echo $theDeleted; ?></span> 
                	</button>
                    
                </div>
        
            </div>
        </div>
    </div><!-- End panel -->    

<div class = "col-md-3"><!-- Panel wrap -->    
        <div class="panel panel-default"><!-- Panel Container -->
            <div class="panel-heading"><h4>Subject</h4></div>
            <div class="panel-body panelheight scroll">
                <div class = "col-md-12">
                
                    <div id = "app-request-subject" style="display:none;">		<?php include('includes/mro/app-request-subject.php'); ?>		</div>
                    <div id = "app-change-subject" style="display:none;">		<?php include('includes/mro/app-change-subject.php'); ?>		</div>
                    <div id = "cancel-subject" style="display:none;">			<?php include('includes/mro/cancel-subject.php'); ?>			</div>
                    <div id = "messages-subject" style="display:none;">			<?php include('includes/mro/messages-subject.php'); ?>			</div>
                    <div id = "agreement-subject" style="display:none;">		<?php include('includes/mro/agreement-subject.php'); ?>			</div>
                    <div id = "archived-subject" style="display:none;">			<?php include('includes/mro/archived-subject.php'); ?>			</div>
   
                </div>
            </div>
        </div>
    </div><!-- End panel -->       

 <div class = "col-md-6"><!-- Panel wrap -->    
        <div class="panel panel-default"><!-- Panel Container -->
            <div class="panel-heading"><h4>Content</h4></div>
            <div class="panel-body panelheight scroll" id="rightbox">
                <div id="content-block" class = "col-md-12 mb10">                
                    
				</div>
            </div>
        </div>
    </div><!-- End panel -->    

<!-- End container -->    
</div>

<a href='#' id = "tester"></a>
