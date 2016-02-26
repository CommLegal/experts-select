<?php 
	if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
	else {$btncolor = "btn btn-success";}
?>

        
<!-- Content -->
    <div class= "container main">
        <form id="submit-expert-message-form">
            <div class="col-md-12">              
                <h3>Message</h3><div class="title-divider"></div>
            </div> 
            
            <div class = "col-md-3 ">
                <label>Recipient: </label> <br />
                <select name="mro_id" id="mro_id" class="venue-box" style="width:250px; height:35px;">
                  <option id="ma_options" name="ma_options" value="1" onclick="loadList">Recipient</option>
                </select>
            </div>
            
            <div class = "col-md-3">
                <label>Subject: </label> <br />
                <input name="message_subject" style="width:250px; height:35px;"></input>
            </div>
            
            <div class = "col-md-6"> <!-- Extra top-right bit if we need it for anything -->
                <input type="hidden" name="sender_id" id="sender_id" style="width:250px; height:35px;" value="<?php echo $_SESSION['CME_USER']['login_id']; ?>"></input>
                <input type="hidden" name="date_sent" id="date_sent" style="width:250px; height:35px;" value="<?php echo date('Y-m-d H:i:s'); ?>"</input>
            </div>
               
            <div class = "col-md-12">
                <label>Message: </label> <br />
                <textarea name="message_content" class = "col-md-12" rows = "10" cols="150"></textarea>
            </div> 
            
            <div class = "col-md-12">
                <button id = "submit-expert-message" class = "<?php echo $btncolor ?> btn-lg mt25 mb25">Send &nbsp;<i class = "fa fa-envelope"></i></button>
            </div> 
            
            <div class = "col-md-12 mt25" id = "msg-sent" style = "display:none;">
                <div id="success-message" class="alert alert-success" role="alert" style="text-align:center;"></div>
            </div>
            
		</form>
        
        <div id="success-message"></div>
            
    <!-- Container Close -->
    </div>
