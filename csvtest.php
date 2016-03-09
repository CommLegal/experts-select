<?php

	$sigFinder = $conn->execute_sql("select", array("*"), "e_accounts", "s_id=?", array("i" => $currentSig[0]['ea_signature']));

	$getSig = $conn->execute_sql("select", array("ea_signature"), "e_accounts", "ea_id=?", array("i" => $_SESSION['CME_USER']['login_id']));

	//echo $getSig[0]['ea_signature'];
?>

<div class = "container main">
	<h3>Signature</h3>
    <div class = "title-divider"></div>
    <div class = "col-md-12 mt25">
        <p>Please draw your signature here:</p>
        <div id="sig" class="kbw-signature"><canvas width="0" height="0">Your browser doesn't support signing.</canvas></div>
        <!-- <div id="sig2" class="kbw-signature"><canvas width="0" height="0">Your browser doesn't support signing.</canvas></div> -->
        <!-- <div id="redrawSignature" class="kbw-signature2"><canvas width="0" height="0">Your browser doesn't support signing.</canvas></div> -->
        <div class = "mt25">
            <button class="btn btn-danger" id="clear">Erase</button> 
            <!-- <button class="btn btn-info" id="redrawButton">Redraw</button> -->
            <form name="updateSig" id="updateSig" style="display:inline" method="POST" action="./includes/submit-signature.php">
            	<input class="mt25" name ="sigStore" id="sigStore" type="hidden" value='{"lines":[]}' />
            	<button type="submit" class="btn btn-success" name ="saveButton" id="saveButton">Save</button> 
			</form>
            
            <div id = "success" class = "mt25"></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo $_ROOT ?>sig/jquery.signature.js"></script>
<script>
	
	$('document').ready(function(e) { 
		$('#sig').signature('draw', <?php echo $getSig[0]['ea_signature']; ?>); 	 
	});
	
	//$('#sig2').signature({disabled: true});

	$('#sig').signature({ 
		background: '#ffffff', // Colour of the background 
		color: '#000000', // Colour of the signature 
		thickness: 2, // Thickness of the lines 
		guideline: false, // Add a guide line or not? 
		guidelineColor: '#a0a0a0', // Guide line colour 
		guidelineOffset: 25, // Guide line offset from the bottom 
		guidelineIndent: 10, // Guide line indent from the edges 
		// Error message when no canvas 
		notAvailable: 'Your browser doesn\'t support signing. Try using Chrome or Firefox.', 
		syncField: sigStore, // Selector for synchronised text field 
		change: null // Callback when signature changed 
	}); 
	
	$('#clear').click(function() { 
		$('#sig').signature('clear');
	});	
	
	////POST
	$('#saveButton').click(function(e){
		e.preventDefault();	
		var data = $("#updateSig").serializeArray();
			$.post(
			   './includes/submit-signature.php',
				data,
				function(data){
				 //alert("true");
				 $("#success").html(data);
				 setTimeout(function(){location.reload();}, 1000);
				}
			  );
	});

</script>
