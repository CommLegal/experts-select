<?php 

$confirmedMRO = $conn->execute_sql("select", array("*"), "organisation_agreements JOIN m_accounts ON oa_ma_name = ma_id AND oa_confirmed = 2", "oa_ea_name=?", array("i1" => $_SESSION['CME_USER']['login_id']));

?>
<table class="tg table midd">
  <tr><!-- Top row -->
    <th class="tg-031e midd"><b>Company</b></th>
    <th class="tg-031e midd"><b>Phone</b></th>
    <th class="tg-031e midd"><b>Agreement Holder Email</b></th>
    <th class="tg-031e midd"><b>Appointment Quota</b></th>
    <th class="tg-031e midd"><b>Price Per Report</b></th>
    <!--<th class="tg-031e midd">Actions</th>-->
  </tr>
  
<?php 
	foreach($confirmedMRO as $header => $value) { 
	$getCompanyNo = $conn->execute_sql("select", array("*"), "m_organisations", "mo_id=?", array("i" => $confirmedMRO[0]['oa_mo_name'])); ?>
      <tr>
        <td class="tg-031e"><?php echo $getCompanyNo[0]['mo_name']; ?></td>
        <td class="tg-031e"><?php echo $getCompanyNo[$header]['mo_telephone']; ?></td>
        <td class="tg-031e"><a href="mailto:<?php echo $confirmedMRO[$header]['ma_email']; ?>"><?php echo $confirmedMRO[$header]['ma_email']; ?></a></td>
        <td class="tg-031e"><?php echo $confirmedMRO[$header]['oa_app_quota'] . " " . "P/m"; ?></td>
        <td class="tg-031e">
			<?php echo "&#163;" . $confirmedMRO[$header]['oa_pa_price']; ?>
        </td>
      </tr>
<?php }?>

</table>