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
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
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

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'name="' . parseToXML($row['v_name']) . '" ';
  echo 'address1="' . parseToXML($row['v_address1']) . '" ';
  echo 'address2="' . parseToXML($row['v_address2']) . '" ';
  echo 'address3="' . parseToXML($row['v_address3']) . '" ';
  echo 'city="' . parseToXML($row['v_city']) . '" ';
  echo 'county="' . parseToXML($row['v_county']) . '" ';
  echo 'country="' . parseToXML($row['v_country']) . '" ';
  echo 'postcode="' . parseToXML($row['v_postcode']) . '" ';
  echo 'longitude="' . parseToXML($row['v_longitude']) . '" ';
  echo 'latitude="' . parseToXML($row['v_latitude']) . '" ';
  echo 'email="' . parseToXML($row['v_email']) . '" ';
  echo 'description="' . parseToXML($row['v_description']) . '" ';
  echo 'telephone="' . parseToXML($row['v_telephone']) . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>
    