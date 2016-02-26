<?php 

require("../includes/config.php");


//START DB CONNECTION
require("../includes/mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION

$selectMro = $conn->execute_sql("select", array("*"), "m_accounts", "ma_id=?", array("i" =>  $_POST['callValues'])); 

//var_dump($_POST['callValues']);

?>

<div class = "col-md-3"></div>
<div class = "col-md-6">
<form id="mro-users-notes" method="post" action="#">

    <label class = "controls">Active:</label>
    <select id="checkForActive" name="checkForActive" class = "form-control">
        <option value = "Y" name = "Y" <?php if($selectMro[0]['ma_active'] == "Y") { ?> selected <?php } ?>>Yes</option>
        <option value = "N" name = "N" <?php if($selectMro[0]['ma_active'] == "N") { ?> selected <?php } ?>>No</option>
    </select>
    
    <label class = "controls">First Name:</label>
    <input name = "Vname" class = "form-control" value="<?php echo $selectMro[0]['ma_forename'] ?>"/>
    
    <label class = "controls">Last Name:</label>
    <input name = "Vname2" class = "form-control" value="<?php echo $selectMro[0]['ma_surname'] ?>"/>
    
    <label class = "controls">User Level:</label>
    <select id="checkUserPermissions" name="checkUserPermissions" class = "form-control">
        <option name="1" value="1" <?php if($selectMro[0]['ma_permissions'] == "1") { ?> selected <?php } ?>>Basic</option>
        <option name="2" value="2" <?php if($selectMro[0]['ma_permissions'] == "2") { ?> selected <?php } ?>>Advanced</option>
        <option name="3" value="3" <?php if($selectMro[0]['ma_permissions'] == "3") { ?> selected <?php } ?>>Administrator</option>
    </select>
    
    <label class = "controls">Email:</label>
    <input type="hidden" name="mroId" value="<?php echo $_POST['callValues'] ?>" />
    <input name = "Vemail" class = "form-control" value="<?php echo $selectMro[0]['ma_email'] ?>"/>
    
    <label class = "controls">Change Password:</label>
    <input name="changePass" class = "form-control" value=""/>
    

</div>
<div class = "col-md-3 mb25"></div>
    <div class = "col-md-12 mt25 mb25"><div class = "mb25" id="success"></div><input type="submit" id="editMroUser" class = "col-md-12 btn btn-primary btn-lg" value="Save" /></div>
</form>

    
<script src="<?php echo _ROOT ?>/js/modal.js"></script>

    
    <!-- Validation -->
    <script src="<?php echo _ROOT ?>/js/jquery.validate.js"></script>
    <script src="<?php echo _ROOT ?>/js/additional-methods.js"></script>
    <script src="<?php echo _ROOT ?>/js/validation.js"></script>
    <script src="<?php echo _ROOT ?>/js/mro-agreement-validation.js"></script>