<?php 

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

if($_POST['form_type'] == "expert_app") {
	$_POST['venues--v_ea_id'] = $_SESSION['CME_USER']['login_id'];	
}			 

//var_dump ($_POST['e_venue_id']);

//echo $_POST['e_venue_id'];


$existingVen = $conn->execute_sql("select", array("*"), "venues", "v_id=?", array("i" => $_POST['e_venue_id']));

//var_dump($existingVen[0]['v_email']);

?>

			<form id="addVenueForm" name="form1" method="POST" action="">
				  <div class="col-md-6">
                          <label for="v_name" class="control-label">Venue Name</label>
                          <input type="name" name="v_name" id="v_name" class="form-control" value="<?php echo $existingVen[0]['v_name'] ?>" required/>
    
                          <label for="v_telephone" class="control-label">Telephone</label>
                          <input type="text" name="v_telephone" id="v_telephone" class="form-control" maxlength="11" value="<?php echo $existingVen[0]['v_telephone'] ?>" required />
                        
                          <label for="v_email" class="control-label">Email</label>
                          <input type="email" name="v_email" id="v_email" class="form-control" value="<?php echo $existingVen[0]['v_email'] ?>" required />
                        
                          <label for="v_address1" class="control-label">Venue Address</label>
                          <input type="text" name="v_address1" id="v_address1" class="form-control mb32" value="<?php echo $existingVen[0]['v_address1'] ?>" required />
                          <input type="text" name="v_address2" id="v_address2" class="form-control mb32" value="<?php echo $existingVen[0]['v_address2'] ?>" required />
                          <input type="text" name="v_address3" id="v_address3" class="form-control mb32" value="<?php echo $existingVen[0]['v_address3'] ?>"/>
                   </div>
                   <div class="col-md-6">
                          <label for="v_city" class="control-label">City</label>
                          <input type="text" name="v_city" id="v_city" class="form-control" value="<?php echo $existingVen[0]['v_city'] ?>" required />
                        
                          <label for="v_county" class="control-label">County</label>
                          <input type="text" name="v_county" id="v_county" class="form-control" value="<?php echo $existingVen[0]['v_county'] ?>" required />
                        
                          <label for="v_country" class="control-label">Country</label>
                          <input type="text" name="v_country" id="v_country" class="form-control" value="<?php echo $existingVen[0]['v_country'] ?>" required />
                        
                          <label for="v_postcode" class="control-label">Postcode</label>
                          <input type="text" name="v_postcode" id="v_postcode" class="form-control" value="<?php echo $existingVen[0]['v_postcode'] ?>" required />
                        
                          <label for="v_description" class="control-label">Description</label>
                          <input type="text" name="v_description" id="v_description" class="form-control mb10" value="<?php echo $existingVen[0]['v_description'] ?>" />
                          
                          <label for"v_disabled_access" class="control-label">Disabled Access</label>
                          
                         <div class="v_disabled_accessRadio"><input name="v_disabled_access" id="v_disabled_accessYes" value="Yes" type="radio" <?php if($existingVen[0]['v_disabled_access'] == "Y") { echo "checked"; } ?>>
                          <label for="v_disabled_accessYes">Yes</label>&nbsp;&nbsp;<input name="v_disabled_access" id="v_disabled_accessNo" value="No"  type="radio"<?php if($existingVen[0]['v_disabled_access'] == "N") { echo "checked"; } ?>>
                          <label for="v_disabled_accessNo">No</label></div> 
                         
                           <div class="ajax-response"></div>
                           </br>
                           
                           <div class = "hiddenclass">
                               <label for"v_latitude" class="control-label" style="position:relative;top:66px;">Latitude</label>
                                <input type="text" name="v_latitude" id="v_latitude" class="form-control mb32" style="border-radius:10px;" value="<?php echo $existingVen[0]['v_latitude'] ?>">
                            
                                <label for"v_longitude" class="control-label">Longitude</label>
                                <input type="text" name="v_longitude" id="v_longitude" class="form-control mb32" style="border-radius:10px;" value="<?php echo $existingVen[0]['v_longitude'] ?>"> 
                          </div>
    					</div>
                        
                        <div class = "col-md-12">
                          <input class = "mb25 btn btn-success" type="submit" name="button" id="addVenueModalFormSubmit" value="Submit" /> 
                        </div>
                          
						<div id="success"></div>
                        
                 	</div>
             </form>
                  
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo _ROOT ?>/js/ie10-viewport-bug-workaround.js"></script>
    <script src="<?php echo _ROOT ?>/js/modal.js"></script>