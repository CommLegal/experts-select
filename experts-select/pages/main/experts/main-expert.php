<?php	
	//START - TURN ERRORS ON
	ini_set('display_errors',0);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
	//END - TURN ERRORS ON
?>

    <div class="container mb25">
    	<div class="jumbotron" style="border-radius: 20px; border: solid 1px #D6D6D6;">
        <?php if($userDetails['ea_forename'] == "Samuel"){ ?>
          <h2><u>Hello <?php echo $userDetails['ea_forename'] ?></u></h2>
          <p class="welcome">Development last took place on <?php echo $userDetails['ea_last_login']; ?>. </br></br>What are we going to develop today? 
          <i class="fa fa-hand-lizard-o"></i></p>
          <?php } else {?>
          <h2>Welcome back <?php echo $userDetails['ea_forename'] ?></h2>
          <p class="welcome">Click the buttons below to see your scheduled appointments.</p>
          <p class="welcome">To manage your appointments <a href = "<?php echo _ROOT ?>/index.php?page=appointment_book">click here.</a></p>
          <?php } ?>
        </div>
       <!-- <div class="bgtrans nop col-md-2 bg-blue"><!-- Big nest -->
       
        <div class="col-md-12 formbg">
			<?php
            
                //START - TURN ERRORS ON
                ini_set('display_errors',0);
                ini_set('display_startup_errors',1);
                error_reporting(-1);
                //END - TURN ERRORS ON
                
                //$todaydate = date('d-m-Y');
				$todaydate = date('Y-m-d');
         
                $tomorrow = new DateTime('tomorrow');
                $tomorrowdate = $tomorrow->format('Y-m-d');
    
                $yesterday = new DateTime('yesterday');
                $yesterdaydate = $yesterday->format('Y-m-d');	
                
                $class = $expert->check_appointment(str_pad($i, 2, '0', STR_PAD_LEFT).":".str_pad($j, 2, '0', STR_PAD_LEFT), $appArray, $app_slot);
                                                        
             ?>
             
             <div class="col-md-12">
                <h3 class="midd">
                	<span class="glyphicon glyphicon-calendar"></span>  Appointments</span>
                </h3>
                </br>
                <div class="title-divider"></div>
                </br>
                <div class="midd-narrow">
                    <button id="yesterdayApps" class= "btn btn-success pull-left" style="min-width:160px;"><i class="fa fa-hand-o-left"></i> Yesterday</button>
                    <button id="todaysApps" class= "btn btn-success" style= "min-width:160px;" >Today</button>
                    <button id="tomorrowApps" class= "btn btn-success pull-right" style="min-width:160px;"> Tomorrow <i class="fa fa-hand-o-right"></i></button>
                </div>
                </br>
             </div>
             
				   
            <div class="col-md-12" id="dateTable">
                                       
                
            </div>

	</div>
                            
   <!-- tab content -->
    </div><!-- end of container -->
</div> 


