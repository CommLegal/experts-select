<div class = "col-md-3"></div>
<div class = "col-md-6">

<?php 
require("../includes/config.php");

	if ($_SESSION['CME_USER']['type'] == "mro") { $btncolor = "btn btn-primary";} 
	else {$btncolor = "btn btn-success";}

//START DB CONNECTION
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$getCompanyNo = $conn->execute_sql("select", array("*"), "organisation_agreements JOIN e_accounts ON oa_ea_name = ea_id", "oa_id =?", array("i" => $_POST['callValues']));

$selectExpert = $conn->execute_sql("select", array("*"), "e_accounts", "ea_id=?", array("i" =>  $getCompanyNo[0]['oa_ea_name'])); 

//var_dump($_POST);

?>

        <div class = "col-md-12 mt25">
        	<p>Are you sure you want to enable <b><?php echo $selectExpert[0]['ea_forename'] . " " . $selectExpert[0]['ea_surname'] ?></b>?</p>
            
            <form id="enableAgreementForm" method="post" action="">
            
                <label class = "controls">Initial Reason:</label>
                
                <p><?php echo $getCompanyNo[0]['oa_cancellation_reason']; ?></p>
                
                <input type="hidden" class = "form-control" name="agreedmentId" value="<?php echo $getCompanyNo[0]['oa_id']; ?>" />
                <input type="hidden" class = "form-control" name="expertID" value="<?php echo $getCompanyNo[0]['ea_id']; ?>" />
                <input type="hidden" class = "form-control" name="mroCompany" value="<?php echo $getCompanyNo[0]['oa_mo_name']; ?>" />
                

            
        </div>
        
        
    
</div>
<div class = "col-md-3"></div>
<div id="success"></div>

                <input type="submit" id="enableAgreement" value="Confirm" class = "<?php echo $btncolor; ?> btn-lg col-md-12" />
                
            </form>
	<script src="<?php echo _ROOT ?>/js/modal.js"></script>

    
    <!-- Validation -->
    <script src="<?php echo _ROOT ?>/js/jquery.validate.js"></script>
    <script src="<?php echo _ROOT ?>/js/additional-methods.js"></script>
    <script src="<?php echo _ROOT ?>/js/validation.js"></script>
    <script src="<?php echo _ROOT ?>/js/mro-agreement-validation.js"></script>