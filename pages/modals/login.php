<!-- Modal -->
	<div id="login" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Log In</h4>
			  </div>
			  <div class="modal-body">
              
              
				<form action="" method="post" enctype="multipart/form-data" id="loginForm" name="loginForm">
                
                
                	<div class="col-md-12">
                    	<div class="input-group margin-bottom-sm mb25">
                    		<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                        	<input class="form-control" type="text" id="inputEmail" placeholder="Email address" autofocus>
                    	</div>
                    </div>

                    <div class="col-md-12">
                    	<div class="input-group margin-bottom-sm mb25">
                    		<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        	<input class="form-control" type="password" id="inputPassword" placeholder="Password">
                   		</div>
                    </div>
                    

                
                <!--
                <div class = "col-lg-12">
                    <div class="input-group margin-bottom-sm mt25 mb25">
                      <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                      <input class="form-control" type="text" placeholder="Email address">
                    </div>
                    
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                      <input class="form-control" type="password" placeholder="Password">
                    </div>
                	-->
                    
				<div class = "row mt25">
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Close</button>
                    </div>                    
                                </form>
                    </div>

            <div class="modal-message"></div>
            <div style="clear: both;"></div>
          </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-sm help_btn">Help</button>
                
              </div>
              
              <div class="forgot_password col-md-12" style="display:none;"><p>Forgot password? <a href="?displayPage=forgotpassword">Click here</a></p></div>
        </div>
  </div>
</div>
