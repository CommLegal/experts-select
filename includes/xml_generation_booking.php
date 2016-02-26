<?php
$servername = "192.168.3.214";
$username = "wm1";
$password = "Password12345!";
$database = "cme";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','',$xmlStr);
$xmlStr=str_replace("'",'',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$connection=mysql_connect ('192.168.3.214', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM venues";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

$xml = new SimpleXMLElement('<xml/>')


// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
	$draw = $xml ->addChild('markers');
	$draw->addChild('name' ,$row['v_name']);
}
$fp = fopen("xml/markers.html", "wb");
fwrite($fp,$xml->asXML());
fclose($fp);

?>
    