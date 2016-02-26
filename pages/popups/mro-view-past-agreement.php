<div class = "col-md-3"></div>
<div class = "col-md-6">
<?php 

//START DB CONNECTION
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;

$getCompanyNo = $conn->execute_sql("select", array("*"), "organisation_agreements JOIN e_accounts ON oa_ea_name = ea_id", "oa_id =?", array("i" => $_POST['callValues']));

$selectExpert = $conn->execute_sql("select", array("*"), "e_accounts", "ea_id=?", array("i" =>  $getCompanyNo[0]['oa_ea_name'])); 

//var_dump($_POST);

?>

    <label class = "controls">Name:</label>
    <p><?php echo $getCompanyNo[0]['ea_forename'] . " " . $getCompanyNo[0]['ea_surname']; ?></p>
    
    <label class = "controls">Appointments Per Month:</label>
    <p><?php echo $getCompanyNo[0]['oa_app_quota']; ?> P/m</p>
    
    <label class = "controls">Charge Per Report:</label>
    <p>&#163;<?php echo $getCompanyNo[0]['oa_pa_price']; ?></p>
    
    <label class = "controls">Email:</label>
    <p><?php echo $getCompanyNo[0]['ea_email']; ?></p>
    
    <div class = "col-md-12 mt25"><button class = "col-md-12 btn btn-primary btn-lg">Save <i class = "fa fa-check fa-lg"></i></button></div>
    
</div>
<div class = "col-md-3"></div>

	<script src="<?php echo _ROOT ?>/js/modal.js"></script>