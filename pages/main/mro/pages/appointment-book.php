<head>
	<script type="text/javascript" src="<?php echo _ROOT ?>/js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="<?php echo _ROOT ?>/js/appbook-mro-map.js"></script>
</head>

<body id = "add">
<div id="overlay" style = "margin-top:350px;"  > <!-- USED TO CHANGE MODAL ON ADD_APPOINTMENTS!!! --> 
    <div id="overlay-content">
        <div style = "background-color:#337AB7" id="close"><button type="button" class="close" ><p>Close <i class = "fa fa-lg fa-times"></i></p></button></div>
            <div id="overlay-title">
            	<p>Booked Appointments</p>
            </div>
            
            <div id="overlay-text">
            	
            </div>
            
            <div style="clear: both;"></div>
    </div>
    <div style="clear: both;"></div>
</div>


<?php 


	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);


	//require('calendar.php');
	//$calendar = new Calendar();
	
	if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} else {$btncolor = "btn btn-success";} 

?>
<div style = "display:none">
	<div id = "map_canvas"></div>
</div>

<div class="container main mb25">
	<div class="col-md-12 mb25">
		<h3>Appointment Book</h3>  
        <div class="title-divider"></div>                
	</div>
    
        <!--<form action="" method="post" enctype="multipart/form-data" name="expert-book-app" id="expert-book-app" role="form"> -->
    <form action="" method="post" enctype="multipart/form-data" name="" id="form-app-book" role="form">	
        <div class = "col-md-12">
                    <div class="col-lg-6">
                         <label class = "control">Postcode:</label>
                         <input class="form-control" id = "vbook-postcode" name="" type="text"  autocomplete="off" required />
                         <input type = "hidden" id = "vbook-latitude" name="latitude" /><input type = "hidden" id = "vbook-longitude" name="vbook-longitude" />
                    </div>
                    
                    <div class="col-lg-6">
                         <label class = "control">Radius in Miles:</label>
                         <input class="form-control" id = "vbook-radius" name="vbook-radius" type="text"  required />
                    </div>
                    
                    <div class="col-lg-6">
                        <label>Appointments After:</label>
                        <div class="input-group date">
                            <input id="date-picker-ven" name="date-picker-ven-from" value="<?php echo date("d-m-Y");?>" type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>    
                    </div>
                    
                    <div class="col-lg-6">
                        <label>Appointments Before:</label>
                        <div class="input-group date">
                            <input id="date-picker-ven" name="date-picker-ven-to" value="<?php echo date("d-m-Y");?>" type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>    
                    </div>
                    
                    <div class = "col-md-12">
                    	<input type="submit" id = "getAppointmentsInRadius" class = "mt25 btn btn-primary" value="Search" />
                    </div>
        </div>       
    </form>
    
    <div style = "clear:both"></div>
    
    <hr/>
    
    <!-- LEFTBOX CALENDAR -->
    <div id="displayResultCalender" class="col-md-6"></div>
    
	<div id = "loading" class = "col-md-12 midd" style="display:none">
		<p><i class = "fa fa-lg fa-refresh fa-spin"></i> &nbsp;Finding Appointments - Please wait... </p> 
	</div>
    
    <!-- Rightboxes -->
    <div id="appointmentTime" class = "col-md-6"></div>
    
    <div id = "result-table"></div>
    
    
</div><!-- END -->




</body>
<script src="<?php echo _ROOT ?>/js/modal.js"></script>

<script>

	$('#getAppointmentsInRadius').click(function(e){
		e.preventDefault();			
		
		var data = $("#form-app-book").serializeArray();
		if( $("#form-app-book").valid() ) { 
			$.post(
			   'includes/mro/book-app-search.php',
				data,
				function(data){
				 $("#displayResultCalender").html(data);
				}
			  );
		}
	});
	
</script>
    