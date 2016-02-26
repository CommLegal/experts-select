    <div class="container mb25">
    	<div class="col-md-12 formbg">
        <div class="messages"></div>
       <form action="" method="post" enctype="multipart/form-data" name="expert-add-app" id="expert-add-app" role="form">	
				<h3>Add Appointments</h3>			  			
				<div class="form-group">
                	<div class="col-md-3">
                        <div class="col-lg-12">
                        	<h4><span class="glyphicon glyphicon-calendar"></span>&nbsp;Choose Date</u></h4> 
                            <p>Choose a date, possibly don't need this as it's obvious but it makes it balanced.</p>
                            <div class="input-group date">
                              <input type="text" name="e_appointments--eap_date"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
							
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                    	<div class="col-lg-12">
                            <h4><span class="glyphicon glyphicon-hand-up"></span>&nbsp;Select your venue</h4>
                            <p>Add previously used venues or search for venues used by other experts. Alternatively, add a new one.</p>
                        <select name="e_appointments--eap_v_id" id="e_appointments--eap_v_id" class="venue-box">
                              <option>select venue</option>
                            </select><br /><br />
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#expert-add-venue"><i class="fa fa-user"></i>&nbsp;&nbsp;Add Venue</button>
                      </div>
                    </div>
                    
                    <div class="col-md-3">
                    	<div class="col-lg-12">
                        	<h4><span class="glyphicon glyphicon-time"></span>&nbsp;Appointment Time(s)</h4>
                            <label for"add-app-freq">Time Slot</label>
                            <select name="add-app-freq" id="add-app-freq" class="venue-box">
                              <option value="">Select</option>
                              <option value="5">5 Minutes</option>
                              <option value="10">10 Minutes</option>
                              <option value="15">15 Minutes</option>
                              <option value="20">20 Minutes</option>
                              <option value="30">30 Minutes</option>
                            </select>
                            <p>Please select a timeframe and you will be presented with timeslots between those intervals to select from.</p>
                            <label for"add-app-start">Start Time</label>
                            <select name="add-app-start" id="add-app-start" class="venue-box">
                              <option>First Appointment</option>
                              <?php
							  for($i = 9; $i <= 17; $i++) {
								  echo "<option value=\"" . $i . "\">" . str_pad($i, 2, '0', STR_PAD_LEFT) . ":00</option>";
							  }
							  ?>
                            </select>
                            <label for"add-app-start">End Time</label>
                            <select name="add-app-last" id="add-app-last" class="venue-box">
                              <option>Last Appointment</option>
                              <?php
							  for($i = 9; $i <= 17; $i++) {
								  echo "<option value=\"" . $i . "\">" . str_pad($i, 2, '0', STR_PAD_LEFT) . ":00</option>";
							  }
							  ?>
                            </select>
                            <a id="app-slot-generate">Generate</a>
                            <div class="select-app-slots"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                    	<div class="col-lg-12 midd prom-box">
                           	<a href="" class="app-form-submit">Submit<span class="glyphicon glyphicon-ok-sign"></span></a>
                        </div>
                    </div>
                    
            	</div>
                	<input type="hidden" name="form_type" value="expert_app" />
                </form>
         </div> 
    </div>