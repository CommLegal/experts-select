<?php
//START - TURN ERRORS ON
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//END - TURN ERRORS ON

//START DB CONNECTION
require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

$searchName = trim($_POST['expertSurname'], " ");

$searchExpert = $conn->execute_sql("select", array("*"), "e_accounts", "ea_surname =?", array("s" => $searchName));

$mroDetails = $conn->execute_sql("select", array("*"), "m_accounts", "ma_id =?", array("i" => $_SESSION['CME_USER']['login_id']));

?>

<form id="expertSearch" name="expertSearch" method="post" action="">
    <div class = "col-md-6"> 
    	<?php if($searchExpert) { ?> 
            <label>User:</label>
            <select name="selectExpert" id="selectExpert" class="form-control" required>
				<option value="" selected >Select an Expert</option>
				<?php 
                foreach($searchExpert as $header => $value) { 
                    echo  "<option id=\"expertOption\" name=\"" . $searchExpert[$header]['ea_id'] . "\" value=\"" . $searchExpert[$header]['ea_id'] . "\"  >" . $searchExpert[$header]['ea_forename'] . " " . $searchExpert[$header]['ea_surname'] . "</option>";
                } 
                ?> 
            </select>
		 
        <div id="expertInformation">
            <label class="control-label">Address Line 1:</label>
            <input disabled type="text"  class="form-control" id="" name="" value="Autofill" >
            <label class="control-label">Address Line 2:</label>
            <input disabled type="text"  class="form-control" id="" name="" value="Autofill" >
            <label class="control-label">Address Line 3:</label>
            <input disabled type="text"  class="form-control" id="" name="" value="Autofill" >
            <label class="control-label">Email:</label>
            <input disabled type="text"  class="form-control" id="" name="" value="Autofill" >
        </div>
    </div>     
    <div class = "col-md-6">
        <label class="control-label">Appointment Quota P/m</label>
		<select id="proposedQuota" name="proposedQuota" id="proposedQuota" class="form-control">
        <?php for($i = 0;  $i < 300;) { $i++; ?>
        	<option name="<?php echo $i; ?>" value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php } ?>
        </select>
        <label class="control-label">Appointment Rate</label>
        <select id="proposedRate" name="proposedRate" id="proposedRate" class="form-control">
        <?php for($i = 0;  $i < 800;) { $i = $i + 10; ?>
        	<option name="<?php echo $i; ?>" value="<?php echo $i; ?>"><?php echo "&#163;" .  $i; ?></option>
        <?php } ?>
        </select>                           
        <label class="control-label">Message</label>
        <textarea type="text"  rows = "4" class="form-control" id="agreementMessage" name="agreementMessage" value = "" required></textarea>   
        <div class="mt25" id="returnMessage"></div>                        
    </div>
    <div class = "col-md-12">
    
    	<input type="hidden" name="mroCompany" class="btn btn-lg btn-primary mt25" value="<?php echo $mroDetails[0]['ma_name']; ?>" />
    	<input type="submit" id="agreementSubmit" class ="btn btn-lg btn-primary mt25" value="Send Request" />
    </div>
    <div id="successBlock" style="display:none;">Your agreement request has been sent.</div>
    <?php } ?>
</form>

<script src="<?php echo _ROOT ?>/js/custom.js"></script>