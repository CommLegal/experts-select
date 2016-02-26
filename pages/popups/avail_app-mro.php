<!--
<head>
<script type="text/javascript" src="<?php echo _ROOT ?>/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo _ROOT ?>/js/custom.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyC9_eubdf0kjY2lVzqnDRnEmACsb3CXt80"></script>
<script type="text/javascript" src="<?php echo _ROOT ?>/js/avail-app-mro-map.js"></script>
</head>
-->


<body id = "add">

<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

//var_dump($_POST); 

require_once("../includes/expert_class.php");
$expert = new expert_class;

require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$availableApp = $conn->execute_sql("select", array("*"), "e_appointments JOIN venues on eap_v_id = v_id", "eap_id = ?", array("i" => $_POST['callValues']));
	
$appInfo = $conn->execute_sql("select", array("eap_date", "eap_v_id", "eap_timeslot", "cc_id", "cc_surname", "cc_firstname", "cc_telephone", "cc_mobile", "cc_email", "eap_ap_confirm", "eap_ml_id"), "e_appointments JOIN c_clients ON eap_cc_id = cc_id", "eap_id = ?", array("i" => $_POST['callValues'])); 

$venueInfo = $conn->execute_sql("select", array("v_id", "v_name", "v_telephone", "v_email", "v_address1", "v_address2", "v_address3", "v_postcode", "v_city", "cc_id", "eap_cc_id"), "venues JOIN e_appointments ON v_id = eap_v_id JOIN c_clients ON cc_id = eap_cc_id", "eap_id = ?", array("i" =>  $_POST['callValues']));

$class = $expert->check_appointment(str_pad($i, 2, '0', STR_PAD_LEFT).":".str_pad($j, 2, '0', STR_PAD_LEFT), $appArray, $app_slot);
$active = explode("-", $class);

$appTimeSlot = substr($appInfo[0]['eap_date'], 11, -3);

$appDateSlot = substr($appInfo[0]['eap_date'], 0 , -9);

$availAppTimeSlot = substr($availableApp[0]['eap_date'], 11, -3);

$availAppDateSlot = substr($availableApp[0]['eap_date'], 0 , -9);

//$custMob = substr($_POST['callValues'], 0);

?>




