<script src="js/jquery.awesome-cursor.min.js"></script>



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

$newFormat1 = new DateTime($_POST['date-picker-ven-after']);
$appdateFormat1 = $newFormat1->format('Y-m-d H:i:s');

$newFormat2 = new DateTime($_POST['date-picker-ven-before']);
$appdateFormat2 = $newFormat2->format('Y-m-d 23:59:59');

if($_POST["postcode"] == NULL) { 

$findExpertStatistics = $conn->execute_sql("select", array("*, COUNT(eap_v_id) AS appointmentCount"), "e_appointments", "eap_date >=? AND eap_date <=? AND eap_ea_id=? GROUP BY eap_v_id", array("s1" => $appdateFormat1, "s2" => $appdateFormat2, "i" => $_POST['expert']));



if (empty($result)) {
    echo '<div class = "col-md-12 alert alert-danger"><i class="fa fa-lg fa-warning"></i> &nbsp;No appointments found. Try a different expert or a wider time scale.</div>';
}


else { ?>

<div class = "mt25 col-md-12 scroll " style = "max-height:350px;">
<div class = "col-md-12" style=  "background-color:#337AB7; height:5px; border-top-right-radius:10px; border-top-left-radius:10px; margin-bottom:-2px;"></div>
		<table class = "table table-responsive " >  
            <tr class = "appbook-header">
            	<td>Expert</td>
                <td>Venue</td>
                <td>Appointments</td>
                <td>Appointments Not Filled</td>
                <td>Percentage Not Filled</td>
            </tr>
            
            <?php }

foreach($findExpertStatistics as $header => $value) {  

		$findVenueName = $conn->execute_sql("select", array("*"), "venues", "v_id=?", array("i"=> $findExpertStatistics[$header]['eap_v_id'])); 
		
		$findEmptyApps = $conn->execute_sql("select", array("COUNT(*) AS unfilledApps"), "e_appointments", "eap_v_id=? AND eap_cc_id=?", array("i"=> $findExpertStatistics[$header]['eap_v_id'], "i2" => "0")); 
        
        $findExpertDetails = $conn->execute_sql("select", array("*"), "e_accounts JOIN salutations ON ea_s_id = s_id", "ea_id=?", array("i" => $findExpertStatistics[$header]['eap_ea_id'])); 
        
        $percentage = ($findEmptyApps[0]['unfilledApps'] / $findExpertStatistics[$header]['appointmentCount']) * 100; ?>

			 <tr class="tablerow show-overlay" id = "mro-statview:<?php echo $findExpertStatistics[$header]['eap_v_id']; ?>">
             
             	<td><?php echo $findExpertDetails[0]['s_title'] . " " . $findExpertDetails[0]['ea_forename'] . " " . $findExpertDetails[0]['ea_surname']; ?></td>
                <td><?php echo $findVenueName[0]['v_name']; ?></td>
                <td><?php echo $findExpertStatistics[$header]['appointmentCount']; ?></td>
                <td><?php echo $findEmptyApps[0]['unfilledApps']; ?></td>
                <td><?php echo number_format($percentage, 1, '.', '') . "%"; ?></td> 
                
            </tr>
            
            <?php } ?>
         </table>
        </div>

<?php } else {

$findMROOrganisation = $conn->execute_sql("select", array("*"), "m_accounts", "ma_id=?", array("i" => $_SESSION['CME_USER']['login_id']));

$venueLat = $_POST["lat"];

$venueLong = $_POST["lng"];

$radius = $_POST["radius"];



$result = $conn->execute_sql('select',
							 
  array('z.*, COUNT(eap_v_id) AS appointmentCount, 
		(p.distance_unit 
		* DEGREES(ACOS(COS(RADIANS(p.latpoint)) 
		* COS(RADIANS(z.eap_v_lat)) 
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long)) 
		+ SIN(RADIANS(p.latpoint)) * SIN(RADIANS(z.eap_v_lat))))) * 1.021371 AS distance_in_miles'), 'e_appointments AS z 
		
		JOIN ( SELECT ' . $venueLat . ' AS longpoint, ' . $venueLong . ' AS latpoint, 
			' . $radius . ' AS radius, 111.045 AS distance_unit ) AS p ON 1=1',
		
		'z.eap_v_lat 
		BETWEEN p.latpoint - (p.radius / p.distance_unit) 
		AND p.latpoint + (p.radius / p.distance_unit) 
		AND z.eap_v_long 
		BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint)))) 
		AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint)))) 
		AND ((p.distance_unit * DEGREES(ACOS(COS(RADIANS(p.latpoint)) 
		* COS(RADIANS(z.eap_v_lat)) 
		* COS(RADIANS(p.longpoint) - RADIANS(z.eap_v_long)) 
		+ SIN(RADIANS(p.latpoint)) * SIN(RADIANS(z.eap_v_lat))))) * 0.621371) <= p.radius 
		AND eap_mo_id=? AND eap_date >=? AND eap_date <=? GROUP BY eap_v_id ORDER BY distance_in_miles', array("i1" => $findMROOrganisation[0]['ma_name'], "s1" => $appdateFormat1, "s2" => $appdateFormat2));




if (empty($result)) {
    echo '<div class = "col-md-12 alert alert-danger"><i class="fa fa-lg fa-warning"></i> &nbsp;No appointments found. Try a larger radius or a wider time scale.</div>';
}


else{ ?>
<div class = "col-md-12 scroll " style = "max-height:350px;">
<div class = "col-md-12" style=  "background-color:#337AB7; height:5px; border-top-right-radius:10px; border-top-left-radius:10px; margin-bottom:-2px;"></div>
		<table class="table table-responsive" >  
            <tr class = "appbook-header">
            	<td>Expert</td>
                <td>Venue</td>
                <td>Distance In Miles</td>
                <td>Appointments</td>
            </tr>
            
            <?php





foreach($result as $header => $value) { 


		$findVenueName = $conn->execute_sql("select", array("*"), "venues", "v_id=?", array("i"=> $result[$header]['eap_v_id'])); 
        
        $findExpertDetails = $conn->execute_sql("select", array("*"), "e_accounts JOIN salutations ON ea_s_id = s_id", "ea_id=?", array("i" => $result[$header]['eap_ea_id'])); ?>

			 <tr class="tablerow show-overlay" id = "mro-statview:<?php echo $result[$header]['eap_v_id']; ?>">
             
             	<td><?php echo $findExpertDetails[0]['s_title'] . " " . $findExpertDetails[0]['ea_forename'] . " " . $findExpertDetails[0]['ea_surname']; ?></td>
                <td><?php echo $findVenueName[0]['v_name']; ?></td>
                <td><?php echo number_format($result[$header]['distance_in_miles'], 1, '.', ''); ?></td>
                <td><?php echo $result[$header]['appointmentCount']; ?></td>
                
             </tr>
            
            <?php }  ?>
        </table>
    </div>

<?php }} 


?>

		 
    

<script src="<?php echo _ROOT ?>/js/modal.js"></script> 
        
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

   $(function() {
      $('.tablerow').mouseover(function() {
         $(this).addClass('selectedRow');
		 $(this).awesomeCursor('hand-pointer-o');
      }).mouseout(function() {
         $(this).removeClass('selectedRow');
		 $(this).css('cursor', '');
      }).click(function() {
         //alert($('td:first', this).text());
      });
   });
</script>



<script type="text/javascript" src="<?php echo _ROOT ?>/js/gmaps.js"></script>






















