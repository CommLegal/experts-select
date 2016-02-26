<?php require("../includes/config.php");?>

<div class = "col-md-3"></div>
<div class = "col-md-6">
    
    <div class = "col-md-12 mt25">
    <p>Completely delete the user?</p>
    	<form method="post" id="removeMRO" action="">
            <input type="hidden" name="mroId" value="<?php echo $_POST['callValues'] ?>" />

    </div>  
</div>
<div class = "col-md-3"></div>



    		
        </form>
        
        
        <div class = "col-md-12 mt25 mb25"><button id="deleteMROUser" class = "col-md-12 btn btn-primary btn-lg">Delete <i class = "fa fa-check fa-lg"></i></button>
            <div id="success" class = "mb25"></div>
        </div>

<script src="<?php echo _ROOT ?>/js/modal.js"></script>