<?php
include('../includes/add-venue-function.php');
?>

<?php 
	if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
	else {$btncolor = "btn btn-success";}
?>

<html>
<head>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyC9_eubdf0kjY2lVzqnDRnEmACsb3CXt80"></script>
	<script type="text/javascript" src="js/map.js"></script>
    <div class="container main mb25">
</head>
<body id="add">      
        <div class="col-md-12 mb25">
                
            <h3 class="">Venue Management</h3>	
            <div class="title-divider"></div>	
                
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
        <div id="map_canvas" style="width:100%; height:200px;"></div>
        <div id="ajax_msg"></div>
        
            <div class="form-group">
            
                <form id = "add-venue" method="post" action="includes/submit-venue.php">
                <div class="col-md-6"> 
                    <label for="v_name" class="control-label">Venue Name</label>
                    <input type="text" name="v_name" id="v_name" class="form-control" required />
                    
                    <label for="v_telephone" class="control-label">Telephone</label>
                    <input type="text" name="v_telephone" id="v_telephone" class="form-control" required />
                    
                    <label for="v_email" class="control-label">Email</label>
                    <input type="email" name="v_email" id="v_email" class="form-control" required/>
                    
                    <label for="v_address1" class="control-label">Venue Address</label>
                    <input type="text" name="v_address1" id="v_address1" class="form-control mb10" placeholder="e.g. 14 Nancy Street" required />
                     
                    <input type="text" name="v_address2" id="v_address2" class="form-control mb10" />
                    <input type="text" name="v_address3" id="v_address3" class="form-control" />
                </div>
                
                <div class="col-md-6">    
                    <label for="v_city" class="control-label">City</label>
                    <input type="text" name="v_city" id="v_city" class="form-control" required />
                    
                    <label for="v_county" class="control-label">County</label>
                    <input type="text" name="v_county" id="v_county" class="form-control"  />
                    
                    <label for="v_country" class="control-label">Country</label> 
                    <input type="text" name="v_country" id="v_country" class="form-control" required />
                    
                    <label for="v_postcode" class="control-label">Postcode</label>
                    <input type="text" name="v_postcode" id="v_postcode" class="form-control" required />
                    <p style="position:relative; bottom:-10px;">The Map will automatically locate once you deselect the postcode field.</p>
                 
                    <label for="v_description" class="control-label">Description</label>
                    <input type="text" name="v_description" id="v_description" class="form-control" />
                    
                    <label for="v_disabled_access" class="control-label">Disabled Access</label>
                	<input type="text" name="v_disabled_access" id="v_disabled_access" class="form-control" />
                    <br /> <br />  
                    

                       
                    <button type="submit" name="button" id="addVenueFormSubmit" value="Submit" class="<?php echo $btncolor ?>" > 
                    Submit &nbsp;<i class = "fa fa-lg fa-arrow-right"></i> </button>
                    
                    <div id = "success"></div>
                    
                    <br /><br /><br />

                    </div>
                    <div class = "hiddenclass">
                         <label for="v_latitude" class="control-label">Latitude</label>
                        <input type="text" name="v_latitude" id="v_latitude" class="form-control mb32" style="border-radius:10px;">
                        
                        <label for="v_longitude" class="control-label" style="position:relative; bottom: 20px;">Longitude</label>
                        <input type="text" name="v_longitude" id="v_longitude" class="form-control mb32" style="position:relative; bottom:20px; border-radius:10px;"/> 
                    </div>
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
</body>
</html>