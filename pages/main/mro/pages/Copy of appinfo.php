<script type="text/javascript" src="../../experts/pages/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyC9_eubdf0kjY2lVzqnDRnEmACsb3CXt80"></script>
<script type="text/javascript" src="../../experts/pages/js/map1.js"></script>
<style>
input[type=text]:focus {
	display:none;
}
</style>
<?php 

/*error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once("../../experts/includes/expert_class.php");
$expert = new expert_class;

require("'echo _ROOT'/includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;*/


$appInfo = $conn->execute_sql("select", array("eap_date", "eap_v_id", "eap_timeslot", "cc_id", "cc_surname", "cc_firstname", "cc_telephone", "cc_mobile", "cc_email", "cc_gender", "cc_dob", "cc_postcode"), "e_appointments JOIN c_clients ON eap_cc_id = cc_id", "eap_id = ?", array("i" => $_POST['test4'])); 

$venueInfo = $conn->execute_sql("select", array("v_id", "v_name", "v_telephone", "v_email", "v_address1", "v_address2", "v_address3", "v_postcode", "v_city", "cc_id", "eap_cc_id"), "venues JOIN e_appointments ON v_id = eap_v_id JOIN c_clients ON cc_id = eap_cc_id", "eap_cc_id=?", array("i" => $appInfo[0]['cc_id']));

echo "</br></br>";

if($appInfo[0]['cc_gender'] == "F") {
	$cc_gender = "Female";	
}
else if($appInfo[0]['cc_gender'] == "M") {
	$cc_gender = "Male";	
}

$appTimeSlot = substr($appInfo[0]['eap_date'], 11, -3);

$appDateSlot = substr($appInfo[0]['eap_date'], 0 , -9);

$venuePost = strtoupper($venueInfo[0]['v_postcode']);

?>
<body id="add">
<div class="container main">
		<h3 class="mb25">Appointment Overview</h3> 
		
	<div class = "row">   <!-- Row -->     
		<div class = "col-md-6">  <!-- Left panel -->    
			<div class="panel panel-default panelheight"><!-- Panel header -->
				<div class="panel-heading">
					<h4>Patient</h4>
				</div>
				<div class="panel-body">
					<div class="col-lg-12"><!-- Panel container -->
						<p>
							<label>Name:</label> 
								<?php echo $appInfo[0]['cc_firstname'] . " " . $appInfo[0]['cc_surname']; ?> <br />
							<label>Gender:</label>  
								<?php echo $cc_gender; ?> <br />
							<label>DOB:</label> 
								<?php echo $appInfo[0]['cc_dob']; ?> <br />
							<label>Mobile:</label> 
								<?php echo $appInfo[0]['cc_mobile']; ?> <br />
							<label>Landline:</label>  
								<?php echo $appInfo[0]['cc_telephone']; ?> <br />
							<label>Email:</label> 
								<?php echo $appInfo[0]['cc_email']; ?> <br />
							<label>Postcode:</label> 
								<?php echo $appInfo[0]['cc_postcode']; ?>  <br />
							<label>Appointment time:</label> 
								<?php echo $appTimeSlot; ?> <br />
							<label>Appointment date:</label> 
								<?php echo $appDateSlot; ?> <br />
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class = "col-md-6">  <!-- Right panel -->  
			<div class="panel panel-default panelheight"><!-- Panel header -->
				<div class="panel-heading">
					<h4>Venue</h4>
				</div>
				<div class="panel-body">
					<div class="col-lg-12"><!-- Panel container -->
						<p>
							<label>Name:</label> 
								<?php echo $venueInfo[0]['v_name']; ?> <br />
							<label>Landline:</label>  
								<?php echo $venueInfo[0]['v_telephone']; ?> <br />
							<label>Email:</label> 
								<?php echo $venueInfo[0]['v_email']; ?> <br />
							<label>Address:</label> <br />
								<?php echo $venueInfo[0]['v_address1']; ?> <br />
								<?php echo $venueInfo[0]['v_address2']; ?> <br />
								<?php echo $venueInfo[0]['v_address3']; ?> <br /> 
                            	<?php echo $venueInfo[0]['v_city']; ?> <br /> 
                                <?php echo $venuePost; ?>
							<!--
                            <label>Postcode:</label>  
								<input type="text" name="v_postcode" id="v_postcode" value="" style="border:none;" autofocus /></br />
                              -->  
                              
                                <div id = "venner">
                                	<input class = "hidden" disabled value="<?php echo $venuePost; ?>" id = "v_postcode2" />
                                </div>
						</p> 
					</div>
				</div>
			</div>
		</div>
        
        <div class = "col-md-12">  <!-- Map -->  
            <div class="panel panel-default"><!-- Panel header -->
                <div class="panel-heading">
                    <h4>Map</h4>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12"><!-- Panel container -->
					<div id="map_canvas" style="width:100%; height:550px;"></div>
                    </div>
                </div>
            </div>
        </div>
	</div><!-- End row -->
</div><!-- End container -->
</body>