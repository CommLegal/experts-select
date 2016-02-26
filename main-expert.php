<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Compare Medical Experts</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/cme-main.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php include("nav.php"); ?>
	
    <!-- Page	Content -->
	<div class="container mb25">
				<div class="col-md-12"><!-- Big nest -->
				
					<!-- Sidebar Vertical-->
					<div class="col-md-2 blue leftbar-vertical">
						<h2 class="midd white">Account</h2>
							<div class="text-center">
								<div class="btn-group-vertical" role="group" aria-label="Vertical button group">
									  <button type="button" class="btn btn-primary"><i class="fa fa-puzzle-piece icon"></i> <span class="texttaker">Account Bio</span></button>
									  <button type="button" class="btn btn-primary"><i class="fa fa-thumbs-up icon"></i> <span class="texttaker">Agreements</span></button>
									  <div class="btn-group" role="group">
										<button id="btnGroupVerticalDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										 <i class="fa fa-home icon"></i> <span class="texttaker">Venues </span><span class="caret"></span>
										</button>
										<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
										  <li><a href="#">Saved <i class="fa fa-floppy-o pull-right"></i></a></li>
										  <li><a href="#">Search <i class="fa fa-search pull-right"></i></a></li>
										</ul>
									  </div>
									  <div class="btn-group" role="group">
										<button id="btnGroupVerticalDrop2" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										  <i class="fa fa-book icon"></i> <span class="texttaker"> Bookings </span><span class="caret"></span></button>
										</button>
										<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
										  <li><a href="#">View <i class="fa fa-eye pull-right"></i></a></li>
										  <li><a href="#">Add <i class="fa fa-plus-square-o pull-right"></i></a></li>
										</ul>
									  </div>
									  <button type="button" class="btn btn-primary"><i class="fa fa-question-circle icon"></i><span class="texttaker"> Help</span></button>
								</div>
							</div>
					</div>
					
					<!-- Sidebar Vertical-->
					
<!--
						<div class="col-md-12 blue leftbar-horizontal">
							<h4 class="midd white">Account</h4>
								<div class="text-center">
									<div class="btn-group btn-group-justified">
									  <button type="button" class="btn btn-primary"><i class="fa fa-puzzle-piece icon"></i> <span class="texttaker">Account Bio</span></button>
									  <button type="button" class="btn btn-primary"><i class="fa fa-thumbs-up icon"></i> <span class="texttaker">Agreements</span></button>
									  <div class="btn-group" role="group">
										<button id="btnGroupVerticalDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										 <i class="fa fa-home icon"></i> <span class="texttaker">Venues </span><span class="caret"></span>
										</button>
										<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
										  <li><a href="#">Saved <i class="fa fa-floppy-o pull-right"></i></a></li>
										  <li><a href="#">Search <i class="fa fa-search pull-right"></i></a></li>
										</ul>
									  </div>
									  <div class="btn-group" role="group">
										<button id="btnGroupVerticalDrop2" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										  <i class="fa fa-book icon"></i> <span class="texttaker"> Bookings </span><span class="caret"></span></button>
										</button>
										<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
										  <li><a href="#">View <i class="fa fa-eye pull-right"></i></a></li>
										  <li><a href="#">Add <i class="fa fa-plus-square-o pull-right"></i></a></li>
										</ul>
									  </div>
									  <button type="button" class="btn btn-primary"><i class="fa fa-question-circle icon"></i><span class="texttaker"> Help</span></button>
									</div>
								</div>
						</div>
-->

					<!-- Content -->	
						<div class="col-md-10 green" style="padding-top: 15px; padding-left:85px; padding-right:85px; padding-bottom:15px;">
							<!-- TOP BOX -->
							<div class="row"><div class="col-md-4 bg-grey topradius"><h4 class ="midd">Updates - Diary</h4></div></div>
							<!-- Updates -->
							<div class="row">
								<div class="col-md-12 bg-grey diaryradius pt25">
									<div class="alert alert-warning col-md-12" role="alert"><i class="fa fa-file-text-o fa-3"></i> You have 14 unread swags. <i class="fa fa-check-circle-o pull-right"></i> <i class="fa fa-arrow-circle-o-right pull-right"></i> <i class="fa fa-times-circle-o pull-right"></i></div>
									<div class="alert alert-success col-md-12" role="alert"><img src="img/calendar.png"> You have 1,000,000 unread swags.</div>
								</div> 
							</div>

							<!-- BOTTOM BOX -->
							<div class="row pt25"><div class="col-md-4 bg-grey topradius"><h4 class ="midd">Appointments</h4></div></div>
							<!-- Appointments list -->
							<div class="row">
								<div class="col-md-12 bg-grey diaryradius pt25">
									<style type="text/css">
										.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;}
										.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 10px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
										.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
									</style>
										<table class="tg table midd">
										<!-- Could possibly have colour coded appointments,  -->
										  <tr><!-- Top row -->
											<th class="tg-031e midd"><h4>Date</h4></th>
											<th class="tg-031e midd"><h4>Time</h4></th>
											<th class="tg-031e midd"><h4>Ref</h4></th>
											<th class="tg-031e midd"><h4>Name</h4></th>
											<th class="tg-031e midd"><h4>Notes</h4></th>
										  </tr>
										  <tr><!-- Content -->
											<td class="tg-031e">09/09/15</td>
											<td class="tg-031e">18:19</td>
											<td class="tg-031e">SYR14</td>
											<td class="tg-031e">Tony Tunisia</td>
											<td class="tg-031e">Back pain, dehydration</td>
										  </tr>
										  <tr>
											<td class="tg-031e">25/12/54</td>
											<td class="tg-031e">18:19</td>
											<td class="tg-031e">X666</td>
											<td class="tg-031e">Will Morris</td>
											<td class="tg-031e">Unnatural obsession with a tiny plastic arm</td>
										  </tr>
										  <tr>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
										  </tr>
										  <tr>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
										  </tr>
										  <tr>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
										  </tr>
										  <tr>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
										  </tr>
										  <tr>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
										  </tr>
										  <tr>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
										  </tr>
										  <tr>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
											<td class="tg-031e"></td>
										  </tr>
										</table>
								</div> 
							</div>
						</div>
					<!--/content-->
					
				</div><!--/nestle-->
				

	</div><!--row-->
	

	
    <!-- /.body container -->
	
    <?php include("footer.php"); ?>
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
