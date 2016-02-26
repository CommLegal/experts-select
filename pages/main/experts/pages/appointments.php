	<div class="container main mb25">
        <div class="col-md-12 mb25">
            <h3 class="">Appointment Management</h3>	
            <div class="title-divider"></div>	
            <div class="col-md-4 prom-box">
            	<a href="?page=appointments&action=add"><h4><span class="glyphicon glyphicon-plus"></span>&nbsp;Add Appointments</h4></a>
            </div>
            
            <div class="col-md-1">&nbsp;</div>
            
            <div class="col-md-3 prom-box">
            	<a href="?page=appointments&action=edit"><h4><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit Appointments</h4></a>
            </div>
            
            <div class="col-md-1">&nbsp;</div>
            
            <div class="col-md-3 prom-box">
            	<a href="?page=venues"><h4><span class="glyphicon glyphicon-move"></span>&nbsp;Add Venues</h4></a>
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