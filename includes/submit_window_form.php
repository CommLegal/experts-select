<?php
if(isset($_POST['pm-form-submitexpertsfeedback-btn']))
{
/* These are the variable that tell the subject of the email and where the email will be sent.*/

$emailSubject = 'Expert feedback received';
$mailto = 'Alison@clmedicalreports.co.uk';
$from = 'expertfeedback@clmedicalreports.co.uk';

$Name = trim($_POST['pm_expertsfeedback_name']," \t\n\r\0\x0B");
$Message = trim($_POST['pm_expertsfeedback_message']," \t\n\r\0\x0B");
$Company = trim($_POST['pm_expertsfeedback_company']," \t\n\r\0\x0B");
$ClMediCallAidRef = trim($_POST['pm_expertsfeedback_refnum']," \t\n\r\0\x0B");
$telNum = ($_POST['pm_expertsfeedback_telno']);
$contactName = ($_POST['pm_expertsfeedback_contactname']);
$email = ($_POST['pm_expertsfeedback_email']);



/* This takes the information and lines it up the way you want it to be sent in the email. */

$body = "Hello\n\n";
$body = "You have received feedback from an Expert, the details are as follows: \n\n\n";
$body .= "Name:\n\n";
$body .= "$Name\n\n\n\n";
$body .= "Company:\n\n";
$body .= "$Company\n\n\n\n";
$body .= "Cl MediCall Aid Ref:\n\n";
$body .= "$ClMediCallAidRef\n\n\n\n";
$body .= "Telephone Number:\n\n";
$body .= "$telNum\n\n\n\n";
$body .= "Contact Name:\n\n";
$body .= "$contactName\n\n\n\n";
$body .= "Email:\n\n";
$body .= "$email\n\n\n\n";
$body .= "The Message is:\n\n";
$body .= "$Message\n\n\n\n";
$body .= "This marks the end of the Expert Feedback";

$headers = "From: $from\r\n"; // This takes the email and displays it as who this email is from.
mail($mailto, $emailSubject, $body, $headers); // This tells the server what to send.

//redirect to success page
                                header ("Location: Thankyou-Expertsfb.php");
}
?>