	<?php 
        if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
        else {$btncolor = "btn btn-success";}
    ?>


<div id="overlay" style = "margin-top:300px" >
    <div id="overlay-content" class="ro">
        <div id="close" style="background-color:"><button type="button" class="close" ><p>Close <i class = "fa fa-lg fa-times"></i></p></button></div>
            <div id="overlay-title">
            	<h3>User Details</h3>
            </div>
            
            <div id="overlay-text">
            	
            </div>
            
            <div style="clear: both;"></div>
    </div>
    <div style="clear: both;"></div>
</div>  
        
        <!-- Content -->	
        <div class= "container">
            <div class="col-md-12"><h1>Waiting Room</h1>
            <div class="row pt25">
                <div class="col-lg-12"> 
                    <div class="panel panel-default"><!-- Panel Container -->
                      <div class="panel-heading"><h4>Find an Appointment</h4></div>
                      <div class="panel-body">
                     <div class="col-lg-6"><!-- Left Side -->

                    <label>Venue:</label>
                        <input placeholder="" type="text" class="form-control" 
                        id="fullname" name="fullname">

                    <label>Expert Speciality:</label>
                      <select class="form-control" id="sel1">
                        <option>Any</option>
                        <option>Speciality 1</option>
                        <option>Speciality 2</option>
                        <option>Speciality 3</option>
                      </select>
                      
                    <label>Location:</label>
                        <input placeholder="" type="text" class="form-control" 
                        id="fullname" required="" data-validation-required-message="Please enter your name." name="fullname">
                    <label>Time:</label>
                        <input placeholder="" type="text" class="form-control" 
                        id="fullname" required="" data-validation-required-message="Please enter your name." name="fullname">
                    <label>Appointments After:</label>
                        <div class="input-group date">
                            <input id="date-picker-ven" name="date-picker-ven" value="<?php echo date("d-m-Y");?>" 
                            type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>  
                    <label>Appointments Before:</label>
                        <div class="input-group date">
                            <input id="date-picker-ven" name="date-picker-ven" value="<?php echo date("d-m-Y");?>" 
                            type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div> 
                    <label>Deadline (2 weeks notice):</label>
                        <div class="input-group date">
                            <input id="date-picker-ven" name="date-picker-ven" value="<?php echo date("d-m-Y");?>" 
                            type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div> 

                        <span class = "mt25 <?php echo $btncolor; ?>">Request Appointment <i class="fa fa-plus"></i></span>
                        
                    </div><!-- Left Side Close -->
                        <div class="col-md-6 mt25"><!-- Right Side -->
                            <p>
                                The Waiting Room lets you pick specific appointments set by MROs. If you book through here you will
                                be notified as soon as the MRO has responded to the request. aaa
                            </p>
                        </div><!-- Right Side Close-->
                        
                        <div class = "col-md-6 mt25">
                        	<img src = "images/pic1.jpg" >
                        </div>
                        
                  </div><!-- Panel Close -->
                </div>
                    <div class="panel panel-default"><!-- Panel Container -->
						<div class="panel-heading"><h4>Your Appointment Requests fuck you</h4></div> 
                                                                              
                          <div class="panel-body">
                             <div class="col-lg-12"><!-- Content -->
                             
                             <!-- 
                             YOUR CODE GOES HERE to show the appointments. Delete the requires!
                             -->
                             
                             <?php 
								 require("includes/appexamples2.php");
								 require("includes/appexamples2.php");
								 require("includes/appexamples2.php"); 						
								 require("includes/appexamples2.php"); 						 
								 require("includes/appexamples2.php"); 						
								 require("includes/mro/list-app-requests.php"); 
                             ?>
    
                             </div><!-- Content Close -->
                          </div>
				</div><!-- Panel Close -->

            </div>	
        </div>
      </div>	  
</div><!-- Container Close -->