
<?php


require_once( "fpdf/fpdf.php" );


class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',150,6,55);
    // Line break
    $this->Ln(20);
}
	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	
	
}




// Begin configuration
		
		//TEST NEW

		
		//SECTION A
		$fullName = $_POST['fullName'];
		$dob1 = $_POST['date-picker-DOB'];
		$occupation = $_POST['occupation'];
		
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];
		$address3 = $_POST['address3'];
		$postcode = $_POST['postcode'];
		$county = $_POST['county'];
		
		$accomp = $_POST['accomp'];
		$isReviewed = $_POST['isReviewed'];
		
		$hasID = $_POST['hasID'];
		$idType = $_POST['idType'];
		
		$instructor = $_POST['instructor'];
		$instructorName = $_POST['instructorName'];
		$instructorRef = $_POST['instructorRef'];
		
		$accidentDate = $_POST['date-picker-accident'];
		$examinationPlace = $_POST['examinationPlace'];
		$reportDate = $_POST['date-picker-report'];
	
	//SECTION B
		$accidentDetails = $_POST['accidentDetails'];
		$symptoms1 = $_POST['symptoms1'];
		$symptoms2 = $_POST['symptoms2'];
		$treatment1 = $_POST['treatment1'];
		$treatment2 = $_POST['treatment2'];
		$investigations = $_POST['investigations'];
		$position = $_POST['position'];
	
	//SECTION C
		$eeDescription = $_POST['eeDescription'];
		$effects = $_POST['effects'];
		
	//SECTION D
		$history = $_POST['history'];
		$examination = $_POST['examination'];
		$overview = $_POST['overview'];
		
	//SECTION E
		$seatbelt = $_POST['seatbelt'];
		$seatbelt_exempt = $_POST['seatbelt_exempt'];
		$seatbelt_details = $_POST['seatbelt_details'];
		
	//SECTION F
		$treatment3 = $_POST['treatment3'];
		
	//SECTION *~G~*
		$contact_address1 = $_POST['contact_address1'];
		$contact_address2 = $_POST['contact_address2'];
		$contact_address3 = $_POST['contact_address3'];
		$contact_postcode = $_POST['contact_postcode'];
		$contact_county = $_POST['contact_county'];
		$signature = $_POST['signature'];
		$doc_fullname = $_POST['doc_fullname'];
		$dateSigned = $_POST['date-picker-signed'];

//Configurato

$myDate = date('d/m/Y');
	

	
$textColour = array( 0, 0, 0 );
$headerColour = array( 100, 100, 100 );
$tableHeaderTopTextColour = array( 255, 255, 255 );
$tableHeaderTopFillColour = array( 92, 184, 92 );
$tableHeaderTopProductTextColour = array( 255, 255, 255 );
$tableHeaderTopProductFillColour = array( 92, 184, 92 );
$tableHeaderLeftTextColour = array( 1, 1, 1 );
$tableHeaderLeftFillColour = array( 255, 255, 255 );
$tableBorderColour = array( 50, 50, 50 );
$tableRowFillColour = array( 255, 255, 255 );
$reportName = $fullName . " Medical Report";
$reportNameYPos = 55;
$dateMade = $myDate;
$dateMadeYPos = 75;
$logoFile = "logo.png";
$logoXPos = 50;
$logoYPos = 25;
$logoWidth = 110;
$logoXPos2 = 150;
$logoYPos2 = 10;
$logoWidth2 = 50;


$data = array(
          array( 1 ),
          array( 1 ),
          array( 1 ),
          array( 1 ),
        );

// End configuration


/**
  Create the title page
**/

$pdf = new PDF( 'P', 'mm', 'A4' );
$pdf->AliasNbPages();
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->AddPage();


// Logo
//$pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth );

// Report Name
$pdf->SetFont( 'Arial', 'B', 24 );
$pdf->Ln( $reportNameYPos );
$pdf->Cell( 0, 15, $reportName, 0, 0, 'C' );

// Report Date Made
$pdf->SetFont( 'Arial', 'B', 24 );
$pdf->Ln( $dateMadeNameYPos );
$pdf->Cell( 0, 15, $dateMade, 0, 0, 'C' );

/**
  Create the page header, main heading, and intro text
**/



$pdf->AddPage();


///// SECTION A /////
//$pdf->Image( $logoFile, $logoXPos2, $logoYPos2, $logoWidth2 );


$i = 2;
foreach($_POST['fields2'] as $key=>$value) 
{
   if(!empty($value))
   {
		$pdf->SetFont( 'Arial', 'B', 12 );
		$pdf->Write( 6, "Additional " . $i . ":" );
		$pdf->Ln( 6 );
		$pdf->SetFont( 'Arial', '', 12 );
		$pdf->Write( 6, $value );
		$pdf->Ln( 12 );
		$i++;
   }
}

