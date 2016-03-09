<!-- USER DETAILS MODAL -->
<div id="overlay" style = "margin-top:300px" >
    <div id="overlay-content" class="ro">
        <div id="close" style="background-color:#5CB85C"><button type="button" class="close" ><p>Close <i class = "fa fa-lg fa-times"></i></p></button></div>
        
            <div id="overlay-title">
            	
            </div>
            
            <div id="overlay-text">
            	
            </div> 
            
            <div style="clear: both;"></div>
            
    </div>
    <div style="clear: both;"></div>
</div>

	<div class="container main mb25">
        <div class="col-md-12 mb25">              
        	<h3 class="textshadow" >Agreements with MROs</h3><div class="title-divider"></div>
    	</div>  
		<div class="row pt25">
			<div class="col-lg-12"> 
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Information</h4></div>
					<div class="panel-body">
						 <div class="col-lg-5">
							<p>
							Here you can edit the agreements you have with MROs. 
							You can view the contract, edit your notes, cancel the agreement and add 
							them to the block list. You can perform these actions through the Actions menu 
							located to the right of each MRO on the tables below.
							</p> 
						</div>
                        
                        <div class = "col-lg-7">
                            <ul class="fa-ul">
                              <li><i class="fa-li fa fa-pencil"></i> <p>View and edit information.</p></li>
                              <li><i class="fa-li fa fa-file-text-o"></i> <p>View previous agreements with the blocked MRO.</p></li>
                              <li><i class="fa-li fa fa-times"></i> <p>Cancel the agreement.</p></li>
                              <li><i class="fa-li fa fa-ban"></i> <p>Put the MRO on your blocked list.</p></li>
                              <li><i class="fa-li fa fa-user-plus"></i> <p>Unblock the MRO.</p></li>
                            </ul>   
						</div>
                        
                        <div class = "col-md-12">
                        	<button id = "add-agreement" class = "btn btn-default mt25 mb10">Create &nbsp;<i class = "fa fa-plus"></i></button>
                        </div> 
                       	<div class = "agreement-box">   
                                <label>Organisation:</label>
                                <select name="mo_id" id="mo_id" class="form-control" required></select>
                                
                                <label style="display:none" class="user-selection">Organisation Contact:</label>
                                <select style="display:none" name="mro_id" id="mro_id" class="form-control user-selection" required></select>
                            
                            <form method="POST" id="expert-agreement-request">   
                                <div id="mro-information">
									
                                </div>
                                <div class = "col-md-12">
                                <button id="agreementExpertSubmit" class = "btn btn-lg btn-success mt25">Send Request &nbsp;<i class = "fa fa-lg fa-arrow-right"></i></button>
                            </form> 
                            
                            <div id="returnMessage"></div>
                            
                            </div>
                        </div>
                      
                        
					</div>
				</div>
			</div>
        </div><!-- End of top box -->
		
		<div class="row pt25 mb25"><div class="col-md-3 green topradius pq"><h4 class ="textwhite midd"><i class="fa fa-check"></i> Pending Agreements</h4></div>

                <div class="col-md-12 green textwhite diaryradius pt25 pb25">
    
                    <?php require("pending-agreement-list.php"); ?> 

          		</div>  <!-- End of table thing -->
		</div>
        
        <div class="row pt25 mb25"><div class="col-md-3 green topradius pq"><h4 class ="textwhite midd"><i class="fa fa-check"></i> Active Agreements</h4></div>

                <div class="col-md-12 green textwhite diaryradius pt25 pb25">
    
                    <?php require("current-agreement-list.php"); ?> 

          		</div>  <!-- End of table thing -->
		</div>
        
        
        <div class="row pt25 mb25"><div class="col-md-3 green topradius pq"><h4 class ="textwhite midd"><i class="fa fa-ban"></i> Cancelled Agreements</h4></div>

            <div class="col-md-12 green diaryradius pt25 pb25">

			<?php require("cancelled-agreement-list.php"); ?>

            </div>  <!-- End of table thing -->
		</div><!-- End of some other vital thing -->
        
        
        <div class="row pt25 mb25"><div class="col-md-3 green topradius pq"><h4 class ="textwhite midd"><i class="fa fa-ban"></i> Blocked MROs</h4></div>

            <div class="col-md-12 green diaryradius pt25 pb25">

			<?php require("blocked-agreement-list.php"); ?>

            </div>  <!-- End of table thing -->
		</div><!-- End of some other vital thing -->
		
	</div><!-- End of everything -->
