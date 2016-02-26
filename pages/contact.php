<?php 
	if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
	else {$btncolor = "btn btn-success";}
?>

<div class= "container">   
    <div class="col-md-12 mb25">              
        <h3>Contact</h3><div class="title-divider"></div>
    </div> 
    <div class = "col-md-12"><!-- Panel wrap -->    
        <div class="panel panel-default"><!-- Panel Container -->
            <div class="panel-heading"><h4>Get In Touch</h4></div>
            <div class="panel-body">
               

             <div class = "col-md-6">
                        <!-- Contact Form -->
                        <!-- In order to set the email address and subject line for the contact form go to the contact_action.php file. -->
                        
                        <form action="" method = "POST" id = "contact_form">
                        
        
                        <div id = "">
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Contact:</label>
                                       <select id="contact-type" name="contact-type">
                                       		<option name="1" value = "noneVal">Select a Recipient</option>
                                            <option name="2" value = "adminVal">Expert Select Administrator</option>
                                            <option name="3" value = "mroVal">MRO</option>
                                            <option name="4" value = "expertVal">Expert</option>
                                       </select>
                                </div>
                            </div>
                            
                            <div class="control-group form-group" >
                                <div class="controls">
                                    <label>Recipient:</label>
                                        <select id="contact-list-mro" name="contact-list-mro" style="display:none">
                                        	<option id="ma_options" name="0" value="0" selected>Select MRO</option>
                                        </select>
                                        
                                        <select id="contact-list-expert" name="contact-list-expert" style="display:none">
                                        	<option id="ea_options" name="0" value="0" selected>Select Expert</option>
                                        </select>
                                        
										<p id = "contact-list-admin" style = "display:none">Support</p>
                                       
                                </div>
                            </div>
                            
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label id="nameLabel">Full Name:</label>
                                    <input type="text" class="form-control" id="Vname"  name = "Vname" required />
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label id="phoneLabel">Phone Number:</label>
                                    <input type="tel" class="form-control" id="Vphone"  name = "Vphone"  required  />
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label id="emailLabel">Email Address:</label>
                                    <input type="email" class="form-control" id="Vemail" name = "Vemail" required  />
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Subject:</label>
                                    <input type="text" class="form-control" id="Vsubject" name = "Vsubject" required  />
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Message:</label>
                                    <textarea required rows="5" cols="100" class="form-control" id="Vmessage"  name = "Vmessage" maxlength="999" style="resize:none"></textarea>
                                </div>
                            </div>
                            <button type="submit" id="contactSubmit" class="mt25 <?php echo $btncolor ?> btn-lg" value=""> Send Message</button> 
                        </form>
                        <!-- End of row -->
                    </div>
                </div>
                <div id="success"></div>
                    <div class="col-md-6">
							<!-- 
                            	<h3>Contact Details</h3> 
                                <p class= "mt10">
                                    Use the contact form to send us a message or get in touch using the details below.
                                </p>
                            -->
                            <label>Our Address:</label>
							<p>
                            	One Call<br />
								Doncaster<br />
								First Point<br />
								DN7 2JA<br /><br />
							</p>
							<p><i class="fa fa-phone"></i> 
								<abbr title="Phone">P</abbr>: 01302 564521</p>
							<p><i class="fa fa-envelope-o"></i> 
								<abbr title="Email">E</abbr>: <a href="mailto:contact@expertselect.co.uk?Subject=Enquiry" title="You can email Expert Select here">contact@expertselect.co.uk</a>
							</p>
							<p><i class="fa fa-clock-o"></i> 
								<abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:30 PM</p>
							<ul class="list-unstyled list-inline list-social-icons">
								<li>
									<a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
								</li>

							</ul>
					</div>

            </div>
        </div>
    </div><!-- End panel -->   
  
<!-- End container -->    
</div>

<script>
	$('#contact-type').change(function(){
        if($(this).val() == 'adminVal') {
            $("#Vname").attr('required');
			$("#Vphone").attr('required');
			$("#Vemail").attr('required');
			$(".error").hide();
			
        } else {
            $("#Vname").removeAttr('required');
			$("#Vphone").removeAttr('required');
			$("#Vemail").removeAttr('required');
			$(".error").hide();
        } 

	});
</script>