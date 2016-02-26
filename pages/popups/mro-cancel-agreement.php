<?php require("../includes/config.php");

require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$getCompanyNo = $conn->execute_sql("select", array("*"), "organisation_agreements JOIN e_accounts ON oa_ea_name = ea_id", "oa_id =?", array("i" => $_POST['callValues']));

	if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
	else {$btncolor = "btn btn-success";}

?>


<div class = "col-md-3"></div>
<div class = "col-md-6">

	<form id="cancelAgreementForm" method="post" action="">

        <label class = "controls">Reason:</label>
        <textarea name="cancellationReason" class = "form-control" rows = "4"></textarea>
        
        <input type="hidden" class = "form-control" name="agreedmentId" value="<?php echo $getCompanyNo[0]['oa_id']; ?>" />
        <input type="hidden" class = "form-control" name="expertID" value="<?php echo $getCompanyNo[0]['ea_id']; ?>" />
        <input type="hidden" class = "form-control" name="mroCompany" value="<?php echo $getCompanyNo[0]['oa_mo_name']; ?>" />
        


</div>

<div class = "col-md-3"></div>
        <input type="submit" id="cancelAgreement" class="<?php echo $btncolor; ?>  mb25 mt25 col-md-12 btn-lg" value="Save" />
        
    </form>
    
<div class = "mt25 mb25" id="success"></div>

<script src="<?php echo _ROOT ?>/js/modal.js"></script>

<!-- Validation -->
<script src="<?php echo _ROOT ?>/js/jquery.validate.js"></script>
<script src="<?php echo _ROOT ?>/js/additional-methods.js"></script>
<script src="<?php echo _ROOT ?>/js/validation.js"></script>
<script src="<?php echo _ROOT ?>/js/mro-agreement-validation.js"></script> 