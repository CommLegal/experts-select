<?php 
	//var_dump($_POST);
?>

<div class="panel panel-default">
    <div class="panel-body">
     <form id="filterTimes" method ="post">
     	
         <input class="form-control" name="latitude" type="hidden" value="<?php echo $_POST ["cLat"]; ?>" />
         <input class="form-control" name="longitude" type="hidden" value="<?php echo $_POST["cLong"]; ?>" />
         <input class="form-control" name="cRadius" type="hidden" value="<?php echo $_POST ["cRadius"]; ?>" />
         <input class="form-control" name="calendarDate" type="hidden"value="<?php echo $_POST["calendarDate"]; ?>"  />
     
         <label class = "control">Appointments From:</label>
         <input class="form-control" name="timesRangingFrom" id="timesRangingFrom" type="text" placeholder="e.g. 09:00:00" required value="" />
           
         <label class = "control">Appointments To:</label>
         <input class="form-control" name="timesRangingTo" id="timesRangingTo" placeholder="e.g. 10:15:00" type="text" required value="" />
         
         <label class = "control">Sort Order:</label>
         <select class="form-control" id="sortOrder" name="sortOrder">
         	<option value="Date" selected>Date</option>
            <option value="Expert">Expert</option>
            <option value="Distance">Distance</option>
         </select>
         
         <label class = "control">Filter By Specialty:</label>
         <select class="form-control" id="filterSpecialty" name="filterSpecialty">
         	<option value="0" selected>ALL</option>
         	<option value="1">GP</option>
         	<option value="2">Orthopaedic Surgeon</option>
            <option value="3">A&E Consultant</option>
            <option value="4">ENT(Ears, Nose, Throat)</option>
            <option value="5">General Surgeon</option>
            <option value="6">Expert</option>
            <option value="7">Anaesthetist</option>
         </select>
         
         <input type="submit" id="submitTimeFilter" class="mt25 btn btn-primary" />
         
         <div style="clear:both"></div>
         
     </form> 
    </div>
</div>



<script>

	
	$('#submitTimeFilter').click(function(e){
		e.preventDefault();			
		
		var data = $("#filterTimes").serializeArray();
		//if( $("#filterTimes").valid() ) { 
		$.post(
		   'includes/mro/get-appointments.php',
			data,
			function(data){
			 $("#result-table").html(data);
			}
		  );
		//}
	});
	
</script>