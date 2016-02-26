<div class="container main mb25">
	<div class="col-md-12 mb25">
		<h3>Appointment Book</h3>  
        <div class="title-divider"></div>                
	</div>
    <form action="" method="post" enctype="multipart/form-data" name="expert-add-app" id="expert-add-app" role="form">	
        <div class="col-lg-6">
            <p>Click below to view available appointment date. Please be sure to check this date is suitable well in advance.</p>
            <div class="input-group date">
                <input id="date-picker-ven" name="e_appointments--eap_date" value="<?php echo date("d-m-Y");?>" type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>
            </br></br>
        </div>
    </form>
        
	<div class="col-md-12 formbg">
		<?php	
			//START - TURN ERRORS ON
			ini_set('display_errors',0);
			ini_set('display_startup_errors',1);
			error_reporting(-1);
			//END - TURN ERRORS ON
			
			$todaydate = date('Y-m-d');
			
			$tomorrow = new DateTime('tomorrow');
			$tomorrowdate = $tomorrow->format('Y-m-d');

			$yesterday = new DateTime('yesterday');
			$yesterdaydate = $yesterday->format('Y-m-d');	
										
         ?>
				   
						<div class="col-md-12">
												   
							<!-- BOTTOM BOX -->
							<div class="row col-md-12"><div class="glyphicon glyphicon-refresh"></div><a href="#" id="hide-expert-apps">&nbsp;Hide Taken Appointments</a><a href="#" id="show-expert-apps">&nbsp;Show Taken Appointments</a></div></br></br></div>
							<!-- Appointments list -->
							<div class="row">
                        <div class="col-md-12">
                       
                            <?php 
							

								//$appArray = array(0 => "10:10", 1 => "10:20", 2 => "11:30", 3 => "11:25")
								$appArray = $conn->execute_sql("select", array("eap_id", "eap_date"), "e_appointments", "eap_date >= ? AND eap_date <= ? order by eap_date", array("s1" => $todaydate . " 00:00:00", "s2" => $todaydate . " 11:59:59"));
								
								$app_slot = 5;
								$last_slot = 60 - $app_slot;
								
                                for($i=9; $i<=18; $i++) {
                                    ?>
                                    	<div style="clear: both;"></div>
                                        <div class="columnBorder">
                                            <div class="col-md-1"><h4 class="app-time"><?php echo (($i < 13) ? $i . " AM" :  (($i > 12) ? $i - 12 : $i - 11) . "PM") ?></h4></div>
                                            <div style="clear: both;"></div>
                                            
											<?php 
												for($j=0; $j<=$last_slot; $j+=$app_slot) {
													//$j+=2;
													$avail_slots = 60 / $app_slot;
													//$cols = 12;											
											?>
                                            
                                            <?php 
											$class = $expert->check_appointment(str_pad($i, 2, '0', STR_PAD_LEFT).":".str_pad($j, 2, '0', STR_PAD_LEFT), $appArray, $app_slot);
											$active = explode("-", $class);
											?>
                                            
                                            <div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?>-taken midd"><a href="#" id="appointment-details" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" data-toggle="modal" data-target="#expert-check-appt" class="<?php echo $class ?>-taken" title="Eg, Egg and Eggy">
											<?php echo str_pad(9, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
                                            
                                            <?php
												$j+= $app_slot * ($active[0] - 1);
												$count++;
												}
                                            ?>
                                            
                                            <div style="clear: both;"></div>
                                        </div>
                                    <?php	
                                }
                            ?>
                         </div>
                    </div> <!-- row -->
						</div>
									
		   <!-- tab content -->
	</div>
        
</div>