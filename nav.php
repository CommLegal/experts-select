    <!-- Navigation -->
    <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-responsive" /></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right" style="padding-top:10px; padding-right:10px;">
					<li>
					  <div class="dropdown" style="margin-right:10px;">
						<button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-sign-in"></i> Register
						<span class="caret"></span></button>
						<ul class="dropdown-menu">
						  <li><a href="registration-mro.php">MRO <abbr title="Select if you represent an MRO" class="fat">(?)</abbr></a></li>
						  <li><a href="registration-expert.php">Expert <abbr title="Select if you're a health expert" class="fat">(?)</abbr></a></li>
						</ul>
					  </div>
					</li>
					<li>
					<!-- Trigger the modal with a button -->
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2"><i class="fa fa-user"></i>  Sign In</button>
					</li>
				</ul>
			</div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<!-- Modal -->
	<div id="myModal2" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Log In</h4>
			  </div>
			  <div class="modal-body">
				<form class="form-signin">
						<label for="inputEmail" class="sr-only">Email</label>
						<input type="email" id="inputEmail" class="form-control" placeholder="Email address" style="margin-bottom:5px;" required autofocus>
						<label for="inputPassword" class="sr-only">Password</label>
						<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
						<div class="checkbox">
						  <label>
							<input type="checkbox" value="remember-me"> Remember me
						  </label>
						</div>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				</form>
			  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-warning btn-sm" href="help.php">Help</button>
				  </div>
			</div>
            
            
	  </div>
	</div>