    <!-- Page	Content -->
<?php 
if($_POST) {
	$login = new login_class;
	if(!$login->create_user($_POST['email'], $_POST['password'], $_POST['login_type'])){
		$login_error = "There has been a problem creating your account, this could be because the username or password are incorrect or there may be an account already for that email address";
	}
	
}
?>
<div class="container">  
<div class = "row">
        <div class="col-md-12 hider mb25">
        	<img class="maxwid img-responsive customer-img" src="<?php echo _ROOT ?>/images/mro_reg.png" alt="Request a demo">
  		</div>
</div>

    <section class="container mb25">
		<div class="container-page">
       		<?php if(empty($_POST) || !(empty($login_error))) { ?>
			<div class="col-md-6 formbg">
            <form data-toggle="validator" role="form" id="mro-registration" name="mro-registration" method="post">	
				<h3>MRO Registration</h3>			  			
				<div class="form-group">
                
                    <div class="form-group col-lg-12">
                      <label class="control-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="email" value="" placeholder="Email you will use to log in with" required>
                    </div>
                    
                    
                    <div class="form-group col-lg-6">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" data-minlength="6" class="form-control" placeholder="Choose a password" id="password" value="" required>
                        <span class="help-block with-errors">Minimum of 6 characters</span>
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label class="control-label">Confirm Password</label>
                        <input type="password" name="passwordconfirm" data-match="#password" placeholder="Confirm your password" 
                        data-match-error="Whoops, these don't match" class="form-control" id="passwordconfirm" value="" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    
                    <div class="form-group col-lg-12 mb25">
                    	<input type="hidden" name="login_type" value="mro-registration" />
                 		<button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    
                    <div class="form-group col-lg-12 mb25">
                    	By clicking on "Register" you agree to our <a href="file:///C|/xampp/htdocs/terms.php">Terms and Conditions.</a>
                    </div>
                    
            	</div>
                </form> 
                <?php if($login_error) { ?>
                <div class="col-lg-12 well red">
                    <?php echo $login_error ?>
                </div>
                <?php } ?>
		  </div>
          <?php } else { ?>
          		<div class="col-md-6">
					<h3>Thankyou for registering</h3>
						<p>A confirmation email has been sent to the email address used when registering.</p>
						<p>If you do not recieve the email shortly please check your spam filter. If you would like us to send another email, please <a href="<?php echo $_SERVER['REQUEST_URI'] ?>&action=resend_email">click here.</a></p>
                        <p>All you have to do to get started with your account is click on the link in the email and enter the 4 digit code. This is for your security so we can be sure that you have access to the email address that your are using.</p>
						<p><a href="<?php echo _ROOT ?>/index.php?displayPage=main-expert.php">Next page.</a></p>
				</div>
          <?php } ?>
          <div class="col-md-6">
          	<h3>Benefits of registration</h3>
            <div class="col-lg-12 lh2"><span class="glyphicon glyphicon-check pr10"></span>It's FREE</div>
            <div class="col-lg-12 lh2"><span class="glyphicon glyphicon-check pr10"></span>Connect with registered experts</div>
            <div class="col-lg-12 lh2"><span class="glyphicon glyphicon-check pr10"></span>View contracts and agreements</div>
            <div class="col-lg-12 lh2"><span class="glyphicon glyphicon-check pr10"></span>Book and manage appointments</div>
            <div class="col-lg-12 lh2"><span class="glyphicon glyphicon-check pr10"></span>Build up a reputation with the ratings system</div>
            <div class="col-lg-12 lh2"><span class="glyphicon glyphicon-check pr10"></span>Create and manage personalised user accounts for your case handlers</div>

            
            
          </div> 
		</div>
	</section>
<!--row-->
</div>