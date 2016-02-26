<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require("includes/mysqlwrapper_class.php");

$conn = new mysqlwrapper_class;

$query = "SELECT v_name FROM venues";

echo $query;

?>

<html>
	<head>
    <script type="text/javascript" src="js/custom.js"></script>
    </head>
    <body>
    <form id="testForm" name="testForm" method="post">
    	<input type="submit" name="button" id="simple-button" value="Submit!" /> 
    </form>
    </body>
</html>