$pdf->SetFont( 'Arial', '', 20 );
$pdf->Write( 19, "Section A - " . $fullName . " " . "Details" );
$pdf->Ln( 21 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Claimant Name: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $fullName );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Occupation: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $occupation );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "D.O.B: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $dob1 );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Address: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
if (!empty($address1)){$pdf->Write( 6, $address1 );$pdf->Ln( 6 );}
if (!empty($address2)){$pdf->Write( 6, $address2 );$pdf->Ln( 6 );}
if (!empty($address3)){$pdf->Write( 6, $address3 );$pdf->Ln( 6 );}
if (!empty($postcode)){$pdf->Write( 6, $postcode );$pdf->Ln( 6 );}
if (!empty($county)){$pdf->Write( 6, $county );$pdf->Ln( 6 );}

$pdf->Ln( 6 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Identification:" );
$pdf->Ln( 6 );

$pdf->SetFont( 'Arial', '', 12 );
if ($hasID == "Yes"){
	$pdf->Write( 6, "Photo ID provided." );
	$pdf->Ln( 6 );
}
else {
	$pdf->Write( 6, "No photo ID." );
	$pdf->Ln( 6 );
}

$pdf->Write( 6, "ID type provided: " . $idType );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Accompanied by: " );

if (!empty($accomp)){
	$pdf->Ln( 6 );
	$pdf->SetFont( 'Arial', '', 12 );
	$pdf->Write( 6, $accomp );
	$pdf->Ln( 12 );
}
else {
	$pdf->SetFont( 'Arial', '', 12 );
	$pdf->Write( 6, "Unaccompanied." );
	$pdf->Ln( 12 );
}

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Records: " );
$pdf->Ln( 6 );

if ($isReviewed == "Yes"){
	$pdf->SetFont( 'Arial', '', 12 );
	$pdf->Write( 6, "Reviewed." );
	$pdf->Ln( 12 );
}
else {
	$pdf->SetFont( 'Arial', '', 12 );
	$pdf->Write( 6, "Not reviewed." );
	$pdf->Ln( 12 );
}

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Instruction Solicitor/Agency: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $instructorName );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Instruction Ref: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $instructorRef );
$pdf->Ln( 12 );

$pdf->AddPage();

///// SECTION B /////
//$pdf->Image( $logoFile, $logoXPos2, $logoYPos2, $logoWidth2 );

$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'Arial', '', 20 );
$pdf->Write( 19, "Section B" );
$pdf->Ln( 21 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Cell( 0, 6, "Accident:", 0, 0, 'L' );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $accidentDetails );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Cell( 0, 6, "Date of Accident:", 0, 0, 'L' );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $accidentDate );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Immediate Symptoms: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $symptoms1 );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Later Symptoms: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $symptoms2 );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Immediate Treatment: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $treatment1 );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Future Treatment: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $treatment2 );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Investigations: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $investigations );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Present Position Reported by Claimant: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $position );
$pdf->Ln( 12 );

$i = 1;
foreach($_POST['b_additionals'] as $key=>$value) 
{
   if(!empty($value))
   {
		$pdf->SetFont( 'Arial', 'B', 12 );
		$pdf->Write( 6, "Additional " . $i . ":" );
		$pdf->Ln( 6 );
		$pdf->SetFont( 'Arial', '', 12 );
		$pdf->Write( 6, $value );
		$pdf->Ln( 12 );
		$i++;
   }
}


$pdf->AddPage();
///// SECTION C /////
//$pdf->Image( $logoFile, $logoXPos2, $logoYPos2, $logoWidth2 );

$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'Arial', '', 20 );
$pdf->Write( 19, "Section C" );
$pdf->Ln( 21 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Employment & Education Position: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $eeDescription );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Consequential Effects: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $effects );
$pdf->Ln( 12 );

$i = 1;
foreach($_POST['c_additionals'] as $key=>$value) 
{
   if(!empty($value))
   {
		$pdf->SetFont( 'Arial', 'B', 12 );
		$pdf->Write( 6, "Additional " . $i . ":" );
		$pdf->Ln( 6 );
		$pdf->SetFont( 'Arial', '', 12 );
		$pdf->Write( 6, $value );
		$pdf->Ln( 12 );
		$i++;
   }
}

