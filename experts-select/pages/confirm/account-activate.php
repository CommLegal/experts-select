<?php 
if($_POST) {
	$login = new login_class;
	if(!$login->activate_user($_POST['login_id'], $_POST['activation_code'], $_POST['login_type'])){
		$login_error = "The activation code isn't the same as the one we have stored, please try again";
	}
}
?>   
    <!-- Page	Content -->
<div class="container">  
    <div class="row">
            <div class="col-md-9 hider">
                <img class="img-responsive customer-img" src="<?php echo _ROOT ?>/images/medical-experts-banner.png" alt="Request a demo">
      </div>
        <div class="col-md-3 col-xs-12">
            <div class="row mb25">
                <div class="col-md-12 col-xs-12">
                     <img class="img-responsive customer-img" src="http://placehold.it/650x300" alt="Register">
                     <a href="<?php echo _ROOT ?>/index.php?displayPage=mro-registration" class="btn btn-success" style="position: absolute; bottom: 5px; left: 30px;">MRO&nbsp;&nbsp;<span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                     <a href="<?php echo _ROOT ?>/index.php?displayPage=expert-registration" class="btn btn-success" style="position:absolute; bottom: 5px; right: 30px;">Expert&nbsp;&nbsp;<span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                </div>
            </div>   
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <img class="img-responsive customer-img" src="http://placehold.it/650x300" alt="Request a demo">
                </div>
            </div>       
        </div>
   </div>
   
   <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active">Activate your account</li>
   </ol>
   
	<section class="container mb25">
		<div class="container-page">
        	<?php if(empty($_POST) || !(empty($login_error))) { ?>
        	<div class="col-md-6 formbg">
            <form data-toggle="validator" role="form" id="expert-registration" name="expert-registration" method="post">	
				<h3>You're almost there...</h3>	
                <p>Please enter the 4 digit code in the email sent to the one used when registering in the box below</p>		  			
				<div class="form-group">
                    <div class="form-group col-lg-12">
                      <label class="control-label">Activation code</label>
                        <input type="text" name="activation_code" class="form-control" id="activation_code" value="" placeholder="Activation code" required>
                    </div>
                     
                    <div class="form-group col-lg-12 mb25">
                    	<input type="hidden" name="login_id" value="<?php echo $_REQUEST['login'] ?>" />
                        <input type="hidden" name="login_type" value="<?php echo $_REQUEST['login_type'] ?>" />
                 		<button type="submit" class="btn btn-primary">Confirm</button>
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
                <h3><span class="glyphicon glyphicon-ok-sign pr10"></span>Your activation code has been accepted</h3>
                    <p>Thanks for going through our security check, you are now able to log in via the "sign in" button at the top with the email address and password used to register.</p>
                    <p>Once logged in you will be able to complete your profile and start using the system. There's plenty of help available via the help section, and video training or you can do it the old fashioned way and pick up the phone and call us</p>
            </div>
          <?php } ?>
        </div>
	</section><!--row-->
</div>

