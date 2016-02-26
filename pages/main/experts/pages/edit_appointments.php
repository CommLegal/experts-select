 	<div class="container mb25">
       
            	<div class = "col-md-12 mb25 pb25 formbg">
                <div class = "col-md-12"><h3>Edit Appointments</h3><hr /></div>


                   <!-- <form method="post" action=""> -->
                   <form action="" method="post" enctype="multipart/form-data" name="expert-booking-stats" id="expert-booking-stats" role="form">	
                    
                    
                    
                        <div class = "col-md-3">    
 							<label for ="add-app-start">Before:</label>
                            <div class="input-group date">
                              <input id="date-picker-ven" class="beforedate" type="text" name="e_appointments--eap_date_before" value="<?php echo date("d-m-Y");?>">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>

                        
                        <div class ="col-md-3">    
 							<label for ="add-app-end">After:</label>
                            <div class="input-group date">
                              <input id="date-picker-ven" class="afterdate" type="text" name="e_appointments--eap_date_after" value="">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div> 
                        </div>
                        
						<div id="appointmentSelection" class="col-md-12" style="display:none;">
                        	<label class="control-label">Appointment</label>
                            
                            <select name="appointment_id" id="appointment_id" class="venue-box mb25">
                                <option id="appointment_options" name="appointment_options" onclick="loadList">Select Appointment</option>
                            </select>
                            
                         <button id="get-appointment-details" type="submit" class = "btn btn-default"> Edit &nbsp;<i class="fa fa-pencil"></i></button>
                         
                         </div> 
                        </div>
                          
                    </form>

                    </div>

				<div id="appointment-details" class="col-md-12 formbg"></div>
