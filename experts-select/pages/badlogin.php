<?php 
	if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
	else {$btncolor = "btn btn-success";}
?>

<div class= "container main">   
    <div class="col-md-12 mb25">              
        <h3>Oops!</h3>
        <hr />
        <p>There was a problem processing your login details. Please try again.</p>
        <p>If you forgot your details please <a href="#">click here.</a></p>
        <br />
        <button class = "btn btn-lg btn-primary"><i class = "fa fa-lg fa-arrow-left"></i> &nbsp; Try Again</button>
        
    </div><!-- End panel -->   
  
<!-- End container -->    
</div>

