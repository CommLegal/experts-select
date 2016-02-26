<?php 
	if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
	else {$btncolor = "btn btn-success";}
?>


<div class="container main mb25"> 
	<div class="col-md-12 mb25">
		<h3>Appointment Book</h3>  
        <div class="title-divider"></div>                
	</div> 
    
    <!--<form action="" method="post" enctype="multipart/form-data" name="expert-book-app" id="expert-book-app" role="form"> -->
     <form action="" method="post" enctype="multipart/form-data" name="expert-add-app" id="expert-add-app" role="form">	
        <div class="col-lg-6">
            <p>Click below to view available appointment date. Please be sure to check this date is suitable well in advance.</p>
            <div class="input-group date">
                <input id="date-picker-ven" name="date-picker-ven" value="<?php echo date("d-m-Y");?>" type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>
            </br>
            <input id="submit-data" type="submit" value="Submit" class = "<?php echo $btncolor ?>" />
            </br></br>
        </div>
    </form> 
    <div class="col-md-12 formbg">
		<?php
		
			//START - TURN ERRORS ON
			ini_set('display_errors',0);
			ini_set('display_startup_errors',1);
			error_reporting(-1);
			//END - TURN ERRORS ON
			
			$todaydate = date('d-m-Y');
			
			$newDate = date("Y-m-d", strtotime($todaydate));
			
			//echo $newDate;
			
			$tomorrow = new DateTime('tomorrow');
			$tomorrowdate = $tomorrow->format('Y-m-d');

			$yesterday = new DateTime('yesterday');
			$yesterdaydate = $yesterday->format('Y-m-d');	
			
			$class = $expert->check_appointment(str_pad($i, 2, '0', STR_PAD_LEFT).":".str_pad($j, 2, '0', STR_PAD_LEFT), $appArray, $app_slot);
													
         ?>
				   
            <div class="col-md-12" id="dateTable">
                
           
           <script>
				$(".show-overlay").click(function(e) {
										$("#overlay").show();
										$("#overlay #overlay-content #overlay-title").text($(this).attr("title"));
										
										var pageValues = $(this).attr("id").split(":");
										
										var callPage = pageValues[0];
										var callValues = pageValues[1];
										
										$.post( "pages/popup-call.php", { 
														callPage: callPage,   
														callValues: callValues
										})
										.done(function( data ) {
														$("#overlay #overlay-content #overlay-text").html(data);
										});
						});
						$("#close").click(function(e) {
									$("#overlay").hide();
										   
				});
			</script>
            </div>

	</div>

	<!--Insert appiontment book here-->
        
</div>