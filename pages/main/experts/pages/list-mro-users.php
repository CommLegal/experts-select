<?php

/*//START - TURN ERRORS ON
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//END - TURN ERRORS ON

//START DB CONNECTION
require("mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;
//END DB CONNECTION*/

//START SQL QUERY TO PULL DATABASE COLUMN
$selectMro = $conn->execute_sql("select", array("ma_id", "ma_name", "ma_forename", "ma_surname", "ma_email"), "m_accounts", "", "");

$getCompanyNo = $conn->execute_sql("select", array("ma_name"), "m_accounts", "ma_id=?", array("i" => $_SESSION['CME_USER']['login_id']));

$getPermissions = $conn->execute_sql("select", array("p_title"), "permissions", "p_id=?", array("i" => $selectMro[0]['ma_permissions']));



?>

<table class="tg table midd table-responsive">
  <tr><!-- Top row -->
	<th class="tg-031e midd">Name</th>
	<th class="tg-031e midd">Email</th>
	<th class="tg-031e midd">Active</th>
	<th class="tg-031e midd">User Level</th>
	<th class="tg-031e midd">Actions</th>
  </tr>
  
<?php if($getCompanyNo) {
	foreach($selectMro as $header => $value) { ?>

    <tr><!-- Content row -->
        <td class="tg-031e"><?php echo $selectMro[$header]['ma_forename'] . " " . $selectMro[$header]['ma_forename']; ?></td>
        <td class="tg-031e"><?php echo $selectMro[$header]['ma_email']; ?></td>
        <td class="tg-031e"><?php if($selectMro[$header]['ma_active'] == "Y") { echo "Yes"; } else { "No"}; ?> </td>
        <td class="tg-031e">
            <?php echo $getPermissions[$header]['p_title']; ?>
        </td>
        <td class="tg-031e">
            <a href = "#" id = "display-user-notes" class = "show-overlay btn btn-default btn-sm" title="View/Edit Details">
                <i class="fa fa-lg fa-pencil"></i>
            </a>
            <a href = "#" id = "display-user-deactivate" class = "show-overlay btn btn-default btn-sm" class = "btn btn-default btn-sm" title="Deactivate">
                <i class="fa fa-lg fa-toggle-on"></i>
            </a>
            <a href = "#" id = "display-user-delete" class = "show-overlay btn btn-default btn-sm" class = "btn btn-default btn-sm" title="Remove">
                <i class="fa fa-lg fa-user-times"></i>
            </a>
        </td>
    </tr>

<?php } ?>