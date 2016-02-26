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
			
			$errors = array() ;
			
			if (empty($_POST['firstname'] ) )
			{$errors[] = 'Enter your first name.' ;}
			else {$fn = mysqli_real_escape_string ($dbc, trim ($_POST['firstname']));}
					
			if (empty($_POST['email'] ) )
			{$errors[] = 'Enter your email.' ;}
			else {$e = mysqli_real_escape_string ($dbc, trim ($_POST['email']));}
			
			}

		else {$errors[] = "Enter a password!" ;}

		if (empty ($errors) )
		{
			$q = "SELECT user_id FROM users WHERE email = {$_POST['email']}";
			$r = mysqli_query ($dbc, $q );
			if (mysqli_num_rows ($r) != 0)
			{$errors[] = "Already registered with this address.";}
		}
			
			
		if (empty ($errors) )
		{
			$q = "INSERT INTO users	(title) VALUES ('title')";
			$r = mysqli_query ($dbc, $q );
			if ($r)
			{
				echo "You registered! <a href=login.php>Log in?</a>";
			}
			mysqli_close ($dbc);
			exit();
		}

		
		else 
		{
			echo "<p>Errors:</p>";
			foreach ($errors as $msg)
			{
				echo "$msg<br>";
			}
			echo "<a href='index.php'>Try again?</a>";
			mysqli_close($dbc);
			exit();
		}
?>

<div class="container">
        <div class="row allradius scrubber pt25 pb25 mt50">
        	<div class="col-lg-12">
            	<img src="images/construction.png" class="img-responsive">
			</div>
            
            <div class="col-lg-12">
				<div class="col-md-1"></div>
                	<div class="col-md-10">
                    	<div class="col-lg-6"><!-- LEFT COL -->
                        <h1>Register Today!</h1>
                            <form action=preregister.php method="POST">
                            <p>Title: <br>
                            <select name="title">
                              <option value="mr">Mr</option>
                              <option value="mrs">Mrs</option>
                              <option value="miss">Miss</option>
                              <option value="dr">Dr</option>
                            </select><br></p>

                                <p>First name: <br><input type="text" name="first_name" class="col-lg-10" value=""><br></p>
                                <p>Last name: <br><input type="text" name="last_name" class="col-lg-10" value=""><br></p>
                                <p>Email: <br><input type="text" name="email" class="col-lg-10" value=""><br></p>
                                <p>Phone: <br><input type="number" name="pass1" class="col-lg-10" value=""><br></p>
                                <p>Profession: <br><input type="text" name="pass2" class="col-lg-10" value=""><br></p>
                            <input type="submit" value="register" class="btn btn-success mt25">

                       	</div>
                    	<div class="col-lg-6"><!-- RIGHT COL -->
                        
                        <h1>Benefits:</h1><br>
                            <ul class="fa-ul">
                              <li><i class="fa-li fa fa-check"></i>Pre-register to check out our unique system</li>
                              <li><i class="fa-li fa fa-check"></i>Register as an MRO and start creating users</li>
                              <li><i class="fa-li fa fa-check"></i>Register as an expert and build reputation</li>
                              <li><i class="fa-li fa fa-check"></i>Search for local experts or MROs</li>
                              <li><i class="fa-li fa fa-check"></i>Upload your CV and company mission</li>
                            </ul>
                        </div>
                    </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
