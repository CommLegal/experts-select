<?php require("../includes/config.php");?>

<div class = "col-md-2"></div>
<div class = "col-md-8">
    
    <div class = "col-md-12 mt25">
    <p>Completely delete the appointment?</p>
    	<form method="post" id="removeMRO" name="removeMRO"  action="">
        
            <input type="hidden" name="mroId" value="<?php echo $_POST['callValues'] ?>" />
		
    </div>  
</div>
<div class = "col-md-2"></div>

        <div class = "col-md-12 mt25 mb25">
        	<button id="deleteMROapp:<?php echo $_POST['callValues']; ?>" class = "col-md-12 btn btn-primary btn-lg cancelThis">Cancel Appointment &nbsp;<i class = "fa fa-times fa-lg"></i></button>
            <div id="success" class = "mb25"></div>
        </div>
</form>

<div id="success"></div>

<script src="<?php echo _ROOT ?>/js/modal.js"></script>