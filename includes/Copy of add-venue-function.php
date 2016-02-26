<?php
//Requires a connection to the DB and creates a new connection by adding a new class under the variable $conn
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

		function submit_venue() {
			
			//$venues = $conn->execute_sql("select", array("*"), "venues", "", "");
			//$venues = $conn->execute_sql("insert", array("v_name" => "", "v_telephone" => ""), "venues", "", "");
			//var_dump ($venues);
									
									/*$theQuery = "INSERT INTO venues (v_name , v_telephone , v_email , v_address1 , v_address2 , v_address3 , v_city , v_county , v_country , v_postcode) VALUES ('" . $_POST["v_name"] . "' , '" . $_POST["v_telephone"] . "' , '" . $_POST["v_email"] . "', '" . $_POST["v_address1"] . "' , '" . $_POST["v_address2"] . "', '" . $_POST["v_address3"] . "' , '" . $_POST["v_city,"] . "', '" . $_POST["v_county"] . "' , '" . $_POST["v_country"] . "', '" . $_POST["v_postcode"] . "')";*/
									
									
										//echo $theQuery;
										//$theResult = mysqli_query ($conn, $theQuery );

										//print_r($_POST);
										
										if ($conn)
										{
											echo "Success!!!!";
											echo $queryTwo;
										}
										else
										{
											echo "didn't work!";
											printf("Connect failed: %s\n", mysqli_connect_error());
										}
										mysqli_close ($conn);
								}
								
?>