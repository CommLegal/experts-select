<?php 

$info = $expert->getDetails($_SESSION['CME_USER']['login_id']);

$getExpertSalutation = $conn->execute_sql("select", array("*"), "salutations", "", "");

$salutation = $conn->execute_sql("select", array("*"), "salutations", "s_id=?", array("i" => $info[0]['ea_s_id']));

//echo $salutation[0]['ea_s_id'];

?>   

<?php 
	if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
	else {$btncolor = "btn btn-success";}
?>
 
    <div class="container mb25">
        <div class="col-md-12">
            <form data-toggle="validator" role="form" id="expert-account" name="expert-account" method="post">	
				
        <div class="col-md-12 mb25">              
        	<h3>Your Profile</h3><div class="title-divider"></div>
    	</div> 
                
                		  			
				<div class="form-group">
                	<div class="col-md-4">
                        <div class="col-lg-12">
                        	<!--<h4>About You</h4><hr />-->         
                            <label for="salutation" class="control-label">Salutation</label>
                            <select name="ea_s_id" id="ea_s_id" class="form-control" required>
                            		<option name="<?php echo $salutation[0]['s_id'] ?>"><?php echo $salutation[0]['s_title'] ?></option>
								<?php foreach($getExpertSalutation as $header => $value) { ?>
									<option name="<?php echo $getExpertSalutation[$header]['s_id'] ?>"><?php echo $getExpertSalutation[$header]['s_title'] ?></option>
								<?php } ?>
                            </select>
                            
                            <label class="control-label">Forename</label>
                            <input type="text" name="ea_forename" class="form-control" id="ea_forename" value="<?php echo $info[0]['ea_forename'] ?>" autocomplete="off" required>
                            
                            <label class="control-label">Surname</label>
                            <input type="text" name="ea_surname" class="form-control" id="ea_surname" value="<?php echo $info[0]['ea_surname'] ?>" autocomplete="off" required>
                            
                            <label class="control-label">Telephone</label>
                            <input type="text" name="ea_telephone" class="form-control" id="ea_telephone" value="<?php echo $info[0]['ea_telephone'] ?>" autocomplete="off" required>
                            
                            <label class="control-label">Mobile</label>
                            <input type="text" name="ea_mobile" class="form-control" id="ea_mobile" value="<?php echo $info[0]['ea_mobile'] ?>" autocomplete="off">
                            
                            <label class="control-label">Email</label>
                            <input type="email" name="ea_email" class="form-control" id="ea_email" value="<?php echo $info[0]['ea_email'] ?>" required autocomplete="off">
                            
                            
                            
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                    	<div class="col-lg-12">
                        <!--<h4>Where are you?</h4><hr />-->
						<label class="control-label">Address</label>
                            <input type="text" name="ea_address1" class="form-control" id="ea_address1" value="<?php echo $info[0]['ea_address1'] ?>" requiredautocomplete="off" >
                            
                            <input type="text" name="ea_address2" class="mt3 form-control" id="ea_address2" value="<?php echo $info[0]['ea_address2'] ?>"autocomplete="off" >
                            
                            <input type="text" name="ea_address3" class="mt3 form-control" id="ea_address3" value="<?php echo $info[0]['ea_address3'] ?>"autocomplete="off" >
                            
                            <label class="control-label">City</label>
                            <input type="text" name="ea_city" class="form-control" id="ea_city" value="<?php echo $info[0]['ea_city'] ?>" requiredautocomplete="off" >
                            
                            <label class="control-label">Postcode</label>
                            <input type="text" name="ea_postcode" class="form-control" id="ea_postcode" value="<?php echo $info[0]['ea_postcode'] ?>" required autocomplete="off" >
                            
                            <label class="control-label">County</label>
                            <input type="text" name="ea_county" class="form-control" id="ea_county" value="<?php echo $info[0]['ea_county'] ?>" required autocomplete="off" >
                            
                            <label class="control-label">Country</label>
                            <input type="text" name="ea_country" class="form-control" id="ea_country" value="<?php echo $info[0]['ea_country'] ?>" required autocomplete="off">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                    	<div class="col-lg-12">
                        	<!--<h4>Your Qualifications</h4><hr />-->
                            
                            <!-- DB linker --->
							<?php
								//START - TURN ERRORS ON
									ini_set('display_errors',1);
									ini_set('display_startup_errors',1);
									error_reporting(-1);
								
								//START SQL QUERY TO PULL DATABASE COLUMN
									$selectOption = $conn->execute_sql("select", array("et_id", "et_type"), "e_type", "", "");
                           
                            ?>

                    <label>Main Speciality:</label>
                        <select id="expertSpecialty" name="expertSpecialty" class="form-control">
							<?php foreach($selectOption as $header => $value) { ?>
                            	<option id="specialist" name="<?php echo $selectOption[$header]['et_id']; ?>"><?php echo $selectOption[$header]['et_type']; ?></option>;
                            <?php } ?>
                        </select>

                            
                            <!-- <label class="control-label">Other Specialities</label>
                            <select name="ea_speciality_other" size="5" multiple="multiple" class="form-control" id="ea_speciality_other">
                            	<option value="">None</option>
                            	<option value="1"<?php// echo (($info[0]['ea_speciality_other'] == 1) ? " selected=selected" : "") ?>>1</option>
                            </select>-->
                            
						  <label class="control-label">GMC Registration No</label>
                            <input type="text" name="ea_gmc_reg" class="form-control" id="ea_gmc_reg" value="<?php echo $info[0]['ea_gmc_reg'] ?>" required>
                        
                        </div>
                    </div>
                    
					<div class="form-group col-lg-12 mt25 mb25" style="margin-left:15px;">
                    	<input type="hidden" name="login_type" value="expert-registration" />
                        <input type="submit" id="updateExpertInfo" class="btn btn-lg btn-success" value="Save" />
                    </div>

            	</div>
                </form> 
                
                <div id="success"></div>
                
		  </div>
        
    </div>