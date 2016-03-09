<?php
	
	var_dump($_POST);
	
		echo "<br><br>";
			// check if fields passed are empty
			if(
			   //$_POST['name'] == "" ;
			   
				empty($_POST['name'])  			||
				empty($_POST['email']) 			||
				empty($_POST['phone1']) 		||		//I had to use "phone1" instead of "phone", for some reason it didn't like "phone"
				empty($_POST['message'])		||
				
				
			   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
			   {
				echo "Invalid email address.";
				//return false;
			   }
			  
			$name = 			$_POST['name'];
			$email_address = 	$_POST['email'];
			$phone1 = 			$_POST['phone1'];
			$message = 			$_POST['message'];
				
			// Create email body and send it	
			$to = 'elliot.rushforth@onecalldirect.co.uk'; // Where the email will be sent to
			$email_subject = "Contact form submitted by:  $name";
			$email_body = 
		
				"Name: $name \n".
				"Email: $email_address \n". 
				"Phone: $phone1 \n \n".
				"$message";
						
			$headers = "From: $name\n";
			$headers .= "Reply-To: $email_address";	
			mail($to,$email_subject,$email_body,$headers);
			//return true;	
		
?>