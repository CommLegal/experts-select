<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.src.js"></script>

<?php
		
		if ($_SESSION['CME_USER']['type'] == "mro") {$btncolor = "btn btn-primary";} 
		else {$btncolor = "btn btn-success";}
    ?>


<!--
<body onLoad="loadmap()">
-->

<div id="overlay" style="margin-top:350px" >
    <div style="width:60%; margin-left:-5%;" id="overlay-content" class="ro">
        <div id="close" style="background-color:#337AB7"><button type="button" class="close" ><p>Close <i class = "fa fa-lg fa-times"></i></p></button></div>
            <div class="scroll jamesbonder" style="height:700px; max-height:700px;">
                <div id="overlay-title">
                    <h3>Booking Statistics</h3>
                </div>
                
                <div id="overlay-text">
                    
                </div>
                
                <div style="clear: both;"></div>
            </div>
    </div>
    <div style="clear: both;"></div>
</div>





<body>


	<div class= "container">   
		<div class="col-md-12">   
			<h3>Booking Statistics</h3><div class="title-divider"></div>
            <div class = "mt10 col-md-12 alert alert-info"><i class = "fa fa-lg fa-info"></i> &nbsp; Please note, this page works beautifully despite testing.</div>
		</div> 
		

		<div class = "col-md-12"><!-- Panel wrap --> 
        
        
        

        
        <!-- 
		<div class = "col-lg-6">
       
			<div class="panel panel-default">
			
					<div class="panel-heading"><h4>Show by Expert</h4></div>
					<div class="panel-body">

						<?php
                        
                            //START - TURN ERRORS ON
                                ini_set('display_errors',1);
                                ini_set('display_startup_errors',1);
                                error_reporting(-1);
                            
                            //START SQL QUERY TO PULL DATABASE COLUMN
                                $selectOption = $conn->execute_sql("select", 
                                array("s_title", "ea_id", "ea_forename", "ea_surname"), 
                                "e_accounts JOIN salutations ON ea_s_id = s_id", "", "");
                        ?>

							<label>Expert:</label>
								<select class="form-control">
								
								<?php foreach($selectOption as $header => $value)
								{echo "<option id=\"specialist\" name=\"" . $selectOption[$header]['s_title'] . " " . 
								$selectOption[$header]['ea_forename'] . " " . $selectOption[$header]['ea_surname'] . "\">" . 
								$selectOption[$header]['s_title'] . " " . $selectOption[$header]['ea_forename'] . " " . 
								$selectOption[$header]['ea_surname'] . "</option>" ;} ?></select>

								<form action="" method="post" enctype="multipart/form-data" name="expert-add-app" id="expert-add-app" role="form">	
                                
								<label>Appointments  After:</label>
										<div class="input-group date">
										<input id="date-picker-ven" name="date-picker-ven" value="<?php echo date("d-m-Y"); ?>" type="text">
										<span class="input-group-addon">
										<i class="glyphicon glyphicon-th"></i></span>
										</div>
										
								<label>Appointments Before:</label>
										<div class="input-group date">
										<input id="date-picker-ven" name="date-picker-ven" value="<?php echo date("d-m-Y"); ?>" type="text">
										<span class="input-group-addon">
										<i class="glyphicon glyphicon-th"></i></span>
										</div>

										<span class = "<?php echo $btncolor; ?> mt25">Search Statistics &nbsp;<i class="fa fa-plus"></i></span>
									
								</form>
					</div>
			</div>
            
		</div>
				-->


<!--
		<div class = "col-lg-6">
            <div class="panel panel-default">
            
                <div class="panel-heading"><h4>Show by Postcode</h4></div>
                <div class="panel-body">

                    <?php
                    
                        //START - TURN ERRORS ON
                            ini_set('display_errors',1);
                            ini_set('display_startup_errors',1);
                            error_reporting(-1);
                        
                        //START SQL QUERY TO PULL DATABASE COLUMN
                            $selectOption = $conn->execute_sql("select", 
                            array("s_title", "ea_id", "ea_forename", "ea_surname"), 
                            "e_accounts JOIN salutations ON ea_s_id = s_id", "", "");
                    ?>

                    <form action="" method="post" enctype="multipart/form-data" name="expert-add-app" id="expert-add-app" role="form">	
                    
                            <label>Postcode:</label>
                            <input id="postcode_search" class="form-control" type="text" placeholder="Enter a Postcode" autocomplete="off" />
                    
                          <label>Appointments  After:</label>
                            <div class="input-group date">
                            <input id="date-picker-ven" name="date-picker-ven" value="<?php echo date("d-m-Y"); ?>" type="text">
                            <span class="input-group-addon">
                            <i class="glyphicon glyphicon-th"></i></span>
                            </div>
                            
                            <label>Appointments Before:</label>
                            <div class="input-group date">
                            <input id="date-picker-ven" name="date-picker-ven" value="<?php echo date("d-m-Y"); ?>" type="text">
                            <span class="input-group-addon">
                            <i class="glyphicon glyphicon-th"></i></span>
                            </div>

                            <span class = "<?php echo $btncolor; ?> mt25">Search Statistics &nbsp;<i class="fa fa-plus"></i></span>
                        
                    </form>
                </div>
            </div>
        </div> 