<?php if(($appInfo[0]['eap_ap_confirm'] == 1) && ($appInfo[0]['eap_ml_id'] == $_SESSION['CME_USER']['login_id']))  { ?>

<label for"cf-name">First Name: -</label>
<?php echo " " . $appInfo[0]['cc_firstname']; ?>
</br></br>
<label for"cl-name">Last Name: -</label>
<?php echo " " . $appInfo[0]['cc_surname']; ?>
</br></br>
<label for"c-number">Telephone Number: -</label>
<?php echo " " . $appInfo[0]['cc_telephone']; ?>
</br></br>
<label for"c-number">Mobile Number: -</label>
<?php echo " " . $appInfo[0]['cc_mobile']; ?>
</br></br>
<label for"c-email">Email Address: -</label>
<?php echo " " . $appInfo[0]['cc_email']; ?>
</br></br>
<label for"c-venue">Venue: -</label>
<?php echo " " . $venueInfo[0]['v_name']; ?>
</br></br>
<label for"c-ts">Time Slot: -</label>
<?php echo " " . $appTimeSlot; ?> 
</br></br>
<label for"c-ts">Appointment Date: -</label>
<?php echo " " . $appDateSlot; ?> 
</br></br>
<label for"c-ad">Appointment Duration: -</label>
<?php echo " " . $appInfo[0]['eap_timeslot'] . " Minutes"; ?>

<div class="title-divider"></div>

</br>

<form action="<?php echo _ROOT ?>/index.php?page=appinfo" method="post" enctype="multipart/form-data">  

    	<input type="hidden" name="test1" value="<?php echo $appInfo[0]['cc_id']; ?>" />  
        <input type="hidden" name="test2" value="<?php echo $appInfo[0]['cc_surname']; ?>" /> 
        <input type="hidden" name="test3" value="<?php echo $appInfo[0]['cc_telephone']; ?>" /> 
        <input type="hidden" name="test4" value="<?php echo $_POST['callValues'] ?>" /> 
        <input type="hidden" name="test5" value="<?php echo $appTimeSlot; ?>" />
        
        <?php 
			if ($_SESSION['CME_USER']['type'] == "mro") 
				{ 
				  $btncolor = "btn btn-primary"; 
				} 
			else {$btncolor = "btn btn-success";
				}
		?>

        <button class="<?php echo $btncolor; ?>" href="<?php echo _ROOT ?>/index.php?page=appinfo" title="App Overview" href="<?php echo _ROOT ?>/index.php?page=appinfo">
        <span class="glyphicon glyphicon-calendar"></span> Appointment Overview </button><!-- </input> -->
        
</form>

<?php } elseif((($appInfo[0]['eap_ap_confirm'] != 1) && ($appInfo[0]['eap_ml_id'] === NULL)) || (($appInfo[0]['eap_ap_confirm'] != 1) && ($appInfo[0]['eap_ml_id'] == $_SESSION['CME_USER']['login_id']))) { ?>

<div style = "display:NONE"><div id = "map_canvas"></div></div>

<div class = "col-md-12">

    <label class = "controls" for"c-venue">Venue:</label>
    <p><?php echo " " . $availableApp[0]['v_name']; ?></p>
    
    <label class = "controls"  for"c-ts">Time Slot:</label>
    <p><?php echo " " . $availAppTimeSlot; ?> </p>
    
    <label class = "controls"  for"c-ts">Appointment Date:</label>
    <p><?php echo " " . $availAppDateSlot; ?> </p>
    
    <label class = "controls"  for"c-ad">Appointment Duration:</label>
    <p><?php echo " " . $availableApp[0]['eap_timeslot'] . " Minutes"; ?></p>

</div>

<!-- <form id = "book-form" action="" method = "post"> -->


    <div id="book-fields" class="mb25" style="display:none;"> 
    <form id="bookNewPatient" method="post" action="">
       
        <div class = "col-md-6">
            <label class = "controls">Patient First Name:</label>
            <input id="clientFName" name="clientFName" class = "form-control" value="" />
            
            <label class = "controls">Patient Last Name:</label>
            <input id="clientSName" name="clientSName" class = "form-control" value="" />
            
            <label class = "controls">Address:</label>
            <input placeholder="Line 1" id="address1" name="clientAddress1" class = "form-control mb10" value="" />
            <input placeholder="Line 2" id="address2" name="clientAddress2" class = "form-control mb10" value="" />
            <input placeholder="Line 3" id="address3" name="clientAddress3" class = "form-control" value="" />
            
            
        </div>  
         
        <div class = "col-md-6">  
            <label class = "controls">Postcode:</label>
            <input id="clientPostcode" name="clientPostcode" class = "form-control" value="" />
            <input type = "hidden" id="cc_latitude" name="cc_latitude" class = "form-control" value="" />
            <input type = "hidden" id="cc_longitude" name="cc_longitude" class = "form-control" value="" />
            
            <label class = "controls">City:</label>
            <input placeholder="City" id="clientCity" name="clientCity" class = "form-control" value="" />
            
            <label class = "controls">Telephone:</label>
            <input placeholder="Telephone" id="clientTelephone" name="clientTelephone" class="form-control" value="" />
            
            <label class = "controls">Date of Birth:</label>
            <div class="input-group date">
                <input id="date-picker-ven" name="clientBirthdate" class="dobber form-control" value="<?php echo date("d-m-Y");?>" type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>    

            <!-- <label class = "controls">Age:</label>
            <input id="clientAge" name="clientAge" class="form-control" value="" /> -->
            
        </div>
        
        <div class ="col-md-12 mb25">
            <label class = "controls">Notes:</label>
            <textarea id = "notesbox" name="notesbox" class = "form-control" value="" rows = "5"></textarea>
            
            <input type="hidden" name="appointmentID" value="<?php echo $_POST['callValues']; ?>" />
        </div>
        
        <div class ="col-md-12 mb25">
            <input type="submit" id="submit-book-btn" class="btn btn-success" value="Submit" />
            <button id="cancel-book-btn" class="btn btn-danger">Cancel</button>
        </div>
        
    </form> 
    </div>
    
    <div id="success"></div>
<!-- </form> -->

<div style = "clear:both"></div>
<div class="vindiesel title-divider"></div>

<div class = "col-md-12 mb25" id = "button-bottom">

<?php if($availableApp[0]['eap_cc_id'] == NULL) { ?>

<button id = "book-btn" type="submit" class = "btn btn-primary"><i class="fa fa-check"></i> Book </button>


<?php } else { ?>

<div class = "alert alert-danger">
	<p>This appointment is no longer available due to the slot being filled. Apologies for any inconvenience.</p>
</div>

<?php } ?>

</div>

<a id = "results-anchor"></a>

</body>

<?php } ?>

    <!-- Placed at the end of the document so the pages load faster 
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	-->
	<!-- -->
    <script src="<?php echo _ROOT ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo _ROOT ?>/js/bootstrap-datepicker.js"></script>
       
	<script type="text/javascript" src="<?php echo _ROOT ?>/js/avail-app-mro-map.js"></script>

    <!-- Validation -->
    
    <script src="<?php echo _ROOT ?>/js/jquery.validate.js"></script>
    <script src="<?php echo _ROOT ?>/js/additional-methods.js"></script>
    <script src="<?php echo _ROOT ?>/js/validation.js"></script>
    <script src="<?php echo _ROOT ?>/js/mro-agreement-validation.js"></script>
    
    <script src="<?php echo _ROOT ?>/js/modal.js"></script>
    
    <script src="<?php echo _ROOT ?>/js/postcoder.js"></script>
    
    
    
    
    
    
    <script>
    		$('#submit-book-btn').click(function(e){
			e.preventDefault();			
			
			var data = $("#bookNewPatient").serializeArray();
			//alert("test"); 
			//if( $("#bookNewPatient").valid() ) { 
			$.post(
				  
			   'includes/mro/submit-app-book.php',
				data,
				function(data){
				 //alert(data);
				 $("#success").html(data);
				 $('#submit-book-btn').hide();
				 $('#cancel-book-btn').hide();
				 
				 document.getElementById("results-anchor").scrollIntoView(); 


					//$('#submitBlock').hide();
				 //setTimeout(function(){location.reload();}, 2000); 
				}
			  );
			//}
		});
    </script>