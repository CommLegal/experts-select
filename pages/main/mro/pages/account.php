<?php 

$getMroInformation = $conn->execute_sql("select", array("*"), "m_accounts", "ma_id=?", array("i" => $_SESSION['CME_USER']['login_id']));

$getOrgInformation = $conn->execute_sql("select", array("*"), "m_organisations", "mo_id =?", array("i" => $getMroInformation[0]['ma_name']));

$getMROSalutation = $conn->execute_sql("select", array("*"), "salutations", "", "");

$salutation = $conn->execute_sql("select", array("*"), "salutations", "s_id=?", array("i" => $getMroInformation[0]['ma_s_id']));


?>  

<?php 
	if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
	else {$btncolor = "btn btn-success";}
?>

    <div class="container mb25">
        <div class="col-md-12">
            <form data-toggle="validator" role="form" id="MRO-account" name="MRO-account" method="post">	
            
            <input type="hidden" name="mroPermissions" id="mroPermissions" value="<?php echo $getMroInformation[0]['ma_permissions'] ?>" />
				
            <div class="col-md-12 mb25">              
                <h3>Your Profile</h3><div class="title-divider"></div>
            </div> 
                		  			
				<div class="form-group">
                	<div class="col-md-4">
                        <div class="col-lg-12">
                        	<!--<h4>About You</h4>  
                            <hr />-->                  
                            <label for="salutation" class="control-label">Salutation</label>
                            <select name="ma_s_id" id="ma_s_id" class="form-control" required>
								<?php foreach($getMROSalutation as $header => $value) { ?>
									<option name="<?php echo $getMROSalutation[$header]['s_id'] ?>" <?php if($getMroInformation[0]['ma_s_id'] == $getMROSalutation[$header]['s_id']) { ?> selected <?php } ?>><?php echo $getMROSalutation[$header]['s_title'] ?></option>
								<?php } ?>
                            </select>
                            
                            <label class="control-label">Forename</label>
                            <input type="text" name="ma_forename" class="form-control" id="ma_forename" value="<?php echo $getMroInformation[0]['ma_forename'] ?>" required>
                            
                            <label class="control-label">Surname</label>
                            <input type="text" name="ma_surname" class="form-control" id="ma_surname" value="<?php echo $getMroInformation[0]['ma_surname'] ?>" required>
                            
                            <label class="control-label">Telephone</label>
                            <input type="tel" name="ma_telephone" class="form-control" id="ma_telephone" value="<?php echo $getMroInformation[0]['ma_telephone'] ?>" required>
                            
                            <label class="control-label">Email</label>
                            <input type="email" name="ma_email" class="form-control" id="ma_email" value="<?php echo $getMroInformation[0]['ma_email'] ?>" required>

                        </div>
                    </div>
                    
                    <div class="col-md-4">
                    	<div class="col-lg-12">
                        <!--<h4>Where are you?</h4>
                        <hr />-->
						<label class="control-label">Address</label>
                            <input type="text" name="ma_address1" class="form-control" id="ma_address1" value="<?php echo $getOrgInformation[0]['mo_address_1'] ?>" <?php if($getMroInformation[0]['ma_permissions'] < 3) { ?> disabled <?php } ?>>
                            
                            <input type="text" name="ma_address2" class="mt3 form-control" id="ma_address2" value="<?php echo $getOrgInformation[0]['mo_address_2'] ?>" <?php if($getMroInformation[0]['ma_permissions'] < 3) { ?> disabled <?php } ?>>
                            
                            <input type="text" name="ma_address3" class="mt3 form-control" id="ma_address3" value="<?php echo $getOrgInformation[0]['mo_address_3'] ?>" <?php if($getMroInformation[0]['ma_permissions'] < 3) { ?> disabled <?php } ?>>
                            
                            <label class="control-label">City</label>
                            <input type="text" name="ma_city" class="form-control" id="ma_city" value="<?php echo $getOrgInformation[0]['mo_city'] ?>" <?php if($getMroInformation[0]['ma_permissions'] < 3) { ?> disabled <?php } ?>>
                            
                            <label class="control-label">Postcode</label>
                            <input type="text" name="ma_postcode" class="form-control" id="ma_postcode" value="<?php echo $getOrgInformation[0]['mo_postcode'] ?>" <?php if($getMroInformation[0]['ma_permissions'] < 3) { ?> disabled <?php } ?>>
                            
                            <label class="control-label">Country</label>
                            <input type="text" name="ma_country" class="form-control" id="ma_country" value="United Kingdom" <?php if($getMroInformation[0]['ma_permissions'] < 3) { ?> disabled <?php } ?>>
                        </div>
                    </div>
                    
                    
                    <div class="form-group col-lg-12 mt25 mb25" style="margin-left:15px;">
                    	<input type="hidden" id="usersId" name="usersId" value="<?php echo $getMroInformation[0]['ma_id'] ?>" />
						<input type="submit" id="updateMroInfo" class="btn btn-lg btn-primary" value="Save" />
                    </div>

            	</div>
                </form> 
                
				<div id="success"></div>
                
		  </div>
        
    </div>