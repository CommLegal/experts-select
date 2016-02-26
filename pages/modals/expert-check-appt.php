<!-- Modal -->
	<div id="expert-check-appt" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
			<div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Appointment Slot</h4>
                  </div>
                <div id="modal-form-venue">
    				<label for"cf-name">First Name: </label>
					<?php 
					$appInfo = $conn->execute_sql("select", array("eap_date", "eap_v_id", "eap_timeslot"), "e_appointments", "eap_date = ?", array("s1" => "2015-10-21 09:15:00")); 
					var_dump($appInfo);
					
																$class = $expert->check_appointment(str_pad($i, 2, '0', STR_PAD_LEFT).":".str_pad($j, 2, '0', STR_PAD_LEFT), $appArray, $app_slot);
											$active = explode("-", $class);
					?>
                    </br></br>
                    <label for"cl-name">Last Name: </label>
                    </br></br>
                    <label for"c-number">Contact Number: </label>
                    </br></br>
                    <label for"c-email">Email Address: </label>
                    </br></br>
                    <label for"c-venue">Venue: </label>
                    </br></br>
                    <label for"c-ts">Time Slot: </label>
                    </br></br>
                    <label for"c-ad">Appointment Duration: </label>
                    </br></br>
                    <button type="button" class="close" data-dismiss="modal"><p>Close &times;</p></button>
                    </br></br>
                </div>
            </div>
	  </div>
	</div>