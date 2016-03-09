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

$searchMRO = $conn->execute_sql("select", array("*"), "m_accounts JOIN m_organisations ON ma_name = mo_id", "ma_id =?", array("i" => $_POST['mro_id']));


?>
          <div class = "col-md-6">
            <label class="control-label">Address Line 1:</label>
            <input type="text"  class="form-control" id="mroAddress1" name="mroAddress1" value="<?php echo $searchMRO[0]['mo_address_1']; ?>" disabled \>
            <label class="control-label">Address Line 2:</label>
            <input type="text"  class="form-control" id="mroAddress2" name="mroAddress2" value="<?php echo $searchMRO[0]['mo_address_2']; ?>" disabled \>
            <label class="control-label">Address Line 3:</label>
            <input type="text"  class="form-control" id="mroAddress3" name="mroAddress3" value="<?php echo $searchMRO[0]['mo_address_3']; ?>" disabled \>
            <label class="control-label">Email:</label>
            <input type="text"  class="form-control" id="mroEmail" name="mroEmail" value="<?php echo $searchMRO[0]['ma_email']; ?>" disabled \>
           </div>
           
           <div class = "col-md-6">
                <label class="control-label">Appointment Quota</label>
                <input type="text" class="form-control" name="app-quota" placeholder="Appointments Per Month" value="" />
                <label class="control-label">Appointment Rate</label>
                <input type="text"  class="form-control" id="app-rate" name="app-rate" placeholder="Amount charged per report" value="" required>                            
                <label class="control-label">Message</label>
                <textarea type="text"  rows = "4" class="form-control" id="message1" name="message1" value = "" required> Please consider this agreement.</textarea>                           
           </div>
            
           <div class = "col-md-6">
            <input type="hidden" class="form-control" id="mroID" name="mroID" value="<?php echo $searchMRO[0]['ma_id']; ?>" >
            <input type="hidden" class="form-control" id="mroForename" name="mroForename" value="<?php echo $searchMRO[0]['ma_forename']; ?>" >
            <input type="hidden" class="form-control" id="mroSurname" name="mroSurname" value="<?php echo $searchMRO[0]['ma_surname']; ?>" >
            <input type="hidden" class="form-control" id="mroTelephone" name="mroTelephone" value="<?php echo $searchMRO[0]['ma_telephone']; ?>" >
           </div>
           
             