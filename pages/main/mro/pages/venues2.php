<?php
include('../includes/add-venue-function.php');
?>

<?php 
	if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
	else {$btncolor = "btn btn-success";}
?>

<html>
<head>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyC9_eubdf0kjY2lVzqnDRnEmACsb3CXt80"></script>
<script type="text/javascript" src="js/waitingroom-mro-map.js"></script>
</head>
    <div class="container main mb25">

<body id="add">      
        <div class="col-md-12 mb25">
                
            <h3 class="">Venue Management</h3>	
            <div class="title-divider"></div>	

      		</div>  
            <div class="col-md-12 formbg">    
        <div id="map_canvas" style="width:100%; height:500px;"></div>
        <div id="ajax_msg"></div>
        
            <div class="form-group">
            
                <form id = "add-venue" method="post" action="includes/submit-venue.php">
                <div class="col-md-6 mb50"> 
                    
                    <label for="v_postcode" class="control-label">Postcode</label>
                    <input type="text" name="v_postcode" id="v_postcode" class="form-control" required />

                    <input type="" id = "v_latitude" value = "" />
                    <input type="" id = "v_longitude" value = "" />
                    
                    </div>
                    <div class = "hiddenclass">
                         <label for="v_latitude" class="control-label">Latitude</label>
                        <input type="text" name="v_latitude" id="v_latitude" class="form-control mb32" style="border-radius:10px;">
                        
                        <label for="v_longitude" class="control-label" style="position:relative; bottom: 20px;">Longitude</label>
                        <input type="text" name="v_longitude" id="v_longitude" class="form-control mb32" style="position:relative; bottom:20px; border-radius:10px;"/> 
                    </div>
                </div>
                </form>
                
                
            </div>
        </div>


        
        <?php
		
		if($_REQUEST['action'] == "add") { 
			require("pages/main/experts/pages/add_appointments.php");
		}
		elseif($_REQUEST['action'] == "edit") { 
			require("pages/main/experts/pages/edit_appointments.php");
		}
		?>
    </div>
</body>
</html>