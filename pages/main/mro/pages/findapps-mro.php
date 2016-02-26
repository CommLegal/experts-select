        <!-- Content -->	
        <div class= "container">
            <div class="col-md-12 diarypadding"><h1>Find Appointments</h1>
            <div class="row pt25">
                <div class="col-lg-12"> 
                    <div class="panel panel-default"><!-- Panel Container -->
                      <div class="panel-heading"><h4>Appointment Search</h4></div>
                      <div class="panel-body">
                     <div class="col-lg-6"><!-- Left Side -->

                    <label>Expert Surname:</label>
                        <input placeholder="" type="text" class="form-control" 
                        id="fullname" name="fullname">
                    <label>Speciality:</label>
                      <select class="form-control" id="sel1">
                        <option>Any</option>
                        <option>Speciality 1</option>
                        <option>Speciality 2</option>
                        <option>Speciality 3</option>
                      </select>
                    <label>Postcode:</label>
                        <input placeholder="" type="text" class="form-control" 
                        id="fullname" required="" data-validation-required-message="Please enter your name." name="fullname">
                    <label>Maximum mile radius:</label>
                        <input placeholder="Distance from the given postcode" type="text" class="form-control" 
                        id="fullname" required="" data-validation-required-message="Please enter your name." name="fullname">
                    <label>Appointment Date:</label>
                        <div class="input-group date">
                            <input id="date-picker-ven" name="date-picker-ven" value="<?php echo date("d-m-Y");?>" 
                            type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>  
                        
                        <span class = "mt25 btn btn-success">Search</span>
                    </div><!-- Left Side Close -->
                        <div class="col-lg-6 mt25"><!-- Right Side -->
                            <p>
                            Here you can search for appointments set up by experts. You can specify expert details for a more specific
                            search. The only required fields are postcode and appointment date. You can provide a maximum mile radius
                            around your appointment postcode. 
                            </p>
                            
                            <p>
                            Results will show below. Each appointment will show the doctor, the location and the venue. 
                            Beneath the doctors name there are buttons to view CV, view prices and their distance from
                            the postcode you specified. Press this to view a map of their location.
                            </p>
                        </div><!-- Right Side Close-->
                  </div><!-- Panel Close -->
                </div>
                    <div class="panel panel-default"><!-- Panel Container -->
						<div class="panel-heading"><h4>Results</h4></div> 
                        
                        <!-- Not sure if we want experts or appointments to show, but for now it shows it by expert -->
                                                      
                          <div class="panel-body">
                             <div class="col-lg-12"><!-- Content -->
                             
                             <!-- 
                             YOUR CODE GOES HERE to show the appointments. Delete the requires!
                             -->
                             
                             <?php 
								 require("includes/appexamples.php");
								 require("includes/appexamples.php");
								 require("includes/appexamples.php"); 						
								 require("includes/appexamples.php"); 						 
								 require("includes/appexamples.php"); 						
								 require("includes/appexamples.php"); 
                             ?>
                                 
                             </div><!-- Content Close -->
                          </div>
				</div><!-- Panel Close -->

            </div>	
        </div>
      </div>	  
</div><!-- Container Close -->