-->






 <form action="" method="post" enctype="multipart/form-data" name="mro-booking-stats" id="mro-booking-stats" role="form">	

     
        <div class="panel panel-default"><!-- Panel Container -->
            <div class="panel-heading"><h4>Details</h4></div>
            <div class="panel-body">
            <div class = "col-md-12"><!-- Panel wrap -->   

                   
		<div class = "col-md-12">
               
                <label>Search by:</label>	
                
                <span id = "showExpert" class = "btn btn-default"><b>Expert</b></span>
                <span id = "showPostcode" class = "btn btn-default">Postcode</span>
                
                <form action="" method="post" enctype="multipart/form-data" name="expert-booking-stats" id="expert-booking-stats" role="form">	
                
                        <p class = "mt10" >To request booking statistics please enter the following details.</p>
                        <div class = "col-md-6"><!-- Left section of top panel -->
                              <label>Appointments After:</label>
                                <div class="input-group date">
                                <input class="form-control"id="date-picker-ven" name="date-picker-ven-after" value="<?php echo date("d-m-Y");?>" type="text">
                                <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i></span>
                                </div>
                                
                                <label>Appointments Before:</label>
                                <div class="input-group date">
                                <input class="form-control"id="date-picker-ven" name="date-picker-ven-before" value="<?php echo date("d-m-Y");?>" type="text">
                                <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i></span>
                                </div>
                        </div><!-- End of left section -->
    
                        <div class = "col-md-6"><!-- Right section of top panel -->
                        		<span class = "expert">
                                	<label>Expert:</label>
                                	<!-- <input name = "expert" id="expert" class="form-control" type="text" required> --> 
                                    
                                    <select id="contact-list-expert" class="form-control" name="expert" style="">
                                    	<option>Select The Expert</option>
                                    </select>
                                </span>
                                
                        		<span class = "postcode" style = "display:none">
                                	<label>Postcode:</label>
                                	<input name="postcode" id="postcode" class="form-control" type="text" autocomplete = "off" required>
                                	<label>Radius (miles):</label>
                                	<input name="radius" id="radius" class="form-control" type="text" autocomplete = "off" placeholder="">
                                </span>
                                
                                <input id = "request-stats" name = "request-stats" type = "submit" class = "mb25 <?php echo $btncolor; ?> mt25 pull-right" value="Request Analysis" /> 
                                <input type = "hidden" name = "lng" id = "lng" />
                                <input  type = "hidden" name = "lat" id = "lat" />
                                
                                
                        </div><!-- End of right section -->
                        
                        <div class = "mt25" id="success"></div>
        
               </div>    


            </div>
          </form>
        </div>
     </div>



		</div>
        
        		
		<div class = "col-md-12" style="display:none"><!-- Panel wrap --> 
			
                <div class="panel panel-default"><!-- Panel Container -->
                <div class="panel-heading"><h4>Results</h4></div>
                    <div class="panel-body">
                        <div class = "col-md-5">
                        	<div id="map" class = "whiteborder" style="width:100%; height:500px;"></div>
                    	</div>
                    </div>
			</div>
		</div>

			

	</div><!-- End container -->    
</body>

<script type="text/javascript" src="<?php echo _ROOT ?>/js/gmaps.js"></script>

	<script>
	$('#postcode, #radius').blur(function(e){
	//////Draw map/////////////////
	var lat = '';
	var lng = '';
	
	var map = new GMaps({
	  div: '#map',
	  lat: lat,
	  lng: lng,
	});
		
	
		GMaps.geocode({
		  address: $('#postcode').val(),
		  callback: function(results, status) {
			if (status == 'OK') {
	
				var latlng = results[0].geometry.location;
					map.setCenter(latlng.lat(), latlng.lng());
					map.addMarker({
					lat: latlng.lat(),
					lng: latlng.lng()
				});
					map.drawOverlay({
					lat: latlng.lat(),
					lng: latlng.lng(),
					content: '<div class="map-header"><h4><i class = "fa fa-lg fa-building"></i> Clinic</h4></div>'
				});
					$("#lng").val(latlng.lat());
					$("#lat").val(latlng.lng());
			}
		  }
		});
			
	});
	
	//This is inline as it needs to run after the above code
	$('#request-stats').click(function(e){
	
		e.preventDefault();
		var data = $("#mro-booking-stats").serializeArray();	
		data.push({name: 'expert', value: $("#contact-list-expert :selected").attr("name")});
		
		$.post(
		   'includes/get-mro-statistics.php',
			data,
			function(data){				
				$("#success").html(data);	
			}	
		  );
	
	
	});



		//////////////////////

    </script>

