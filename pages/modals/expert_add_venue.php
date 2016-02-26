<html>
<head>
<!--<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyC9_eubdf0kjY2lVzqnDRnEmACsb3CXt80"></script>
<script type="text/javascript" src="js/map.js"></script>-->
</head>
<body id = "add" onLoad="initialise();">
<!-- Modal -->
	<div id="expert-add-venue" class="modal fade" role="dialog">
	  <div class="modal-dialog-venue-add">

		<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Venue</h4>
			  </div>
              <div id="modal-form-venue">
                  <form id="postcodeForm" name="form1" method="POST" action="">
                          <label for="v_search_postcode" class="control-label">Existing Venue Postcode  &nbsp;</label>
                          
                          
                          <i id="existing-venue" class="fa fa-question-circle"></i>	
                          <div class = "helpbox" style="background-color:red;" width="100px"> </div>
                          
                          <select name="e_venue_id" id="e_venue_id" class="venue-box mb25">
                          	<option id="v_options" name="v_options" value="1">Select Existing Venue To Add</option>
                          </select>

                          <ul id="postcode-results">

                          </ul>
                          <button type="button" class="btn btn-success" data-toggle="modal" id="existing-venue-add">Add venue to my list</button>
                  </form>
              </div>
              
              <div class="form-divider"></div>
              
              <div class="hiddenclass">
        	  		<div id="map_canvas" style="width:100%; height:200px;"></div>
              </div>
              
        	  <div id="ajax_msg"></div>
              <div id="modal-form-venue-addven">
                  <!--FORM CAN BE FOUND IN ADD-EXISTING-POSTCODE.PHP-->
              </div>
			</div>
	  </div>
	</div>

    <script src="<?php echo _ROOT ?>/js/custom.js"></script>
</body>
<html>