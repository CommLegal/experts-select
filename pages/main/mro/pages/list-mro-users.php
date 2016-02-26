<?php

$getCompanyNo = $conn->execute_sql("select", array("ma_name"), "m_accounts", "ma_id=?", array("i" => $_SESSION['CME_USER']['login_id']));

$selectActiveMro = $conn->execute_sql("select", array("*"), "m_accounts", "ma_active=? AND ma_name =?", array("s" => "Y", "i" => $getCompanyNo[0]['ma_name']));

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
		
        foreach($selectActiveMro as $header => $value) { 
		
		$restrictByCompany = $conn->execute_sql("select", array("ma_name"), "m_accounts", "ma_id=?", array("i" => $_SESSION['CME_USER']['login_id']));
		
		$getActiveID = $conn->execute_sql("select", array("*"), "m_accounts", "ma_active=? AND ma_name =?", array("s" => "Y", "i" => $restrictByCompany[0]['ma_name']));
		
		$getPermissions = $conn->execute_sql("select", array("p_title"), "permissions", "p_id=?", array("i" => $selectActiveMro[$header]['ma_permissions']));
		
	?>
    
        <tr><!-- Content row -->
            <td class="tg-031e"><?php echo $selectActiveMro[$header]['ma_forename'] . " " . $selectActiveMro[$header]['ma_surname']; ?></td>
            <td class="tg-031e"><?php echo $selectActiveMro[$header]['ma_email']; ?></td>
            <td class="tg-031e"><?php if($selectActiveMro[$header]['ma_active'] == "Y") { echo "Yes"; } else { echo "No"; } ?> </td>
            <td class="tg-031e">
                <?php echo $getPermissions[0]['p_title']; ?>
            </td>
            <td class="tg-031e">
                <a href = "#" id = "display-user-edit:<?php echo $getActiveID[$header]['ma_id']; ?>" class = "show-overlay btn btn-default btn-sm" title="View/Edit Details">
                    <i class="fa fa-lg fa-pencil"></i>
                </a>
                <a href = "#" id = "display-user-delete:<?php echo $getActiveID[$header]['ma_id']; ?>" class = "show-overlay btn btn-default btn-sm" class = "btn btn-default btn-sm" title="Remove">
                    <i class="fa fa-lg fa-user-times"></i>
                </a>
            </td>
        </tr>
    
    <?php } } ?>
    

</table>