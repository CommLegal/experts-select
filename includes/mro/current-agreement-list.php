<?php 

//START - TURN ERRORS ON
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
//END - TURN ERRORS ON

//START DB CONNECTION
/*require("../mysqlwrapper_class.php");
$conn = new mysqlwrapper_class;*/
//END DB CONNECTION

$confirmedAgreement = $conn->execute_sql("select", array("*"), "organisation_agreements JOIN e_accounts ON oa_ea_name = ea_id", "oa_confirmed =?", array("i" => "1"));


?>
<table class="tg table midd">
  <tr><!-- Top row -->
    <th class="tg-031e midd">Name</th>
    <th class="tg-031e midd">ID</th>
    <th class="tg-031e midd">Phone</th>
    <th class="tg-031e midd">Email</th>
    <th class="tg-031e midd">Rating</th>
    <th class="tg-031e midd">Actions</th>
  </tr>
  
<?php foreach($confirmedAgreement as $header => $value) { ?>
						
<!-- Could possibly have colour coded appointments,  -->
  <tr><!-- Content -->
    <td class="tg-031e"><a href="#"><?php echo $confirmedAgreement[$header]['ea_forename'] . " " . $confirmedAgreement[$header]['ea_surname']; ?></a></td>
    <td class="tg-031e"><?php echo $confirmedAgreement[$header]['ea_id']; ?></td>
    <td class="tg-031e"><?php echo $confirmedAgreement[$header]['ea_telephone']; ?></td>
    <td class="tg-031e"><a href="mailto:<?php echo $confirmedAgreement[$header]['ea_email']; ?>"><?php echo $confirmedAgreement[$header]['ea_email']; ?></a></td>
    <td class="tg-031e">
        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
    </td>
    <td class="tg-031e">
       <abbr title="View contract"><i class="fa fa-file-text-o"></i></a></abbr>
       <abbr title="Edit"><i class="fa fa-pencil"></i></a></abbr><br>
       <abbr title="Remove"><i class="fa fa-user-times"></i></a></abbr>
       <abbr title="Block"><i class="fa fa-ban"></i></a></abbr>
    </td>
  </tr>
<?php } ?>
</table>