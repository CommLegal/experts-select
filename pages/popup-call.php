<?php

	if($_POST['callPage'] == "appointmentView") {
					require("popups/appointmentView.php");            
	}
	if($_POST['callPage'] == "expert-booking") {
					require("popups/avail_app-expert.php");            
	}
	if($_POST['callPage'] == "mro-booking") {
					require("popups/avail_app-mro.php");            
	}
	if($_POST['callPage'] == "display-user-edit") {
					require("popups/mro-users-notes.php"); 
	}
	if($_POST['callPage'] == "display-user-delete") {
					require("popups/mro-users-delete.php");            
	}
	if($_POST['callPage'] == "display-user-deactivate") {
					require("popups/mro-users-deactivate.php");            
	}
	if($_POST['callPage'] == "view-agreement") {
					require("popups/mro-view-agreement.php");            
	}
	if($_POST['callPage'] == "cancel-agreement") {
					require("popups/mro-cancel-agreement.php");            
	}
	if($_POST['callPage'] == "block-expert") {
					require("popups/mro-expert-block.php");            
	}
	if($_POST['callPage'] == "mro-view-past-agreement") {
					require("popups/mro-view-past-agreement.php");            
	}
	if($_POST['callPage'] == "mro-unblock-expert") {
					require("popups/mro-unblock-expert.php");            
	}
	
	if($_POST['callPage'] == "enable-expert") {
					require("popups/mro-uncancel-expert.php");            
	}
	if($_POST['callPage'] == "waitingroom-cancel") {
					require("popups/mro-waitingroom-cancel.php");            
	}
	if($_POST['callPage'] == "acceptRequest") {
					require("popups/expert-waitingroom-book.php");            
	}
	if($_POST['callPage'] == "mro-app-view") {
					require("popups/mro-app-view.php");            
	}
	
	if($_POST['callPage'] == "expert-view-agreement") {
					require("popups/expert-view-agreement.php");            
	}
	if($_POST['callPage'] == "expert-cancel-agreement") {
					require("popups/expert-cancel-agreement.php");            
	}
	if($_POST['callPage'] == "expert-mro-block") {
					require("popups/expert-mro-block.php");            
	}
?>

