<?php
include('../includes/add-venue-function.php');
?>
    <div class="container main mb25">
        
        <div class="col-md-12 mb25">
                
                <h3>Venue Management</h3>   
                
                <div class="col-md-4 prom-box">
                    <a href="?page=appointments&action=add"><h4><span class="glyphicon glyphicon-plus"></span>&nbsp;Add Appointments</h4></a>
                </div>
                
                <div class="col-md-1">&nbsp;</div>
                
                <div class="col-md-3 prom-box">
                    <a href="?page=appointments&action=edit"><h4><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit Appointments</h4></a>
                </div>
                
                <div class="col-md-1">&nbsp;</div>
                
                <div class="col-md-3 prom-box">
                    <a href=""><h4><span class="glyphicon glyphicon-move"></span>&nbsp;Add Venues</h4></a>
                </div>
      		</div>
        
            
        
        <div class="col-md-12 formbg">
            <div class="form-group">
                <form id="addVenueForm" name="form1" method="post" action="includes/submit-venue.php">
                <div class="col-md-6"> 
                    <label for="v_name" class="control-label">Venue Name</label>
                    <input type="text" name="v_name" id="v_name" class="form-control" required />
                    
                    <label for="v_telephone" class="control-label">Telephone</label>
                    <input type="text" name="v_telephone" id="v_telephone" class="form-control" required />
                    
                    <label for="v_email" class="control-label">Email</label>
                    <input type="email" name="v_email" id="v_email" class="form-control" required/>
                    
                    <label for="v_address1" class="control-label">Venue Address</label>
                    <input type="text" name="v_address1" id="v_address1" class="form-control mb32" required />
                    <input type="text" name="v_address2" id="v_address2" class="form-control mb32" required />
                    <input type="text" name="v_address3" id="v_address3" class="form-control mb10" required />
                </div>
                <div class="col-md-6">    
                    <label for="v_city" class="control-label">City</label>
                    <input type="text" name="v_city" id="v_city" class="form-control" required />
                    
                    <label for="v_county" class="control-label">County</label>
                    <input type="text" name="v_county" id="v_county" class="form-control" required />
                    
                    <label for="v_country" class="control-label">Country</label> 
                    <input type="text" name="v_country" id="v_country" class="form-control" required />
                    
                    <label for="v_postcode" class="control-label">Postcode</label>
                    <input type="text" name="v_postcode" id="v_postcode" class="form-control" required />
                    
                    <label for="v_description" class="control-label">Description</label>
                    <input type="text" name="v_description" id="v_description" class="form-control mb32" />

                    <input type="submit" name="button" id="addVenueFormSubmit" value="Submit" />  
                </div>
                </form>
            </div>
        </div>
        
        <?php
		
		if($_REQUEST['action'] == "add") { 
			require("pages/main/experts/pages/add_appointments.php");
		}
		elseif($_REQUEST['action'] == "edit") { 
			require("pages/main/experts/pages/edit_appointments.php");
		}
		?>
    </div>