<?php	
	//START - TURN ERRORS ON
	ini_set('display_errors',0);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	//END - TURN ERRORS ON
?>

    <div class="container mb25">
    	<div class="jumbotron">
          <h2>Welcome back <?php echo $userDetails['ea_forename'] ?></h2>
          Since your last log-in on <?php echo $userDetails['ea_last_login'] ?>, the world hasn't ended.
        </div>
       <!-- <div class="bgtrans nop col-md-2 bg-blue"><!-- Big nest -->
       
            <?php 
			
			//var_dump($_SESSION);

				/*if($_SESSION['CME_USER']['type'] == "expert") {
					require("pages/menus/expert.php");	
				} */
				
								$todaydate = date('Y-m-d');
								
								$tomorrow = new DateTime('tomorrow');
								$tomorrowdate = $tomorrow->format('Y-m-d');

								$yesterday = new DateTime('yesterday');
								$yesterdaydate = $yesterday->format('Y-m-d');	
								
								$thisDate = date('Y-m-d');
								
								$_SESSION['date_selection'] = $thisDate;
								
								echo $_SESSION['date_selection'];
								
       		 ?>
            
                <div class="col-md-12">
                                           
                    <!-- BOTTOM BOX -->
                    <div class="col-md-12">
                        <h3 class="midd">
                            <button onclick="leftclick()" class="fa fa-arrow-circle-o-left pull-left"></button>
                            <span class="glyphicon glyphicon-calendar"></span> Appointments: <span class='dateviewing'><?php echo $todaydate ?></span>
                            <button onclick="rightclick()" class="fa fa-arrow-circle-o-right pull-right"></button>
                        </h3>
                    <br />
                    
                            <a href="#" id="hide-expert-apps"><i class="fa fa-eye-slash"></i>&nbsp;Hide Empty Appointments</a>
                            <a href="#" id="show-expert-apps"><i class="fa fa-eye"></i>&nbsp;Show Empty Appointments</a>
                            </br></br>
                    	</div>
                    </div>
                    
                    <!-- Appointments list -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php 
							

								//$appArray = array(0 => "10:10", 1 => "10:20", 2 => "11:30", 3 => "11:25")
								$appArray = $conn->execute_sql("select", array("eap_id", "eap_date"), "e_appointments", "eap_date >= ? AND eap_date <= ? order by eap_date", array("s1" => $_SESSION['date_selection'] . " 00:00:00", "s2" => $_SESSION['date_selection'] . " 11:59:59"));
								
								$app_slot = 5;
								$last_slot = 60 - $app_slot;
								
                                for($i=6; $i<=21; $i++) {
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
                                            
                                            <div class="col-md-<?php echo $active[0] ?> app-box <?php echo $active[1] ?> midd"><a href="#" id="appointment-details" value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) . ":00" ?>" data-toggle="modal" data-target="#expert-check-appt" class="<?php echo $class ?>" title="Eg, Egg and Eggy">
											<?php echo str_pad($i, 2, '0', STR_PAD_LEFT) . ":" . str_pad($j, 2, '0', STR_PAD_LEFT) ?></a></div>
                                            
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
    </div><!-- end of container -->
</div> 


<script>

	function leftclick() { 
		<?php $_SESSION['date_selection'] = $yesterdaydate; ?>
	}
	
	//function leftclick() {
	//	$(".dateviewing").append("<?php echo $yesterdaydate ?>");
	//}
	
	function rightclick() {
		$(".dateviewing").append("<?php echo $tomorrowdate ?>");
	}
</script>