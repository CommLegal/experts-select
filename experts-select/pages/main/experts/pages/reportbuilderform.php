<div class = "container main mb50 reportbuilder">
    		
            <div class="col-md-12 mb10">              
                <h3 class="textshadow" >Medical Report Generator</h3><div class="title-divider"></div>
            </div> 
            <form id = "report-form" target = "_blank" action="./pages/main/experts/pages/reportbuilder.php" method="post">
            
			<?php $userID = $_SESSION['CME_USER']['login_id']; ?>
            
            <input name = "userID" id = "userID" type = "hidden" value="<?php echo $userID ?>" />
            
            <div class = "row">
                <div class = "alert alert-info col-md-12 mt10 mb25">
                	<p><i class = "fa fa-lg fa-info"></i> &nbsp;The report builder will allow you to make detailed reports. 
                    If you need additional boxes you can create them with the 'Add Text Box' button at the top of the section.</p>
                </div>
                <div class="col-md-12 mb10 green topradius pq textwhite"><h4>Section A - Claimant Details</h4></div>

                <div class = "form-group col-md-4">
                    <label class="control-label">Claimants Full Name:</label>
                    <input class="form-control" name="fullName"  id="fullName" type="text" value="" />
                    <label>Date of Birth:</label>
                        <div class="input-group date">
                            <input class="form-control" id="date-picker-ven" name="date-picker-DOB" value="<?php echo date("d-m-Y");?>" type="text">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    <label class="control-label">Occupation:</label>
                    <input class="form-control" name="occupation"  id="occupation" type="text" value="" />
                    
					<label class="control-label">Photo ID:</label>
                    <select class="form-control" id="hasID">
                      <option value="No">No</option>
                      <option value="Yes">Yes</option>
                    </select>

                    <label class="control-label">Type of ID Checked:</label>
                    <input class="form-control" name="idType"  id="idType" type="text" value="" />

                </div>
    
                <div class = "form-group col-md-4">
                    <label class="control-label">Address:</label>
                    <input placeholder = "Line 1" type="text" name="address1" class="form-control" id="address1" value="" >
                    <input placeholder = "Line 2" type="text" name="address2" class="mt3 form-control" id="address2" value="" >
                    <input placeholder = "Line 3" type="text" name="address3" class="mt3 form-control" id="address3" value="" >
                    <input placeholder = "Postcode" type="text" name="postcode" class="mt3 form-control" id="postcode" value="" >
                    <input placeholder = "County" type="text" name="county" class="mt3 form-control" id="county" value="" >
                    <label class="control-label">Instruction Solicitor/Agency:</label>
                    <select class="form-control" id="instructor" name ="instructor">
                      <option value="solicitor">Solicitor</option>
                      <option value="agency">Agency</option>
                    </select>
                    
                    <label class="control-label">Solicitor/Agency Name:</label>
                    <input class="form-control" name="instructorName"  id="instructorName" type="text" value="" />
                    
                    <label class="control-label">Solicitor/Agency Ref:</label>
                    <input class="form-control" name="instructorRef"  id="instructorRef" type="text" value="" />
                </div>
                
                <div class = "form-group col-md-4">
                    <label class="control-label">Accompanied By:</label>
                    <input placeholder = "Leave empty if unaccompanied" type="text" name="accomp" class="form-control" id="accomp" value="" >
                    <label class="control-label">Records Reviewed:</label>
                    <select class="form-control" id="isReviewed" name="isReviewed">
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
					<label>Date of Accident:</label>
                    <div class="input-group date">
                        <input  class="form-control" id="date-picker-ven" name="date-picker-accident" value="<?php echo date("d-m-Y");?>" type="text">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                    
                    <label class="control-label">Place of Examination:</label>
                    <input class="form-control" name="examinationPlace"  id="examinationPlace" type="text" value="" />
                    
                    <label>Date of Report:</label>
                    <div class="input-group date">
                        <input  class="form-control" id="date-picker-ven" name="date-picker-report" value="<?php echo date("d-m-Y");?>" type="text">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                </div> 

            </div>

            <div class = "row mt25">
                <div class="col-md-12">              
                    <div class="col-md-12 mb10 green topradius pq textwhite"><h4>Section B - History</h4></div>
                </div>
                
                <div class = "col-md-12 mt10 well">
                	<p>Please give a brief description of the accident, immediate symptoms and treatment. Detail any improvement 
                    or deterioration of symptons including dates where possible. Also include a recovery/expected recovery date or period. </p>
                </div>

                <!-- ADD BOX 1 -->
               <div class = "col-md-12">
                    <a href="javascript:void(0);" class="btn btn-default btn-sm add_button2" title="Add Text Box">
                        Add Text Box &nbsp;<span class="fa-stack fa">
                          <i class="fa fa-square-o fa-stack-2x"></i>
                          <i class="fa fa-plus fa-stack-1x"></i>
                        </span>
                    </a>
                </div> 
                
                

                <div class = "form-group col-md-6">
                    <label class="control-label">The Accident:</label>
                    <textarea class="form-control" name="accidentDetails" id="accidentDetails" rows = "3" type="text" value="" ></textarea>
                </div>
                
                <div class = "form-group col-md-6">
                    <label class="control-label">Immediate Symtomps:</label>
                    <textarea class="form-control" name="symptoms1" id="symptoms1" rows = "3" type="text" value="" ></textarea>
                </div>
                
                <div class = "form-group col-md-6">
                    <label class="control-label">Later Symptoms:</label>
                    <textarea class="form-control" name="symptoms2" id="symptoms2" rows = "3" type="text" value="" ></textarea>
                </div>
                
                <div class = "form-group col-md-6">
                    <label class="control-label">Immediate Treatment:</label>
                    <textarea class="form-control" name="treatment1" id="treatment1" rows = "3" type="text" value="" ></textarea>
                </div>
                
                <div class = "form-group col-md-6">
                    <label class="control-label">Future Treatment:</label>
                    <textarea class="form-control" name="treatment2" id="treatment2" rows = "3" type="text" value="" ></textarea>
                </div>
                
                <div class = "form-group col-md-6">
                    <label class="control-label">Investigations:</label>
                    <textarea class="form-control" name="investigations" id="investigations" rows = "3" type="text" value="" ></textarea>
                </div>
                
                <div class = "form-group col-md-6">
                    <label class="control-label">Present Position Reported by Claimant:</label>
                    <textarea class="form-control" name="position" id="position" rows = "3" type="text" value="" ></textarea>
                </div>
                
                <div class="mt25 field_wrapper2">
                
			</div></div>

            <div class = "row mt25">
                <div class="col-md-12">              
                    <div class="col-md-12 mb10 green topradius pq textwhite"><h4>Section C</h4></div>
                </div>

                <!-- ADD BOX 2 -->
               <div class = "col-md-12">
                    <a href="javascript:void(0);" class="btn btn-default btn-sm add_button" title="Add Text Box">
                        Add Text Box &nbsp;<span class="fa-stack fa">
                          <i class="fa fa-square-o fa-stack-2x"></i>
                          <i class="fa fa-plus fa-stack-1x"></i>
                        </span>
                    </a>
                </div> 

                <div class = "col-md-12 mt12">
                <label class="control-label">Employment & Education Position:</label>
                </div>
                
                <div class = "form-group col-md-6">
                    <textarea class="form-control" name="eeDescription" id="eeDescription" rows = "5" type="text" value="" ></textarea>
                </div>    
                
                <div class = "well col-md-6">
                	<p>Please give details of the claimant's employment/education at the time of the accident. Include the days of 
                    absences, part-time work or light duties undertaken. Also specify and restriction the claimant is suffering with.</p>
                </div>       
                
                <div class = "col-md-12 mt12">
                	<label class="control-label">Consequential Effects:</label>
                </div>
                
                <div class = "form-group col-md-6">
                    <textarea placeholder = "" class="form-control" name="effects" id="effects" rows = "5" type="text" value="" ></textarea>
                </div>
                
                <div class = "well col-md-6">
                    <p>Please state the impact on other activities such as hobbies, recreations, housework, gardening, travelling, holidays, shopping and sex life. Give details as to the claimants general state of work.</p>
                </div>
                
                <div class="field_wrapper col-md-12"></div>
                
                

            </div>
            
 			<div class = "row mt25">
                <div class="col-md-12">
					<div class="col-md-12 mb10 green topradius pq textwhite"> <h4>Section D</h4></div>
                </div>
                
                <!-- ADD BOX 1 -->
               <div class = "col-md-12">
                    <a href="javascript:void(0);" class="btn btn-default btn-sm add_button3" title="Add Text Box">
                        Add Text Box &nbsp;<span class="fa-stack fa">
                          <i class="fa fa-square-o fa-stack-2x"></i>
                          <i class="fa fa-plus fa-stack-1x"></i>
                        </span>
                    </a>
                </div> 
                
                
                <div class = "col-md-12 mt12">
                	<label class="control-label">Past Medical History:</label>
                	<p>Please refer to any relevant history based on examination. </p>
                </div>
                
                <div class = "form-group col-md-6">
                    <textarea class="form-control" name="history" id="history" rows = "5" type="text" value="" ></textarea>
                </div>
                
                <div class = "col-md-6">
                	<div class = "well"><p>Please refer to any relevant history based on examination.</p></div>
                </div>
                
                <div class = "col-md-12 mt12">
                	<label class="control-label">On Examination:</label>
                </div>
                
                <div class = "form-group col-md-6">
                    <textarea placeholder = "" class="form-control" name="examination" id="examination" rows = "14" type="text" value="" ></textarea>
                </div>
                
                <div class = "col-md-6">
                	<div class = "well"><p>Please state your findings on examination including details of any restrictions arising from the accident. Mention dominant hand, general appearance, mental health, injuries/wounds/scars etc, neck examination, upper limb examination, back examination, lower limbs examination.</p></div>
                </div>
                
                <div class = "col-md-12 mt12">
                <label class="control-label">Diagnosis Opinion and Prognosis:</label>
                </div>
                
                <div class = "form-group col-md-6">
                    <textarea placeholder = "" class="form-control" name="overview" id="overview" rows = "14" type="text" value="" ></textarea>
                </div>
                
                <div class = "col-md-6">
                <div class = "well"><p>Please state your overall opinion of the clients position to date dealing with causation and including a prognosis if possible. Refer to the 
                    the claimants employment/education position and any impact to the claimants home life. Please detail whether you consider that the claimant 
                    has/will make a recovery and to what extent and when this will be reached. Also include if the claimant has any further needs including treatments. 
                    Mention opinion, job prospects, prognosis, further report etc.</p></div>
                </div>
                
                <div class="field_wrapper3 col-md-12"></div>
                
            </div>


 			<div class = "row mt25">
                <div class="col-md-12"> 
                	<div class="col-md-12 mb10 green topradius pq textwhite"><h4>Section E</h4></div>             
                </div>
            
            	<div class = "col-md-4">
                    <div class = "col-md-12">
                        <label class="control-label">Claimant Wearing Seatbelt:</label>
                        <select class="form-control" name = "seatbelt" id="seatbelt">
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                    </div>
                        
                    <div id = "seatbelt1" class = "col-md-12" style = "display:none;">
                        <label class="control-label">Exemption from Wearing Seatbelt:</label>
                        <select class="form-control" name = "seatbelt_exempt" id="seatbelt_exempt">
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select>
                    </div>
				</div>                
                
            	<div id = "seatbelt2" class = "col-md-8" style = "display:none;">
                	<label class="seatbelt_title control-label">State if the claiments injuries would have been prevented or less severe:</label>
                    <textarea placeholder = "" class="form-control" name="seatbelt_details" id="seatbelt_details" rows = "5" type="text" value="" ></textarea>
				</div>
			</div>  
            
			<div class = "row mt25">
                <div class="col-md-12">    
                    <div class="col-md-12 mb10 green topradius pq textwhite"> <h4>Section F</h4></div>                   
                </div>
                
                <!-- ADD BOX F -->
               <div class = "col-md-12">
                    <a href="javascript:void(0);" class="btn btn-sm btn-default add_button4" title="Add Text Box">
                        Add Text Box &nbsp;<span class="fa-stack fa-sm">
                          <i class="fa fa-square-o fa-stack-2x"></i>
                          <i class="fa fa-plus fa-stack-1x"></i>
                        </span>
                    </a>
                </div> 
            
                <div class = "col-md-6 mt12">
                	<label class="control-label">Further Treatment and Rehabilitation:</label>
                    <textarea placeholder = "" class="form-control" name="treatment3" id="treatment3" rows = "6" type="text" value="" ></textarea>
                </div>
                
                <div class="field_wrapper4 col-md-12"></div>
                
			</div>  			

			<div class = "row mt25">
                <div class="col-md-12">              
                    <div class="col-md-12 mb10 green topradius pq textwhite"><h4>Section G - Your Details</h4></div>             
                </div>
                
                <div class = "col-md-4 mt12">                    
               		<label class="control-label">Contact Address:</label>
                    <input placeholder = "Line 1" type="text" name="contact_address1" class="form-control" id="contact_address1" value="" >
                    <input placeholder = "Line 2" type="text" name="contact_address2" class="mt3 form-control" id="contact_address2" value="" >
                    <input placeholder = "Line 3" type="text" name="contact_address3" class="mt3 form-control" id="contact_address3" value="" >
                    <input placeholder = "Postcode" type="text" name="contact_postcode" class="mt3 form-control" id="contact_postcode" value="" >
                    <input placeholder = "County" type="text" name="contact_county" class="mt3 form-control" id="contact_county" value="" >
                </div>
            
                <div class = "col-md-4 mt12">
                    <label class="control-label">Signed:</label>
                    <input class="form-control" name="signature"  id="signature" type="text" value="" />
                    <label class="control-label">Full Name:</label>
                    <input class="form-control" name="doc_fullname"  id="doc_fullname" type="text" value="" />
                    <label>Date:</label>
                    <div class="input-group">
                        <input class="form-control"  disabled id="date-picker-ven" name="date-picker-signed" value="<?php echo date("d-m-Y");?>" type="text">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span></input>
                    </div>
                </div>
                
                <div class = "col-md-4 well">
                
                    <p>I confirm that I have made clear which facts and matters referred to in this report are within my own knowledge and which are not. 
                    Those that are within my own knowledge I confirm to be true. The opinions I have expressed represent my true and complete professional 
                    opinion on the matters to which they refer.</p>
                            
                    <div class="checkbox">
                      <label><input type="checkbox" value="" name = "agree" id = "agree" />I Agree</label>
                    </div>

                    <input value = "Generate PDF" disabled id = "makePDF" style = "" class = "pull-right btn btn-lg btn-success" type = "submit" />
                    
    			
                
				</div>

			</div>  
