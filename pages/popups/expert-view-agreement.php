<?php 

require("../includes/config.php");

require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$getCompanyNo = $conn->execute_sql("select", array("*"), "organisation_agreements JOIN e_accounts ON oa_ea_name = ea_id", "oa_id =?", array("i" => $_POST['callValues']));

	if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
	else {$btncolor = "btn btn-success";}	

//var_dump($getCompanyNo);

?>

<div class = "col-md-3"></div>
<div class = "col-md-6">
<form id="mroUpdateAgreement" method="post" action="#">
    <label class = "controls">First Name:</label>
    <input id="agreedExpertFn" name="agreedExpertFn" class = "form-control" value="<?php echo $getCompanyNo[0]['ea_forename']; ?>" disabled />
    
    <label class = "controls">Last Name:</label>
    <input type="text" id="agreedExpertSn" name="agreedExpertSn" class = "form-control" value="<?php echo $getCompanyNo[0]['ea_surname']; ?>"  disabled/>
    
    <label class = "controls">Telephone:</label>
    <input type="text" id="agreedExpertTel" name="agreedExpertTel" class = "form-control" value="<?php echo $getCompanyNo[0]['ea_telephone']; ?>"  disabled/>
    
    <label class = "controls">Appointment Quota P/m:</label>
    <input type="text" id="agreedExpertQuota" name="agreedExpertQuota" class = "form-control" value="<?php echo $getCompanyNo[0]['oa_app_quota']; ?>" />
    
    <label class = "controls">Charge Per Report:</label>
    <!--
    <input type="text" id="agreedExpertPr" name="agreedExpertPr" class = "form-control" value="<?php echo "&#163;" . $getCompanyNo[0]['oa_pa_price']; ?>" />
    -->
    <div class="input-group"> <span class="input-group-addon">&#163;</span> <input type="text" id="agreedExpertPr" name="agreedExpertPr" class="form-control" value="<?php echo $getCompanyNo[0]['oa_pa_price']; ?>" aria-label="Amount"> </div>
    
 
    <label class = "controls">Rating:</label>
    <select id="agreedExpertRating" name="agreedExpertRating" class = "form-control">
        <option value="1" <?php if($getCompanyNo[0]['oa_agreement_rating'] == 1) { ?> Selected <?php } ?>>1</option>
        <option value="2" <?php if($getCompanyNo[0]['oa_agreement_rating'] == 2) { ?> Selected <?php } ?>>2</option>
        <option value="3" <?php if($getCompanyNo[0]['oa_agreement_rating'] == 3) { ?> Selected <?php } ?>>3</option>
        <option value="4" <?php if($getCompanyNo[0]['oa_agreement_rating'] == 4) { ?> Selected <?php } ?>>4</option>
        <option value="5" <?php if($getCompanyNo[0]['oa_agreement_rating'] == 5) { ?> Selected <?php } ?>>5</option>
    </select>
    
    <input type="hidden" class = "form-control" name="agreedmentId" value="<?php echo $getCompanyNo[0]['oa_id']; ?>" />
    <input type="hidden" class = "form-control" name="expertID" value="<?php echo $getCompanyNo[0]['ea_id']; ?>" />
    <input type="hidden" class = "form-control" name="mroCompany" value="<?php echo $getCompanyNo[0]['oa_mo_name']; ?>" />
    
    <?php if($getCompanyNo[0]['oa_blocked_note'] != NULL) { ?>
        <label class = "controls">Blocked Notes:</label>
        <input type="text" id="agreedExpertBn" name="agreedExpertBn" class = "form-control" value="<?php echo $getCompanyNo[0]['oa_blocked_note'] ?>" />  
    <?php } ?> 
    

</div>
<div class = "col-md-3 mb25"></div>
    <div class = "col-md-12 mt25"><input type="submit" id="submitAgreementChange" class = "col-md-12 btn btn-success btn-lg mb25" value="Save" /></div>
    <div class = "mb25 mt25" id = "success"></div>

</form>
<script src="<?php echo _ROOT ?>/js/modal.js"></script>

    <!-- Validation -->
    <script src="<?php echo _ROOT ?>/js/jquery.validate.js"></script>
    <script src="<?php echo _ROOT ?>/js/additional-methods.js"></script>
    <script src="<?php echo _ROOT ?>/js/validation.js"></script>
    <script src="<?php echo _ROOT ?>/js/mro-agreement-validation.js"></script>
