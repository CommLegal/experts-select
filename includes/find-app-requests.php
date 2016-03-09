<?php

//START - TURN ERRORS ON
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//END - TURN ERRORS ON

//START DB CONNECTION
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

//var_dump($_POST);

$radius = $_POST['search_radius'] * 0.621371;

$getVenueLocation = $conn->execute_sql("select", array("*"), "venues", "v_id =?", array("i" => $_POST['venue_id']));

$venueLat =  $getVenueLocation[0]['v_latitude'];

$venueLong =  $getVenueLocation[0]['v_longitude']; 
$venueName = $getVenueLocation[0]['v_name'];

// GET APPOINTMENTS WITHIN CERTAIN DISTANCE END
$newFormat1 = new DateTime($_POST['e_appointments--eap_date_after']);
$appdateFormat1 = $newFormat1->format('Y-m-d H:i:s');

$newFormat2 = new DateTime($_POST['e_appointments--eap_date_before']);
$appdateFormat2 = $newFormat2->format('Y-m-d 23:59:59');
// GET APPOINTMENTS WITHIN CERTAIN DISTANCE 

//$result = $conn->mysql_query('
							 
$result = $conn->execute_sql('select',

array('z.*, 
(p.distance_unit
* DEGREES(ACOS(COS(RADIANS(p.latpoint)) 
* COS(RADIANS(z.wr_latitude))
* COS(RADIANS(p.longpoint) - RADIANS(z.wr_longitude))
+ SIN(RADIANS(p.latpoint))
* SIN(RADIANS(z.wr_latitude))))) * 0.621371 AS distance_in_km'), 
'waiting_room AS z

JOIN ( 

SELECT ' . $venueLat . ' AS latpoint, ' . $venueLong . ' AS longpoint,
' . $radius . ' AS radius, 111.1111 AS distance_unit
) AS p ON 1=1',

'z.wr_latitude
BETWEEN p.latpoint - (p.radius / p.distance_unit)
AND p.latpoint + (p.radius / p.distance_unit)
AND z.wr_longitude
BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
AND ((p.distance_unit
* DEGREES(ACOS(COS(RADIANS(p.latpoint))
* COS(RADIANS(z.wr_latitude))
* COS(RADIANS(p.longpoint) - RADIANS(z.wr_longitude))
+ SIN(RADIANS(p.latpoint))
* SIN(RADIANS(z.wr_latitude))))) * 0) <= z.wr_radius
AND wr_appCancelled=? AND wr_appConfirmed=? AND wr_timeFrom >=? AND wr_timeTo <=?
ORDER BY distance_in_km', array("i1" => "0", "i2" => "0", "s1" => $appdateFormat1, "s2" => $appdateFormat2));

//$getCompanyRequests = $conn->execute_sql("select", array("*"), "waiting_room", "wr_appCancelled=? AND wr_timeFrom >=? AND wr_timeTo <=?", array("i1" => "0", "s1" => $appdateFormat1, "s2" => $appdateFormat2));


?>

<script>

	

	
	//Spawn the map
	var map = new GMaps({
	  div: '#map',
	  lat: <?php echo $venueLat ?>,
	  lng: <?php echo $venueLong ?>,
	});

	//Set position to chosen venue
	map.addMarker({
	  lat: <?php echo $venueLat ?>,
	  lng: <?php echo $venueLong ?>,
	  title: 'Area',
	  click: function(e) {
		alert("!");
	  }
	});
	map.drawOverlay({
	  lat: <?php echo $venueLat ?>,
	  lng: <?php echo $venueLong ?>,
	  content: '<div class="map-header"><h4><?php echo $venueName ?></h4></div>'
	});
</script>




<?php

if (empty($result)) {
	echo "<div class = 'alert alert-danger'><i class = 'fa fa-lg fa-warning'></i> &nbsp; No appointments found. Try increasing the radius or select a different venue.</div>";
}
else {
	
foreach($result as $header => $value) { 

$getAppDate = substr($result[$header]['wr_timeFrom'], 0, 10);
$getAppStartTime = substr($result[$header]['wr_timeFrom'], 11, 17);
$getAppEndTime = substr($result[$header]['wr_timeTo'], 11, 17);

//$result[$header]['wr_id'];

?> 

	<div id = "appbox" class = "col-md-3 green quickradius textwhite appbox">
		<div class="midd">
			<h3><?php echo $result[$header]['wr_clientFName'] . " " . $result[$header]['wr_clientSName'] ?></h3>
			<p>
				<?php echo $result[$header]['wr_postcode'] ?><br /> <?php echo $result[$header]['wr_clientTel'] ?><br /><br />
				<?php echo $getAppDate . "<br /><br />" . "<b>Starting from - </b>" . $getAppStartTime . "</br><b>Ending at - </b>" . $getAppEndTime; ?>
            </p>

            <input class = "wr_latitude" style = "color:red" type = "hidden" value="<?php echo $result[$header]['wr_latitude']; ?>" />
            <input class = "wr_longitude" style = "color:blue" type = "hidden" value="<?php echo $result[$header]['wr_longitude']; ?>" />
            
            <a class = "expert-book-btn mt25 btn btn-primary col-md-12"><i class="fa fa-calendar"></i> Book</a>
            
            <div class = "confirm-box mt25 col-md-12" style = "display:none">
                <a class = "btn btn-success col-md-6 acceptRequest show-overlay" id="acceptRequest:<?php echo $result[$header]['wr_id']; ?>" requestID="<?php echo $result[$header]['wr_id'];?>">Confirm</a>
                <a class = "expert-book-cancel btn btn-danger col-md-6">Cancel</a>
            </div>
		</div>
	</div>



<script>


		//Add markers and overlays
		map.addMarker({
			  lat: <?php echo $result[$header]['wr_latitude'] ?>,
			  lng: <?php echo $result[$header]['wr_longitude'] ?>,
			  title: 'Area',
		  click: function(e) {
			alert("!");
		  }
		});
		map.drawOverlay({
			  lat: <?php echo $result[$header]['wr_latitude'] ?>,
			  lng: <?php echo $result[$header]['wr_longitude'] ?>,
		  content: '<div class="map-header"><h4><?php echo $result[$header]['wr_clientFName'] . " " . $result[$header]['wr_clientSName'] ?></h4></div>'
		});
		


		//<img class = "rounded" style="width:55px; height:55px" src = "https://i.stack.imgur.com/qPtbL.jpg" >

</script>


<script>
//Had to inline the buttons in this loop for it to work

//Expert waiting room confirmation

	$('.expert-book-btn').click(function(){
		$(this).hide();
		$(this).next('.confirm-box').show();
	});
	
	$('.expert-book-cancel').click(function(){
		$(this).parent().siblings('.expert-book-btn').show();
		$(this).parent().hide();			//works
	});


	$('#request_appointment').click(function(e){
		e.preventDefault();

		var data = $("#expert-waiting-room").serializeArray();	
		
		$.post(
		   'includes/find-app-requests.php',
			data,
			function(data){
				
				$("#app-times").html(data);
					
			}
			
		  );
		
		//$("#dateTable").load('thisdoc.php');
	});


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

</script>

<?php  } } ?>
