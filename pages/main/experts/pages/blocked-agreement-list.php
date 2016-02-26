<?php 

$confirmedMRO = $conn->execute_sql("select", array("*"), "organisation_agreements JOIN m_accounts ON oa_ma_name = ma_id AND oa_confirmed = 4", "oa_ea_name=?", array("i1" => $_SESSION['CME_USER']['login_id']));


?>
<table class="tg table midd">
      <tr><!-- Top row -->
        <th class="tg-031e midd"><b>Company</b></th>
        <th class="tg-031e midd"><b>Phone</b></th>
        <th class="tg-031e midd"><b>Email</b></th>
        <th class="tg-031e midd"><b>Notes</b></th>  
        <th class="tg-031e midd"><b>Actions</b></th>
      </tr>
       
    <?php 
        foreach($confirmedMRO as $header => $value) { 
        	$getCompanyNo = $conn->execute_sql("select", array("*"), "m_organisations", "mo_id=?", array("i" => $confirmedMRO[0]['oa_mo_name'])); ?>
              <tr>
                    <td class="tg-031e"><?php echo $getCompanyNo[0]['mo_name']; ?></td>
                    <td class="tg-031e"><?php echo $getCompanyNo[$header]['mo_telephone']; ?></td>
                    <td class="tg-031e"><a href="mailto:<?php echo $confirmedMRO[$header]['ma_email']; ?>"><?php echo $confirmedMRO[$header]['ma_email']; ?></a></td>
                    <td class="tg-031e">
                        <?php echo $confirmedMRO[$header]['oa_expert_blocked_note']; ?>
                    </td>
                    <td class="tg-031e">
                        <a href = "#" id = "mro-view-past-agreement:<?php echo $confirmedMRO[$header]['oa_id']; ?>" class = "show-overlay btn btn-default btn-sm" title="View Agreement">
                        <i class="fa fa-lg fa-file-text-o"></i></a>
                        
                        <a href = "#" id = "mro-unblock-expert:<?php echo $confirmedMRO[$header]['oa_id']; ?>" class = "show-overlay btn btn-default btn-sm" title="Unblock">
                        <i class="fa fa-lg fa-user-plus"></i></a>
                    </td>
              </tr>
    <?php }?>
</table>