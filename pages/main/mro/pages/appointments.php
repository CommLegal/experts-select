<?php
		$selectMRO = $conn->execute_sql("select", array("*"), "m_accounts", "ma_id=?", array("i" => $_SESSION['CME_USER']['login_id']));
		
	if($_POST['sortOrder'] == 2){
		 $selectApps = $conn->execute_sql("select", array("*"), "e_appointments", "eap_mo_id=? ORDER BY eap_cc_id ASC", array("i" => $selectMRO[0]['ma_name']));
	} elseif($_POST['sortOrder'] == 3) {
		 $selectApps = $conn->execute_sql("select", array("*"), "e_appointments JOIN venues ON eap_v_id = v_id", "eap_mo_id=? ORDER BY v_name", array("i" => $selectMRO[0]['ma_name']));
	} else { 
		 $selectApps = $conn->execute_sql("select", array("*"), "e_appointments", "eap_mo_id=? ORDER BY eap_date", array("i" => $selectMRO[0]['ma_name']));
	} 

	
?>

<div class = "container main">



<div id="overlay" style = "left:0%; margin-top:350px;"  > <!-- USED TO CHANGE MODAL ON ADD_APPOINTMENTS!!! --> 
    <div id="overlay-content">
        <div style = "background-color:#337AB7" id="close"><button type="button" class="close" ><p>Close <i class = "fa fa-lg fa-times"></i></p></button></div>
            <div id="overlay-title">
            	<p>Booked Appointments</p>
            </div>
            
            <div id="overlay-text">
            	
            </div>
            
            <div style="clear: both;"></div>
    </div>
    <div style="clear: both;"></div>
</div>

<div class = "col-md-12 mb25">
    <h3>Your Appointments</h3>
    <div class="title-divider"></div>
    <form method="post" id="appSortOrder" action="">
        <label>Sort By</label>
        <select class="form-control" name="sortOrder">
            <option value="1" <?php if($_POST['sortOrder'] == 1){ ?> selected <?php } ?> >Date</option>
            <option value="2" <?php if($_POST['sortOrder'] == 2){ ?> selected <?php } ?>>Empty Apps</option>
            <option value="3" <?php if($_POST['sortOrder'] == 3){ ?> selected <?php } ?>>Venue</option>
        </select>
        <button type="submit" class="btn btn-primary mt10">Sort</button>
    </form>
    
    
    <div class="title-divider"></div>
</div>

<div class="col-md-12 mb25 scroll " style="max-height:350px;">
    		<div class="col-md-12" style="background-color:#337AB7; height:5px; border-top-right-radius:10px; border-top-left-radius:10px; margin-bottom:-2px;"></div>
            <table class="table table-responsive ">  
                <tbody>
                
                		<tr class="appbook-header">
							<td>Expert</td>
							<td>Date/Time</td>
							<td>Slot Duration</td>
							<td>Venue</td>
							<td>View Details</td>
						</tr>
                
                	<?php 
					
					foreach($selectApps as $header => $value) { 
                
						$client = $conn->execute_sql("select", array("*"), "c_clients", "cc_id=?", array("i" => $selectApps[$header]['eap_cc_id']));
						$venue = $conn->execute_sql("select", array("*"), "venues", "v_id=?", array("i" => $selectApps[$header]['eap_v_id']));
						
						$newRequestDate = new DateTime($selectApps[$header]['eap_date']);
						$appDateFormat = $newRequestDate->format('d-m-Y - h:i');
														 
					?>
			 
						<tr>
                        <?php if($selectApps[$header]['eap_cc_id'] == 0) { ?>
                        	<td>No Client Currently Assigned</td>
                        <?php } else {  ?>
							<td><?php echo $client[0]['cc_firstname'] . " " . $client[0]['cc_surname']; ?></td>
                        <?php } ?>
							<td><?php echo $appDateFormat; ?></td>
							<td><?php echo $selectApps[$header]['eap_timeslot']; ?> minutes</td>
							<td><?php echo $venue[0]['v_name']; ?></td>
							<td><button id="mro-app-view:<?php echo $selectApps[$header]['eap_id']; ?>" class="btn btn-default show-overlay"><i class="fa fa-lg fa-edit"></i></button>
                            <button id="mro-booking2:<?php echo $selectApps[$header]['eap_id']; ?>" class="btn btn-default show-overlay"><i class="fa fa-lg fa-plus"></i></button></td>
                            
						</tr>
                        
                    <?php } ?>
                
                </tbody>
            </table>
    
    </div>

</div>