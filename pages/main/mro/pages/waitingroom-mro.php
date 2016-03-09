	<?php 
        if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
        else {$btncolor = "btn btn-success";}
    ?>


<script type="text/javascript" src="<?php echo _ROOT ?>/js/waitingroom-mro-map.js"></script>


<!-- USER DETAILS MODAL -->
<div id="overlay" style = "margin-top:300px" >
    <div id="overlay-content" class="ro">
        <div id="close" style="background-color:#337AB7"><button type="button" class="close" ><p>Close <i class = "fa fa-lg fa-times"></i></p></button></div>
            <div id="overlay-title">
            	<h3>User Details</h3>
            </div>
            
            <div id="overlay-text">
            	
            </div>
            
            <div style="clear: both;"></div>
    </div>
    <div style="clear: both;"></div>
</div>


<body id = "add">
        <!-- Content -->	
        <div class= "container">

            
    <div class="col-md-12 mb10">              
        <h3 class="textshadow" >Waiting Room</h3>
        <div class="title-divider"></div>
    </div> 
    		
            
            <div style = "display:none">
				<div style = "display:none" id="map_canvas" style="width:100%; height:100px;"></div>
            </div>
            
             <form id = "mro-request-form" action="" method="post" enctype="multipart/form-data" >	

            
                <div class="col-lg-12"> 
               
                    <div class="panel panel-default"><!-- Panel Container -->
                      <div class="panel-heading"><h4>Request an Appointment</h4></div>
                      <div class="panel-body">
                        
                        <p class = "col-md-12">
                        	The Waiting Room lets you request specific appointments. When experts book these appointments you will be 
                        	notified and given the option to accept or reject. You can also scroll down and view all your requested
                        	appointments currently in the waiting room with options to edit or cancel them.
                        </p>
                      
                     <div class="col-lg-6"><!-- Left Side -->
                     
                     <label>Patient Forename:</label>
                     <input id = "pForename" name="pForename" type="text" class="form-control" required />
                     
                     <label>Patient Surename:</label>
                     <input id = "pSurname" name="pSurname" type="text" class="form-control" required />
                     
                     <label>Contact Number:</label>
                     <input id = "pContact" name="pContact" type="text" class="form-control" required />    
                     
                     <label>House Number:</label>
                     <input id = "houseNo" name="houseNo" type="text" class="form-control" required />
                     
                     <label>Postcode:</label>
                     <input id = "line1" name="line1" type="text" class="form-control" autocomplete="off" required />
                     
                    <input type="hidden" name = "v_latitude" id = "v_latitude" value = "" />
                    <input type="hidden" name = "v_longitude" id = "v_longitude" value = "" />
                     
                    <!--<label>Expert Speciality:</label>
                        <select class="form-control"><?php /*foreach($selectOption as $header => $value)
                        {echo "<option id=\"specialist\" name=\"" . $selectOption[$header]['e_type'] . "\">" . $selectOption[$header]['et_type'] . "</option>";}*/?></select> -->
                        
                    </div><!-- Left Side Close -->
                    
                   <div class="col-lg-6">
                   
                   <label>Patient Date of Birth:</label>
                    <div id = "date1" class="input-group date">
                        <input  class="form-control" id="date-picker-ven" name="date-picker-dob" value="<?php echo date("d-m-Y");?>" 
                        type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                    </div>  
                   
                    <label>Radius:</label>
                    <select class="form-control" id="radiusFromLocation" name="radiusFromLocation">
                      <?php for($i = 0;  $i < 100;) { $i = $i + 5; ?>
                         <option name="<?php echo $i; ?>" value="<?php echo $i; ?>"><?php echo $i . " Miles"; ?></option>
                      <?php } ?>
                    </select>
                        
                    <label>Date Preference:</label>
                    <div id = "date1" class="input-group date">
                        <input  class="form-control" id="date-picker-ven" name="date-picker-ven1" value="<?php echo date("d-m-Y");?>" 
                        type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                    </div>  

                        
					<label>Times after:</label>
                     <select class="form-control" id="appointmentTimeAfter" name="appointmentTimeAfter">
                    	 <?php for($i = 5;  $i < 9;) { $i++; ?>
                    		 <option name="<?php echo "0" . $i . ":00:00"; ?>" value="<?php echo "0" . $i . ":00:00"; ?>"><?php echo $i . ":00 AM"; ?></option>
                    	 <?php } ?>
                         <?php for($i = 9;  $i < 12;) { $i++; ?>
                    		 <option name="<?php echo $i . ":00:00"; ?>" value="<?php echo $i . ":00:00"; ?>"><?php echo $i . ":00 AM"; ?></option>
                    	 <?php } ?>
                         <?php for($i = 12;  $i < 21;) { $i++; ?>
                    		 <option name="<?php echo $i . ":00:00"; ?>" value="<?php echo $i . ":00:00"; ?>"><?php echo $i . ":00 PM"; ?></option>
                    	 <?php } ?>
                     </select>
                     
                     <label>Times before:</label>
                     <select class="form-control" id="appointmentTimeBefore" name="appointmentTimeBefore">
                     	 <?php for($i = 5;  $i < 9;) { $i++; ?>
                    		 <option name="<?php echo "0" . $i . ":00:00"; ?>" value="<?php echo "0" . $i . ":00:00"; ?>"><?php echo $i . ":00 AM"; ?></option>
                    	 <?php } ?>
                         <?php for($i = 9;  $i < 12;) { $i++; ?>
                    		 <option name="<?php echo $i . ":00:00"; ?>" value="<?php echo $i . ":00:00"; ?>"><?php echo $i . ":00 AM"; ?></option>
                    	 <?php } ?>
                    	 <?php for($i = 12; $i < 21;) { $i++; ?>
                    		 <option name="<?php echo $i . ":00:00"; ?>" value="<?php echo $i . ":00:00"; ?>"><?php echo $i . ":00 PM"; ?></option>
                    	 <?php } ?>
                     </select>
                         
                        <!--
                            <div class = "col-md-4 mt25">
                                <img src = "images/pic1.jpg" class="img-responsive">
                            </div>
                        -->
                        
                        <div class = "col-md-12 mt25 ">
                            <input id="request-btn" type="submit" value="Submit Request" class="<?php echo $btncolor; ?> btn btn-lg col-md-12" />
                            <div id="success"></div>
                        </div>          
                        
                        
 						
                    </form>
                    
                  </div>
                  
                </div><!-- Panel Close -->
                  
                </div>
                    <div class="panel panel-default"><!-- Panel Container -->
						<div class="panel-heading"><h4>Your Appointment Requests</h4></div> 
                                                                              
                          <div class="panel-body">
                             <div class="col-md-12" id = "results-anchor"><!-- Content -->
                             
                             	<?php include("./includes/mro/list-app-requests.php");?>
                             
                             </div><!-- Content Close -->
                          </div>
					</div><!-- Panel Close -->


	</div>  
</div>  
<!-- Container Close -->
</body>


