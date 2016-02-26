<!-- USER DETAILS MODAL -->
<div id="overlay" style = "margin-top:300px" >
    <div id="overlay-content" class="ro">
        <div id="close" style="background-color:#337AB7"><button type="button" class="close" ><p>Close <i class = "fa fa-lg fa-times"></i></p></button></div>
        
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
        	<h3>Agreements with Experts</h3><div class="title-divider"></div>
    	</div>  
		<div class="row pt25">
			<div class="col-lg-12"> 
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Information</h4></div>
					<div class="panel-body">
						<div class="col-lg-5">
							<p>
							Here you can edit the agreements your organisation has with medical experts. 
							You can view the experts contract, edit your notes, cancel the agreement and add 
							them to the block list. You can perform these actions through the Actions menu 
							located to the right of each expert.
							</p>                            
						</div>
                        <div class = "col-lg-7">
                            <ul class="fa-ul">
                              <li><i class="fa-li fa fa-pencil"></i> <p>View and edit information on the expert.</p></li>
                              <li><i class="fa-li fa fa-file-text-o"></i> <p>View previous agreements with the blocked expert.</p></li>
                              <li><i class="fa-li fa fa-times"></i> <p>Cancel the agreement.</p></li>
                              <li><i class="fa-li fa fa-ban"></i> <p>Put the expert on your blocked list.</p></li>
                              <li><i class="fa-li fa fa-user-plus"></i> <p>Unblock the expert.</p></li>
                            </ul>   
						</div>
                        <form id="searchExpert" name="searchExpert" method="post" action="">
                            <div class = "col-md-6"> 
                                <label class="control-label">Search Expert Surname:</label>
                                <input type="text" class="form-control" id="expertSurname" name="expertSurname" value="" />
                            </div>
                            <div class = "col-md-12">
                                <button id = "add-agreement" class = "btn btn-default mt25 mb10">Search &nbsp;<i class = "fa fa-lg fa-caret-right"></i></button>
                            </div> 
                        </form>
                            <div class = "agreement-box" style = "display:none">  
                            	
                            </div> 
					</div> 
				</div>
			</div>
        </div><!-- End of top box -->
        
        <div class="row pt25 mb25">
        <div class="col-md-3 blue topradius pq pending-header">
        	<h4 class ="midd textwhite"><i class="fa-pull-left fa fa-ban"></i> Pending Agreements 
        	<i class="pending-dd-btn1 fa-lg fa-pull-right fa fa-caret-square-o-down"></i>
            <i style="display:none" class="pending-dd-btn2 fa-lg fa-pull-right fa fa-caret-square-o-right"></i></h4> 
        </div>

          <div class="pending-box col-md-12 blue diaryradius pt25 pb25">
          
    				<?php require("pending-agreement-list.php"); ?> 

          </div>  <!-- End of table thing -->
          
		</div><!-- End of some other vital thing -->

        
		<div class="row pt25 mb25"><div class="agreed-header col-md-3 blue topradius pq"><h4 class ="midd textwhite"><i class="fa-pull-left fa fa-check"></i> Agreements <i class="agreed-dd-btn1 fa-lg fa-pull-right fa fa-caret-square-o-down"></i>
            <i style="display:none" class="agreed-dd-btn2 fa-lg fa-pull-right fa fa-caret-square-o-right"></i></h4> </h4></div>

                <div class="agreed-box col-md-12 blue diaryradius pt25 pb25">
                
    				<?php require("current-agreement-list.php"); ?>
                        
          </div>  <!-- End of table thing -->
          
		</div>
        
         <div class="row pt25 mb25"><div class="cancelled-header col-md-3 blue topradius pq"><h4 class ="midd textwhite"><i class="fa-pull-left fa fa-times"></i> Cancelled Agreements <i class="cancelled-dd-btn1 fa-lg fa-pull-right fa fa-caret-square-o-down"></i>
            <i style="display:none" class="cancelled-dd-btn2 fa-lg fa-pull-right fa fa-caret-square-o-right"></i></h4> </h4></div>

                <div class="cancelled-box col-md-12 blue diaryradius pt25 pb25">
    
					<?php require("cancelled-agreement-list.php"); ?>

          </div>  <!-- End of table thing -->
          
		</div><!-- End of some other vital thing -->
        
        
        
        <div class="row pt25 mb25"><div class="blocked-header col-md-3 blue topradius pq"><h4 class ="midd textwhite"><i class="fa-pull-left fa fa-ban"></i> Blocked Experts <i class="blocked-dd-btn1 fa-lg fa-pull-right fa fa-caret-square-o-down"></i>
            <i style="display:none" class="blocked-dd-btn2 fa-lg fa-pull-right fa fa-caret-square-o-right"></i></h4> </h4></div>

                <div class="blocked-box col-md-12 blue diaryradius pt25 pb25">
    
					<?php require("blocked-agreement-list.php"); ?>

          </div>  <!-- End of table thing -->
          
		</div><!-- End of some other vital thing -->
		
	</div><!-- End of everything -->