//$pdf->AddPage();
///// SECTION D /////
//$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'Arial', '', 20 );
$pdf->Write( 19, "Section D" );
$pdf->Ln( 21 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "History: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $history );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Examination: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $examination );
$pdf->Ln( 12 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Overview: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $overview );
$pdf->Ln( 12 );

$i = 1;
foreach($_POST['d_additionals'] as $key=>$value) 
{
   if(!empty($value))
   {
		$pdf->SetFont( 'Arial', 'B', 12 );
		$pdf->Write( 6, "Additional " . $i . ":" );
		$pdf->Ln( 6 );
		$pdf->SetFont( 'Arial', '', 12 );
		$pdf->Write( 6, $value );
		$pdf->Ln( 12 );
		$i++;
   }
}


//$pdf->AddPage();
///// SECTION E /////
$pdf->SetFont( 'Arial', '', 20 );
$pdf->Write( 19, "Section E" );
$pdf->Ln( 21 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Seatbelt details: " );
$pdf->Ln( 6 );

$pdf->SetFont( 'Arial', '', 12 );
if ($seatbelt == "Yes"){
	$pdf->Write( 6, "Seatbelt was worn." );
	$pdf->Ln( 12 );
}

else {
	$pdf->Write( 6, "Seatbelt was not worn." );
	$pdf->Ln( 6 );
	
	if ($seatbelt_exempt == "Yes"){
		$pdf->Write( 6, $fullName . " was exempt from wearing a seatbelt." );
		$pdf->Ln( 6 );
		$pdf->Write( 6, $seatbelt_details );
		$pdf->Ln( 12 );
	}
	
	else {
		$pdf->Write( 6, $fullName . " was not exempt from wearing a seatbelt." );
		$pdf->Ln( 6 );
		$pdf->Write( 6, $seatbelt_details );
		$pdf->Ln( 12 );
	}
}


//$pdf->AddPage();
///// SECTION F /////
$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Further Treatment and Rehabilitation: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $treatment3 );
$pdf->Ln( 6 );

$i = 1;
foreach($_POST['f_additionals'] as $key=>$value) 
{
   if(!empty($value))
   {
		$pdf->SetFont( 'Arial', 'B', 12 );
		$pdf->Write( 6, "Additional " . $i . ":" );
		$pdf->Ln( 6 );
		$pdf->SetFont( 'Arial', '', 12 );
		$pdf->Write( 6, $value );
		$pdf->Ln( 12 );
		$i++;
   }
}

$pdf->AddPage();
///// SECTION G /////
$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
$pdf->SetFont( 'Arial', '', 20 );
$pdf->Write( 19, "Section G" );
$pdf->Ln( 21 );

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Doctor Name: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $doc_fullname );
$pdf->Ln( 12 );

//$pdf->Image( $logoFile, $logoXPos2, $logoYPos2, $logoWidth2 );
$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Doctor Address: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
if (!empty($contact_address1)){$pdf->Write( 6, $contact_address1 );$pdf->Ln( 6 );}
if (!empty($contact_address2)){$pdf->Write( 6, $contact_address2 );$pdf->Ln( 6 );}
if (!empty($contact_address3)){$pdf->Write( 6, $contact_address3 );$pdf->Ln( 6 );}
if (!empty($contact_postcode)){$pdf->Write( 6, $contact_postcode );$pdf->Ln( 6 );}
if (!empty($contact_county)){$pdf->Write( 6, $contact_county );$pdf->Ln( 6 );}

$pdf->Ln( 6 );
/*
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $signature );
$pdf->Ln( 12 );
*/

$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Doctor Signature: " );
$pdf->Ln( 12 );
$pdf->SetFont( 'Arial', 'B', 12 );
$pdf->Write( 6, "Date Signed: " );
$pdf->Ln( 6 );
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Write( 6, $myDate );
$pdf->Ln( 12 );

/***
  Servo
***/

//$pdf->Output( $fullName."-Report.pdf", "I" );
//$filename="/uploads/AAA.pdf";

//$nameID = $_SESSION['CME_USER']['login_id'];

$rand = rand(10000, 99999);
$nameID = $_POST['userID'];


$fullName = str_replace(' ', '_', $fullName);
$fullName .=  "_" . $rand;

$oldmask = umask(0);
mkdir("../../../../uploads/expert/".$nameID, 0777, true);
umask($oldmask);

if (file_exists($path)) {
	$path = "../../../../uploads/expert/". $nameID . "/" . $fullName . $rand . ".pdf";
	header('location:'.$path);
} else {
	$path = "../../../../uploads/expert/". $nameID . "/" . $fullName . ".pdf";
	header('location:'.$path);
}

$pdf->Output($path,'F');
//header('location:'.$path);

?>


