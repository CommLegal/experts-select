<html>
    <head>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>
<body>
<?PHP error_reporting(-1); ?>
<style>
	body {padding:0px;}
	
	#overlay {
					position: fixed;
					display: none;
					z-index: 10;
					height: 100%;
					width: 100%;
					background-image: url(bgtrans.png);
	}
	
	#overlay #overlay-content {
					background-color: white;
					position: absolute;
					z-index: 10;
					left: 20%;
					top: 20%;
					min-height: 60%;
					width: 60%;
					box-shadow: 10px 10px 10px #888888;
					border-radius: 10px;
					background-image: url(../images/popup-title-bg.png);
					background-repeat: repeat-x;
					background-position: left top;
					/*border: 1px solid #fff;*/
	}
	
	#overlay #overlay-content #overlay-title {
					position: relative;
					float: left;
					width: 100%;
					color: #FFF;
					font-size: 1.2em;
					line-height: 2em;
					text-align: center;
	}
	
	#overlay #overlay-content #overlay-text {
					background-color: #fff;
					position: relative;
					clear: both;
					float: left;
					width: 96%;
					color: #000;
					font-size: 1em;
					line-height: 1.4em;
					text-align: center;
					padding: 2%;
					max-height: 450px;
					overflow: auto;
	}
	
	#close {border-radius:15px; width:1%; padding:25px; background-color:white;}
	.ro {border-radius:15px;}
	
</style>



<!-- start of popup overlay !-->
<div id="overlay" >
	<div id="overlay-content" class="ro">
		<div id="close">X</div>
        
            <div id="overlay-title">
            
            </div>
            
            <div id="overlay-text">
            <h1>Modal Working</h1>
            <p>Some content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and content and that's it.</p>
            </div>
            
            <div style="clear: both;"></div>
	</div>
	<div style="clear: both;"></div>
</div>
    <!-- end of popup overlay !-->


<a href = "#" title="Modal Title" class="show-overlay" id="accidentLocation">Location (click to view/amend)</a>

<!-- 
    The title above sets the title of the modal. The ID corresponds to what goes in the popup-call.php file. 
    If you add a : after the page in the id e.g. accidentLocation:123, it will send the text within the form post. 
-->

<?php
		if($_POST['callPage'] == "accidentLocation") {
						require("popups/accidentLocation.php");            
	}

?>

<script>

	$(".show-overlay").click(function(e) {
									$("#overlay").show();
									$("#overlay #overlay-content #overlay-title").text($(this).attr("title"));
									var pageValues = $(this).attr("id").split(":");
									
									var callPage = pageValues[0];
									var callValues = pageValues[1];
									
									})
	
										$.post( "pages/popup-call.php", { 
														callPage: callPage,   
														callValues: callValues
										})
	
	
	
	
									.done(function( data ) {
													$("#overlay #overlay-content #overlay-text").html(data);
									});
					});
	
	$("#close").click(function(e) {
									$("#overlay").hide();
});
	
							$("#overlay").hide();

</script>

<!-- The overlay is an image over the entire page and sits something that looks like a modal box on top. It calls the popup-call.php page and dumps the content into the modal box. -->

</body>
</html>








