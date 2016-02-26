	<div class="container bg-blue mb25">
				<div class="bgtrans nop col-md-2"><!-- Big nest -->
					<?php 
					if($_SESSION['CME_USER']['type'] == "expert") {
						require("pages/menus/expert.php");	
					} 
					?>

					<!-- Content -->	
                    
						<div class="col-md-10 white diarypadding">
                        
                            <ul class="row nav nav-tabs">
                              <li class="active"><a class = "topradius noleftborder " href="#tab_a" data-toggle="tab"><h5 class ="midd">Updates <span class="badge">3</span></h5></a></li>
                              <li><a class="topradius" href="#tab_b" data-toggle="tab"><h5 class ="midd">Your Diary</h5></a></li>
                            </ul>
                            <div class="row tab-content bg-grey bottomradius toprightradius" style="margin-top:-30px;">
                            
                            <div class="tab-pane active" id="tab_a">
                            	<?php if($userDetails['ea_login_no'] == 1) { ?>
                                <div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h4><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;Welcome to your expert account</h4><br>
                                Before you can add any appointments, you need to give us some more information about yourself. You can do this by clicking on the account bio button on the left menu.</div>
                                <?php } ?>
                                
                                <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong><i class="fa fa-calendar"></i></strong> You have 1 appointment item.</div>
                                <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong><i class="fa fa-envelope-o"></i></strong> You have 1 unread message.</div>
                            </div>
                                    
                            <div class="tab-pane" id="tab_b">
                                <h4>Your Diary</h4>
                                <div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="fa fa-exclamation-circle"></i> You have 1 unchecked item.</div>
                                <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong><i class="fa fa-calendar"></i></strong> You have 1 appointment item.</div>
                                <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong><i class="fa fa-envelope-o"></i></strong> You have 1 unread message.</div>
                            </div>
                            
                        </div>
                            
							<!-- BOTTOM BOX -->
							<div class="row pt25"><div class="col-md-4 bg-grey topradius pq"><h5 class ="midd">Appointments</h5></div></div>
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
											<th class="tg-031e midd"><h4>Date</h4></th>
											<th class="tg-031e midd"><h4>Time</h4></th>
											<th class="tg-031e midd"><h4>Ref</h4></th>
											<th class="tg-031e midd"><h4>Name</h4></th>
											<th class="tg-031e midd"><h4>Notes</h4></th>
										  </tr>
										  <tr><!-- Content -->
											<td class="tg-031e">25/12/54</td>
											<td class="tg-031e">18:19</td>
											<td class="tg-031e">X666</td>
											<td class="tg-031e">Will Morris</td>
											<td class="tg-031e">Unnatural obsession with a tiny plastic arm</td>
										  </tr>
										  <tr>
											<td class="tg-031e">25/12/54</td>
											<td class="tg-031e">18:19</td>
											<td class="tg-031e">X666</td>
											<td class="tg-031e">Will Morris</td>
											<td class="tg-031e">Unnatural obsession with a tiny plastic arm</td>
										  </tr>
										  <tr>
											<td class="tg-031e">25/12/54</td>
											<td class="tg-031e">18:19</td>
											<td class="tg-031e">X666</td>
											<td class="tg-031e">Will Morris</td>
											<td class="tg-031e">Unnatural obsession with a tiny plastic arm</td>
										  </tr>
										  <tr>
											<td class="tg-031e">25/12/54</td>
											<td class="tg-031e">18:19</td>
											<td class="tg-031e">X666</td>
											<td class="tg-031e">Will Morris</td>
											<td class="tg-031e">Unnatural obsession with a tiny plastic arm</td>
										  </tr>
										  <tr>
											<td class="tg-031e">25/12/54</td>
											<td class="tg-031e">18:19</td>
											<td class="tg-031e">X666</td>
											<td class="tg-031e">Will Morris</td>
											<td class="tg-031e">Unnatural obsession with a tiny plastic arm</td>
										  </tr>
										  <tr>
											<td class="tg-031e">25/12/54</td>
											<td class="tg-031e">18:19</td>
											<td class="tg-031e">X666</td>
											<td class="tg-031e">Will Morris</td>
											<td class="tg-031e">Unnatural obsession with a tiny plastic arm</td>
										  </tr>
										  <tr>
											<td class="tg-031e">25/12/54</td>
											<td class="tg-031e">18:19</td>
											<td class="tg-031e">X666</td>
											<td class="tg-031e">Will Morris</td>
											<td class="tg-031e">Unnatural obsession with a tiny plastic arm</td>
										  </tr>
										  <tr>
											<td class="tg-031e">25/12/54</td>
											<td class="tg-031e">18:19</td>
											<td class="tg-031e">X666</td>
											<td class="tg-031e">Will Morris</td>
											<td class="tg-031e">Unnatural obsession with a tiny plastic arm</td>
										  </tr>
										  <tr>
											<td class="tg-031e">25/12/54</td>
											<td class="tg-031e">18:19</td>
											<td class="tg-031e">X666</td>
											<td class="tg-031e">Will Morris</td>
											<td class="tg-031e">Unnatural obsession with a tiny plastic arm</td>
										  </tr>
										  <tr>
											<td class="tg-031e">25/12/54</td>
											<td class="tg-031e">18:19</td>
											<td class="tg-031e">X666</td>
											<td class="tg-031e">Will Morris</td>
											<td class="tg-031e">Unnatural obsession with a tiny plastic arm</td>
										  </tr>
										  <tr>
											<td class="tg-031e">25/12/54</td>
											<td class="tg-031e">18:19</td>
											<td class="tg-031e">X666</td>
											<td class="tg-031e">Will Morris</td>
											<td class="tg-031e">Unnatural obsession with a tiny plastic arm</td>
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