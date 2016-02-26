<div class= "container main"> 
    <div class="col-md-12 mb25">              
        <h3>Upload Results</h3><div class="title-divider"></div>
    </div>  
    
    <div class = "col-lg-12">  
		<div class = "col-lg-6">
        	<?php
			$file = $_POST['file-to-delete'];
			
			
			$nameID = $_SESSION['CME_USER']['login_id'];
			$dir = "uploads/expert/".$nameID."/".$file;
			
			
			if(unlink($dir)) echo $file." has been deleted successfully. <br />";
			else{echo "There was a problem deleting" . $file ." please try again or contact an administrator.";}
			
			?>
		<a class = "btn btn-success mt10" href = "index.php?page=upload-expert">Back</a>
        </div>
    </div>

</div>