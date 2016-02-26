<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test Area</title>
</head> 

<body>
<?php 
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
    
    require("../../includes/mysqlwrapper_class.php");
    $conn = new mysqlwrapper_class;
    
    $selectOption = $conn->execute_sql("select", array("*"), "venues", "", "");
    
    //var_dump($selectOption);
	$appArray = $conn->execute_sql("select", array("eap_id", "eap_date", "eap_timeslot"), "e_appointments", "eap_date >= ? AND eap_date <= ? order by eap_date", array("s1" => $tomorrowdate . " 00:00:00", "s2" => $tomorrowdate . " 11:59:59"));
    
?>

<?php 
	var_dump($_POST['test4']);
?>

</body>
</html>