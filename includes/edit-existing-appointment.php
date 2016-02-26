<?php
//START - TURN ERRORS ON
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//END - TURN ERRORS ON

//START DB CONNECTION
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$queriedApp = $conn->execute_sql("select", array("*"), "e_appointments JOIN venues ON eap_v_id = v_id ", "eap_id=?", array("i" => $_POST['appointment_id']));

$appointmentTime = substr($queriedApp[0]['eap_date'], 11);

$appointmentDate = substr($queriedApp[0]['eap_date'], 0, 10);
 
$newAppointmentDate = date("d-m-Y", strtotime($appointmentDate));

?>
 
		<form id="addVenueForm" name="form1" method="POST" action="">  
        
	  			  <div style = "col-md-12"> 
                  	<h3>Details</h3>
                  </div> 

				  <div class="col-md-6">
                  
                  		  <label for="new-venue_id" class="control-label">Edit The Venue</label>
                  		  <select name="new-venue_id" id="new-venue_id" class="venue-box">
                          	<option id="v_options" name="<?php echo $queriedApp[0]['v_id'] ?>" value="<?php echo $queriedApp[0]['v_id'] ?>" onclick="loadList"><?php echo $queriedApp[0]['v_name'] . " - Current Venue" ?></option>
                          </select>
                  		  
                          <label for="v_name" class="control-label">Venue Name</label>
                          <input type="name" name="v_name" id="v_name" class="form-control" value="<?php echo $queriedApp[0]['v_name'] ?>" disabled />
    
                          <label for="v_telephone" class="control-label">Telephone</label>
                          <input type="text" name="v_telephone" id="v_telephone" class="form-control" maxlength="11" value="<?php echo $queriedApp[0]['v_telephone'] ?>" disabled />
                        
                          <label for="v_email" class="control-label">Email</label>
                          <input type="email" name="v_email" id="v_email" class="form-control" value="<?php echo $queriedApp[0]['v_email'] ?>" disabled />
                        
                          <label for="v_address1" class="control-label">Venue Address</label>
                          <input type="text" name="v_address1" id="v_address1" class="form-control mb10" value="<?php echo $queriedApp[0]['v_address1'] ?>" disabled />
                          <input type="text" name="v_address2" id="v_address2" class="form-control mb10" value="<?php echo $queriedApp[0]['v_address2'] ?>" disabled />
                          <input type="text" name="v_address3" id="v_address3" class="form-control" value="<?php echo $queriedApp[0]['v_address3'] ?>" disabled />
                          
						  <label for="v_city" class="control-label">City</label>
                          <input type="text" name="v_city" id="v_city" class="form-control" value="<?php echo $queriedApp[0]['v_city'] ?>" disabled />
                        
                          <label for="v_postcode" class="control-label">Postcode</label>
                          <input type="text" name="v_postcode" id="v_postcode" class="form-control" value="<?php echo $queriedApp[0]['v_postcode'] ?>" disabled />
                        
                          <label for="v_description" class="control-label">Description</label>
                          <input type="text" name="v_description" id="v_description" class="form-control mb50" value="<?php echo $queriedApp[0]['v_description'] ?>" disabled />

                   </div>
                   
                   <div class="col-md-6">
                   
                   		  <input type="hidden" id="appointmentId" value="<?php echo $_POST['appointment_id']; ?>"  />
                          
						<div class = "col-md-6">
                          <label for"v_disabled_access" class="control-label">Disabled Access</label>
                          
                          <div class="v_disabled_accessRadio"><input name="v_disabled_access" id="v_disabled_accessYes" 
                          value="Yes" type="radio" <?php if($queriedApp[0]['v_disabled_access'] == "Y") { echo "checked"; } ?> disabled  />
                         
                          <label for="v_disabled_accessYes">Yes</label>&nbsp;&nbsp;<input name="v_disabled_access" id="v_disabled_accessNo" 
                          value="No"  type="radio"<?php if($queriedApp[0]['v_disabled_access'] == "N") { echo "checked"; } ?> disabled />
                          
                          <label for="v_disabled_accessNo">No</label></div> 
                          
                          <label class= "mt25">Current Appointment Date</label> <br />
                          
                          <input type="text" name="old-dateU" value="<?php echo $newAppointmentDate ?>" disabled>
                                                    
                          <br />
                          
                          <label class= "mt25">New Appointment Date</label> <br />
                          
                          <div class="input-group date">
                          	<input id="date-picker-ven" class="newdate" type="text" name="edited-date" value="<?php echo $newAppointmentDate; ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                          </div>
                          
                          
                        </div>
                        
                        <div class = "col-md-6">
                        
                            <label class= "mt25">Old Appointment Time</label>
                            
                            <br />
                            
                            <input id="eap_olddate"  name="eap_olddate" value="<?php echo $appointmentTime; ?>" disabled/>
                            
                            <br />
                            
                            <label class= "mt25">New Appointment Time</label>
                            
                            <br />
                            
                            <select id="eap_newtimehour" name="eap_newtimehour">
                            	<option value="06:">6 AM</option>
                                <option value="07:">7 AM</option>
                                <option value="08:">8 AM</option>
                                <option value="09:">9 AM</option>
                                <option value="10:">10 AM</option>
                                <option value="11:">11 AM</option>
                                <option value="12:">12 PM</option>
                                <option value="13:">1 PM</option>
                                <option value="14:">2 PM</option>
                                <option value="15:">3 PM</option>
                                <option value="16:">4 PM</option>
                                <option value="17:">5 PM</option>
                                <option value="18:">6 PM</option>
                                <option value="19:">7 PM</option>
                                <option value="20:">8 PM</option>
                                <option value="21:">9 PM</option>
                            </select>
                            
                            <select id="eap_newtimeminute" name="eap_newtimeminute">
										<option value="00:00">00</option>
								<?php 
									while($i<59) { $i++;  ?> 
										
                                        <option value="<?php if($i < 10){ echo '0'; } echo $i . ':00'; ?>"><?php if($i < 10){ echo '0'; } echo $i; ?></option>
								<?php } ?>
                            </select>
                            
                            <!-- <input name="eap_newtime" placeholder="Format - 06:05:00" /> -->
                            
                            <br />
                            
                            <label class= "mt25">Appointment Duration (Minutes)</label>
                          
                              <br />
                              
                              <select id="appointment-duration" name="appointment-duration">
                                <option value="5"  <?php if($queriedApp[0]['eap_timeslot'] == 5 ) {?> selected <?php } ?> >5 Minutes</option>
                                <option value="10" <?php if($queriedApp[0]['eap_timeslot'] == 10) {?> selected <?php } ?> >10 Minutes</option>
                                <option value="15" <?php if($queriedApp[0]['eap_timeslot'] == 15) {?> selected <?php } ?> >15 Minutes</option>
                                <option value="20" <?php if($queriedApp[0]['eap_timeslot'] == 20) {?> selected <?php } ?> >20 Minutes</option>
                                <option value="25" <?php if($queriedApp[0]['eap_timeslot'] == 25) {?> selected <?php } ?> >25 Minutes</option>
                                <option value="30" <?php if($queriedApp[0]['eap_timeslot'] == 30) {?> selected <?php } ?> >30 Minutes</option>
                              </select>
                        
                        </div>
                          
                       	<div class = "col-md-12">
                       
                          
                          
                          <br />
                          
                         <label class= "mt25">Appointment Notes</label>
                          
                          <textarea id="eap_notes" rows = "13" class="col-lg-12 pb25 mb25" name="eap_notes"><?php echo $queriedApp[0]['eap_notes'] ?></textarea>
                          
						  <br />
                          
                          <input id="eap_id" name="eap_id" type="hidden" value="<?php echo $queriedApp[0]['eap_id'] ?>" />
                          
                           <button class="btn btn-success btn-lg col-md-12 mb25" type="submit" name="editedAppointmentSubmit" id="editedAppointmentSubmit">  
                          Save  &nbsp;<i class = "fa fa-lg fa-save"></i></button>
                          
                         
                          
                          <div id="succesful-message">
                          
                          </div>
                          
                          </div>
                          
                        </div>
                        
                        <div id="new-venue-details" class="col-md-12 formbg"></div>

             </form>
             
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    		 <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="<?php echo _ROOT ?>/js/custom.js"></script>
            <!-- <script src="<?php echo _ROOT ?>/js/bootstrap.min.js"></script>
			 <script src="<?php echo _ROOT ?>/js/bootstrap-datepicker.js"></script>
             <script src="<?php echo _ROOT ?>/locales/bootstrap-datepicker.en-GB.min.js"></script>-->
        
             <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
             <script src="<?php echo _ROOT ?>/js/ie10-viewport-bug-workaround.js"></script>
    