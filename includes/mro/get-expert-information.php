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

$searchExpert = $conn->execute_sql("select", array("*"), "e_accounts", "ea_id =?", array("i" => $_POST['selectExpert']));


?>

    <label class="control-label">Address Line 1:</label>
    <input type="text"  class="form-control" id="expertAddress1" name="expertAddress1" value="<?php echo $searchExpert[0]['ea_address1']; ?>" disabled \>
    <label class="control-label">Address Line 2:</label>
    <input type="text"  class="form-control" id="expertAddress2" name="expertAddress2" value="<?php echo $searchExpert[0]['ea_address2']; ?>" disabled \>
    <label class="control-label">Address Line 3:</label>
    <input type="text"  class="form-control" id="expertAddress3" name="expertAddress3" value="<?php echo $searchExpert[0]['ea_address3']; ?>" disabled \>
    <label class="control-label">Email:</label>
    <input type="text"  class="form-control" id="expertEmail" name="expertEmail" value="<?php echo $searchExpert[0]['ea_email']; ?>" disabled \>
    
    <input type="hidden" class="form-control" id="expertID" name="expertID" value="<?php echo $searchExpert[0]['ea_id']; ?>" >
    <input type="hidden" class="form-control" id="expertForename" name="expertForename" value="<?php echo $searchExpert[0]['ea_forename']; ?>" >
    <input type="hidden" class="form-control" id="expertSurname" name="expertSurname" value="<?php echo $searchExpert[0]['ea_surname']; ?>" >
    <input type="hidden" class="form-control" id="expertTelephone" name="expertTelephone" value="<?php echo $searchExpert[0]['ea_telephone']; ?>" >