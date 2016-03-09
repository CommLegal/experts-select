<?php 

	if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
	else {$btncolor = "btn btn-success";}
?>

<div id="overlay" >
    <div id="overlay-content">
        <div id="close"><button type="button" class="close" ><p>Close ×</p></button></div>
        
        
            <div id="overlay-title">
            	<p>Venue Selection</p>
            </div>
            
            <div id="overlay-text">
            	
            </div>
            
            <div style="clear: both;"></div>
    </div>
    <div style="clear: both;"></div>
</div>

<div class="container mb25">
    <div class="col-md-12 formbg pb25">
    <div class="messages"></div>
   <form action="" method="post" enctype="multipart/form-data" name="expert-add-app" id="expert-add-app" role="form">	
            <h3 class="">Add Appointments</h3>	
            <div class = "alert alert-info"><p><i class = "fa fa-lg fa-info"></i> &nbsp; <span id = "helper">Hover over a section for information.</span></p></div>
            <div class="title-divider"></div>		  			
            <div class="form-group">
            
                <div class="col-md-3" id = "appDate">
                    <div class="col-lg-12" >
                        <h4><span class="glyphicon glyphicon-calendar"></span>&nbsp;Choose Date</h4> 
                        <p class="addappbox">Click below to select a date. Please be sure to check this date is suitable in advance.</p>
                        <label for"add-app-start">Date</label>
                        <div class="input-group date">
                          <input id="date-picker-ven" type="text" name="e_appointments--eap_date" value="<?php echo date("d-m-Y");?>">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>
                </div>

				<div class = "col-md-3" id = "MRO">
                        <h4><i class="fa fa-user-md"></i>&nbsp;Select your MRO</h4>
                        <p class="addappbox">Add your chosen MRO.</p>
                        <label for"add-app-start">MRO</label>
                        <select name="mro_id" id="mro_id" class="venue-box" autofocus>     
                        	<option id="ma_options" name="ma_options" value="0" selected>Select MRO</option>
                        </select>
                    </div>


                <div class="col-md-3" id = "venue">
                    <div class="col-lg-12">
                        <h4><i class="fa fa-map-pin"></i>&nbsp;Select your venue</h4>
                         <p class="addappbox">Add previously used venues or search for venues used by other experts. Alternatively create a new one.</p>
                        <label for"add-app-start">Venue</label>
                    	<select name="venue_id" id="venue_id" class="venue-box">
                          <option id="v_options" name="v_options" value="0">Select Venue</option>
                        </select>
                        <button type="button" class="<?php echo $btncolor; ?> mt25 col-md-12" data-toggle="modal" data-target="#expert-add-venue">
                        <i class="fa fa-map-marker"></i>&nbsp;&nbsp;Add Venue</button>

                  </div>
                </div>
                
  					
                
                <div class="col-md-3" id = "time">
                    <div class="col-lg-12">
                        <h4><span class="glyphicon glyphicon-time"></span>&nbsp;Appointment Time(s)</h4>
                         <p class="addappbox">Select a timeframe and you will be presented with slots between those intervals to select from.</p>
                         
                        <label for"add-app-freq">Time Slot</label>
                        
                        <select name="add-app-freq" id="add-app-freq" class="venue-box">
                          <option value="5">5 Minutes</option>
                          <option value="10">10 Minutes</option>
                          <option selected value="15">15 Minutes</option>
                          <option value="20">20 Minutes</option>
                          <option value="30">30 Minutes</option>
                        </select>
                        
                        <label for"add-app-start">Start Time</label>
                        <select name="add-app-start" id="add-app-start" class="venue-box">
                          <option>First Appointment</option>
							  <?php
                              for($i = 6; $i <= 20; $i++) {
                                  echo "<option value=\"" . $i . "\">" . str_pad($i, 2, '0', STR_PAD_LEFT) . ":00</option>";
                              }
							  
							  
                              ?>
                        </select>

                        <div id="end-time"></div>
                          
                        <button class="<?php echo $btncolor; ?> mt25 col-md-12 mb10" id="app-slot-generate" style="display:none;">
                        	<span class="glyphicon glyphicon-time"></span>
                        	&nbsp;Generate
                        </button>
                        
                    </div>
						
                </div>

                <div class="select-app-slots"></div>
                
                <div class="col-md-12">
                
                <div class="title-divider"></div>
                
                <div id="success-message"></div>
                
                    <button class="<?php echo $btncolor; ?> mt10 btn-lg app-form-submit pull-right" href="index.php?page=appointments&action=add">
                      Submit &nbsp;<i class="fa fa-lg fa-check"></i>
                    </button>
                    
                </div>
                
            </div>
                <input type="hidden" name="form_type" value="expert_app" />
            </form>
     </div> 
</div>

<script src="<?php echo _ROOT ?>/js/custom.js" type="text/javascript">
		selectDropdown();
		alert("true");
</script>

<script>

	$("#appDate").hover(function() {
		$("#helper").html("Start by choosing a date for your appointment. Make sure it's suitable!");
	});
	$("#MRO").hover(function() {
		$("#helper").html("Choose an organization to book your appointment with.");
	});
	$("#venue").hover(function() {
		$("#helper").html("Select a location for your appointment. You can create your own using the 'Add Venue' button. ");
	});
	$("#time").hover(function() {
		$("#helper").html("Select a time slot, this will be your appointment duration. Then choose a start/end time and click 'Generate'.");
	});
	$(".select-app-slots").hover(function() {
		$("#helper").html("Select the timeslots within the hour here. Click 'Submit' to book the appointment.");
	});
	
	$(".show-overlay").click(function(e) {
		$("#overlay").show();
		$("#overlay #overlay-content #overlay-title").text($(this).attr("title"));
		var pageValues = $(this).attr("id").split(":");
		
		var callPage = pageValues[0];
		var callValues = pageValues[1];
		
		$.post( "pages/popup-call.php", { 
						callPage: callPage,   
						callValues: callValues
		})
		.done(function( data ) {
						$("#overlay #overlay-content #overlay-text").html(data);
		});
	});
	
	$("#close").click(function(e) {
		$("#overlay").hide();
	});
	
</script>
