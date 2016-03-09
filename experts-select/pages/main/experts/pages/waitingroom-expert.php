	<?php 
        if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
        else {$btncolor = "btn btn-success";}
    ?>
    



<div id="overlay" style="margin-top:260px;" >
    <div id="overlay-content">
        <div id="close"><button type="button" class="close" ><p>Close <i class = "fa fa-lg fa-times"></i></p></button></div>
        
        
            <div id="overlay-title">
            	<p>Appointment Confirmation</p>
            </div>
            
            <div id="overlay-text">
            	
            </div>
            
            <div style="clear: both;"></div>
    </div>
    <div style="clear: both;"></div>
</div><!-- Content -->	

 
<div class= "container">
            
    <div class="col-md-12 mb10">              
        <h3 class="textshadow" >Waiting Room</h3><div class="title-divider"></div>
    </div> 
            
            
           <form action="" method="post" enctype="multipart/form-data" name="expert-waiting-room" id="expert-waiting-room" role="form">	

                <div class="col-lg-12"> 
                    <div class="panel panel-default"><!-- Panel Container -->
                      <div class="panel-heading"><h4>Find Appointment Requests</h4></div>
                      <div class="panel-body">
                     <div class="col-lg-6"><!-- Left Side -->

                    <p>
                        The Waiting Room lets you pick specific appointments set by MROs. If you book through here you will
                        be notified as soon as the MRO has responded to the request. 
                    </p>

                    <label>Venue:</label>
                       <select name="venue_id" id="venue_id" class="form-control venue-box">
                          <option id="v_options" name="v_options" value="1" onClick="loadList">Select Venue</option>
                        </select>
                        
                    <label>Radius:</label>
                        <input type="text" class="form-control venue-box" name="search_radius" id="search_radius" value="" autofill="off" />
   
                    <label>Appointments After:</label>
                        <div class="input-group date">
                            <input id="date-picker-ven" name="e_appointments--eap_date_after" class="form-control afterdate" value="<?php echo date("d-m-Y");?>" 
                            type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>  
                    <label>Appointments Before:</label>
                        <div class="input-group date">
                            <input id="date-picker-ven" name="e_appointments--eap_date_before" class="form-control beforedate" value="<?php echo date("d-m-Y");?>" 
                            type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>  

                        <span type = "submit" class = "mt25 <?php echo $btncolor; ?>" id="request_appointment">Find Appointment &nbsp;<i class="fa fa-search"></i></span>
                        
                    </form>
                        
                    </div><!-- Left Side Close -->

                        
                        <div class = "col-md-6">
                        	<div id="map" class = "col-md-12" style="height:550px;"></div>
                        </div>

                  </div><!-- Panel Close -->
                  
                	<div id="success"></div>
                </div>
               
                    <div class="panel panel-default"><!-- Panel Container -->
						<div class="panel-heading"><h4>MRO Appointment Requests</h4></div> 
                                                                              
                          <div class="panel-body">
                             <div id="helo" class="col-lg-12"><!-- Content -->
                             	<div id="app-times" class="col-lg-12">
								
                                 <!-- 
                                 YOUR CODE GOES HERE to show the appointments. Delete the requires!
                                 -->
                                
                              	<?php 
									   //require("includes/experts/list-app-requests.php");
     							?>

								<div>
                             </div><!-- Content Close -->
                          </div>
				</div><!-- Panel Close -->

	
        </div>
      </div>	  
</div></div>
	
<!-- Container Close -->

<script src="<?php echo _ROOT ?>/js/gmaps.js"></script>
<script src="<?php echo _ROOT ?>/js/modal.js"></script>

<script></script>


