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
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/cme-main.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Page	Content -->

	<div class="container mb25 bg-blue quickborder">
				<div class="bgtrans nop col-md-2"><!-- Big nest -->

					<!-- Sidebar Vertical-->

                    <div class="panel-group hider pt25" id="accordion">
                    
                        <div class="panel panel-info nobg">
                            <div class="panel-heading nobg">
                                   <a style="display: block; width: 100%;" href="#" class="btn btn-primary" role="button"><i class="fa fa-cogs icon"></i> Account Bio</a>
                            </div>
                            <div id="panel1" class="panel-collapse collapse">
                                <div class="panel-body nobg">
                                    Change your account settings and information. Make it easier for MRO's to find you.
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-default nobg">
                            <div class="panel-heading nobg">
                                   <a style="display: block; width: 100%;" href="#" class="btn btn-primary" role="button">  <i class="fa fa-thumbs-up icon"></i> Agreements</a>
                            </div>
                            <div id="panel2" class="panel-collapse collapse">
                                <div class="panel-body nobg">
                                    Manage
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default nobg">
                            <div class="panel-heading nobg">
                                    <a  class="accordion-toggle btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#panel3" style="display: block; width: 100%;"> 
                                    <i class="fa fa-home icon"></i> Venues</a>
                            </div>
                            <div id="panel3" class="panel-collapse collapse">
                                <div class="panel-body nobg">
                                   <button type="button" class="btn btn-default" style="display: block; width: 100%;">
                                   <span class="hider">Saved <i class="fa fa-star pull-right"></i></span></button><br>
                                   
                                   <button type="button" class="btn btn-default" style="display: block; width: 100%;">
                                   <span class="hider">Search <i class="fa fa-search pull-right"></i></span></button>
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default nobg">
                            <div class="panel-heading nobg">
                                    <a  class="accordion-toggle btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#panel4" style="display: block; width: 100%;"> 
                                    <i class="fa fa-book icon"></i> Bookings</a>
                            </div>
                            <div id="panel4" class="panel-collapse collapse nobg">
                                <div class="panel-body nobg">
                                   <button type="button" class="btn btn-default" style="display: block; width: 100%;">
                                   <span class="hider">View <i class="fa fa-eye pull-right"></i></span></button><br>
                                   <button type="button" class="btn btn-default" style="display: block; width: 100%;">
                                   <span class="hider">Add <i class="fa fa-user-plus pull-right"></i></span></button>
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default nobg">
                            <div class="panel-heading nobg">
                                   <a style="display: block; width: 100%;" href="#" class="btn btn-primary" role="button">  <i class="fa fa-question-circle icon"></i> Help</a>
                            </div>
                            <div id="panel5" class="panel-collapse collapse">
                                <div class="panel-body5">
                                    Contents panel 1
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
					
					<!-- Sidebar Horizontal-->
					
						<div class="col-md-12 blue leftbar-horizontal">
								<div class="text-center">
									<div class="btn-group btn-group-horizontal">
									  <button type="button" class="btn btn-primary"><i class="fa fa-cogs icon"></i> <span class="hider">Account Bio</span></button>
									  <button type="button" class="btn btn-primary"><i class="fa fa-thumbs-up icon"></i> <span class="hider">Agreements</span></button>
									  <div class="btn-group" role="group">
										<button id="btnGroupVerticalDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										 <i class="fa fa-home icon"></i> <span class="hider">Venues </span><span class="caret"></span>
										</button>
										<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
										  <li><a href="#">Saved <i class="fa fa-star pull-right"></i></a></li>
										  <li><a href="#">Search <i class="fa fa-search pull-right"></i></a></li>
										</ul>
									  </div>
									  <div class="btn-group" role="group">
										<button id="btnGroupVerticalDrop2" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										  <i class="fa fa-book icon"></i> <span class="hider"> Bookings </span><span class="caret"></span></button>
										</button>
										<ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
										  <li><a href="#">View <i class="fa fa-eye pull-right"></i></a></li>
										  <li><a href="#">Add <i class="fa fa-user-plus pull-right"></i></a></li>
										</ul>
									  </div>
									  <button type="button" class="btn btn-primary"><i class="fa fa-question-circle icon"></i><span class="hider"> Help</span></button>
									</div>
								</div>
						</div>

					<!-- Content -->	
                    
						<div class="col-md-10 green diarypadding">
                        <div class="row">
                        
							<div class="col-lg-6">
                                <div class="panel panel-default">
                                  <div class="panel-heading"><h4>Agreements with Experts</h4></div>
                                  <div class="panel-body">
                                     <p>Here you can edit the agreements your organisation has with medical experts. 
                                        You can view the experts contract, edit your notes, cancel the agreement and add 
                                        them to the block list. You can perform these actions through the Actions menu 
                                        located to the right of each expert.</p><br>
                                  </div>
                                </div>
							</div>
                            
							<div class="col-lg-6">
                                <div class="panel panel-default">
                                  <div class="panel-heading"><h4>Search</h4></div>
                                  <div class="panel-body">
                                  
								<div class="input-group">
								<input type="text" class="form-control" placeholder="Find an expert~">
								<span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
                              </div><!-- /input-group --><br>
                                  
                                  
                                     <p>Enter the user ID, name, email or phone number of an expert to find them. 
                                        Alternatively, enter a postcode or town to show all the available experts 
                                        within that area.</p>
                                  </div>
                                  

                            </div>
                        </div>
                </div>
  
							<!-- BOTTOM BOX -->
							<div class="row pt25"><div class="col-md-4 bg-grey topradius pq"><h4 class ="midd">Agreements</h4></div></div>
							<!-- Appointments list -->
							<div class="row">
								<div class="col-md-12 bg-grey diaryradius pt25 pb25">

                                
									<style type="text/css">
										.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;}
										.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 10px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
										.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
									</style>
										<table class="tg table midd">
										<!-- Could possibly have colour coded appointments,  -->
										  <tr><!-- Top row -->
											<th class="tg-031e midd">Name</th>
											<th class="tg-031e midd">ID</th>
											<th class="tg-031e midd">Phone</th>
											<th class="tg-031e midd">Email</th>
											<th class="tg-031e midd">Venues</th>
											<th class="tg-031e midd">Actions</th>
										  </tr>
                                          


                                          <tr><!-- Content -->
											<td class="tg-031e"><a href="#">Basil Thanoon</a></td>
											<td class="tg-031e">08532</td>
											<td class="tg-031e">07532130801</td>
											<td class="tg-031e"><a href="mailto:elliot.rushforth@onecalldirect.co.uk">bigbazzythanners@yahoo.co.uk</a></td>
											<td class="tg-031e">
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S3445X,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">SHF34X,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">Z35GE
                                            </td>
											<td class="tg-031e">
                                               <abbr title="View contract"><i class="fa fa-file-text-o"></i></a></abbr>
                                               <abbr title="Edit"><i class="fa fa-pencil"></i></a></abbr><br>
                                               <abbr title="Remove"><i class="fa fa-user-times"></i></a></abbr>
                                               <abbr title="Block"><i class="fa fa-ban"></i></a></abbr>
                                            </td>
										  </tr>
                                          <tr><!-- Content -->
											<td class="tg-031e"><a href="#">Basil Thanoon</a></td>
											<td class="tg-031e">08532</td>
											<td class="tg-031e">07532130801</td>
											<td class="tg-031e"><a href="mailto:elliot.rushforth@onecalldirect.co.uk">bigbazzythanners@yahoo.co.uk</a></td>
											<td class="tg-031e">
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S3445X,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">SHF34X,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">Z35GE
                                            </td>
											<td class="tg-031e">
                                               <abbr title="View contract"><i class="fa fa-file-text-o"></i></a></abbr>
                                               <abbr title="Edit"><i class="fa fa-pencil"></i></a></abbr><br>
                                               <abbr title="Remove"><i class="fa fa-user-times"></i></a></abbr>
                                               <abbr title="Block"><i class="fa fa-ban"></i></a></abbr>
                                            </td>
										  </tr>
                                          
                                          <tr><!-- Content -->
											<td class="tg-031e"><a href="#">Basil Thanoon</a></td>
											<td class="tg-031e">08532</td>
											<td class="tg-031e">07532130801</td>
											<td class="tg-031e"><a href="mailto:elliot.rushforth@onecalldirect.co.uk">bigbazzythanners@yahoo.co.uk</a></td>
											<td class="tg-031e">
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S3445X,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">SHF34X,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">Z35GE
                                            </td>
											<td class="tg-031e">
                                               <abbr title="View contract"><i class="fa fa-file-text-o"></i></a></abbr>
                                               <abbr title="Edit"><i class="fa fa-pencil"></i></a></abbr><br>
                                               <abbr title="Remove"><i class="fa fa-user-times"></i></a></abbr>
                                               <abbr title="Block"><i class="fa fa-ban"></i></a></abbr>
                                            </td>
										  </tr>
                                          
                                          
                                          
                                          
                                          
                                          
										</table>
                           <!-- tab content -->
                            </div><!-- end of container -->
								</div> 
                                
                                
