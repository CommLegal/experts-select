<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Compare Medical Experts - Coming Soon</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/cme-main.css">
</head>

<body>

<?php include('connect.php');?>


<?php 

		if ( $_SERVER ['REQUEST_METHOD'] == 'POST')
		{
			
			$errors = array() ; //Creates error array
			
			
			//Check for blanks
			if (empty($_POST['ea_forename'] ) )
			{$errors[] = 'Enter your first name.' ;}
			else {$fn = mysqli_real_escape_string ($conn, trim ($_POST['ea_forename']));}
			
			if (empty($_POST['ea_surname'] ) )
			{$errors[] = 'Enter your last name.' ;}
			else {$fn = mysqli_real_escape_string ($conn, trim ($_POST['ea_forename']));}
					
			if (empty($_POST['ea_email'] ) )
			{$errors[] = 'Enter your email.' ;}
			else {$e = mysqli_real_escape_string ($conn, trim ($_POST['ea_email']));}
		
			if (empty($_POST['ea_telephone'] ) )
			{$errors[] = 'Enter your contact number.' ;}
			else {$fn = mysqli_real_escape_string ($conn, trim ($_POST['ea_forename']));}
		
			if (empty($_POST['ea_speciality'] ) )
			{$errors[] = 'Enter your speciality.' ;}
			else {$fn = mysqli_real_escape_string ($conn, trim ($_POST['ea_forename']));}
		
		
		
		}

		//If no blanks ->

			//Checks for duplicate registered emails
		if (empty ($errors) )
		{
			$ea_email = $_POST['ea_email'];
			$q = "SELECT ea_id FROM e_accounts WHERE ea_email = ('{$ea_email}')";
			echo $q;
			$r = mysqli_query ($conn, $q);
			if (mysqli_num_rows ($r) != 0) 
			{$errors[] = "Already pre-registered with this email address.";}
		} 
	
	
		if (empty ($errors) )
		{
			$ea_forename = $_POST['ea_forename'];
			$ea_surname = $_POST['ea_surname'];
			$ea_speciality = $_POST['ea_speciality'];
			$ea_email = $_POST['ea_email'];
			$ea_telephone = $_POST['ea_telephone'];
			
			$q = "INSERT INTO e_accounts (ea_forename, ea_surname, ea_speciality, ea_email, ea_telephone)
								VALUES ('{$ea_forename}' , '{$ea_surname}' , '{$ea_speciality}' , '{$ea_email}' , '{$ea_telephone}') ";
			$r = mysqli_query ($conn, $q);
			if ($r)
			{
				echo "You registered! <a href=login.php>Log in?</a>";
			}
			mysqli_close ($conn);
		}

		else 
		{
			echo "<p>Errors:</p>";
			foreach ($errors as $msg)
			{
				echo "$msg<br>";
			}
			echo "<a href='index.php'>Try again?</a>";
			mysqli_close($conn);
			exit();
		}
		
?>

    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
