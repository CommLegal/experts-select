
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

<?php if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} else {$btncolor = "btn btn-success";} ?>

<div class="container main mb25">
	<div class="col-md-12 mb25">
		<h3>Appointment Book</h3>  
        <div class="title-divider"></div>                
	</div>
    
        <!--<form action="" method="post" enctype="multipart/form-data" name="expert-book-app" id="expert-book-app" role="form"> -->
    <form action="" method="post" enctype="multipart/form-data" name="" id="form-app-book" role="form">	
        <div class = "col-md-12 mb25">
                    <div class="col-lg-6">
                         <label class = "control">Postcode:</label>
                         <input class="form-control" id = "" name="" type="text"  required />
                    </div>
                    
                    <div class="col-lg-6">
                         <label class = "control">Radius:</label>
                         <input class="form-control" id = "" name="" type="text"  required />
                    </div>
                    
                    <div class="col-lg-6">
                        <label>Date1:</label>
                        <div class="input-group date">
                            <input id="date-picker-ven" name="date-picker-ven" value="<?php echo date("d-m-Y");?>" type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>    
                    </div>
                    
                    <div class="col-lg-6">
                        <label>Date2:</label>
                        <div class="input-group date">
                            <input id="date-picker-ven" name="date-picker-ven" value="<?php echo date("d-m-Y");?>" type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>    
                    </div>
        </div>       
    </form>
    <div style = "clear:both"></div>
    
    <!-- LEFTBOX CALENDAR -->
    <div class = "col-md-6">
        <div class="panel panel-default" style="height:500px">
          <div class="panel-heading">Calendar</div>
          <div class="panel-body">
            <p></p>
          </div>
        </div>
    </div>
    
    <!-- Rightboxes -->
    <div class = "col-md-6">
    
		<!-- TOP RIGHT-->
        <div class="panel panel-default" style="height:250">
            <div class="panel-body">
                <form id ="" name="" method ="" class ="">
                 <label class = "control">Time1:</label>
                 <input class="form-control" id = "" name="" type="text"  required />
                   
                 <label class = "control">Time2:</label>
                 <input class="form-control" id = "" name="" type="text"  required />
                 
                 <button type = "" id = "" class = "mt25 btn btn-primary">View</button>
             </form> 
            </div>
        </div>

		<!-- BOTTOM RIGHT -->
        <div class="panel panel-default" style="height:230">
            <div class="panel-heading">Appointments</div>
            <div class="panel-body">
            <p></p>
            </div>
        </div>
    
    <!-- END RIGHTBOXES -->
    </div>
    
</div><!-- END -->

	<script src="<?php echo _ROOT ?>/js/modal.js"></script>

    