<!-- BOTTOM BOX -->
							<div class="row pt25"><div class="col-md-4 bg-grey topradius pq"><h4 class ="midd">Disagreements</h4></div></div>
							<!-- Appointments list -->
							<div class="row">
								<div class="col-md-12 bg-grey diaryradius pt25 pb25">
									<style type="text/css">
										.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;}
										.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 10px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
										.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
									</style>
										<table class="tg table midd">
										<!-- Could possibly have colour coded appointments,  -->
										  <tr><!-- Top row -->
											<th class="tg-031e midd"><h4>Name</h4></th>
											<th class="tg-031e midd"><h4>ID</h4></th>
											<th class="tg-031e midd"><h4>Phone</h4></th>
											<th class="tg-031e midd"><h4>Email</h4></th>
											<th class="tg-031e midd"><h4>Venues</h4></th>
											<th class="tg-031e midd"><h4>Actions</h4></th>
										  </tr>
                                          
										  <tr><!-- Content -->
											<td class="tg-031e"><a href="#">Dr Crapdoc</a></td>
											<td class="tg-031e">18874</td>
											<td class="tg-031e">53535352</td>
											<td class="tg-031e"><a href="mailto:elliot.rushforth@onecalldirect.co.uk">crapdoc@gmail.com</a></td>
											<td class="tg-031e">
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX
                                            </td>
											<td class="tg-031e">
                                               <abbr title="View past contracts"><i class="fa fa-file-text-o"></i></a></abbr>
                                               <abbr title="Unblock"><i class="fa fa-user-plus"></i></a></abbr> <br>
                                               <!-- <abbr title="Edit"><i class="fa fa-pencil"></i></a></abbr> -->
                                            </td>
										  </tr>
                                          
										  <tr><!-- Content -->
											<td class="tg-031e"><a href="#">Dr Crapdoc</a></td>
											<td class="tg-031e">18874</td>
											<td class="tg-031e">53535352</td>
											<td class="tg-031e"><a href="mailto:elliot.rushforth@onecalldirect.co.uk">crapdoc@gmail.com</a></td>
											<td class="tg-031e">
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX
                                            </td>
											<td class="tg-031e">
                                               <abbr title="View past contracts"><i class="fa fa-file-text-o"></i></a></abbr>
                                               <abbr title="Unblock"><i class="fa fa-user-plus"></i></a></abbr> <br>
                                               <!-- <abbr title="Edit"><i class="fa fa-pencil"></i></a></abbr> -->
                                            </td>
										  </tr>
                                          
										  <tr><!-- Content -->
											<td class="tg-031e"><a href="#">Dr Crapdoc</a></td>
											<td class="tg-031e">18874</td>
											<td class="tg-031e">53535352</td>
											<td class="tg-031e"><a href="mailto:elliot.rushforth@onecalldirect.co.uk">crapdoc@gmail.com</a></td>
											<td class="tg-031e">
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX,
                                            <a href="https://www.google.co.uk/maps/place/Barnsley,+South+Yorkshire+S70+6HX/@53.5504863,-1.5002121,17z/data=!3m1!4b1!4m2!3m1!1s0x48797b325f3c1cd7:0xfbe17e46747aaada">S706HX
                                            </td>
											<td class="tg-031e">
                                               <abbr title="View past contracts"><i class="fa fa-file-text-o"></i></a></abbr>
                                               <abbr title="Unblock"><i class="fa fa-user-plus"></i></a></abbr> <br>
                                               <!-- <abbr title="Edit"><i class="fa fa-pencil"></i></a></abbr> -->
                                            </td>
										  </tr>

										</table>
                           <!-- tab content -->
                            </div><!-- end of container -->
								</div> 
                                
                                
                                
							</div>
						</div>
					<!--/content-->
					
				</div><!--/nestle-->
				

	</div><!--row-->


	
    <!-- /.body container -->
	

	
    <!-- jQuery -->
<script src="../../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
<script src="../../js/bootstrap.min.js"></script>

</body>

</html>
