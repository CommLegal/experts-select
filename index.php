<?php 
require("includes/config.php");
header('Cache-Control: no cache');
session_start();
session_cache_limiter('private_no_expire');
session_start();
require("includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

session_start();

$login = new login_class();

$userDetails = $login->getDetails($_SESSION['CME_USER']['login_id']);

$selectMro = $conn->execute_sql("select", array("*"), "m_accounts", "ma_id=?", array("i" =>  $_SESSION['CME_USER']['login_id'])); 

//var_dump($_SESSION['CME_USER']);

//var_dump($_SESSION['USER_TEST']);

// Does not return a value, need to revise SQL query // var_dump($_SESSION['USER_TEST']);

if($_REQUEST['action'] == "signOut") 
	{
		session_destroy();
		header("location: index.php");
	}
?> 


<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo _ROOT ?>/images/favicon.ico">

    <title>Expert Select</title>
	
    <!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <!-- Bootstrap core CSS -->
    <link href="<?php echo _ROOT ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo _ROOT ?>/css/calendar.css" rel="stylesheet">
    <link href="<?php echo _ROOT ?>/css/cme-main.css" rel="stylesheet">
    <link href="<?php echo _ROOT ?>/css/bootstrap-datepicker.min.css" rel="stylesheet">  
    
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>

<?php 

//var_dump ($_SESSION['CME_USER']);

?>

	<!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
        	<div class="column col-md-3 col-xs-12">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6 col-md-12">
                                <a class="navbar-brand" href="index.php"><img src="<?php echo _ROOT ?>/images/logo.png" class="logo" /></a>
                            </div>
                            <div class="col-xs-6">
                                <div class="row col-md-12">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
          
          <div class="column col-md-9 col-xs-12" style="padding-right: 0px; margin-right: 0px">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="row col-md-12" style="padding-right: 0px; padding-top: 10px;  margin-right: 0px">
            <?php if(empty($_SESSION['CME_USER'])) { ?>
                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#login"><i class="fa fa-user"></i>&nbsp;&nbsp;  Sign In</button>
           		<?php } else { ?>

				<?php if($_SESSION['CME_USER']['type'] == "expert") { ?>
            			<a href="<?php echo _ROOT ?>/index.php?action=signOut" class="btn btn-success pull-right"><i class="fa fa-user-times"></i>&nbsp;&nbsp;  Sign Out</a>
                <?php	} 
                    
                    elseif ($_SESSION['CME_USER']['type'] == "mro") { ?>
            			<a href="<?php echo _ROOT ?>/index.php?action=signOut" class="btn btn-primary pull-right"><i class="fa fa-user-times"></i>&nbsp;&nbsp;  Sign Out</a>
                <?php } ?>

				<?php if($_SESSION['CME_USER']['type'] == "expert") { ?>
                    <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle pull-right" type="button" id="account" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fa fa-user"></i>&nbsp;&nbsp;Your Account&nbsp;<span class="caret"> </span>
                    </button>
                <?php	} 
                
                elseif ($_SESSION['CME_USER']['type'] == "mro") { ?>
                    <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle pull-right" type="button" id="account" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fa fa-user"></i>&nbsp;&nbsp;Your Account&nbsp;<span class="caret"> </span>
                    </button>
                <?php } ?>
                    
			  <?php if($_SESSION['CME_USER']['type'] == "expert") { ?>
                  <ul class="fa-ul dropdown-menu pull-right account" aria-labelledby="account">
                    <li><a href="index.php?page=account"><i class = "fa fa-user"></i>&nbsp; My Profile</a></li>
                    <li><a href="index.php?page=agreements-expert"><i class = "fa fa-thumbs-o-up"></i>&nbsp; Agreements</a></li>
                    <li><a href="index.php?page=appointments"><i class = "fa fa-calendar"></i>&nbsp; Appointment Manager</a></li>
         			<li><a href="index.php?page=reportbuilderform"><i class = "fa fa-file-text"></i>&nbsp; Report Builder</a></li>
                    <li><a href="index.php?page=upload-expert"><i class = "fa fa-upload"></i>&nbsp; Document Uploader</a></li>
                  </ul>

              <?php	} 
              elseif ($_SESSION['CME_USER']['type'] == "mro") { ?>
                  <ul class="fa-ul dropdown-menu pull-right account" aria-labelledby="account">
                    <li><a href="index.php?page=account"><i class = "fa fa-user"></i>&nbsp; My Profile</a></li>
                    <li><a href="index.php?page=appointments"><i class = "fa fa-calendar"></i>&nbsp; Appointments</a></li>
                    <?php if($selectMro[0]['ma_permissions'] == "3") { ?> <li><a href="index.php?page=agreements-mro"><i class = "fa fa-thumbs-o-up"></i>&nbsp; Agreements</a></li>
                    <li><a href="index.php?page=user-panel"><i class = "fa fa-users"></i>&nbsp; User Panel</a></li><?php } ?>
                  </ul>				  
              <?php } ?>
                </div>
            <?php } ?>
            </div>

            <div class="row col-md-12" style="padding-right: 0px; margin-right: 0px">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right navMenu pull-right">
                        <li class="active"><a href="<?php echo _ROOT ?>"><span class="glyphicon glyphicon-home pr10"></span>Home</a></li>
                        
                        <?php if($_SESSION['CME_USER']['type'] == "") { ?>
                            <li><a href="index.php?displayPage=features-mro">MROs</a></li>
                            <li><a href="index.php?displayPage=features-expert">Experts</a></li>
                        <?php } ?>                       <!--  if account type is mro or expert, show stuff   -->
                        <?php if(($_SESSION['CME_USER']['type'] == "expert") OR ($_SESSION['CME_USER']['type'] == "mro") ){ ?>
                            <li><a href="index.php?page=demo">Demo</a></li>
                            <li><a href="index.php?page=help">Help</a></li>
                            <li><a href="index.php?page=contact">Contact</a></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
           </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <?php if(empty($_SESSION['CME_USER'])) { ?>
 
    <div class="container-fluid subheader">
    	<div class="container">
        	<div id = "headerfix" class="row">
            	<div class="col-md-4 col-xs-12">
                
                	<h3><span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;A bit about us</h3>
                    
                    <p>Expert Select exists to make life easier for both Medical Experts and Medical Reporting Organizations. Join for free
                    today to see our booking system, appointment manager and other essential features to keep on track!</p>
                </div>
                <div class="col-md-4 col-xs-12">
                
                	<h3><span class="glyphicon glyphicon-arrow-right"></span>&nbsp;I'm an MRO</h3>
                    
                    <p>Medical Reporting Organizations can use our system to find Medical Experts, book specific appointments and set up venues for
                    appointments. You can rate your experiences with other Experts and list them by price, rating and distance.</p>
                    
                    <a href="<?php echo _ROOT ?>/index.php?displayPage=features-mro" class="btn btn-success" 
                    style="position: relative; float:left;"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Features &amp; Pricing</a>
                    <a href="<?php echo _ROOT ?>/index.php?displayPage=mro-registration" class="btn btn-success" 
                    style="position: relative; float:right;">Register&nbsp;
                    <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                    <div class="clear: both;"></div>
                </div>
                <div class="col-md-4 col-xs-12">
                
                	<h3><span class="glyphicon glyphicon-arrow-right"></span>&nbsp;I'm an Expert</h3>
                    
                    <p>We have everything you need to keep track of your appointments and bookings. Connect with
                    MROs and build up a reputation with our ratings system. Build your profile and upload your CV.
                    </p>
                    
                    <br>
                    <a href="<?php echo _ROOT ?>/index.php?displayPage=features-expert" class="btn btn-success" 
                    style="position: relative; float:left;">
                    <span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Features &amp; Pricing</a>
                    <a href="<?php echo _ROOT ?>/index.php?displayPage=expert-registration" class="btn btn-success" 
                    style="position: relative; float:right;">Register&nbsp;&nbsp;
                    <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                    <div class="clear: both;"></div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- Page Content -->
            <?php
			
			$pageLink = "";
			
			if($_SESSION['CME_USER']['type'] == "expert"){
				$pageLink = "page";	
			}
			elseif($_SESSION['CME_USER']['type'] == "mro"){
				$pageLink = "page";	
			}
			else {$pageLink = "displayPage";}
			
                if(!empty($_SESSION['CME_USER'])) {
                    if(empty($_REQUEST['displayPage']) || ($_REQUEST['displayPage'] == "index")){
						if($_SESSION['CME_USER']['type'] == "expert") {
							require_once("includes/expert_class.php");
							$expert = new expert_class;
							
							require("pages/main/experts/pages/mini-header.php");
							
							if(empty($_REQUEST['page'])) {
								require("pages/modals/expert-check-appt.php");
								require("pages/main/experts/main-expert.php");
							}
							elseif($_REQUEST['page'] == "account") {
								require("pages/main/experts/pages/account.php");
							}
							elseif($_REQUEST['page'] == "appointments") {
								require("pages/modals/expert_add_venue.php");
								require("pages/main/experts/pages/appointments.php");
							}
							elseif($_REQUEST['page'] == "venues") {
								//require("pages/modals/expert_add_venue.php");
								require("pages/main/experts/pages/venues.php");
							}
							elseif($_REQUEST['page'] == "demo") {
								require("pages/main/experts/pages/comingsoon.php");
							}
							elseif($_REQUEST['page'] == "updates") {
								//require("pages/modals/expert_add_venue.php");
								require("pages/main/experts/pages/updates.php");
							}
							elseif($_REQUEST['page'] == "appointment_book") {
								require("pages/main/experts/pages/appointment-book.php");
							}
							elseif($_REQUEST['page'] == "appointment_book-slot") {
								//require("pages/modals/expert_add_venue.php");
								require("pages/main/experts/pages/thisdoc.php");
							}
							elseif($_REQUEST['page'] == "request_analysis") {
								//require("pages/modals/expert_add_venue.php");
								require("pages/main/experts/pages/request-analysis.php");
							}
							elseif($_REQUEST['page'] == "waitingroom-expert") {
								//require("pages/modals/expert_add_venue.php");
								require("pages/main/experts/pages/waitingroom-expert.php");
								//require("pages/main/experts/pages/comingsoon.php");
							}
							elseif($_REQUEST['page'] == "appinfo") {
								//require("pages/modals/expert_add_venue.php");
								require("pages/main/experts/pages/appinfo.php");
							}
							elseif($_REQUEST['page'] == "main-expert") {
								//require("pages/modals/expert_add_venue.php");
								require("pages/main/experts/pages/main-expert.php");
							}
							elseif($_REQUEST['page'] == "request-analysis") {
								require("pages/main/experts/pages/request-analysis.php");
								//require("pages/main/experts/pages/comingsoon.php");
							}
							elseif($_REQUEST['page'] == "request-analysis-temp") {
								require("pages/main/experts/pages/request-analysis-temp.php");
								//require("pages/main/experts/pages/comingsoon.php");
							}
							elseif($_REQUEST['page'] == "upload-expert") {
								require("pages/main/experts/pages/upload-expert.php");
							}
							elseif($_REQUEST['page'] == "csvtest") {
								require("csvtest.php");
							}
							elseif($_REQUEST['page'] == "upload-expert-action") {
								require("pages/main/experts/pages/upload-expert-action.php");
							}
							elseif($_REQUEST['page'] == "upload-expert-delete") {
								require("pages/main/experts/pages/upload-expert-delete.php");
							}
							elseif($_REQUEST['page'] == "agreements-expert") {
								require("pages/main/experts/pages/agreements-expert.php");
							}
							elseif($_REQUEST['page'] == "find-app-requests") {
								require("includes/experts/find-app-requests.php");
							}
							elseif($_REQUEST['page'] == "message") {
								require("pages/main/experts/pages/message.php");				//Send message
							}
							elseif($_REQUEST['page'] == "contact") {
								require("pages/contact.php");
							}
							elseif($_REQUEST['page'] == "contact_action") {
								require("pages/contact_action.php");
							}
							elseif($_REQUEST['page'] == "help") {
								require("pages/help.php");
							}
							elseif($_REQUEST['page'] == "about-us") {
								require("pages/about-us.php");
							}
							elseif($_REQUEST['page'] == "privacy-policy") {
								require("pages/privacy-policy.php");
							}
							elseif($_REQUEST['page'] == "terms-and-conditions") {
								require("pages/terms-and-conditions.php");
							}
							elseif($_REQUEST['page'] == "reportbuilderform") {
								require("pages/main/experts/pages/reportbuilderform.php");
							}
						}
						
						elseif($_SESSION['CME_USER']['type'] == "mro") {
							
								require("pages/main/mro/pages/mini-header.php");
									//UPDATE THE IF STATEMENT/PAGE BELOW TO DISPLAY AS REQUIRED
								if(empty($_REQUEST['page'])) {
									require("pages/main/mro/pages/main-mro.php");
							}
								if($_REQUEST['page'] == "message") {
									require("pages/main/mro/pages/message.php");				
							}
								if($_REQUEST['page'] == "demo") {
									require("pages/main/experts/pages/comingsoon.php");
							}
							if($_REQUEST['page'] == "appointments") {
									require("pages/main/mro/pages/appointments.php");
							}
								if($_REQUEST['page'] == "venues2") {
								//require("pages/modals/expert_add_venue.php");
								require("pages/main/mro/pages/venues2.php");
							}
								if(($_REQUEST['page'] == "user-panel") && ($selectMro[0]['ma_permissions'] == "3")){
									require("pages/main/mro/pages/user-panel.php");
							}
								if(($_REQUEST['page'] == "user-panel") && ($selectMro[0]['ma_permissions'] < "3")){
									require("denied.php");
							}
								if($_REQUEST['page'] == "appinfo") {
									require("pages/main/mro/pages/appinfo.php");
							}
								if($_REQUEST['page'] == "users-mro") {
									require("pages/main/mro/pages/users-mro.php");
							}
								if($_REQUEST['page'] == "findapps-mro") {
									require("pages/main/mro/pages/findapps-mro.php");
							}
								if($_REQUEST['page'] == "waitingroom-mro") {
									require("pages/main/mro/pages/waitingroom-mro.php");
									//require("pages/main/mro/pages/comingsoon.php");
							}
								if($_REQUEST['page'] == "patient-create") {
									require("pages/main/mro/pages/patient-create.php");			
							}
								if($_REQUEST['page'] == "main-mro") {
									require("pages/main/mro/pages/main-mro.php");
							}
								if($_REQUEST['page'] == "updates-mro") {
									require("pages/main/mro/pages/updates-mro.php");
							}
								if($_REQUEST['page'] == "request-analysis") {
									require("pages/main/mro/pages/request-analysis.php");
									//require("pages/main/mro/pages/comingsoon.php");
							}
								if($_REQUEST['page'] == "request-analysis-temp") {
									require("pages/main/mro/pages/request-analysis-temp.php");
									//require("pages/main/mro/pages/comingsoon.php");
							}
								if($_REQUEST['page'] == "appointment-book") {
									require("pages/main/mro/pages/appointment-book.php");
							}
								if($_REQUEST['page'] == "account") {
									require("pages/main/mro/pages/account.php");
							}
								if($_REQUEST['page'] == "agreements-mro") {
									require("pages/main/mro/pages/agreements-mro.php");
							}
								if($_REQUEST['page'] == "contact") {
									require("pages/contact.php");
							}
								if($_REQUEST['page'] == "contact_action") {
									require("pages/contact_action.php");
							}
								if($_REQUEST['page'] == "help") {
									require("pages/help.php");
							}
								if($_REQUEST['page'] == "privacy-policy") {
									require("pages/privacy-policy.php");
							}
								if($_REQUEST['page'] == "terms-and-conditions") {
									require("pages/terms-and-conditions.php");
							}
								if($_REQUEST['page'] == "about-us") {
									require("pages/about-us.php");
							}
								if($_REQUEST['page'] == "csvtest") {
									require("csvtest.php");
							}
								if($_REQUEST['page'] == "testaction") {
									require("testaction.php");
							}

						}	
                    }
                }
				
						else {
							require("pages/modals/login.php");
							/* require("pages/modals/help.php"); */
							if(empty($_REQUEST['displayPage']) || ($_REQUEST['displayPage'] == "index")){
								require("pages/homepage.php");	
							}
							elseif($_REQUEST['displayPage'] == "mro-registration") {
								require("pages/reg/registration-mro.php");
							}
							elseif($_REQUEST['displayPage'] == "forgotpassword") {
								require("forgotpassword.php");
							}
							elseif($_REQUEST['displayPage'] == "confirm-mro.php") {
								require("pages/confirm/confirm-mro.php");
							}
							elseif($_REQUEST['displayPage'] == "confirm-mro2.php") {
								require("pages/confirm/confirm-mro2.php");
							}
							elseif($_REQUEST['displayPage'] == "main-mro.php") {
								require("pages/main/mro/main-mro.php");
							}
							elseif($_REQUEST['displayPage'] == "expert-registration") {
								require("pages/reg/registration-expert.php");
							}
							elseif($_REQUEST['displayPage'] == "account-activate") {
								require("pages/confirm/account-activate.php");
							}
							elseif($_REQUEST['displayPage'] == "main-expert.php") {
								require("pages/main/main-expert.php");
							}
							elseif($_REQUEST['displayPage'] == "main-finder.php") {
								require("pages/main/mro/pages/main-finder.php");
							}
							elseif($_REQUEST['displayPage'] == "users-mro") {
								require("pages/main/mro/pages/users-mro.php");
							}
							elseif($_REQUEST['displayPage'] == "about-us") {
									require("pages/about-us.php");
							}
							elseif(($_REQUEST['displayPage'] == "about-us") && ($_SESSION['CME_USER'] == "")) {
								require("pages/about-us.php");
							}
							elseif(($_REQUEST['displayPage'] == "contact") && ($_SESSION['CME_USER'] == "")) {
								require("pages/contact.php");
							}
							elseif(($_REQUEST['displayPage'] == "contact_action") && ($_SESSION['CME_USER'] == "")){
								require("pages/contact_action.php");
							}

							elseif(($_REQUEST['displayPage'] == "help") && ($_SESSION['CME_USER'] == "")) {
								require("pages/help.php");
							}
							elseif(($_REQUEST['displayPage'] == "privacy-policy") && ($_SESSION['CME_USER'] == "")) {
								require("pages/privacy-policy.php");
							}
							elseif(($_REQUEST['displayPage'] == "features-mro") && ($_SESSION['CME_USER'] == "")) {
								require("pages/main/mro/pages/features-mro.php");
							}
							elseif(($_REQUEST['displayPage'] == "features-expert") && ($_SESSION['CME_USER'] == "")) {
								require("pages/main/experts/pages/features-expert.php");    
							}
							elseif(($_REQUEST['displayPage'] == "badlogin") && ($_SESSION['CME_USER'] == "")) {
								require("pages/badlogin.php");    
							}
							elseif(($_REQUEST['displayPage'] == "privacy-policy") && ($_SESSION['CME_USER'] == "")) {
								require("pages/privacy-policy.php");
							}
							elseif(($_REQUEST['displayPage'] == "terms-and-conditions") && ($_SESSION['CME_USER'] == "")) {
								require("pages/terms-and-conditions.php");
							}	
						}
		
						
					?>
    <!-- /.body container -->
    
<!-- Footer bit -->
   <div class="container-fluid top-border" style="background-color:#dcddde;">
	<div class="container">
        <div class="row pb25 pt25">
				<div class="col-xs-4 col-md-4 column">
					<h4>Address</h4>
					<p class="text-grey">OneCall Direct<br />
                    First Point<br />
                    Doncaster<br />
                    DN4 5JQ</p><br />
				</div>
				<div class="col-xs-4 col-md-4 column whitebg">
					<h4>Corporate Information</h4>
					<ul class="nav">
                      <li><a href="index.php?<?php echo $pageLink ?>=about-us">About Us&nbsp;&nbsp;<span class="glyphicon glyphicon-circle-arrow-right pull-right"></span></a></li>
                      <!--<li><a href="index.php?displayPage=delivery-info">Delivery Information&nbsp;&nbsp;<span class="glyphicon glyphicon-circle-arrow-right pull-right"></span></a></li>-->
                      <li><a href="index.php?<?php echo $pageLink ?>=privacy-policy">Privacy Policy&nbsp;&nbsp;<span class="glyphicon glyphicon-circle-arrow-right pull-right"></span></a></li>
                      <!-- <li><a href="?page=elements">Elements&nbsp;&nbsp;<span class="glyphicon glyphicon-circle-arrow-right pull-right"></span></a></li> -->
                      <li><a href="index.php?<?php echo $pageLink ?>=terms-and-conditions">Terms & Conditions&nbsp;&nbsp;<span class="glyphicon glyphicon-circle-arrow-right pull-right"></span></a></li>
                    </ul>
				</div>
				<div class="col-xs-4 col-md-4 column whitebg">
					<h4>Social Media</h4>
                    <div class="column col-md-3 col-xs-6">
						<img class="img-responsive" src="<?php echo _ROOT ?>/images/twitter-logo.png" alt="Follow us on Twitter">
                    </div>
                    <div class="column col-md-3 col-xs-6">
						<img class="img-responsive" src="<?php echo _ROOT ?>/images/facebook-logo.png" alt="Follow us on Facebook">
                    </div>
                    <div class="column col-md-3 col-xs-6">
						<img class="img-responsive" src="<?php echo _ROOT ?>/images/youtube-logo.png" alt="Follow us on YouTube">
                    </div>
				</div>
        </div>
        <!-- /.row -->
	</div>    
    </div><!-- /.footer container --> 
    <!-- /container -->
    
    <div class="container-fluid bottom-footer">
    	<div class="container">
            <div class="row pb25 pt25">
                <div class="col-xs-12 col-md-6">&copy Compare Medical Experts <?php echo date("Y"); ?></div>  
                <div class="col-xs-12 col-md-6">
                <a href="index.php?<?php echo $pageLink ?>=privacy-policy" class="bottom-footer pull-right">Privacy Policy</a>
                <span class="pull-right">&nbsp;|&nbsp;</span>
                <a href="index.php?<?php echo $pageLink ?>=terms-and-conditions" class="bottom-footer pull-right">Terms &amp; Conditions</a></div>          
            </div>
        </div>
    </div>

    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>  -->
    
    <!-- <script type="text/javascript" src="<?php //echo $_ROOT ?>sig/jquery.signature.js"></script> -->

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js" async defer></script>

    <!--<script src="/js/jquery.validate.js"></script>-->
    
    <script src="<?php echo _ROOT ?>/js/custom.js"></script>
    <script src="<?php echo _ROOT ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo _ROOT ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo _ROOT ?>/locales/bootstrap-datepicker.en-GB.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo _ROOT ?>/js/ie10-viewport-bug-workaround.js"></script>
 
    <!-- Cookie bar -->
    <script src="<?php echo _ROOT ?>/js/jquery.cookiebar.js"></script>
    
    <!-- Validation -->
    <script src="<?php echo _ROOT ?>/js/jquery.validate.js"></script>
    <script src="<?php echo _ROOT ?>/js/additional-methods.js"></script>
    <script src="<?php echo _ROOT ?>/js/validation.js"></script>
	<script src="<?php echo _ROOT ?>/js/postcoder.js"></script>

<!--
     Maps works in header
    <script src="https://maps.googleapis.com/maps/api/js" async defer></script>
-->

<script>
//Wills magical mystical cookie bar
	$.cookieBar(); 
//Use this to change classes according to the browser

// jQBrowser v0.2: http://davecardwell.co.uk/javascript/jquery/plugins/jquery-browserdetect/
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(c/a))+String.fromCharCode(c%a+161)};while(c--){if(k[c]){p=p.replace(new RegExp(e(c),'g'),k[c])}}return p}('Ö ¡(){® Ø={\'¥\':¡(){¢ £.¥},\'©\':{\'±\':¡(){¢ £.©.±},\'¯\':¡(){¢ £.©.¯}},\'¬\':¡(){¢ £.¬},\'¶\':¡(){¢ £.¶},\'º\':¡(){¢ £.º},\'Á\':¡(){¢ £.Á},\'À\':¡(){¢ £.À},\'½\':¡(){¢ £.½},\'¾\':¡(){¢ £.¾},\'¼\':¡(){¢ £.¼},\'·\':¡(){¢ £.·},\'Â\':¡(){¢ £.Â},\'³\':¡(){¢ £.³},\'Ä\':¡(){¢ £.Ä},\'Ã\':¡(){¢ £.Ã},\'Å\':¡(){¢ £.Å},\'¸\':¡(){¢ £.¸}};$.¥=Ø;® £={\'¥\':\'¿\',\'©\':{\'±\':²,\'¯\':\'¿\'},\'¬\':\'¿\',\'¶\':§,\'º\':§,\'Á\':§,\'À\':§,\'½\':§,\'¾\':§,\'¼\':§,\'·\':§,\'Â\':§,\'³\':§,\'Ä\':§,\'Ã\':§,\'Å\':§,\'¸\':§};Î(® i=0,«=».ì,°=».í,¦=[{\'¤\':\'Ý\',\'¥\':¡(){¢/Ù/.¨(°)}},{\'¤\':\'Ú\',\'¥\':¡(){¢ Û.³!=²}},{\'¤\':\'È\',\'¥\':¡(){¢/È/.¨(°)}},{\'¤\':\'Ü\',\'¥\':¡(){¢/Þ/.¨(°)}},{\'ª\':\'¶\',\'¤\':\'ß Ñ\',\'¥\':¡(){¢/à á â/.¨(«)},\'©\':¡(){¢ «.¹(/ã(\\d+(?:\\.\\d+)+)/)}},{\'¤\':\'Ì\',\'¥\':¡(){¢/Ì/.¨(«)}},{\'¤\':\'Í\',\'¥\':¡(){¢/Í/.¨(°)}},{\'¤\':\'Ï\',\'¥\':¡(){¢/Ï/.¨(«)}},{\'¤\':\'Ð\',\'¥\':¡(){¢/Ð/.¨(«)}},{\'ª\':\'·\',\'¤\':\'å Ñ\',\'¥\':¡(){¢/Ò/.¨(«)},\'©\':¡(){¢ «.¹(/Ò (\\d+(?:\\.\\d+)+(?:b\\d*)?)/)}},{\'¤\':\'Ó\',\'¥\':¡(){¢/æ|Ó/.¨(«)},\'©\':¡(){¢ «.¹(/è:(\\d+(?:\\.\\d+)+)/)}}];i<¦.Ë;i++){µ(¦[i].¥()){® ª=¦[i].ª?¦[i].ª:¦[i].¤.Õ();£[ª]=É;£.¥=¦[i].¤;® ­;µ(¦[i].©!=²&&(­=¦[i].©())){£.©.¯=­[1];£.©.±=Ê(­[1])}ê{® Ç=Ö ë(¦[i].¤+\'(?:\\\\s|\\\\/)(\\\\d+(?:\\\\.\\\\d+)+(?:(?:a|b)\\\\d*)?)\');­=«.¹(Ç);µ(­!=²){£.©.¯=­[1];£.©.±=Ê(­[1])}}×}};Î(® i=0,´=».ä,¦=[{\'ª\':\'¸\',\'¤\':\'ç\',\'¬\':¡(){¢/é/.¨(´)}},{\'¤\':\'Ô\',\'¬\':¡(){¢/Ô/.¨(´)}},{\'¤\':\'Æ\',\'¬\':¡(){¢/Æ/.¨(´)}}];i<¦.Ë;i++){µ(¦[i].¬()){® ª=¦[i].ª?¦[i].ª:¦[i].¤.Õ();£[ª]=É;£.¬=¦[i].¤;×}}}();',77,77,'function|return|Private|name|browser|data|false|test|version|identifier|ua|OS|result|var|string|ve|number|undefined|opera|pl|if|aol|msie|win|match|camino|navigator|mozilla|icab|konqueror|Unknown|flock|firefox|netscape|linux|safari|mac|Linux|re|iCab|true|parseFloat|length|Flock|Camino|for|Firefox|Netscape|Explorer|MSIE|Mozilla|Mac|toLowerCase|new|break|Public|Apple|Opera|window|Konqueror|Safari|KDE|AOL|America|Online|Browser|rev|platform|Internet|Gecko|Windows|rv|Win|else|RegExp|userAgent|vendor'.split('|')))

