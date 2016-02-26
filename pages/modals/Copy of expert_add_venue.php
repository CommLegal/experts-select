<!-- Modal -->
	<div id="expert-add-venue" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
			<div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data" id="loginForm" name="loginForm">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Venue</h4>
			  </div>
              
			 <!--- OLD FORM START ---!>
             
                 <div class="modal-body pb25">
                    
                        <div class="col-md-12">
                            <h4>Enter the venue postcode</h4>
                              <label for="textfield">Postcode</label>
                              <input type="text" name="textfield" id="textfield" />
                              <p>This is so experts can share venues, and so the same venues aren't on more than once</p>                           	  
                              <p>Searched in venue table for the postcode, if no result, present form below</p>
                              <div class="add-new-venue">
                                <label class="control-label">Venue Name</label>
                                <input type="text" name="email" id="email" value="" >
                                
                              <label class="control-label">Postcode</label>
                                <input type="text" name="email"  id="email" value="" >
                              </div>
                              
                        </div>
                    <div class="modal-message"></div>
                    <div style="clear: both;"></div>
                    <div class="modal-footer">
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-block" type="submit">Add</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  </div>
                  </form> 
              
             <!--- OLD FORM END--->
              
                  <form id="form1" name="form1" method="post" action="includes/submit-venue.php">
                      <label for="v_name" class="control-label">Venue Name</label>
                      <input type="text" name="v_name" id="v_name" class="form-control"/>
                    
                      <label for="v_telephone" class="control-label">Telephone</label>
                      <input type="text" name="v_telephone" id="v_telephone" class="form-control" />
                    
                      <label for="v_email" class="control-label">Email</label>
                      <input type="text" name="v_email" id="v_email" class="form-control" />
                    
                      <label for="v_address1" class="control-label">Venue Address</label>
                      <input type="text" name="v_address1" id="v_address1" class="form-control mb10" />
                      <input type="text" name="v_address2" id="v_address2" class="form-control mb10" />
                      <input type="text" name="v_address3" id="v_address3" class="form-control mb10" />

                      <label for="v_city" class="control-label">City</label>
                      <input type="text" name="v_city" id="v_city" class="form-control" />
                    
                      <label for="v_county" class="control-label">County</label>
                      <input type="text" name="v_county" id="v_county" class="form-control" />
                    
                      <label for="v_country" class="control-label">Country</label>
                      <input type="text" name="v_country" id="v_country" class="form-control" />
                    
                      <label for="v_postcode" class="control-label">Postcode</label>
                      <input type="text" name="v_postcode" id="v_postcode" class="form-control" />
                    
                      <label for="v_description" class="control-label">Description</label>
                      <input type="text" name="v_description" id="v_description" class="form-control mb10" />

                      <input type="submit" name="button" id="button" value="Submit" />  
                  </form>
			</div>
	  </div>
	</div>