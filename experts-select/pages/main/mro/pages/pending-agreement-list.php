<?php 

//START - TURN ERRORS ON
/*ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);*/
//END - TURN ERRORS ON

$getCompanyNo = $conn->execute_sql("select", array("ma_name"), "m_accounts", "ma_id=?", array("i" => $_SESSION['CME_USER']['login_id']));

//var_dump($confirmedAgreement);

$confirmedExpert = $conn->execute_sql("select", array("*"), "organisation_agreements JOIN e_accounts ON oa_ea_name = ea_id AND oa_mo_name = '".$getCompanyNo[0]['ma_name']."' AND oa_confirmed = 2", "", "");

?>
<table class="tg table midd">
  <tr><!-- Top row -->
    <th class="tg-031e midd"><b>Name</b></th>
    <th class="tg-031e midd"><b>Phone</b></th>
    <th class="tg-031e midd"><b>Email</b></th>
    <th class="tg-031e midd"><b>Appointment Quota</b></th>
    <th class="tg-031e midd"><b>Rating</b></th>
    <!--<th class="tg-031e midd">Actions</th>-->
  </tr>
  
<?php 
if($getCompanyNo) {
	foreach($confirmedExpert as $header => $value) { ?>
      <tr>
        <td class="tg-031e"><?php echo $confirmedExpert[$header]['ea_forename'] . " " . $confirmedExpert[$header]['ea_surname']; ?></td>
        <td class="tg-031e"><?php echo $confirmedExpert[$header]['ea_telephone']; ?></td>
        <td class="tg-031e"><a href="mailto:<?php echo $confirmedExpert[$header]['ea_email']; ?>"><?php echo $confirmedExpert[$header]['ea_email']; ?></a></td>
        <td class="tg-031e"><?php echo $confirmedExpert[$header]['oa_app_quota'] . " " . "P/m"; ?></td>
        <td class="tg-031e">
			<?php if($confirmedExpert[$header]['oa_agreement_rating'] == "1") { ?>
                <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
            <?php } ?>
            <?php if($confirmedExpert[$header]['oa_agreement_rating'] == "2") { ?>
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
            <?php } ?>
            <?php if($confirmedExpert[$header]['oa_agreement_rating'] == "3") { ?>
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></i>
            <?php } ?>
            <?php if($confirmedExpert[$header]['oa_agreement_rating'] == "4") { ?>
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
            <?php } ?>
            <?php if($confirmedExpert[$header]['oa_agreement_rating'] == "5") { ?>
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            <?php } ?>
        </td>
        <!--<td class="tg-031e">
            <a href = "#" id = "view-agreement" class = "show-overlay btn btn-default btn-sm" title="View Agreement"><i class="fa fa-lg fa-file-text-o"></i></a>
            <a href = "#" id = "view-agreement" class = "show-overlay  btn btn-default btn-sm" title="View/Edit Agreement"><i class="fa fa-lg fa-pencil"></i></a>
            <a href = "#" id = "cancel-agreement" class = "show-overlay btn btn-default btn-sm" title="Cancel Agreement"><i class="fa fa-lg fa-times"></i></a>
            <a href = "#" id = "block-expert" class = "show-overlay btn btn-default btn-sm" title="Block Expert"><i class="fa fa-lg fa-ban"></i></a>
        </td>-->
      </tr>
<?php } }?>

</table>