/* ----------------------------------------------------------------- */

var aol       = $.browser.aol();       // AOL Explorer
var camino    = $.browser.camino();    // Camino
var firefox   = $.browser.firefox();   // Firefox
var flock     = $.browser.flock();     // Flock
var icab      = $.browser.icab();      // iCab
var konqueror = $.browser.konqueror(); // Konqueror
var mozilla   = $.browser.mozilla();   // Mozilla
var msie      = $.browser.msie();      // Internet Explorer Win / Mac
var netscape  = $.browser.netscape();  // Netscape
var opera     = $.browser.opera();     // Opera
var safari    = $.browser.safari();    // Safari
			
var userbrowser     = $.browser.browser(); //detected user browser

//operating systems

var linux = $.browser.linux(); // Linux
var mac   = $.browser.mac();   // Mac OS
var win   = $.browser.win();   // Microsoft Windows

//version

var userversion    = $.browser.version.number();

/* ----------------------------------------------------------------- */
			
if (mac == true) { 
	
	$("html").addClass("mac"); 
			
	
} else if (linux == true) {
	
	$("html").addClass("linux"); 
	
} else if (win == true) {
	
	$("html").addClass("windows");
	
}

/* ----------------------------------------------------------------- */			

if (userbrowser == "Safari") {
	
	$("#headerfix").addClass("mt25"); 
	//alert("header fixed");
	
} else if (userbrowser == "Firefox") {

	$("html").addClass("firefox"); 
	
} else if (userbrowser == "Chrome") {

	$("html").addClass("chrome"); 

} else if (userbrowser == "Camino") {

	$("html").addClass("camino"); 

} else if (userbrowser == "AOL Explorer") {

	$("html").addClass("aol"); 

} else if (userbrowser == "Flock") {

	$("html").addClass("flock"); 

} else if (userbrowser == "iCab") {

	$("html").addClass("icab"); 

} else if (userbrowser == "Konqueror") {

	$("html").addClass("konqueror"); 

} else if (userbrowser == "Mozilla") {

	$("html").addClass("mozilla"); 

} else if (userbrowser == "Netscape") {

	$("html").addClass("netscape"); 

} else if (userbrowser == "Opera") {

	$("html").addClass("opera"); 

} else if (userbrowser == "Internet Explorer") {
	
	$("html").addClass("ie");
	
} else {}

$("html").addClass("" + userversion + "");




//Lowercase to uppercase, whitespace, getoutmiface

$("#postcode, #clientPostcode, #vbook-postcode, #line1, #ma_postcode, #postcode_search, #ea_postcode, #v_postcode").bind('keyup', function (e) {
	if (e.which >= 97 && e.which <= 122) {
		var newKey = e.which - 32;
		e.keyCode = newKey;
		e.charCode = newKey;
	}
	$(this).val(($(this).val()).toUpperCase());
	$(this).val($(this).val().replace(/\s+/g, ''));
});


</script>
    
</body>
</html>
