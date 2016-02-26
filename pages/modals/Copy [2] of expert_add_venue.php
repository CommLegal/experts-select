<!-- Modal -->
	<div id="expert-add-venue" class="modal fade" role="dialog">
	  <div class="modal-dialog-venue-add">

		<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Venue</h4>
			  </div>
              <div id="modal-form-venue">
                  <form id="postcodeForm" name="form1" method="POST" action="includes/search-venue-postcode.php">
                          <label for="v_search_postcode" class="control-label">Existing Venue Postcode</label>
                          <input type="text" name="v_search_postcode" id="v_search_postcode" class="form-control"/>
                          <div id="form-results-postcode"> 
                          <label for="postcode-results" id="postcode-result" class="control-label">Result: -</label>
                          	<ul id="postcode-results">
                          	</ul>
                          </div>
                          
                          <button type="button" class="btn btn-success" data-toggle="modal" id="expert-search-postcode">Search Venue Postcode</button>
                          
                          <ul id="postcode-results">
                          
                          </ul>
                  </form>
              </div>
              <div class="form-divider"></div>
              <div id="modal-form-venue-addven">
              <div id="col-md-6">
                  <form id="addVenueForm" name="form1" method="POST" action="includes/submit-venue.php">
                      <label for="v_name" class="control-label">Venue Name</label>
                      <input type="name" name="v_name" id="v_name" class="form-control" required/>

                      <label for="v_telephone" class="control-label">Telephone</label>
                      <input type="text" name="v_telephone" id="v_telephone" class="form-control" maxlength="11" required />
                    
                      <label for="v_email" class="control-label">Email</label>
                      <input type="email" name="v_email" id="v_email" class="form-control" required />
                    
                      <label for="v_address1" class="control-label">Venue Address</label>
                      <input type="text" name="v_address1" id="v_address1" class="form-control mb32" required />
                      <input type="text" name="v_address2" id="v_address2" class="form-control mb32" required />
                      <input type="text" name="v_address3" id="v_address3" class="form-control mb32" required />
               </div>
               <div id="col-md-6">
                      <label for="v_city" class="control-label">City</label>
                      <input type="text" name="v_city" id="v_city" class="form-control" required />
                    
                      <label for="v_county" class="control-label">County</label>
                      <input type="text" name="v_county" id="v_county" class="form-control" required />
                    
                      <label for="v_country" class="control-label">Country</label>
                      <input type="text" name="v_country" id="v_country" class="form-control" required />
                    
                      <label for="v_postcode" class="control-label">Postcode</label>
                      <input type="text" name="v_postcode" id="v_postcode" class="form-control" required />
                    
                      <label for="v_description" class="control-label">Description</label>
                      <input type="text" name="v_description" id="v_description" class="form-control mb10" />
                      
                       <div class="ajax-response"></div>
                       </br>

                      <input type="submit" name="button" id="addVenueFormSubmit" value="Submit" />  
                </div>
                  </form>
             </div>
			</div>
	  </div>
	</div>