</form> 
    </div>
</div>
<script type="text/javascript">
var removeBtn = '<a href="javascript:void(0);" class="mb25 remove_button" title="Remove field">(Remove)</a>';

///// SECTION B
	$(document).ready(function(){
		var x = 0;
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button2'); //Add button selector
		var wrapper = $('.field_wrapper2'); //Input field wrapper
		
		var x = 2; //Initial field counter is 1
		$(addButton).click(function(){ //Once add button is clicked
			if(x < maxField){ //Check maximum number of input fields
			var fieldHTML = '<div><div class = "form-group col-md-6"><label class="control-label">Additional Info:</label>' + removeBtn + '<textarea class="form-control" name="b_additionals[]" id="b_additionals[]" rows = "3" type="text" value="" ></textarea></div>'; 
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); // Add field html
			}
		});
		$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});


///// SECTION C
	$(document).ready(function(){
		var x = 0;
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.field_wrapper'); //Input field wrapper
		
		var x = 2; //Initial field counter is 1
		$(addButton).click(function(){ //Once add button is clicked
			if(x < maxField){ //Check maximum number of input fields
			var fieldHTML = '<div><label class="controls">Additional Info:</label>' + removeBtn +'<textarea rows="5" class = "form-control col-md-6 mb10" type="text" name = "c_additionals[]" id="c_additionals[]" value=""></textarea></div>'; 
			//New input field html 
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); // Add field html
			}
		});
		$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});


