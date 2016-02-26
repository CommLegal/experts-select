<?php 

//START - TURN ERRORS ON
 ini_set('display_errors',1);
 ini_set('display_startup_errors',1);
 error_reporting(-1);
//END - TURN ERRORS ON

//START DB CONNECTION
 require("../mysqlwrapper_class.php");
 $conn = new mysqlwrapper_class;
//END DB CONNECTION

 $newFormat1 = new DateTime($_POST["date-picker-dob"]);
 $requestAppFormat = $newFormat1->format('Y-m-d');
 
 $newRequestDate = new DateTime($_POST["date-picker-ven1"]);
 $appDateFormat = $newRequestDate->format('Y-m-d');

 $afterTime = $appDateFormat . " " . $_POST["appointmentTimeAfter"];
 $beforeTime = $appDateFormat . " " . $_POST["appointmentTimeBefore"];
 
 $checkExistingRequest = $conn->execute_sql("select", array("count(*) as rows"), "waiting_room", "wr_clientFName=? AND wr_clientSName=? AND wr_timeFrom=? AND wr_timeTo=?", array("s1" => $_POST["pForename"], "s2" => $_POST["pSurname"], "s3" => $afterTime, "s4" => $beforeTime));
 
 
  $checkExistingPatient = $conn->execute_sql("select", array("count(*) as rows"), "c_clients", "cc_firstname=? AND cc_surname=? AND cc_postcode=?", array("s1" => $_POST["pForename"], "s2" => $_POST["pSurname"], "s3" => $_POST["line1"]));
 
 $getCompanyNo = $conn->execute_sql("select", array("ma_name"), "m_accounts", "ma_id=?", array("i" => $_SESSION['CME_USER']['login_id']));
 
 $getCompanyName = $conn->execute_sql("select", array("mo_name"), "m_organisations", "mo_id =?", array("i1" => $getCompanyNo[0]['ma_name']));
 
 $requestSubject = "Confirmation of Waiting Room Request for " . $_POST["pForename"] . " " . $_POST["pSurname"];
 
 $requestMessage =  "A waiting room request has been made for " . $_POST["pForename"] . " " . $_POST["pSurname"] . ", the details of this appointment can be found below 
 					 </br></br> <b>House Number: -</b> " . $_POST["houseNo"] . 
					 "</br></br> <b>Postcode: -</b> " . $_POST["line1"] . 
					 "</br></br> <b>Distance Willing To Travel: -</b> " . $_POST["radiusFromLocation"] . 
					 "</br></br> <b>Times Ranging from: - </b>" . $afterTime . 
					 "</br></br> <b>Until: -</b> " . $beforeTime . 
					 "</br></br> <b>Client Telephone: - </b>" . $_POST["pContact"];
					 
 
if($checkExistingRequest[0]['rows'] == "0") { 
 
 $insertRequest = $conn->execute_sql("insert", array("wr_houseNo" => $_POST["houseNo"],
													 "wr_postcode" => $_POST["line1"],
													 "wr_radius" => $_POST["radiusFromLocation"],
													 "wr_timeFrom" => $afterTime,
													 "wr_timeTo" => $beforeTime,
													 "wr_clientFName" => $_POST["pForename"],
													 "wr_clientSName" => $_POST["pSurname"],
													 "wr_clientTel" => $_POST["pContact"],
													 "wr_mroCompany" => $getCompanyNo[0]['ma_name'],
													 "wr_latitude" => $_POST['v_latitude'],
													 "wr_longitude" => $_POST['v_longitude'],
													 "wr_client_dob" => $requestAppFormat,
													 "wr_mroUser" => $_SESSION['CME_USER']['login_id']), "waiting_room", "", "");
 
  $updateMROWaitingRoom = $conn->execute_sql("insert", array("mu_recipient_id" => $_SESSION['CME_USER']['login_id'], 
														"mu_sender_id" => "0", 
														"mu_content" => $requestMessage, 
														"mu_datesent" => date("Y-m-d H:i:s"), 
														"mu_subject" => $requestSubject,
														"mu_type" => "3",
														"mu_oa_company" => $getCompanyName[0]['mo_name'],
														"mu_oa_id" => $proposeAgreement), "m_updates", "", "");
 
	 if($checkExistingPatient[0]['rows'] == "0") { 
	 
		 $insertPatient = $conn->execute_sql("insert", array("cc_address1" => $_POST["houseNo"],
															 "cc_postcode" => $_POST["line1"],
															 "cc_firstname" => $_POST["pForename"],
															 "cc_surname" => $_POST["pSurname"],
															 "cc_telephone" => $_POST["pContact"],
															 "cc_dob" => $requestAppFormat,
															 "cc_latitude" => $_POST['v_latitude'],
															 "cc_longitude" => $_POST['v_longitude']), "c_clients", "", "");
	 
 }
 
 echo "<div style = 'clear:both'></div><div class = 'mt25 alert alert-success'>Appointment submitted. Patient record added to database.</div><script>setTimeout(function(){location.reload();}, 2000); $('#request-btn').hide();</script>";
	 
} elseif($checkExistingRequest[0]['rows'] >= "1") { echo "<div style = 'clear:both'></div><div class = 'mt25 alert alert-danger'><i class = 'fa fa-lg fa-warning'></i>  Appointment already exists for that patient. Please try again.</div>"; }


?>