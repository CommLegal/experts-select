<!-- 
    
    EXPERT

-->
    


<?php
include ('../includes/mysqlwrapper_class.php');
?>

<?php 
if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
else {$btncolor = "btn btn-success";}
?>

<?php
//START - TURN ERRORS ON
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
?>

<!--
<body onLoad="loadmap()">
-->
<body>
<div class= "container"> 


    <div class="col-md-12">              
        <h3>Booking Statistics</h3><div class="title-divider"></div>
        <div class = "mt10 col-md-12 alert alert-info"><i class = "fa fa-lg fa-info"></i> &nbsp; Please note, this page may not run properly during the testing period.</div>
    </div> 

 

    
  <form action="#" method="post" enctype="multipart/form-data" name="expert-booking-stats" id="expert-booking-stats" role="form">	
        <input type = "hidden" name = "lng" id = "lng" />
        <input  type = "hidden" name = "lat" id = "lat" />
    <div class = "col-md-12"><!-- Panel wrap -->   
     
        <div class="panel panel-default"><!-- Panel Container -->
            <div class="panel-heading"><h4>Details</h4></div>
            <div class="panel-body">
                <div class = "col-md-12">

                        <p>To request booking statistics please enter the following details.</p>
                        <div class = "col-md-6"><!-- Left section of top panel -->
                              <label>Appointments  After:</label>
                                <div class="input-group date">
                                <input class="form-control"id="date-picker-ven" name="date-picker-ven" value="<?php echo date("d-m-Y");?>" type="text">
                                <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i></span>
                                </div>
                                
                                <label>Appointments Before:</label>
                                <div class="input-group date">
                                <input class="form-control"id="date-picker-ven" name="date-picker-ven" value="<?php echo date("d-m-Y");?>" type="text">
                                <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i></span>
                                </div>
                        </div><!-- End of left section -->
    
                        <div class = "col-md-6"><!-- Right section of top panel -->
                                <label>Postcode:</label>
                                <input id="postcode_search" class="form-control" type="text" placeholder="" autocomplete="off">
                                <label>Radius (miles):</label>
                                <input id="radius" class="form-control" type="text" placeholder="" autocomplete="off">
                                <input id = "request-stats" name = "request-stats" type = "submit" class = "<?php echo $btncolor; ?> mt25 pull-right" value="Request Analysis"  /> 
                        </div><!-- End of right section -->

                </div>
            </div>
        </div>
	</form>
   
    <div class="panel panel-default" style="display:none"><!-- Panel Container -->
                <div class="panel-heading"><h4>Results</h4></div>
                <div class="panel-body">
                    <div class = "col-md-5">
                 		<div id="map"  class = "whiteborder" style="width:100%; height:500px;"></div>
                    </div>
                     <p>Click a pin on the map to show more details.</p>
                    <div class="area_details" style="display:none;">
                    <div class = "col-md-7">
						<h3>Area Details</h3>
                        <div class = "scroll">
                           <table class="tg table midd">
                              <tr><!-- Top row -->
                                <th class="tg-031e midd"><h4>Town</h4></th>
                                <th class="tg-031e midd"><h4>Venue</h4></th>
                                <th class="tg-031e midd"><h4>Attendees</h4></th>
                                <th class="tg-031e midd"><h4>Cancelations</h4></th>
                                <th class="tg-031e midd"><h4>Appointments</h4></th>
                              </tr>
                              <tr>
                                <td class="tg-031e">York</td>
                                <td class="tg-031e">Health Clinic</td>
                                <td class="tg-031e">13</td>
                                <td class="tg-031e">2</td>
                                <td class="tg-031e">54</td>
                              </tr>
                              <tr>
                                <td class="tg-031e">York</td>
                                <td class="tg-031e">Health Clinic</td>
                                <td class="tg-031e">13</td>
                                <td class="tg-031e">2</td>
                                <td class="tg-031e">54</td>
                              </tr>
                              <tr>
                                <td class="tg-031e">York</td>
                                <td class="tg-031e">Health Clinic</td>
                                <td class="tg-031e">13</td>
                                <td class="tg-031e">2</td>
                                <td class="tg-031e">54</td>
                              </tr>
                              <tr>
                                <td class="tg-031e">York</td>
                                <td class="tg-031e">Health Clinic</td>
                                <td class="tg-031e">13</td>
                                <td class="tg-031e">2</td>
                                <td class="tg-031e">54</td>
                              </tr>
                        	</table>
                            </div>
						</div>

 					
                        
                    </div>
                    
                </div>
            </div>

        
    </div><!-- End panel --> 
    </body>   

<!-- End container -->    
</div>

<script type="text/javascript" src="<?php echo _ROOT ?>/js/gmaps.js"></script>
<script>
		



$('#postcode_search').blur(function(){
	var lat = '';
	var lng = '';
	
	var map = new GMaps({
	  div: '#map',
	  lat: lat,
	  lng: lng,
	});
	


	GMaps.geocode({
	  address: $('#postcode_search').val(),
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



</script>