///// SECTION D
	$(document).ready(function(){
		var x = 0;
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button3'); //Add button selector
		var wrapper = $('.field_wrapper3'); //Input field wrapper
		
		var x = 2; //Initial field counter is 1
		$(addButton).click(function(){ //Once add button is clicked
			if(x < maxField){ //Check maximum number of input fields
			var fieldHTML = '<div><label class="controls">Additional Info:</label>' + removeBtn +'<textarea rows="5" class = "form-control col-md-6 mb10" type="text" name = "d_additionals[]" id="d_additionals[]" value=""></textarea></div>'; 
			//New input field html 
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); // Add field html
			}
		});
		$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});
	


///// SECTION F
	$(document).ready(function(){
		var x = 0;
		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button4'); //Add button selector
		var wrapper = $('.field_wrapper4'); //Input field wrapper
		
		var x = 2; //Initial field counter is 1
		$(addButton).click(function(){ //Once add button is clicked
			if(x < maxField){ //Check maximum number of input fields
			var fieldHTML = '<div><label class="controls">Additional Info:</label>' + removeBtn +'<textarea rows="6" class = "form-control col-md-6 mb10" type="text" name = "f_additionals[]" id="f_additionals[]" value=""></textarea></div>'; 
			//New input field html 
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); // Add field html
			}
		});
		$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
	});


//////////
 $('#agree').click(function() {
        if ($(this).is(':checked')) {
            $('#makePDF').removeAttr('disabled');
        } else {
            $('#makePDF').attr('disabled', 'disabled');
        }
    });
 
 
</script>


