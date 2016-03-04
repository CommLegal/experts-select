
<?php 

require("../includes/config.php");


//START DB CONNECTION
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

$selectDetails = $conn->execute_sql("select", array("*"), "e_appointments JOIN e_accounts ON eap_ea_id = ea_id JOIN salutations ON ea_s_id = s_id JOIN e_type ON ea_et_type = et_id", "eap_v_id=?", array("i" =>  $_POST['callValues'])); 

$agreementRating = $conn->execute_sql("select", array("*"), "organisation_agreements", "oa_ea_name=? AND oa_mo_name=?", array("i" => $selectDetails[0]['eap_ea_id'], "i2" => $selectDetails[0]['eap_mo_id']));

$selectCancelled = $conn->execute_sql("select", array("*, COUNT(eap_v_id) AS cancelledApps"), "e_appointments", "eap_v_id=? AND eap_cancelled=?", array("i" => $_POST['callValues'], "i2" => "1"));

$selectEmpty = $conn->execute_sql("select", array("*, COUNT(eap_v_id) AS emptyApps"), "e_appointments", "eap_v_id=? AND eap_cc_id=?", array("i" => $_POST['callValues'], "i2" => "0"));

$selectFilled = $conn->execute_sql("select", array("*, COUNT(eap_v_id) AS filledApps"), "e_appointments", "eap_v_id=? AND eap_cc_id!=?", array("i" => $_POST['callValues'], "i2" => "0"));

$selectCreated = $conn->execute_sql("select", array("*, COUNT(eap_v_id) AS createdApps"), "e_appointments", "eap_v_id=?", array("i" => $_POST['callValues']));

//$selectCreatedDay = $conn->execute_sql("select", array("*, COUNT(eap_v_id) AS dailyCancelled"), "e_appointments", "eap_v_id=? GROUP BY DAY(eap_date)", array("i" => $_POST['callValues']);

//var_dump($_POST['callValues']);


?>

<body>
<div class = "">
    <div class = "col-md-12 mb10">
        <button id = "showexpert" class = "btn btn-default">Show Expert</button>
        <button id = "showstats" class = "btn btn-default">Show Statistics</button>
        <input type ="hidden" name = "lng" id = "lng" value="<?php echo $selectDetails[0]['eap_v_long']; ?>"/>
        <input type ="hidden" name = "lat" id = "lat" value="<?php echo $selectDetails[0]['eap_v_lat']; ?>"/>
        <button style="display:none" id = "scrolldown" class = "btn btn-default pull-right"><i class = "fa fa-lg fa-arrow-down"></i></button>
    </div>
    
    <div style = "clear:both"></div>
    <div class = "title-divider"></div>

    <div id = "expertbox" class="mb25 col-md-12" style="display:none">
        
        <div class = "col-md-5">
            <label>Name:</label>
            <p><?php echo $selectDetails[0]['s_title'] . " " . $selectDetails[0]['ea_forename'] . " " . $selectDetails[0]['ea_surname']; ?></p>
            <label>Phone:</label>
            <p><?php echo $selectDetails[0]['ea_telephone']; ?></p>
            <label>Email:</label>
            <p><?php echo $selectDetails[0]['ea_email']; ?></p>
            <label>Speciality:</label>
            <p><?php echo $selectDetails[0]['et_type']; ?></p>
            
            <?php if($agreementRating[0]['oa_agreement_rating'] !== NULL) { ?>
            <label>Rating:</label>
            <p>
			<?php if($agreementRating[0]['oa_agreement_rating'] == "1") { ?>
                <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
            <?php } ?>
            <?php if($agreementRating[0]['oa_agreement_rating'] == "2") { ?>
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
            <?php } ?>
            <?php if($agreementRating[0]['oa_agreement_rating'] == "3") { ?>
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></i>
            <?php } ?>
            <?php if($agreementRating[0]['oa_agreement_rating'] == "4") { ?>
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
            <?php } ?>
            <?php if($agreementRating[0]['oa_agreement_rating'] == "5") { ?>
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            <?php } ?></p>
            <?php } ?>
            
            <?php echo $selectCreatedDay[0]['dailyCancelled']; ?>
            
        </div>
        
        <div class = "col-md-7">
            <div id="map" style="height:400px; width:100%"></div>
        </div>
        
    </div>
    

    
    <div id = "statbox" class="mb25 col-md-12" style="display:none;">
        <div class = "mb25 col-md-12">
        	<?php 
			$number1 = $selectCancelled[0]['cancelledApps']; 
			$number2 = $selectEmpty[0]['emptyApps']; 
			$number3 = $selectFilled[0]['filledApps']; 
			?>
			<?php include('../includes/pie.php'); ?>     
        </div>
        <div class = "col-md-12">
        	<hr></hr>
                <label>Attended Between Dates Specified:</label>
                <p><?php echo $selectFilled[0]['filledApps']; ?></p>
                <label>DNA Between Dates Specified:</label>
                <p><?php echo $selectCancelled[0]['cancelledApps']; ?></p>
                <label>Appointments Not Filled Between Dates Specified:</label>
                <p><?php echo $selectEmpty[0]['emptyApps']; ?></p>
                <label>Appointments Created Between Dates Specified:</label>
                <p><?php echo $selectCreated[0]['createdApps']; ?></p>
            <hr></hr>
        </div>
        <div class = "col-md-12">
         <table class="table table-responsive ">  
              <tbody>
                <tr class="appbook-header">
                    <td>Appointments</td>
                    <td>Appointments Not Filled</td>
                    <td>Percentage Not Filled</td>
                </tr>
                
            <?php //foreach ($selectCreatedDay as $header => $value) { ?>
				
                <tr style="" class="tablerow show-overlay">
                 
                    <td>13</td>
                    <td>3</td>
                    <td>23.1%</td>
                    
                </tr>

			<?php //} ?>

             </tbody>
         </table>
        </div>
        
    </div>
    
    <div id="results-anchor"></div>
</div>
</body>
<script src="<?php echo _ROOT ?>/js/modal.js"></script>

<!-- Validation -->
<script src="<?php echo _ROOT ?>/js/jquery.validate.js"></script>
<script src="<?php echo _ROOT ?>/js/additional-methods.js"></script>
<script src="<?php echo _ROOT ?>/js/validation.js"></script>
<script src="<?php echo _ROOT ?>/js/mro-agreement-validation.js"></script>

<script type="text/javascript" src="<?php echo _ROOT ?>/js/gmaps.js"></script>

<script>

    var lat = $('#lat').val();  
    var lng = $('#lng').val(); 

	$('#showstats').click(function(){
		$('#statbox').show();
		$('#expertbox').hide();
		$('#scrolldown').show();
	});
	
	$('#showexpert').click(function(){
		$('#expertbox').show();
		$('#statbox').hide();
		$('#scrolldown').hide();
		
		var map = new GMaps({
		  div: '#map',
		  lat: lat,
		  lng: lng,
		});
            map.addMarker({
            lat: lat,
            lng: lng,
        });
            map.drawOverlay({
            lat: lat,
            lng: lng,
            content: '<div class="map-header"><h4><i class = "fa fa-lg fa-user"></i> Expert</h4></div>'
        });
		
	});

	$('#scrolldown').click(function(){

		$(".jamesbonder").animate({ scrollTop: $('.jamesbonder').height()}, 1000);
	});


</script>